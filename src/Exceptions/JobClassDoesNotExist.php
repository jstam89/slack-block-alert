<?php

namespace Jeremys\SlackBlockAlert\Exceptions;

class JobClassDoesNotExist extends \RuntimeException
{
    public static function make(?string $name): self
    {
        return new self("The configured job class `{$name}` does not exist. Make sure you specific a valid class name in the `job` key of the slack-alerts config file.");
    }
}
