<?php

namespace Etieneabasi\MyTaskManager\Facades;

use Illuminate\Support\Facades\Facade;

class MyTaskManager extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'mytaskmanager';
    }
}
