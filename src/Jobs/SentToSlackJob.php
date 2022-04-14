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
        $blocks = config('slack-block-alert.blocks');

        $string = sprintf(json_encode($blocks),
            $this->message,
            $this->line,
            $this->trace,
        );

        Http::post($this->webhookUrl, json_decode($string));
    }
}
