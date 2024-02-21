<?php
/**
 * CheckerController
 * Checks the user's permissions to the site
 */


namespace App\Http\Controllers;

use App\Models\Checker;
use App\Models\Site;

class CheckerController extends Controller
{
    /**
     * Generate code for site checker
     * 
     * @return string $res
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
     * Create record in database about rights of user on this site
     * 
     * @param integer $site - Site id
     * @return void
     */

    public static function create(int $site): void
    {
        $code = self::generateCode();

        $new = new Checker;
        $new->site = $site;
        $new->code = $code;
        $new->save();

    }

    /**
     * Get current checker's code for this site
     * 
     * @param integer $site
     * @return string
     */

    public static function getCode(int $site): string
    {
        return Checker::where('site', $site)->first()->code;
    }

    /**
     * Check the code in the file by URL address against what is stored in the database
     * 
     * @param Site $site - object of Site class
     * @return bool
     */

    public static function checkCode(Site $site): bool
    {
        $checker = Checker::where('site', $site->id)->first();

        $url = $site->url;
        $url .= 'checker.txt';

        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, $url);
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($curlSession);
        curl_close($curlSession);

        try {
            if ($res == $checker->code) {
                $site->checked = true;
                $checker->status = true;
                $site->save();

                return true;
            } else {
                return false;
            }

        } catch (Exception $e) {
            return false;
        }

    }
}
