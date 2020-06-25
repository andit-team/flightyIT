<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['fname', 'lname', 'from', 'to', 'departure', 'return', 'ticket_no', 'rate', 'agent'. 'airline', 'mobile'];

    public function agents(){
        return $this->belongsTo(Agents::class,'agent');
    }

}
