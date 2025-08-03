<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class ProfileController extends Controller
{
    public function myCVs()
    {
        $cvs = [];
        if(Auth::check())
        {
            $cvs = CV::where('user_id', '=', Auth::id())->get();
        }
        elseif(Cookie::has('ids'))
        {
            $ids = Cookie::get('ids');
            $cvs = CV::whereIn('uuid', json_decode($ids))->get();
        }
        return view('pages.steps.my_cvs', compact('cvs'));
    }

    public function selectCV(Request $request)
    {

    }
}
