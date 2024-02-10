<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\Log;
use App\Models\Site;
use Auth;

class LogController extends Controller
{
    protected function list(): View {
        $sites = Site::where('owner',Auth::user()->id)->get();

        return view('logs.list', [
            'sites' => $sites
        ]);
    }
}
