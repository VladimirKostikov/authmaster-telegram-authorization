<?php

namespace App\Http\Controllers;

use App\Models\Checker;
use App\Models\Site;

class CheckerController extends Controller
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

    public static function add(int $site): void
    {
        $flag = false;
        $code = self::generateCode();

        while (! $flag) {
            if (Checker::where('code', $code)->first() == null) {
                $flag = true;
            } else {
                $code = self::generateCode();
            }
        }

        $new = new Checker;
        $new->site = $site;
        $new->code = $code;
        $new->save();

    }

    public static function getCode(int $site): string
    {
        return Checker::where('site', $site)->first()->code;
    }

    public static function checkCode(Site $site)
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
