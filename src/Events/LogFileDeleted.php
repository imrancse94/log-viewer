<?php

namespace Creditzombies\LogViewer\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Creditzombies\LogViewer\LogFile;

class LogFileDeleted
{
    use Dispatchable;

    public function __construct(
        public LogFile $file
    ) {
    }
}
