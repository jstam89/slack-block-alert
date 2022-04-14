<?php

namespace Jeremys\SlackBlockAlert\Jobs;

use Illuminate\Support\Facades\Http;

class SentToSlackJob
{
    public int    $maxExceptions = 3;
    public string $message;
    public string $line;
    public string $trace;
    public string $webhookUrl;

    public function __construct(string $message, string $line, string $trace, string $webhookUrl)
    {
        $this->webhookUrl = $webhookUrl;
        $this->trace      = $trace;
        $this->line       = $line;
        $this->message    = $message;
    }

    public function handle(): void
    {
        $blocks      = config('slack-block-alert.blocks');
        $replacement = sprintf(json_encode($blocks), $this->message, $this->line, $this->trace);
        $payload     = json_decode($replacement);

        foreach ($payload as $key => $value) {
            $payload[$key] = $value;
        }

        Http::post($this->webhookUrl, [
            'blocks' => $payload
        ]);
    }
}
