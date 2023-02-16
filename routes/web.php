<?php

use Illuminate\Support\Facades\Route;
use Opcodes\LogViewer\Http\Controllers\IndexController;
use Opcodes\LogViewer\Http\Controllers\IsScanRequiredController;
use Opcodes\LogViewer\Http\Controllers\ScanFilesController;
use Opcodes\LogViewer\Http\Controllers\SearchProgressController;

Route::prefix('api')->group(function () {
    Route::get('folders', 'FoldersController@index')->name('log-viewer.folders');
    Route::get('folders/{folderIdentifier}/download', 'FoldersController@download')->name('log-viewer.folders.download');
    Route::post('folders/{folderIdentifier}/clear-cache', 'FoldersController@clearCache')->name('log-viewer.folders.clear-cache');
    Route::delete('folders/{folderIdentifier}', 'FoldersController@delete')->name('log-viewer.folders.delete');

    Route::get('files', 'FilesController@index')->name('log-viewer.files');
    Route::get('files/{fileIdentifier}/download', 'FilesController@download')->name('log-viewer.files.download');
    Route::post('files/{fileIdentifier}/clear-cache', 'FilesController@clearCache')->name('log-viewer.files.clear-cache');
    Route::delete('files/{fileIdentifier}', 'FilesController@delete')->name('log-viewer.files.delete');

    Route::post('clear-cache-all', 'FilesController@clearCacheAll')->name('log-viewer.files.clear-cache-all');
    Route::post('delete-multiple-files', 'FilesController@deleteMultipleFiles')->name('log-viewer.files.delete-multiple-files');

    Route::get('logs', 'LogsController@index')->name('log-viewer.logs');

    Route::get('is-scan-required', IsScanRequiredController::class)->name('log-viewer.is-scan-required');
    Route::get('scan-files', ScanFilesController::class)->name('log-viewer.scan-files');

    Route::get('search-progress', SearchProgressController::class)->name('log-viewer.search-more');
});

// Catch all route
Route::get('/{view?}', IndexController::class)->where('view', '(.*)')->name('log-viewer.index');
