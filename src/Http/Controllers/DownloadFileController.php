<?php

namespace Creditzombies\LogViewer\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Creditzombies\LogViewer\Facades\LogViewer;

class DownloadFileController
{
    public function __invoke(string $fileIdentifier)
    {
        LogViewer::auth();

        $file = LogViewer::getFile($fileIdentifier);

        abort_if(is_null($file), 404);

        Gate::authorize('downloadLogFile', $file);

        return $file->download();
    }
}
