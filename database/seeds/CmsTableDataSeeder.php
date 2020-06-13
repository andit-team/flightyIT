<?php

use Illuminate\Database\Seeder;
use App\Cms;

class CmsTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Cms::create([
            'parent_id'         => 0,
            'post_type'         => 'page',
            'menu_name'         => 'home',
            'post_title'        => 'home',
            'post_url'          => 'home',
            'content'           => '<p>Home Page</p>',
            'seo_title'         => 'home',
            'seo_keyword'       => 'home',
            'seo_description'   => 'home page',
            'thumb'             => '',
            'template'          => 'home',
            'status'            => 'Publish',
            'page_order'        => 0,
            'user_id'           => 1,
            'created_at'        => now(),
            'updated_at'        => now()
        ]);
    }
}
