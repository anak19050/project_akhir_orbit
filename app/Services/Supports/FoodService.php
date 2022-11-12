<?php

namespace App\Services\supports;

use App\Services\FoodService as SupportService;
use Illuminate\Support\Facades\Facade;

class FoodService extends Facade
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
