<?php

namespace App\Components;

use Illuminate\Support\Facades\Auth;

class Session extends \Illuminate\Support\Facades\Session
{
    public static function isAdmin()
    {
        if(Session::isGuest()) {
            return false;
        }

        return Auth::user()->id_user_role == 1;
    }

    public static function isUser()
    {
        if(Session::isGuest()) {
            return false;
        }

        return Auth::user()->id_user_role == 2;
    }

    public static function getUsername()
    {
        if(Session::isGuest()) {
            return null;
        }

        return Auth::user()->username;
    }

    public static function getIdUser()
    {
        if(Session::isGuest()) {
            return null;
        }

        return Auth::user()->id;
    }

    public static function isGuest()
    {
        return Auth::guest();
    }
}
