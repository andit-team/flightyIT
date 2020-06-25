<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $fillable = ['name', 'email', 'password', 'username', 'phone', 'permissions', 'mobile', 'type'];

    public function tickets(){
        return $this->hasMany(Agents::class);
    }
}
