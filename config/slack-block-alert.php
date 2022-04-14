<?php

return [
    /*
     * The webhook URLs that we'll use to send a message to Slack.
     */
    'webhook_urls' => [
        'default' => env('SLACK_ALERT_WEBHOOK'),
    ],

    /*
     * This job will send the message to Slack. You can extend this
     * job to set timeouts, retries, etc...
     */
    'job'          => \Jeremys\SlackBlockAlert\Jobs\SentToSlackJob::class,

    "blocks" => [
        [
            "type" => "section",
            "text" => [
                "type" => "mrkdwn",
                "text" => ":boom: *%s:*",
            ]
        ],
        [
            "type" => "divider"
        ],
        [
            "type" => "section",
            "text" => [
                "type" => "mrkdwn",
                "text" => '*Exception:* %s',
            ],
        ],
        [
            "type" => "section",
            "text" => [
                "type" => "mrkdwn",
                "text" => '*File:* %s',
            ],
        ],
        [
            "type" => "section",
            "text" => [
                "type" => "mrkdwn",
                "text" => ' *Line:* %s',
            ],
        ],
        [
            "type" => "section",
            "text" => [
                "type" => "mrkdwn",
                "text" => '*StackTrace:* %s',
            ],
        ]
    ]
];
