<?php

namespace Nimble\Nimble;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Nimble\Nimble\Skeleton\SkeletonClass
 */
class NimbleFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'nimble';
    }
}
