<?php

use Illuminate\Support\Facades\Route;
use creditzombies\LogViewer\Facades\LogViewer;
use creditzombies\LogViewer\Http\Controllers\DownloadFileController;
use creditzombies\LogViewer\Http\Controllers\DownloadFolderController;
use creditzombies\LogViewer\Http\Controllers\IndexController;
use creditzombies\LogViewer\Http\Controllers\IsScanRequiredController;
use creditzombies\LogViewer\Http\Controllers\ScanFilesController;
use creditzombies\LogViewer\Http\Controllers\SearchProgressController;

Route::domain(LogViewer::getRouteDomain())
    ->middleware(LogViewer::getRouteMiddleware())
    ->prefix(LogViewer::getRoutePrefix())
    ->group(function () {
        Route::get('/log-viewer', [IndexController::class,'logviewer'])->name('blv.index');
        Route::get('/', IndexController::class);

        Route::get('file/{fileIdentifier}/download', DownloadFileController::class)->name('blv.download-file');
        Route::get('folder/{folderIdentifier}/download', DownloadFolderController::class)->name('blv.download-folder');

        Route::get('is-scan-required', IsScanRequiredController::class)->name('blv.is-scan-required');
        Route::get('scan-files', ScanFilesController::class)->name('blv.scan-files');

        Route::get('search-progress', SearchProgressController::class)->name('blv.search-more');
    });
