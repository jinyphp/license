<?php

Route::middleware(['web'])
->prefix('jiny/license')->group(function () {
    Route::get('upload', [\Jiny\License\Http\Controllers\LicenseUpload::class, 'index']);

});
