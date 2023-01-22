<?php

namespace Credizombies\LogViewer\Http\Controllers;

use Credizombies\LogViewer\Facades\LogViewer;
use Credizombies\LogViewer\LogFile;
use Credizombies\LogViewer\LogReader;

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
