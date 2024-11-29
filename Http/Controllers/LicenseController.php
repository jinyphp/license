<?php
namespace Jiny\License\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LicenseController extends BaseController
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // private $license;
    

    // public function __construct()
    // {
    //     $this->licenseKeyCheck();
    // }

    // protected function getLicense()
    // {
    //     return $this->license;
    // }

    private function licenseKeyCheck()
    {
        $path = config_path('jiny/license.php');
        $path = str_replace(['/','\\'],DIRECTORY_SEPARATOR,$path);
        //dump($path);
        if(file_exists($path)) {
            $license = config('jiny.license');
            $this->license = $license;
            //dd($license);

            if($license['server_name'] != $_SERVER['SERVER_NAME']) {
                $message =  '라이센스 서버도메인('. $_SERVER['SERVER_NAME'].') 이름이 일치하지 않습니다.';
                Redirect::to('jiny/license/upload')->with('error',$message)->send();
            }

            if(isset($license['expire']) && $license['expire']) {
                $expire = strtotime($license['expire']);
                $today = strtotime(date('Y-m-d 23:59:59'));

                if ($today >= $expire) {
                    $message = "사용 기한은 ".$license['expire']."일 까지 입니다.";
                    Redirect::to('jiny/license/upload')->with('error', $message)->send();
                }
            }

        } else {
            // 라이센스 파일이 존재하지 않습니다.
            // 라이센스 파일을 등록합니다.
            Redirect::to('jiny/license/upload')->send();
        }
    }

}
