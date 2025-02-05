<?php
namespace Jiny\License\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Livewire\Attributes\On;

class LicenseStore extends Component
{
    public function render()
    {
        $row = DB::table('license_plan')->get();

        return view('jiny-license::admin.license_store.store', [
            'row' => $row,
        ]);

        //return view('jiny-license::admin.license_store.store');
    }

    public function order($id)
    {
        DB::table('license_order')->insert([
            'plan_id' => $id,
            'user_name' => Auth::user()->name,
            'email' => Auth::user()->email,
        ]);
    }
}
