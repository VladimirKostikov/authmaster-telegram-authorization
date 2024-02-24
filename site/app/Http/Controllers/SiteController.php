<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSiteRequest;
use App\Http\Requests\UpdateSiteSettingsRequest;
use App\Models\Site;
use Auth;
use Illuminate\View\View;
use App\Models\Code;

class SiteController extends Controller
{
    /**
     * Generate code
     * 
     * @return string $res
     */

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

    /**
     * Get unique code from generateCode() method
     * 
     * @return string $code
     */
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

    /**
     * Check rights of user on this website
     * 
     * @param int $id - site id in db
     * @return redirect
     */
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

    /**
     * Get HTML button "Sign in with Telegram"
     * 
     * @param int $site - Site id
     * @return View
     */
    protected static function getHTMLButtonCode(int $site): View {
        return view('components/api-auth-link',['site_id'=>$site]);
    }

    /**
     *  If user is owner of this site
     * 
     * @param int $id
     * @return bool
     */
    protected static function isOwner(int $id): bool {
        return Site::find($id)->owner === Auth::user()->id;
    }

    /**
     * Check if the domains of the links match
     * 
     * @param Site $site - object of Site's class
     * @param string $url - URL
     * @return bool
     */
    protected static function checkIfTheURLIsCorrect(Site $site, string $url): bool {
        return parse_url($site->url)["host"] === parse_url($url)["host"];
    }

    /**
     * List of the sites
     * @return View
     */
    protected function list(): View
    {
        $sites = Site::where('owner', Auth::user()->id)->get();

        return view('sites.list', [
            'sites' => $sites,
        ]);
    }

    /**
     * Add site
     * @param AddSiteRequest $req
     * @return redirect
     */
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

        CheckerController::create($new->id);

        return redirect()->route('sites_list')->with('success', __('Notification success site added'));
    }
    
    /**
     * Update site settings
     * @param UpdateSiteSettingsRequest $req
     * @return redirect
     */
    protected function update(UpdateSiteSettingsRequest $req)
    {
        if (self::isOwner($req->id)) {
            $site = Site::find($req->id);
            
            if(self::checkIfTheURLIsCorrect($site, $req->http_notification) && self::checkIfTheURLIsCorrect($site, $req->http_ref)) {
                $site->http_notification = $req->http_notification;
                $site->http_ref = $req->http_ref;
                $site->save();
                return redirect()->back()->with('success', __('Notification success site settings updated'));
            }
            else {
                return redirect()->back()->with('error', __('Site view update error'));
            }
        } else {
            return redirect()->back()->with('error', __('Notififcation error not owner'));
        }
    }

    /**
     * Delete site
     * @param int $id
     * @return Site
     */
    protected function destroy(int $id): Site
    {
        return Site::delete($id);
    }

    /**
     * View site
     * @param int $id
     * @return View
     */
    protected function view(int $id): View
    {
        $site = Site::find($id);
        $auths_per_day = Code::where('site',$id)->whereDay('created_at', date('d'))->count();
        $auths_per_month = Code::where('site',$id)->whereMonth('created_at', date('m'))->count();
        $auths_per_year = Code::where('site',$id)->whereYear('created_at', date('Y'))->count();
        $code = null;

        if (!$site->checked) {
            $code = CheckerController::getCode($site->id);
        }

        return view('sites.view', [
            'site' => $site,
            'code' => $code,
            'auth_button' => self::getHTMLButtonCode($site->id),

            'auths_per_day' => $auths_per_day ?? 0,
            'auths_per_month' => $auths_per_month ?? 0,
            'auths_per_year' => $auths_per_year ?? 0
        ]);
    }

   
    /**
     * Toggle site's authorizations
     * @param int $id
     * @return redirect
     */
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
