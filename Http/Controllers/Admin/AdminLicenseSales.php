<?php
namespace Jiny\License\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

use Jiny\WireTable\Http\Controllers\WireTablePopupForms;
class AdminLicenseSales extends WireTablePopupForms
{
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ##
        $this->actions['table']['name'] = "license_sales"; // 테이블 정보
        $this->actions['paging'] = 10; // 페이지 기본값

        $this->actions['view']['layout'] = "jiny-license::admin.license_sales.layout";
        $this->actions['view']['list'] = "jiny-license::admin.license_sales.list";
        $this->actions['view']['form'] = "jiny-license::admin.license_sales.form";

        $this->actions['title'] = "라이센스 Sales";
        $this->actions['subtitle'] = "라이센스 접수를 관리합니다.";

    }

    public function index(Request $request)
    {
        return parent::index($request);
    }

}
