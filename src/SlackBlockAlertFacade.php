<?php

namespace Jeremys\SlackBlockAlert;

use Illuminate\Support\Facades\Facade;


class SlackBlockAlertFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'slack-block-alert';
    }
}
