<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Auth;
use App\Models\Code;
use Illuminate\View\View;

class CodeController extends Controller
{
    protected function list(): View
    {
        $sites = Site::where('owner', Auth::user()->id)->get();
        $sites_ids = Site::where('owner', Auth::user()->id)->pluck('id')->toArray();
        $codes = Code::where('site', $sites_ids)->orderBy('id', 'DESC')->paginate(50);

        return view('codes.list', [
            'sites' => $sites,
            'codes' => $codes
        ]);
    }

    protected function site(int $id): View {
        $site = Site::find($id);
        $codes = Code::where('site', $site->id)->orderBy('id', 'DESC')->paginate(50);

        if($site->owner === Auth::user()->id)
            return view('codes.site', [
                'site'  =>  $site,
                'codes' =>  $codes
            ]);
        else
            return redirect()->back()->with('error', "Ошибка. Нет доступа");
        
    }

    protected function view(int $id): View {
        $code = Code::find($id);
        $site = Site::find($code->site);

        if($site->owner === Auth::user()->id)
            return view('codes.view', [
                'site'  =>  $site,
                'code'  =>  $code
            ]);
        else
            return redirect()->back()->with('error', "Ошибка. Нет доступа");
    }
}
