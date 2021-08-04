<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;


class SocialController extends Controller
{

    public function redirect($service){
        return 'Laravel\Socialite\Facades\Socialite'::driver($service)->redirect();
    }

    public function callback($service){

        return $user = 'Laravel\Socialite\Facades\Socialite'::with($service)->user();
    }
}


