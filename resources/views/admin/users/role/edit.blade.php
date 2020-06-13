@extends('admin.layout.app',['pageTitle' => __('Role Management')])
@section('content')

@component('admin.layout.inc.breadcrumb')
<style>
input[type="checkbox"]:indeterminate + label {
  color: deepPink;
}
</style>
@slot('title')
{{ __('messages.roles') }}
@endslot
@endcomponent
<style>
/* label.child {
    margin-left: 39px;
    font-size: 13px;
    margin-bottom: 0px;
} */
</style>
@include('elements.alert')
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ __('messages.role') }}</h4>
                <h6 class="card-subtitle">{{ __('messages.edit_role') }}</h6>
                <hr>
                <form class="form-material m-t-40 form" action="{{url('system-admin/users/role/'.$role->id.'/update')}}"
                    method="post">
                    @csrf
                    <div class="form-group row {{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label for="name" class="col-sm-2 text-right control-label col-form-label">{{ __('messages.role_name') }}<sup class="text-danger font-bold">*</sup> :</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{old('name',$role->name)}}" class="form-control" id="name" placeholder="Last Name">
                            @include('elements.feedback',['field' => 'name'])
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('slug') ? ' has-danger' : '' }}">
                        <label for="slug" class="col-sm-2 text-right control-label col-form-label">{{ __('messages.permission') }}<sup class="text-danger font-bold">*</sup> :</label>
                        <div class="col-sm-10">

                            {{-- 'User Management' => [
                                'Users' => [
                                    ['User Menu', 'user-menu', 'Getting User Menus'],
                                    ['User list', 'user-index', 'Can view all user list'],
                                    ['View User', 'user-view', 'Can view a user'],
                                    ['Add User', 'user-add', 'Can add a user'],
                                    ['store User', 'user-store', 'Can store a user'],
                                    ['Edit User', 'user-edit', 'Can edit a user'],
                                    ['update User', 'user-update', 'Can update user'],
                                    ['delete User', 'user-delete', 'Can update user'],
                                    ['User Activities', 'activities', 'View all user activities'],
                                    ['Notifacations', 'notifacation', 'View all Notifacation'],
                                ] --}}

                                <div class="row">
                                    <div class='col-md-12'>
                                        <?php echo  Helper::permissionhtml($permissions) ?>
                                    </div>
                                    {{-- @foreach($permissions as $permission)   
                                        <div class="col-md-6">
                                            <input type="checkbox" id="user-management1" class="chk-col-purple form-control user-management1">
                                            <label class="" for="user-management1">User Management</label> <br>
                                            
                                            <input type="checkbox" id="user-management1" class="chk-col-purple form-control user-management1">
                                            <label style="margin-left:40px" for="user-management1"><b>Users</b></label><br>

                                            <input type="checkbox" id="user-management1" class="chk-col-purple form-control user-management1">
                                            <label style="margin-left:80px" for="user-management1"><i>Create</i></label><br>

                                            <input type="checkbox" id="user-management1" class="chk-col-purple form-control user-management1">
                                            <label style="margin-left:80px" for="user-management1"><i>Update</i></label><br>

                                            <input type="checkbox" id="user-management1" class="chk-col-purple form-control user-management1">
                                            <label style="margin-left:80px" for="user-management1"><i>Delete</i></label><br>

                                            <input type="checkbox" id="user-management1" class="chk-col-purple form-control user-management1">
                                            <label style="margin-left:40px" for="user-management1"><b>Users</b></label><br>

                                            <input type="checkbox" id="user-management1" class="chk-col-purple form-control user-management1">
                                            <label style="margin-left:80px" for="user-management1"><i>Create</i></label><br>

                                            <input type="checkbox" id="user-management1" class="chk-col-purple form-control user-management1">
                                            <label style="margin-left:80px" for="user-management1"><i>Update</i></label><br>

                                            <input type="checkbox" id="user-management1" class="chk-col-purple form-control user-management1">
                                            <label style="margin-left:80px" for="user-management1"><i>Delete</i></label><br>
                                        </div>
                                    @endforeach --}}
                                </div>
{{-- 
                                <div class="card m-2">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                        <input type="checkbox" id="user-management1" class="chk-col-purple form-control user-management1">
                                        <label class="" for="user-management1" style="padding-left: 10px; top: 19px;"></label> 
                                        <button type="button" style="text-decoration: blink; collapsed" class="btn btn-link" data-toggle="collapse" data-target="#collapsible-1" data-parent="#myAccordion" aria-expanded="true">User Management <i class="fa fa-angle-down" aria-hidden="false"></i></button>
                                    </h5>
                                    </div>
                                    <div id="collapsible-1" class="ml-4 pl-3 collapse show" style="">
                                        <div class="card-body" style="padding-top: 0px; display: contents;">
                                            <input type="checkbox" data-parent="1" name="permission[]" value="user-management" id="1" class="filled-in chk-col-purple form-control sub_user-management1" checked="">
                                            <label class="" for="1">User Management</label> &nbsp; | &nbsp;
                                            <input type="checkbox" data-parent="1" name="permission[]" value="permissions" id="permissions22" class="filled-in chk-col-purple form-control sub_user-management1" checked="">
                                            <label class="" for="permissions22">Permissions</label> &nbsp; | &nbsp;
                                            <input type="checkbox" data-parent="1" name="permission[]" value="roles" id="roles13" class="filled-in chk-col-purple form-control sub_user-management1" checked="">
                                            <label class="" for="roles13">Roles</label> &nbsp; | &nbsp;
                                            <input type="checkbox" data-parent="1" name="permission[]" value="users" id="users2" class="filled-in chk-col-purple form-control sub_user-management1" checked="">
                                            <label class="" for="users2">Users</label>
                                        </div>
                                    </div>
                                </div> --}}
                            
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <button type="submit" class="btn btn-themecolor waves-effect float-right waves-light m-t-10">{{ __('messages.update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
