<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class CoreFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'Core';
    }

}
