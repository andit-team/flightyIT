<?php

namespace App\Http\Controllers;

use App\User;
use App\Permission;
use Cartalyst\Sentinel\Roles\EloquentRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Core;
use Sentinel;
use Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('authorized');
    }

    public function dashboard(){
        if(Sentinel::getUser()->inRole('admin')){
            return view('admin.dashboard');
        }

        if(Sentinel::getUser()->inRole('agent')){
            return view('admin.agent.dashboard');
        }
    }

    public function myProfile()
    {
        $user = Sentinel::getUser();
        return view('admin.users.my_profile', compact('user'));
    }

    public function updateMyProfile(Request $request)
    {
        $this->formValidate($request);
        $user = Sentinel::findById(Sentinel::getUser()->id);
        
        $profile_image = Core::fileUpload($request,'profile_image','old_profile_image','uploads/users',$user->id.'-profile-img');
        $profile_banar =Core::fileUpload($request,'profile_banar','old_profile_banar','uploads/users',$user->id.'-profile-bannar');

        $credentials = [
            'profile_image' => $profile_image,
            'profile_banar' => $profile_banar,
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'name'          => $request->first_name . ' ' . $request->last_name
        ];
        if (!empty($request->password)) {
            $credentials['password'] = $request->password;
        }
        $user = Sentinel::update($user, $credentials);
        Core::sendNotification([1], 'Update own profile', '/users');
        Core::activities("Edit", "Users", "Edit a user");
        Session::flash('success', 'Profile updated succeed!');
        return redirect('system-admin/myprofile');
    }

    // New User Form
    public function userCreate()
    {
        if (!Sentinel::hasAccess('user-add')) {
            Session::flash('error', 'Permission Denied!');
            return redirect()->back();
        }
        $roles = DB::table('roles')->get();
        return view('admin.users.user.create', compact('roles'));
    }

    // Post a new User
    public function userStore(Request $request)
    {
        if (!Sentinel::hasAccess('user-add')) {
            Session::flash('error', 'Permission Denied!');
            return redirect()->back();
        }
        $this->formValidate($request);
        $request->validate(['role' => 'required', 'password' => 'required']);
        $credentials = [
            'email'     => $request->email,
            'password'  => $request->password,
            'phone'  => $request->phone,
            'agency'  => $request->agency,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'name'      => $request->first_name . " " . $request->last_name,
        ];
        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleBySlug($request->role);
        $role->users()->attach($user->id);
        Session::flash('success', 'User registration Succeed!');
        Core::activities("Store", "Users", "Store a user");
        return redirect()->back();
    }

    // All user
    public function index()
    {
        if (!Sentinel::hasAccess('user-index')) {
            Session::flash('warning', 'Permission Denied!');
            return redirect()->back();
        }
        $users = User::orderBy('id', 'ASC')->get();
        return view('admin.users.user.index', compact('users'));
    }

    public function userEdit($id)
    {
        if (!Sentinel::hasAccess('user-edit')) {
            Session::flash('error', 'Permission Denied!');
            return redirect()->back();
        }
        $user = Sentinel::findById($id);
        return view('admin.users.user.edit', compact('user'));
    }

    public function userUpdate($id, Request $request)
    {
        if (!Sentinel::hasAccess('user-update')) {
            Session::flash('error', 'Permission Denied!');
            return redirect()->back();
        }
        $this->formValidate($request);
        $user = Sentinel::findById($id);
        // dd($user);
        $credentials = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'name'      => $request->first_name . ' ' . $request->last_name
        ];
        if (!empty($request->password)) {
            $credentials['password'] = $request->password;
        }
        $user = Sentinel::update($user, $credentials);
        Session::flash('success', 'User updated succeed!');
        Core::activities("Edit", "Users", "Edit a user");
        return redirect('system-admin/users');
    }

    public function userDelete($id)
    {
        if (!Sentinel::hasAccess('user-delete')) {
            Session::flash('error', 'Permission Denied!');
            return redirect()->back();
        }
        if (Sentinel::getUser()->id == $id) {
            Session::flash('success', 'You cannot delete your account!');
            return redirect()->back();
        }
        $user = Sentinel::findById($id);
        $user->delete();
        Session::flash('success', 'User deleted successed!');
        Core::activities("Delete", "Users", "Delete a user");
        return redirect('system-admin/users');
    }

    private function formValidate($request)
    {
        $request->validate([
            'email'         => 'sometimes|nullable|email|unique:users,email',
            'first_name'    => 'required',
            'last_name'     => 'required',
            'password'      => 'sometimes|nullable|min:6',
        ]);
    }

    public function indexRole()
    {
        if (!Sentinel::hasAccess('role-index')) {
            Session::flash('error', 'Permission Denied!');
            return redirect()->back();
        }
        $roles = EloquentRole::all();
        return view('admin.users.role.index', compact('roles'));
    }

    public function createRole()
    {
        if (!Sentinel::hasAccess('role-add')) {
            Session::flash('error', 'Permission Denied!');
            return redirect()->back();
        }
        $data = array();
        $permissions = Permission::where('parent_id', 0)->get();
        return view('admin.users.role.create', compact('permissions'));
    }

    public function storeRole(Request $request)
    {
        if (!Sentinel::hasAccess('role-store')) {
            Session::flash('error', 'Permission Denied!');
            return redirect()->back();
        }
        $role = new EloquentRole();
        $role->name = $request->name;
        $role->slug = Core::getUniqueSlug($role, $request->name);
        $role->save();
        if (!empty($request->permission)) {
            foreach ($request->permission as $key) {
                $role->updatePermission($key, true, true)->save();
            }
        }
        Session::flash('success', 'Role added succeed!');
        Core::activities("store", "Role", "Store a Role");
        return redirect('system-admin/users/roles');
    }

    public function editRole($id)
    {
        if (!Sentinel::hasAccess('role-edit')) {
            Session::flash('error', 'Permission Denied!');
            return redirect()->back();
        }
        $data = array();
        $permissions = Permission::where('parent_id', 0)->get();

        $role = EloquentRole::find($id);
        return view('admin.users.role.edit1', compact('permissions', 'role'));
    }

    public function updateRole(Request $request, $id)
    {
        if (!Sentinel::hasAccess('role-update')) {
            Session::flash('error', 'Permission Denied!');
            return redirect()->back();
        }
        $role = EloquentRole::find($id);
        $role->name = $request->name;
        $role->permissions = array();
        $role->save();
        //remove permissions which have not been ticked
        //create and/or update permissions
        if (!empty($request->permission)) {
            foreach ($request->permission as $key) {
                $role->updatePermission($key, true, true)->save();
            }
        }
        Session::flash('success', 'Succeed!');
        Core::activities("Update", "Role", "Update a Role");
        return redirect('system-admin/users/role/' . $id . '/edit');
    }

    public function deleteRole($id)
    {
        if (!Sentinel::hasAccess('role-delete')) {
            Session::flash('error', 'Permission Denied!');
            return redirect()->back();
        }
        if (Core::countUserinRole($id) == 0) {
            EloquentRole::destroy($id);
            Session::flash('success', 'Role deleted succeed!');
            return redirect('system-admin/users/roles');
        } else {
            Session::flash('danger', 'Some user is already assign on this role!');
            return redirect()->back();
        }
    }
}
