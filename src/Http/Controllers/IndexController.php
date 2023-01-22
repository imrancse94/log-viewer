<?php

namespace creditzombies\LogViewer\Http\Controllers;

use creditzombies\LogViewer\Facades\LogViewer;

class IndexController
{
    public function __invoke()
    {
        LogViewer::auth();

        $selectedFile = LogViewer::getFile(request()->query('file', ''));

        return view('log-viewer::index', [
            'jsPath' => __DIR__.'/../../../public/app.js',
            'cssPath' => __DIR__.'/../../../public/app.css',
            'selectedFile' => $selectedFile,
        ]);
    }
}
