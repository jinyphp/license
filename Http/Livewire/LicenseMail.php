<?php
namespace Jiny\License\Http\Livewire;

use Illuminate\Contracts\Container\Container;
use Illuminate\Routing\Route;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\On;

class LicenseMail extends Component
{
    public $popupForm = false;
    public $popupWindowWidth = "4xl";
    public $message = '';

    public $forms=[];

    public function render()
    {
        return view('jiny-license::admin.mail.license');
    }

    #[On('popupSendMail')]
    public function spopupSendMail($id)
    {
        $this->popupForm = true;

        $row = DB::table("license_pub")
            ->find($id);

        $this->forms = get_object_vars($row);
        $this->message = '';
    }

    public function sendMail()
    {
        // 이메일 발송
        if($this->forms['email']) {
            // 라이센스 메일 발송
            // 메일 제목은 LicenseMail 클래스의 envelope() 메소드에서 설정됩니다
            Mail::to($this->forms['email'])
                ->send(new \Jiny\License\Mail\LicenseMail($this->forms));

            $this->message = "라이센스 메일이 발송되었습니다.";
        } else {
            $this->message = "이메일 주소가 없습니다.";
        }
    }
}
