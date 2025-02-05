<?php
namespace Jiny\License\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * 라이센스 컨트롤러
 */
use Jiny\WireTable\Http\Controllers\LiveController;
class LicenseController extends LiveController
{
    protected $licenseKey;
    protected $license=[];

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * 라이센스 체크
     */
    public function index(Request $request)
    {
        if(!$this->licenseKey) {
            return "라이센스 키가 없습니다.";
        }

        $row = DB::table('license')
            ->where('code', $this->licenseKey)
            ->first();
        if($row) {
            //dd($row);
            // base64_decode와 str_rot13을 사용하여 복호화
            $decryptedMessage = str_rot13(
                base64_decode($row->license)
            );
            //dd($decryptedMessage);
            // salt 값 제거
            $decryptedMessage = str_replace($row->salt, '', $decryptedMessage);
            $license = json_decode($decryptedMessage, true);
            //dd($license);


            // 도메인 체크
            if(isset($license['domain'])) {
                if($license['domain'] != $_SERVER['SERVER_NAME']) {
                    $message = $license['title']."라이센스 도메인(".$license['domain'].")이 일치하지 않습니다.";
                    return view('jiny-license::expire', [
                        'message' => $message
                    ]);
                }
            } else {
                $message = "라이센스 도메인이 없습니다.";
                return view('jiny-license::expire', [
                    'message' => $message
                ]);
            }


            // 라이센스 만료일자 체크
            if(isset($license['license']['expired_at'])) {
                $expired = strtotime($license['license']['expired_at']);
                $today = strtotime(date('Y-m-d 23:59:59'));

                if ($today >= $expired) {
                    $message =$license['title']." 라이센스가 만료되었습니다. (만료일: ".$license['license']['expired_at'].")";
                    return view('jiny-license::expire', [
                        'message' => $message
                    ]);
                }
            }

        } else {
            return view('jiny-license::expire', [
                'message' =>  $license['title']."라이센스 키가 없습니다."
            ]);
        }

        return parent::index($request);
    }



}

