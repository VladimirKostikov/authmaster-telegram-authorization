<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checker;
use App\Models\Site;

class CheckerController extends Controller
{
    protected static function generateCode(): string {
        $chars = '0123456789abcdefghijklmnopqrs092u3tuvwxyzaskdhfhf9882323ABCDEFGHIJKLMNksadf9044OPQRSTUVWXYZ';
        $charsLength = strlen($chars);
        $res = '';
        for ($i = 0; $i < $charsLength; $i++) {
            $res .= $chars[rand(0, $charsLength - 1)];
        }
        return $res;
    }

    public static function add(int $site): void {
        $flag = false;
        $code = self::generateCode();

        while(!$flag) {
            if(Checker::where('code',$code)->first() == NULL)
                $flag = true;
            else
                $code = self::generateCode();
        }

        $new = new Checker;
        $new->site = $site;
        $new->code = $code;
        $new->save();

    }

    public static function get(int $site): string {
        return Checker::where('site',$site)->first()->code;
    }

    public static function check(Site $site) {
        $checker = Checker::where('site',$site->id)->first();

        $url = $site->url;
        $url .= 'checker.txt';

        $res = readfile($url);
        

        return $res;

        /*
        try {
            $res = file_get_contents($url);

            return $res
            
            if($res == $checker->code) {
                $site->checked = true;
                $checker->status = true;
                $site->save();

                return true;
            }
            
            else 
                return false;
            
        }
        catch (Exception $e) {
            return false;
        }
        */
    }
}
