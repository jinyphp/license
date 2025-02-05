<?php
namespace Jiny\License\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

use Jiny\WireTable\Http\Controllers\WireTablePopupForms;
class AdminLicenseUser extends WireTablePopupForms
{
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ##
        $this->actions['table']['name'] = "license_user"; // 테이블 정보
        $this->actions['paging'] = 10; // 페이지 기본값

        $this->actions['view']['layout'] = "jiny-license::admin.license_user.layout";
        $this->actions['view']['list'] = "jiny-license::admin.license_user.list";
        $this->actions['view']['form'] = "jiny-license::admin.license_user.form";

        $this->actions['title'] = "라이센스 User";
        $this->actions['subtitle'] = "라이센스 사용자 관리합니다.";

    }

    public function index(Request $request)
    {
        return parent::index($request);
    }

    

}
