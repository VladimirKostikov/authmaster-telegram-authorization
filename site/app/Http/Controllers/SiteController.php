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

    protected static function isOwner(int $id): bool {
        return Site::find($id)->owner === Auth::user()->id;
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
            $code = CheckerController::getCode($site->id);
        else
            $code = null;

        return view('sites.view', [
            'site'  =>  $site,
            'code'  =>  $code
        ]);
    }
    
    protected function checkPermissionOnSite(int $id) {
        $site = Site::find($id);

        if(self::isOwner($id))
            if(CheckerController::checkCode($site))
                return redirect()->back()->with('success', "Права на сайт подтверждены");
            else
                return redirect()->back()->with('error', "Ошибка. Проверьте доступность или корректность файла авторизации");
        else
            return redirect()->back()->with('error', "Это не ваш сайт");
    
    }

    protected function toggle(int $id) {
        if(self::isOwner($id)) {
            $site = Site::find($id);
            if($site->status)
                $site->status = false;
            else
                $site->status = true;
            $site->save();

            return redirect()->back()->with('success', "Настройки обновлены");
        }
        else
            return redirect()->back()->with('error', "Это не ваш сайт");
    }
}
