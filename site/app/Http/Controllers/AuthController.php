<?php
/**
 * AuthController
 * 
 */


namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\Site;

class AuthController extends Controller
{
    /**
     * Generate authorization's token method
     * 
     * @return string
     */
    protected static function generateCode(): string
    {
        $chars = '0123456789abcdefghijklmnopqrs092u3tuvwxyzaskdhfhf9882323ABCDEFGHIJKLMNksadf9044OPQRSTUVWXYZ';
        $charsLength = strlen($chars);
        $res = '';
        $flag = false;

        while(!$flag) {
            $res = '';
            for ($i = 0; $i < $charsLength; $i++) {
                $res .= $chars[rand(0, $charsLength - 1)];
            }
            if(Code::where('code',$res)->first() == NULL)
                $flag = true;
        }

        return $res;
    }

    /**
     * Create record of authorization's token in database
     * 
     * @param integer $site_id  - Site's id
     * @return redirect
     */
    protected function create(int $site_id)
    {
        // Get token
        $code = self::generateCode();
        
        $site = Site::find($site_id);
        if ($site->checked && $site->status) {
            $new = new Code;
            $new->site = $site->id;
            $new->code = $code;
            $new->ip = '127.0.0.1';
            $new->save();

            // Increase amount of auths of this site
            $site->auths += 1;
            $site->save();

            return redirect()->route('auth_view', ['id' => $new->id]);
        } else {
            return 'Error. Login through telegram on this site is currently unavailable';
        }
    }


    /**
     * Auth page
     * Authorization page via Telegram
     * 
     * @param integer $id - Site's id
     * @return view
     */
    protected function view(int $id)
    {
        $code = Code::find($id);
        $site = Site::find($code->site);


        return view('auth', [
            'code' => $code,
            'site' => $site
        ]);
    }
}
