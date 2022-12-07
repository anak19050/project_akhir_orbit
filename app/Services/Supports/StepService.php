<?php

namespace App\Services\supports;

use App\Services\StepService as SupportService;
use Illuminate\Support\Facades\Facade;

class StepService extends Facade
{
	/**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return SupportService::class;
    }
}
