<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    protected $fillable = ['parent_id','post_type','menu_name','post_title','post_url','content','seo_title','seo_keyword','seo_description','thumb','template','status','page_order','user_id'];
    
    public function getRouteKeyName(){
        return 'post_url';
    }
    

}
