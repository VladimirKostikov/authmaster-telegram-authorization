<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Site;
use App\Http\Requests\AddSiteRequest;
use App\Http\Controllers\CheckerController;
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

        CheckerController::add($new->id);

        return redirect()->route('sites_list')->with('success', 'Сайт добавлен. Подтвердите права на него');
    }

    protected function update(): void {

    }

    protected function destroy(int $id): Site {
        return Site::delete($id);
    }

    protected function view(int $id): View {
        $site = Site::find($id);
        if(!$site->checked)
            $code = CheckerController::get($site->id);
        else
            $code = null;

        return view('sites.view', [
            'site'  =>  $site,
            'code'  =>  $code
        ]);
    }
    
    protected function check(int $id) {
        $site = Site::find($id);

        if($site->owner == Auth::user()->id) {
            $res = CheckerController::check($site);
            return $res;
        }
            /*
           if(CheckerController::check($site))
                return redirect()->back()->with('success', "Права на сайт подтверждены");
           else
                return redirect()->back()->with('error', "Ошибка. Проверьте доступность файла авторизации");
            */
        else
            return redirect()->back()->with('error', "Это не ваш сайт");
    }
}
