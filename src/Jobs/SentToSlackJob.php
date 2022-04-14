<?php

namespace Jeremys\SlackBlockAlert\Jobs;

class SentToSlackJob
{
    public int     $maxExceptions = 3;
    private string $text;
    private string $type;
    private string $webhookUrl;

    public function __construct(string $text, string $type, string $webhookUrl)
    {
        $this->text       = $text;
        $this->type       = $text;
        $this->webhookUrl = $text;
    }

    public function handle(): void
    {
        $payload = sprintf(config('slack-block-alert.blocks'),
            $this->text,
            $this->type,
        );



        Http::post($this->webhookUrl, $payload);
    }
}
