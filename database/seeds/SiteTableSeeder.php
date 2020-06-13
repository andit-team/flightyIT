<?php

use Illuminate\Database\Seeder;
// use Sentinel;
use App\SiteSetting;

class SiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'site_name'        => 'Payroll Management',
                'logo'             => '',
                'login_banar'      => '',
                'reg_banar'        => '',
                'phone_number'     => '0000000',
                'website'          => 'www.Core.com',
                'email'            => 'Core@app.com',
                'footer_text'      => 'Pharmacy Management System',
                'address'          => 'Road#32, Hamilton Avenue, Singapur',
                'created_at'       => now(),
            ],

        ];
        DB::table('site_settings')->insert($data);
    }
}
