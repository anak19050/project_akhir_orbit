<?php

namespace App\Services\supports;

use App\Services\IngredientService as SupportService;
use Illuminate\Support\Facades\Facade;

class IngredientService extends Facade
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
