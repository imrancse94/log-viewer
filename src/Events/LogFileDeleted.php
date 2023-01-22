<?php

namespace Credizombies\LogViewer\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Credizombies\LogViewer\LogFile;

class LogFileDeleted
{
    use Dispatchable;

    public function __construct(
        public LogFile $file
    ) {
    }
}
