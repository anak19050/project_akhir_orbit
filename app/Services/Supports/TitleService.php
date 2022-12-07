<?php

namespace App\Services\supports;

use App\Services\TitleService as SupportService;
use Illuminate\Support\Facades\Facade;

class TitleService extends Facade
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
