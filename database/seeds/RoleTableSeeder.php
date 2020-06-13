<?php

use Illuminate\Database\Seeder;
use App\Permission;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::all();
        $slugs ='';
        $all_permission = '{';
        foreach($permission as $per){
            $slugs .= '"'.$per->slug.'":true,';
        }
        $trimval = rtrim($slugs,',');
        $all_permission .= $trimval.'}';
        $roles = [
            [
                'name'          => 'Admin',
                'slug'          => 'admin',
                'permissions'   => $all_permission,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Manager',
                'slug'          => 'manager',
                'permissions'   => '',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Editor',
                'slug'          => 'editor',
                'permissions'   => '',
                'created_at'    => now(),
                'updated_at'    => now(),
            ]
        ];
        DB::table('roles')->insert($roles);
    }
}
