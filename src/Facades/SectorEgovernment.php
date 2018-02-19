<?php

namespace Bantenprov\SectorEgovernment\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The SectorEgovernment facade.
 *
 * @package Bantenprov\SectorEgovernment
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class SectorEgovernmentFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'sector-egovernment';
    }
}
