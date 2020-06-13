<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Activity;
use App\Permission;
use App\Customer;
use Sentinel;
use Session;

class Helper
{
    private $userId;
    // private $roleId;
    // private $userStatus;
    public function __construct(){
        if (Sentinel::check()) {
            $this->userId = Sentinel::getUser()->id;
            // $this->roleId = $user->role_id;
            // $this->userStatus = $user->status;
        }
    }

    public function getUserIp(){
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';    
        
        // die ($ipaddress);
        return $ipaddress == '::1' ? '103.107.123.23' : $ipaddress;
     }

     public function ipinfo(){
         // 212.103.48.135
        $client     = new \GuzzleHttp\Client();
        $ip         = $this->getUserIp();
        $requests   = $client->get("https://api.ip2location.com/v2/?ip={$ip}&key=XZP1EPBNC0&package=WS24");
        $data       = $requests->getBody();
        return $data;
     }

    public function savePermission($arr,$pid = 0){
        $keys = array_keys($arr);
        $l = count($keys);
        for($i = 0; $i<$l; $i++){
            if($this->isMulti($arr[$keys[$i]]) == "TRUE"){
                $d = [
                    'name'  => $keys[$i],
                    'parent_id' => $pid,
                    'slug'  => Str::slug($keys[$i])
                ];
                $p = Permission::create($d);
                $this->savePermission($arr[$keys[$i]],$p->id);
            }else{
                $d = [
                    'name'  => $arr[$keys[$i]]['name'],
                    'parent_id' => $pid,
                    'slug'  => Str::slug($arr[$keys[$i]]['slug'])
                ];
                $p = Permission::create($d);
            }
        }
    }

    public function getCustomer(){
        $customer = Customer::where('email',session()->get('logininfo')[0]['email'])->first();
        return $customer;
    }


    public function isMulti($arr){
        if(is_array($arr)){
            if (count($arr) != count($arr, COUNT_RECURSIVE)) {
                return 'TRUE';
            }else{
                return 'FALSE';
            }
        }
    }


    public   function buildTree($arr, $parent = 0, $indent = 0)
        {
            foreach($arr as $item)
            {
                if ($item->parent_id == $parent)
                {
                    if ($indent != 0)
                    {
                        echo str_repeat("&nbsp;", $indent) . "-&nbsp;";
                    }
                    echo $item->name . '<br/>';
                    $permissions = Permission::where('parent_id',$item->parent_id)->get();
                    $this->buildTree($permissions, $item->parent_id, $indent + 2);
                }
            }
        }


    public function permissionhtml($permissions, $pid=0,$margin=0,$html='',$level = 0){
        // $permissions = Permission::where('parent_id',$pid)->get();
        // $permissions = Permission::all();

        // if($pid == 0){
            // $html .= "<div class='col-md-6'>";
        // }

        foreach($permissions as $p){

            if($p->type == 'Parent'){
                if($p->parent_id == 0){
                    $margin = 0;
                }elseif($level == $p->parent_id){
                    $margin = $margin - 40;
                }
                $html .= "<input type='checkbox' id='{$p->slug}{$p->id}' class='filled-in chk-col-purple form-control {$p->slug}{$p->id}'>";
                $html .= "<label style='margin-left:{$margin}px' for='{$p->slug}{$p->id}'><b>{$p->name}</b></label> <br>";
                $level = $p->parent_id;
                $margin = $margin + 40;

                $permissions = Permission::where('parent_id',$pid)->get();
                $this->permissionhtml($permissions,$p->id,$margin,$html,$level);
            }
            else{
                $html .= "<input type='checkbox' id='{$p->slug}{$p->id}' class='filled-in chk-col-purple form-control {$p->slug}{$p->id}'>";
                $html .= "<label style='margin-left:{$margin}px' for='{$p->slug}{$p->id}'><i>{$p->name}</i></label> <br>";
            }

        }
        // if($pid == 0){
            // $html .= "</div>";
        // }
        return $html;
    }



    public function arrangeChild($pid,$margin,$html){
        $permissions = Permission::where('parent_id',$pid)->get();
        foreach($permissions as $p){
            if($p->type == 'Child'){
                $html .= "<input type='checkbox' id='user-management1' class='chk-col-purple form-control user-management1'>";
                $html .= "<label style='margin-left:{$margin}px' for='user-management1'>{$p->name}</label> <br>";
            }else{
                $margin = $margin + 40;
                $this->permissionhtml($p->id,$margin,$html);
            }
        }
    }

}

// foreach($permissions as $permission)   
//                                         <div class="col-md-6">
//                                             <input type="checkbox" id="user-management1" class="chk-col-purple form-control user-management1">
//                                             <label class="" for="user-management1">User Management</label> <br>
                                            
//                                             <input type="checkbox" id="user-management1" class="chk-col-purple form-control user-management1">
//                                             <label style="margin-left:40px" for="user-management1"><b>Users</b></label><br>

//                                             <input type="checkbox" id="user-management1" class="chk-col-purple form-control user-management1">
//                                             <label style="margin-left:80px" for="user-management1"><i>Create</i></label><br>

//                                             <input type="checkbox" id="user-management1" class="chk-col-purple form-control user-management1">
//                                             <label style="margin-left:80px" for="user-management1"><i>Update</i></label><br>

//                                             <input type="checkbox" id="user-management1" class="chk-col-purple form-control user-management1">
//                                             <label style="margin-left:80px" for="user-management1"><i>Delete</i></label><br>

//                                             <input type="checkbox" id="user-management1" class="chk-col-purple form-control user-management1">
//                                             <label style="margin-left:40px" for="user-management1"><b>Users</b></label><br>

//                                             <input type="checkbox" id="user-management1" class="chk-col-purple form-control user-management1">
//                                             <label style="margin-left:80px" for="user-management1"><i>Create</i></label><br>

//                                             <input type="checkbox" id="user-management1" class="chk-col-purple form-control user-management1">
//                                             <label style="margin-left:80px" for="user-management1"><i>Update</i></label><br>

//                                             <input type="checkbox" id="user-management1" class="chk-col-purple form-control user-management1">
//                                             <label style="margin-left:80px" for="user-management1"><i>Delete</i></label><br>
//                                         </div>