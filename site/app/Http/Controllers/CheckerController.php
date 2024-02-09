<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checker;

class CheckerController extends Controller
{
    protected static function generateCode() {
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
}
