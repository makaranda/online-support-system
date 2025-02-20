<?php

namespace App\Http\Controllers\Guests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\Branches;
use App\Models\Departments;

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
    public function open_ticket_page()
    {
        $active_notice = Notice::whereStatus(1)->where('exdate','<',date('Y-m-d'))->first();
        $service_branches = Branches::where('status',1)->get();
        $service_types = Departments::where('status',1)->get();
        return view('pages.frontend.open_tickets.index',compact('active_notice','service_branches','service_types'));
    }
}
