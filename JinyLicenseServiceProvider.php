<?php
namespace Jiny\License;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Compilers\BladeCompiler;
use Livewire\Livewire;

class JinyLicenseServiceProvider extends ServiceProvider
{
    private $package = "jiny-license";
    public function boot()
    {
        // 모듈: 라우트 설정
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', $this->package);

        // 데이터베이스
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }

    public function register()
    {
        /* 라이브와이어 컴포넌트 등록 */
        $this->app->afterResolving(BladeCompiler::class, function () {
            Livewire::component('jiny-license-upload', \Jiny\License\Http\Livewire\LicenseUpload::class);
            Livewire::component('jiny-license-table-popup-form', \Jiny\License\Http\Livewire\LicenseTablePopupForm::class);

            Livewire::component('jiny-license-mail',
                \Jiny\License\Http\Livewire\LicenseMail::class);

            Livewire::component('jiny-license-store',
                \Jiny\License\Http\Livewire\LicenseStore::class);

            
        });
    }

}
