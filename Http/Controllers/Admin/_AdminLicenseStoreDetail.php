<?php
namespace Jiny\License\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

use Jiny\WireTable\Http\Controllers\WireTablePopupForms;
class AdminLicenseStoreDetail extends WireTablePopupForms
{
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ##
        $this->actions['table']['name'] = "license_plan"; // 테이블 정보
        $this->actions['paging'] = 10; // 페이지 기본값

        $this->actions['view']['layout'] = "jiny-license::admin.license_store_detail.layout";
        $this->actions['view']['table'] = "jiny-license::admin.license_store_detail.table";
        $this->actions['view']['list'] = "jiny-license::admin.license_store_detail.list";
        $this->actions['view']['form'] = "jiny-license::admin.license_store_detail.form";

        $this->actions['title'] = "라이센스 구매";
        $this->actions['subtitle'] = "라이센스 플렌을 구매합니다.";

    }

    public function index(Request $request)
    {
        $code = $request->code;
        $this->actions['code'] = $code;
        $this->params['code'] = $code;

        // $plan = DB::table('license_plan')->where('code', $code)->get();
        // $this->params['plan'] = $plan;

        return parent::index($request);
    }

}
