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
                'agency'         => 'abc',
                'email'         => 'system@admin.com',
                'password'      => '123456', //123456
                'created_at'    => now(),
                'updated_at'    => now()
        ];
        $user = \Sentinel::registerAndActivate($users);
        $role = \Sentinel::findRoleBySlug('admin');
        $role->users()->attach($user->id);
        $users = [
                'name'          => 'Agent 1',
                'first_name'    => 'Shariful',
                'last_name'     => 'Islam',
                'phone'         => '01546515444',
                'agency'         => 'abc',
                'email'         => 'system@agent.com',
                'password'      => '123456', //123456
                'created_at'    => now(),
                'updated_at'    => now()
        ];
    }
}
