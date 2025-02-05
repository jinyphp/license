<?php
namespace Jiny\License\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Livewire\Attributes\On;

class LicenseUpload extends Component
{
    use WithFileUploads;

    public $uploadFile;

    public $popupForm = false;
    public $popupWindowWidth = '2xl';
    public $popupEdit = false;
    public $popupDelete = false;

    public $message;
    public $forms = [];

    public function render()
    {
        $license = DB::table('license')->get();
        return view('jiny-license::admin.license.upload',[
            'license' => $license,
        ]);
    }

    public function create()
    {
        $this->popupForm = true;

        // 파일 초기화
        $this->uploadFile = null;
        $this->message = null;
        $this->forms = [];
    }

    /**
     * 업로드
     */
    public function store()
    {
        if ($this->uploadFile) {
            // 라이센스 파일 내용 읽기
            $filename =$this->uploadFile->getRealPath();
            $content = file_get_contents($filename);

            // base64_decode와 str_rot13을 사용하여 복호화
            $decryptedMessage = str_rot13(
                base64_decode($content)
            );
            // salt 값 제거
            $decryptedMessage = str_replace($this->forms['salt'], '', $decryptedMessage);

            $license = json_decode($decryptedMessage, true);
            if ($license === null) {
                //throw new \Exception("라이센스 파일 형식이 올바르지 않습니다. JSON 형식을 확인해주세요.");
                $this->message = "라이센스 파일 형식이 올바르지 않습니다. JSON 형식을 확인해주세요.";
                return false;
            }

            //dd($license);
            // 라이센스 코드 중복 체크
            $exists = DB::table('license')
                ->where('code', $license['code'])
                ->exists();

            if($exists) {
                $this->message = "이미 등록된 라이센스 코드입니다.";
                return false;
            }

            // DB에 파일 내용 저장
            $id = DB::table('license')->insertGetId([
                'code' => $license['code'],
                'salt' => $this->forms['salt'],
                'license' => $content,
                'title' => _value($license['title']),
                'description' => $license['description'],
                'expired_at' => $license['expired_at']
            ]);

            // 파일 초기화
            $this->uploadFile = null;
        }

        $this->popupForm = false;
        $this->message = null;
    }

    /**
     * storage_path 에 저장
     */
    // private function uploadMoveFile($tempPath)
    // {
    //     // 파일 저장 경로
    //     $path = config_path('jiny/license');
    //     if(!is_dir($path)) {
    //         mkdir($path, 0777, true);
    //     }

    //     $license = json_decode(
    //         file_get_contents(
    //             storage_path('app/public/'.$tempPath)
    //         ), true);
    //     //dd($license);

    //     // 파일 이동
    //     $filename = basename($tempPath);
    //     $targetPath = $path.DIRECTORY_SEPARATOR.$filename;
    //     // if(file_exists($targetPath)) {
    //     //     unlink($targetPath);
    //     // }

    //     rename(storage_path('app/public/'.$tempPath), $targetPath);

    //     return $filename;
    // }

    public function cancel()
    {
        $this->popupForm = false;
        $this->message = null;
        $this->forms = [];
    }

    public function remove($id)
    {
        $this->popupDelete = true;
        $this->forms['id'] = $id;
        $this->message = null;
    }

    public function removeConfirm($id)
    {
        $this->popupDelete = false;

        // unlink($this->license[$id]['filename']);
        // unset($this->license[$id]);
        DB::table('license')->where('id', $id)->delete();

        $this->popupForm = false;
        $this->forms = [];
    }

    public function renewal($id)
    {
        $this->forms = [];

        $this->forms['id'] = $id;
        $this->popupForm = true;
        $this->message = null;
    }

    public function update($id)
    {
        if ($this->uploadFile) {
            // 라이센스 파일 내용 읽기
            $filename =$this->uploadFile->getRealPath();
            $content = file_get_contents($filename);

            // base64_decode와 str_rot13을 사용하여 복호화
            $decryptedMessage = str_rot13(
                base64_decode($content)
            );
            // salt 값 제거
            $decryptedMessage = str_replace($this->forms['salt'], '', $decryptedMessage);

            $license = json_decode($decryptedMessage, true);
            if ($license === null) {
                //throw new \Exception("라이센스 파일 형식이 올바르지 않습니다. JSON 형식을 확인해주세요.");
                $this->message = "라이센스 파일 형식이 올바르지 않습니다. JSON 형식을 확인해주세요.";
                return false;
            }




            // DB에 파일 내용 저장
            $id = DB::table('license')->where('id', $id)->update([
                'code' => $license['code'],
                'salt' => $this->forms['salt'],
                'license' => $content,
                'title' => _value($license['title']),
                'description' => $license['description'],
                'expired_at' => $license['expired_at']
            ]);

            // 파일 초기화
            $this->uploadFile = null;
        }

        $this->popupForm = false;
        $this->message = null;

        $this->forms = [];
    }



}
