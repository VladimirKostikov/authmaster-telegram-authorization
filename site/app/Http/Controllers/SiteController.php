<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSiteRequest;
use App\Models\Site;
use Auth;
use Illuminate\View\View;

class SiteController extends Controller
{
    protected static function generateCode(): string
    {
        $chars = '0123456789abcdefghijklmnopqrs092u3tuvwxyzaskdhfhf9882323ABCDEFGHIJKLMNksadf9044OPQRSTUVWXYZ';
        $charsLength = strlen($chars);
        $res = '';
        for ($i = 0; $i < $charsLength; $i++) {
            $res .= $chars[rand(0, $charsLength - 1)];
        }

        return $res;
    }

    protected static function getValidApiCode(): string {
        $flag = 0;
        $code = self::generateCode();

        while(!$flag) {
            if(Site::where('api', $code)->first() == NULL)
                $flag = 1;
            else
                $code = self::generateCode();
        }

        return $code;
    }

    protected function checkPermissionOnSite(int $id)
    {
        $site = Site::find($id);

        if (self::isOwner($id)) {
            if (CheckerController::checkCode($site)) {
                return redirect()->back()->with('success', __('Notification success site rights confirmed'));
            } else {
                return redirect()->back()->with('error', __('Notification error site rights'));
            }
        } else {
            return redirect()->back()->with('error', __('Notififcation error not owner'));
        }

    }

    protected static function getHTMLButtonCode(int $site): View {
        return view('components/api-auth-link',['site_id'=>$site]);
    }

    protected static function isOwner(int $id): bool
    {
        return Site::find($id)->owner === Auth::user()->id;
    }

    protected function list(): View
    {
        $sites = Site::where('owner', Auth::user()->id)->get();

        return view('sites.list', [
            'sites' => $sites,
        ]);
    }


    protected function create(AddSiteRequest $req)
    {
        $new = new Site;
        $new->owner = Auth::user()->id;
        $new->name = $req->name;
        $new->url = $req->url;
        $new->status = false;
        $new->http_notification = $req->http_notification;
        $new->http_ref = $req->http_ref;
        $new->api = self::getValidApiCode();    
        $new->save();

        CheckerController::add($new->id);

        return redirect()->route('sites_list')->with('success', __('Notification success site added'));
    }

    protected function update(): void
    {

    }

    protected function destroy(int $id): Site
    {
        return Site::delete($id);
    }

    protected function view(int $id): View
    {
        $site = Site::find($id);
        if (! $site->checked) {
            $code = CheckerController::getCode($site->id);
        } else {
            $code = null;
        }

        return view('sites.view', [
            'site' => $site,
            'code' => $code,
            'auth_button' => self::getHTMLButtonCode($site->id)
        ]);
    }

   

    protected function toggle(int $id)
    {
        if (self::isOwner($id)) {
            $site = Site::find($id);
            if ($site->status) {
                $site->status = false;
            } else {
                $site->status = true;
            }
            $site->save();

            return redirect()->back()->with('success', __('Notification success site settings updated'));
        } else {
            return redirect()->back()->with('error', __('Notififcation error not owner'));
        }
    }
}
