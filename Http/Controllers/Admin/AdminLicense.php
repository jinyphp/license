<?php
namespace Jiny\License\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

use Jiny\WireTable\Http\Controllers\WireTablePopupForms;
class AdminLicense extends WireTablePopupForms
{
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ##
        $this->actions['table']['name'] = "license"; // 테이블 정보
        $this->actions['paging'] = 10; // 페이지 기본값

        $this->actions['view']['list'] = "jiny-license::admin.license.list";
        $this->actions['view']['form'] = "jiny-license::admin.license.form";

        $this->actions['title'] = "라이센스";
        $this->actions['subtitle'] = "기능별 동작 라이센스를 관리합니다.";

    }

    public function index(Request $request)
    {
        $viewFile = "jiny-license::admin.license.layout";
        return view($viewFile, [
        ]);
    }

}
