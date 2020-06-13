<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmsMenu extends Model
{
    protected $fillable = ['menu_id','parent','page_id','is_login','order'];
    protected $table = 'cms_relations';
}
