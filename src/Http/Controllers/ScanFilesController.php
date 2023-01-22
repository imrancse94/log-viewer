<?php

namespace Creditzombies\LogViewer\Http\Controllers;

use Creditzombies\LogViewer\Facades\LogViewer;
use Creditzombies\LogViewer\LogFile;
use Creditzombies\LogViewer\LogReader;

class ScanFilesController
{
    public function __invoke()
    {
        $files = LogViewer::getFiles();
        $filesRequiringScans = $files->filter(fn (LogFile $file) => $file->logs()->requiresScan());

        $filesRequiringScans->each(function (LogFile $file) {
            $file->logs()->scan();

            LogReader::clearInstance($file);
        });

        return response()->json([
            'success' => true,
        ]);
    }
}
