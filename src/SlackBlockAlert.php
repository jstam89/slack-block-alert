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

    public function message(string $status, string $message, string $stacktrace): void
    {
        $webhookUrl = Config::getWebhookUrl($this->webhookUrlName);

        if (!$webhookUrl) {
            return;
        }

        $jobArguments = [
            'status'      => $status,
            'message'     => $message,
            '$stacktrace' => $stacktrace,
            'webhookUrl'  => $webhookUrl,
        ];

        $job = Config::getJob($jobArguments);

        dispatch($job);
    }

}
