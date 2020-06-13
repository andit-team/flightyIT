<?php

namespace App\Http\Controllers;
use App\Notification;
use Illuminate\Http\Request;
use App\User;
use App\SiteSetting;
use Session;
use Sentinel;
use Core;
use Cartalyst\Sentinel\Roles\EloquentRole;
use Illuminate\Support\Facades\DB;
class AjaxController extends Controller
{
    public function __construct(){
        $this->middleware('authorized');
    }

    public function updateNotification($id){
        $notify = Notification::find($id);
        $notify->is_read = 1;
        $notify->save();
    }
    
    public function showParmission($id){
        $roles = EloquentRole::find($id);
        $data = '';
        $i = 1;
        $data .="<table class='table table-strip'>
        <tr>
            <th width='20'>SL</th>
            <th>Name</th>
        </tr>";
        foreach($roles->permissions as $key => $val){
            $sl = sprintf('%02d',$i++);
            $data .= "<tr>";
            $data .= "<td>{$sl}</td>";
            $data .= "<td>{$key}</td>";
            $data .= "</tr>";
        }
        $data .= " </tr>
        </table>";
        $json = [
            'role_name' => $roles->name,
            'permission' => $data,
        ];
        echo json_encode($json);
    }


    //UI
     public function uiToggleSidebar(){
        $siteSetting = SiteSetting::first();
        if(!empty($siteSetting->mini_sidebar)){
            $siteSetting->mini_sidebar = '';
        }else{
            $siteSetting->mini_sidebar = 'mini-sidebar';
        }
        $siteSetting->save();

        session()->forget('settings');
        $settings = SiteSetting::first()->toArray();
        Session::push('settings', $settings);
        echo 'sidebar toggled';
     }

     public function uiColorSwitcher($color){
        $siteSetting = SiteSetting::first();
        $siteSetting->theme = $color;
        $siteSetting->save();

        session()->forget('settings');
        $settings = SiteSetting::first()->toArray();
        Session::push('settings', $settings);
        echo 'Change Color';
     }
     
}
