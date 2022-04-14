<?php

namespace Jeremys\SlackBlockAlert;

use Jeremys\SlackBlockAlert\Exceptions\JobClassDoesNotExist;
use Jeremys\SlackBlockAlert\Exceptions\WebhookUrlNotValid;
use Jeremys\SlackBlockAlert\Jobs\SentToSlackJob;

class Config
{
    public static function getJob(array $arguments): SentToSlackJob
    {
        $jobClass = config('slack-block-alert.job');

        if (is_null($jobClass) || ! class_exists($jobClass)) {
            throw JobClassDoesNotExist::make($jobClass);
        }

        return app($jobClass, $arguments);
    }

    public static function getWebhookUrl(string $name)
    {
        if (filter_var($name, FILTER_VALIDATE_URL)) {
            return $name;
        }

        $url = config("slack-block-alert.webhook_urls.{$name}");

        if (is_null($url)) {
            return null;
        }

        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            throw WebhookUrlNotValid::make($name, $url);
        }

        return $url;
    }
}
