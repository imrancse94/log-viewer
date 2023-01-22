<?php

namespace creditzombies\LogViewer\Events;

use Illuminate\Foundation\Events\Dispatchable;
use creditzombies\LogViewer\LogFile;

class LogFileDeleted
{
    use Dispatchable;

    public function __construct(
        public LogFile $file
    ) {
    }
}
