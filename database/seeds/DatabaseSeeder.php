<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('permissions')->truncate();
        DB::table('role_users')->truncate();
        DB::table('roles')->truncate();
        DB::table('users')->truncate();
        DB::table('email_templates')->truncate();
        DB::table('site_settings')->truncate();
        DB::table('currencies')->truncate();
        DB::table('cms')->truncate();
        DB::table('tickets')->truncate();

        $this->call([
            PermissionsTableSeeder::class,
            RoleTableSeeder::class,
            UserTableSeeder::class,
            EmailTemplatetableSeeder::class,
            SiteTableSeeder::class,
            CurrencyTableSeeder::class,
            CmsTableDataSeeder::class,
            TicketTableSeeder::class,
        ]);
    }
}
