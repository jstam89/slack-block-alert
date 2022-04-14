<?php

namespace Jeremys\SlackBlockAlert\Jobs;

use Illuminate\Support\Facades\Http;

class SentToSlackJob
{
    public int $maxExceptions = 3;

    public function __construct(
        public string $message,
        public string $line,
        public string $trace,
        public string $webhookUrl
    )
    {
    }

    public function handle(): void
    {
        $payload = ['type' => $this->type, 'text' => $this->text];

        $blocks = config('slack-block-alert.blocks');

        Http::post($this->webhookUrl, $payload);
    }
}
