<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Auth;
use Illuminate\View\View;

class LogController extends Controller
{
    protected function list(): View
    {
        $sites = Site::where('owner', Auth::user()->id)->get();

        return view('logs.list', [
            'sites' => $sites,
        ]);
    }
}
