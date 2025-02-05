<?php
namespace Jiny\License\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

use Jiny\WireTable\Http\Controllers\WireTablePopupForms;
class AdminLicenseOrder extends WireTablePopupForms
{
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ##
        $this->actions['table']['name'] = "license_order"; // 테이블 정보
        $this->actions['paging'] = 10; // 페이지 기본값

        $this->actions['view']['layout'] = "jiny-license::admin.license_order.layout";
        $this->actions['view']['list'] = "jiny-license::admin.license_order.list";
        $this->actions['view']['form'] = "jiny-license::admin.license_order.form";

        $this->actions['title'] = "라이센스 order";
        $this->actions['subtitle'] = "라이센스 주문 내역";

    }

    public function index(Request $request)
    {
        return parent::index($request);
    }



}
