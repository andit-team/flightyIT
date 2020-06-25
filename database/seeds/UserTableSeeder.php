<?php

use Illuminate\Database\Seeder;
// use Sentinel;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
                'name'          => 'Admin',
                'first_name'    => 'Admin',
                'last_name'     => 'AndIt',
                'phone'         => '01546515444',
                'agency'         => '',
                'email'         => 'system@admin.com',
                'password'      => '123456', //123456
                'created_at'    => now(),
                'updated_at'    => now()
        ];
        $user = \Sentinel::registerAndActivate($users);
        $role = \Sentinel::findRoleBySlug('admin');
        $role->users()->attach($user->id);
        $users = [
            'name'          => 'AndiT',
            'first_name'    => 'Shariful',
            'last_name'     => 'Islam',
            'phone'         => '01546515444',
            'agency'         => '1',
            'email'         => 'shoriful@agent.com',
            'password'      => '123456', //123456
            'created_at'    => now(),
            'updated_at'    => now()
        ];
        
        $user = \Sentinel::registerAndActivate($users);
        $role = \Sentinel::findRoleBySlug('agent');
        $role->users()->attach($user->id);

        $users = [
            'name'          => 'Impex',
            'first_name'    => 'Mehedi',
            'last_name'     => 'Khan',
            'phone'         => '01546515444',
            'agency'         => '2',
            'email'         => 'mehedi@agent.com',
            'password'      => '123456', //123456
            'created_at'    => now(),
            'updated_at'    => now()
        ];
        
        $user = \Sentinel::registerAndActivate($users);
        $role = \Sentinel::findRoleBySlug('agent');
        $role->users()->attach($user->id);
    }
}
