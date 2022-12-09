<?php

namespace Jiny\License\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LicenseUpload extends Controller
{
    // 라이센스 파일 업로드
    public function index()
    {
        return view("license::upload");
    }
}
