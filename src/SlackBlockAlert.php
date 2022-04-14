<?php

namespace Jeremys\SlackBlockAlert;

class SlackBlockAlert
{
    protected string $webhookUrlName = 'default';

    public function to(string $webhookUrlName): self
    {
        $this->webhookUrlName = $webhookUrlName;

        return $this;
    }

    public function message(string $message, string $line, string $trace): void
    {
        $webhookUrl = Config::getWebhookUrl($this->webhookUrlName);

        if (!$webhookUrl) {
            return;
        }

        $jobArguments = [
            'message'    => $message,
            'line'       => $line,
            'trace'      => $trace,
            'webhookUrl' => $webhookUrl,
        ];

        $job = Config::getJob($jobArguments);

        dispatch($job);
    }

}
