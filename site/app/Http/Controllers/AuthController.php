<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\Site;

class AuthController extends Controller
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

    protected function create(int $site_id)
    {
        $site = Site::find($site_id);
        if ($site->checked && $site->status) {
            $new = new Code;
            $new->site = $site->id;
            $new->code = self::generateCode();
            $new->ip = '127.0.0.1';
            $new->save();

            return redirect()->route('auth_view', ['id' => $new->id]);
        } else {
            return 'Error. Login through this site is currently unavailable';
        }
    }

    protected function view(int $id)
    {
        $code = Code::find($id);
        $sitename = Site::find($code->site)->name;

        return view('auth', [
            'code' => $code,
            'sitename' => $sitename,
        ]);
    }
}
