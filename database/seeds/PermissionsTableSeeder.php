<?php

use Illuminate\Database\Seeder;
use App\Permission;
use Illuminate\Support\Str;
// use Core;
class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->truncate();
        $data = [
            'User Management' => [
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
            ],
            'Roles' => [
                ['Role Menu', 'role-menu', 'Getting Role Menus'],
                ['role list', 'role-index', 'Can view all role list'],
                ['View role', 'role-view', 'Can view a role'],
                ['Add role', 'role-add', 'Can add a role'],
                ['store role', 'role-store', 'Can store a role'],
                ['Edit role', 'role-edit', 'Can edit a role'],
                ['update role', 'role-update', 'Can update role'],
                ['delete role', 'role-delete', 'Can update role'],
            ],
            'Permissions' => [
                ['permission Menu', 'permission-menu', 'Getting permission Menus'],
                ['permission list', 'permission-index', 'Can view all permission list'],
                ['View permission', 'permission-view', 'Can view a permission'],
                ['Add permission', 'permission-add', 'Can add a permission'],
                ['store permission', 'permission-store', 'Can store a permission'],
                ['Edit permission', 'permission-edit', 'Can edit a permission'],
                ['update permission', 'permission-update', 'Can update permission'],
                ['delete permission', 'permission-delete', 'Can update permission'],
            ],
            'Site Settings' => [
                ['site list', 'siteSetting-index', 'Can View all sale'],
                ['site info', 'siteSetting-show', 'Can View info of the site'],
                ['Edit site', 'siteSetting-edit', 'Can edit a site info'],
            ],
            'CMS' => [
                ['Cms Menu', 'cms-management', 'Can get cms menu'],
                ['See all CMS Page', 'index-cms-page', 'Can See all CMS Page'],
                ['Create CMS Page', 'create-cms-page', 'Can Create a new page'],
                ['Delete CMS Page', 'delete-cms-page', 'Can Delete a page'],
                ['Update CMS Page', 'update-cms-page', 'Can update a page'],
                ['See all CMS post', 'index-cms-post', 'Can See all CMS post'],
                ['Create CMS Post', 'create-cms-post', 'Can Create a new post'],
                ['Delete CMS Post', 'delete-cms-post', 'Can Delete a post'],
                ['Update CMS Post', 'update-cms-post', 'Can update a post'],
                ['Cms Menu', 'cms-menu', 'Can access cms Menu'],
            ],
            'Utilities' => [
                ['timezone', 'timezone', 'Can access timezone'],
            ],

            'Agent' => [
                ['Agent Form', 'agent-create', 'Can create Agent'],
                ['Agent View', 'agent-view', 'Can view Agent'],
                ['Agent Edit', 'agent-edit', 'Can edit Agent'],
                ['Agent Delete', 'agent-delete', 'Can delete Agent'],
            ],

            'Agency' => [
                ['Agency Form', 'agency-create', 'Can create Agency'],
                ['Agency View', 'agency-view', 'Can view Agency'],
                ['Agency Edit', 'agency-edit', 'Can edit Agency'],
                ['Agency Delete', 'agency-delete', 'Can delete Agency'],
            ],
        ];

        $this->savePermission($data);
    }
    
    public function savePermission($arr,$pid = 0){
        $keys = array_keys($arr);
        $l = count($keys);
        for($i = 0; $i<$l; $i++){
            if($this->isMulti($arr[$keys[$i]]) == "TRUE"){
                $d = [
                    'name'  => $keys[$i],
                    'parent_id' => $pid,
                    'slug'  => Str::slug($keys[$i]),
                    'description' => 'Parent Item',
                    'type' => 'Parent',
                ];
                $p = Permission::create($d);
                $this->savePermission($arr[$keys[$i]],$p->id);
            }else{
                $d = [
                    'name'  => $arr[$keys[$i]][0],
                    'parent_id' => $pid,
                    'slug'  => Str::slug($arr[$keys[$i]][1]),
                    'description' => $arr[$keys[$i]][2],
                    'type'  => 'Child'
                ];
                $p = Permission::create($d);
            }
        }
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
}
// 142