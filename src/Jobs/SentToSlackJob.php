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
        $payload = ['type' => $this->type, 'text' => $this->text];

        Http::post($this->webhookUrl, $payload);
    }
}
