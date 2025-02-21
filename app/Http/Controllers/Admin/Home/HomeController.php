<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tickets;
use App\Models\CrmCdr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Ensures authentication for all methods in this controller
    }
    public function index(Request $request)
    {
        // $user = User::find(1);

        // if ($user) {
        //     Auth::login($user); // Manually authenticate the user
        // }
        //Ticket Summery
        $active_users = User::whereStatus(1)->get();
        $recent_ticket_count   = Tickets::whereDate('date', '>', Carbon::now()->subDays(30))
                                ->where('is_closed',0)
                                ->count();
        $assigned_ticket_count = Tickets::GetAssignedTickets();
        $closed_ticket_count   = Tickets::whereIsClosed(1)->count();
        $opened_ticket_count   = Tickets::GetOpenedTickets();
        $call_for_ticket_count = CrmCdr::callForTicketsCount();

        $all_ticket_total = $opened_ticket_count + $closed_ticket_count;

        //Priority Array
        $priorities = [1=>'Low',2=>'Normal',3=>'High'];

        //Customer Types
        $customer_types = config('constants.customer_types');
        $tickets = Tickets::with('serviceBranch', 'serviceType', 'assignedTo', 'assignedBy', 'createdBy', 'ticketResponses')
        ->where('is_closed', 0)
        ->orderBy('id', 'desc');

    // Filter by user type
    if (\Auth::user()->usertype_id < 3) {
        $tickets->where('assigned_to', '<>', 0);
    } elseif (\Auth::user()->usertype_id == 3) {
        $tickets->where('service_branch', '=', \Auth::user()->branch_id);
    } elseif (\Auth::user()->usertype_id > 3) {
        $tickets->where('assigned_to', '=', \Auth::id());
    }

    // Apply filters from request
    if ($request->has('ticket_no') && $request->get('ticket_no') != null) {
        $tickets->where('no', $request->get('ticket_no'));
    }

    if ($request->has('date_range') && $request->get('date_range') !== null) {
        $formatted_dates = Tickets::getDatesInDBFormat($request->get('date_range'));
        $from_date = $formatted_dates['from'];
        $to_date = $formatted_dates['to'];
        $tickets->whereBetween('date', [$from_date, $to_date]);
    }

    if ($request->has('branch') && $request->get('branch') !== null) {
        $tickets->where('service_branch', $request->get('branch'));
    }

    if ($request->has('customer') && $request->get('customer') !== null) {
        $tickets->where('customer', 'like',  $request->get('customer') . '%');
    }

    if ($request->has('customer_type') && $request->get('customer_type') !== null) {
        $tickets->where('customer_type',  $request->get('customer_type'));
    }

    if ($request->has('priority') && $request->get('priority') !== null) {
        $tickets->where('priority', 'like',  $request->get('priority') . '%');
    }

    if ($request->has('created_by') && $request->get('created_by') !== null) {
        $tickets->where('created_by',  $request->get('created_by'));
    }

    if ($request->has('assigned_to') && $request->get('assigned_to') !== null) {
        $tickets->where('assigned_to', (int) $request->get('assigned_to'));
    }

    // Paginate the tickets
    $recent_tickets = $tickets->paginate(25);
        $parentSection  = '';

        return view('pages.dashboard.home.index',
            compact(
                'active_users',
                'recent_tickets',
                'priorities','recent_ticket_count',
                'opened_ticket_count','assigned_ticket_count',
                'closed_ticket_count',
                'call_for_ticket_count',
                'all_ticket_total',
                'customer_types',
                'parentSection'
            )
        );
    }

    
}
