<?php

use Illuminate\Support\Facades\Route;
use Creditzombies\LogViewer\Facades\LogViewer;
use Creditzombies\LogViewer\Http\Controllers\DownloadFileController;
use Creditzombies\LogViewer\Http\Controllers\DownloadFolderController;
use Creditzombies\LogViewer\Http\Controllers\IndexController;
use Creditzombies\LogViewer\Http\Controllers\IsScanRequiredController;
use Creditzombies\LogViewer\Http\Controllers\ScanFilesController;
use Creditzombies\LogViewer\Http\Controllers\SearchProgressController;

Route::domain(LogViewer::getRouteDomain())
    ->middleware(LogViewer::getRouteMiddleware())
    ->prefix(LogViewer::getRoutePrefix())
    ->group(function () {
        Route::get('/', IndexController::class)->name('blv.index');

        Route::get('file/{fileIdentifier}/download', DownloadFileController::class)->name('blv.download-file');
        Route::get('folder/{folderIdentifier}/download', DownloadFolderController::class)->name('blv.download-folder');

        Route::get('is-scan-required', IsScanRequiredController::class)->name('blv.is-scan-required');
        Route::get('scan-files', ScanFilesController::class)->name('blv.scan-files');

        Route::get('search-progress', SearchProgressController::class)->name('blv.search-more');
    });
