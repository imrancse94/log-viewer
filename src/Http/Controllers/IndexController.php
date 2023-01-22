<?php

namespace creditzombies\LogViewer\Http\Controllers;

use creditzombies\LogViewer\Facades\LogViewer;

class IndexController
{
    public function logviewer()
    {
        LogViewer::auth();

        $selectedFile = LogViewer::getFile(request()->query('file', ''));

        return view('log-viewer::index', [
            'jsPath' => __DIR__.'/../../../public/app.js',
            'cssPath' => __DIR__.'/../../../public/app.css',
            'selectedFile' => $selectedFile,
        ]);
    }

    public function __invoke()
    {
        return redirect(route('blv.index','file=laravel-'.date('Y-m-d').'.log'));
    }
}
