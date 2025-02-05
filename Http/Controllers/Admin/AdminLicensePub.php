<?php
namespace Jiny\License\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

use Jiny\WireTable\Http\Controllers\WireTablePopupForms;
class AdminLicensePub extends WireTablePopupForms
{
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ##
        $this->actions['table']['name'] = "license_pub"; // 테이블 정보
        $this->actions['paging'] = 10; // 페이지 기본값

        $this->actions['view']['layout'] = "jiny-license::admin.license_pub.layout";
        $this->actions['view']['list'] = "jiny-license::admin.license_pub.list";
        $this->actions['view']['form'] = "jiny-license::admin.license_pub.form";

        $this->actions['title'] = "라이센스 발급";
        $this->actions['subtitle'] = "기능별 동작 라이센스를 관리합니다.";

    }

    public function index(Request $request)
    {
        return parent::index($request);
    }

    ## 신규 데이터 DB 삽입전에 호출됩니다.
    public function hookStoring($wire,$form)
    {
        if(isset($form['email'])) {
            $email = $form['email'];
            $user = DB::table('license_user')->where('email',$email)->first();
            if($user) {
                $form['domain'] = $user->domain;
            }
        }

        if(isset($form['title'])) {
            $title_id = _key($form['title']);
            //dump($title_id);
            $title = _value($form['title']);
            //dump($title);
            $plan = DB::table('license_plan')->where('id',$title_id)->first();
            if($plan) {
                $form['code'] = $plan->code;
                //$form['title'] = $plan->title;
                $form['description'] = $plan->description;
            }
        }

        //dd($form);
        return $form; // 사전 처리한 데이터를 반환합니다.
    }

    public function hookUpdating($wire, $form, $old)
    {
        if(isset($form['email'])) {
            $email = $form['email'];
            $user = DB::table('license_user')->where('email',$email)->first();
            if($user) {
                $form['domain'] = $user->domain;
            }
        }

        if(isset($form['title'])) {
            $title_id = _key($form['title']);
            //dump($title_id);
            $title = _value($form['title']);
            //dump($title);
            $plan = DB::table('license_plan')->where('id',$title_id)->first();
            if($plan) {
                $form['code'] = $plan->code;
                //$form['title'] = $plan->title;
                $form['description'] = $plan->description;
            }
        }

        return $form;
        return true; // 정상
    }

}
