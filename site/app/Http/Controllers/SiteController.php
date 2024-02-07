<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Site;
use Auth;

class SiteController extends Controller
{
    protected function list(): View {
        $sites = Site::where('owner',Auth::user()->id)->get();
        return view('sites.list', [
            'sites' => $sites
        ]);
    }

    
    protected function create(Request $req): void {

    }

    protected function update(): void {

    }

    protected function destroy(): void {

    }

    protected function get(): Site {
        
    }
}
