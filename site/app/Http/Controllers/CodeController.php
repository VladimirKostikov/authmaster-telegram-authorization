<?php
/**
 * CodeController
 * Responsible for the page with a list and information about authorizations
 */
namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Code;
use Illuminate\View\View;
use Auth;

class CodeController extends Controller
{

    /**
     * List of all authorizations
     * 
     * @return View
     */
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


    /**
     * List of specific site authorizations
     * 
     * @param integer $id
     * @return View
     */
    protected function site(int $id): View {
        $site = Site::find($id);
        $codes = Code::where('site', $site->id)->orderBy('id', 'DESC')->paginate(50);

        if($site->owner === Auth::user()->id)
            return view('codes.site', [
                'site'  =>  $site,
                'codes' =>  $codes
            ]);
        else
            return redirect()->back()->with('error', __('Notififcation error not owner'));
        
    }

    /**
     * Authorization info page
     * 
     * @param integer $id
     * @return View
     */

    protected function view(int $id): View {
        $code = Code::find($id);
        $site = Site::find($code->site);

        if($site->owner === Auth::user()->id)
            return view('codes.view', [
                'site'  =>  $site,
                'code'  =>  $code
            ]);
        else
            return redirect()->back()->with('error', __('Notififcation error not owner'));
    }
}
