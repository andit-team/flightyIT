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
                'name'          => 'Agent',
                'slug'          => 'agent',
                'permissions'   => '{"agency":true,"agency-create":true,"agency-view":true,"agency-delete":true,"agency-edit":true,"agent":true,"agent-create":true,"agent-view":true,"agent-delete":true,"agent-edit":true,"tickets":true,"ticket-create":true,"ticket-view":true,"ticket-delete":true,"ticket-edit":true}',
                'created_at'    => now(),
                'updated_at'    => now(),
            ]
        ];
        DB::table('roles')->insert($roles);
    }
}
