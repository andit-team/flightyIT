<?php

namespace App;

use Cartalyst\Sentinel\Users\EloquentUser;
use App\Notification;
use App\Unit;
use App\Ticket;
use App\Models\Diagnostic\Bill;

class User extends EloquentUser
{
    protected $fillable = ['name', 'email', 'password', 'last_name', 'first_name', 'permissions', 'profile_image', 'profile_banar'];

    public function notification()
    {
        return $this->hasMany(Notification::class, 'user');
    }
    public function unit()
    {
        return $this->hasMany(Unit::class, 'user_id');
    }
    public function Tax()
    {
        return $this->hasMany(ProductTax::class, 'user_id');
    }
    public function bill()
    {
        return $this->hasOne(Bill::class);
    }
    public function tickets()
    {
        return $this->hasMany(Ticket::class,'agent');
    }
}
