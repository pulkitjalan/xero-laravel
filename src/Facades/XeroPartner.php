<?php

namespace PulkitJalan\Xero\Facades;

use Illuminate\Support\Facades\Facade;

class XeroPartner extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'XeroPartner';
    }
}