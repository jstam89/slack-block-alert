<?php

namespace Jeremys\SlackBlockAlert\Jobs;

use Illuminate\Support\Facades\Http;

class SentToSlackJob
{
    public int    $maxExceptions = 3;
    public string $message;
    public string $status;
    public string $stacktrace;
    public string $webhookUrl;

    public function __construct(string $status, string $message, string $stacktrace, string $webhookUrl)
    {
        $this->webhookUrl = $webhookUrl;
        $this->status     = $status;
        $this->message    = $message;
        $this->stacktrace = $stacktrace;
    }

    public function handle(): void
    {
        $blocks = config('slack-block-alert.blocks');

        Http::post($this->webhookUrl, [
            "blocks" => [
                [
                    "type" => "section",
                    "text" => [
                        "type" => "mrkdwn",
                        "text" => sprintf(":boom: *Error in:* %s", config('app.name')),
                    ]
                ],
                [
                    "type" => "divider"
                ],
                [
                    "type" => "section",
                    "text" => [
                        "type" => "mrkdwn",
                        "text" => sprintf('*Message:* %s', $this->message),
                    ],
                ],
                [
                    "type" => "section",
                    "text" => [
                        "type" => "mrkdwn",
                        "text" => sprintf('*StackTrace:* ```%s```', $this->stacktrace),
                    ],
                ]
            ]
        ]);
    }
}
