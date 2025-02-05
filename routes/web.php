<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


if(function_exists('admin_prefix')) {
    $prefix = admin_prefix();

    Route::middleware(['web','auth', 'admin'])
    ->name('admin.license')
    ->prefix($prefix.'/license')->group(function () {
        Route::get('/', [\Jiny\License\Http\Controllers\Admin\AdminLicense::class, 'index']);

        Route::get('/store', [\Jiny\License\Http\Controllers\Admin\AdminLicenseStore::class, 'index']);

        // Route::get('/store/detail/{code}', [
        //     \Jiny\License\Http\Controllers\Admin\AdminLicenseStoreDetail::class,
        //     'index'
        // ])->name('.store.detail');


        Route::get('/order', [\Jiny\License\Http\Controllers\Admin\AdminLicenseOrder::class, 'index']);
    });

    // 라이센스 발급
    Route::middleware(['web','auth', 'admin'])
    ->name('admin.license')
    ->prefix($prefix.'/license')->group(function () {

        Route::get('/pub', [\Jiny\License\Http\Controllers\Admin\AdminLicensePub::class, 'index']);

        Route::get('/plan', [\Jiny\License\Http\Controllers\Admin\AdminLicensePlan::class, 'index']);

        Route::get('/user', [\Jiny\License\Http\Controllers\Admin\AdminLicenseUser::class, 'index']);

        Route::get('/sales', [\Jiny\License\Http\Controllers\Admin\AdminLicenseSales::class, 'index']);

    });
}

