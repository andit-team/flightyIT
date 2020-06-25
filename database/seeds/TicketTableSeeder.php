<?php

use Illuminate\Database\Seeder;
// use Sentinel;
use App\SiteSetting;

class TicketTableSeeder extends Seeder
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
                'fname'        => 'Shovon',
                'lname'             => 'Das',
                'departue'      => '01-01-2021',
                'return'        => '26-08-2021',
                'from'     => 'Dhaks',
                'to'          => 'Manila',
                'airline'            => 'Emirates',
                'mobile'      => '0415201542141',
                'passport'          => '465ASDA441AS',
                'ticket_no'          => '546746131574',
                'rate'          => '2000',
                'agent'          => '1',
                'created_at'       => now(),
            ],

        ];
        DB::table('tickets')->insert($data);

        $data = [
            [
                'fname'        => 'Asmit',
                'lname'             => 'Joy',
                'departue'      => '01-01-2022',
                'return'        => '26-08-2022',
                'from'     => 'Dhaks',
                'to'          => 'Manila',
                'airline'            => 'USBangla',
                'mobile'      => '0415201542141',
                'passport'          => '465ASDA441AS',
                'ticket_no'          => '546746131574',
                'rate'          => '2200',
                'agent'          => '2',
                'created_at'       => now(),
            ],

        ];
        DB::table('tickets')->insert($data);
    }
}
