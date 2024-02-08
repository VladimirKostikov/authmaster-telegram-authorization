<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Site;
use App\Http\Requests\AddSiteRequest;
use Auth;

class SiteController extends Controller
{
    protected function list(): View {
        $sites = Site::where('owner',Auth::user()->id)->get();
        return view('sites.list', [
            'sites' => $sites
        ]);
    }

    
    
    protected function create(AddSiteRequest $req) {
        $new = new Site;
        $new->owner = Auth::user()->id;
        $new->name = $req->name;
        $new->url = $req->url;
        $new->status = false;
        $new->http_notification = $req->http_notification;
        $new->save();

        return redirect()->route('sites_list');
    }

    protected function update(): void {

    }

    protected function destroy(int $id): Site {
        return Site::delete($id);
    }

    protected function view(int $id): View {
        $site = Site::find($id);
        return view('sites.view', ['site'=>$site]);
    }
    
}
