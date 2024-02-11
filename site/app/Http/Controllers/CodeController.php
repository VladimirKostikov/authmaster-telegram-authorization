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
        $sites = Site::where('owner', Auth::user()->id)->pluck('id')->toArray();
        $auths = Code::where('site', $sites)->orderBy('id', 'DESC')->paginate(50);

        return view('logs.list', [
            'sites' => $sites,
            'auths' => $auths
        ]);
    }
}
