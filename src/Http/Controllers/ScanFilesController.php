<?php

namespace creditzombies\LogViewer\Http\Controllers;

use creditzombies\LogViewer\Facades\LogViewer;
use creditzombies\LogViewer\LogFile;
use creditzombies\LogViewer\LogReader;

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
