<?php

namespace Jeremys\SlackBlockAlert;

use Jeremys\SlackBlockAlert\Facades\SlackAlert;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SlackBlockAlertServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('slack-block-alert')
            ->hasConfigFile();
    }

    public function packageRegistered(): void
    {
        $this->app->bind('slack-block-alert', function () {
            return new SlackAlert();
        });
    }
}
