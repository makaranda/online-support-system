<?php

namespace App\Http\Controllers\Guests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;

class HomeController extends Controller
{
    public function home_page()
    {
        $active_notice = Notice::whereStatus(1)->where('exdate','<',date('Y-m-d'))->first();
        return view('pages.frontend.home.index',compact('active_notice'));
    }
    public function login_page()
    {
        return view('pages.frontend.login.index');
    }
}
