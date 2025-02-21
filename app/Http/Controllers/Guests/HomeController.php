<?php

namespace App\Http\Controllers\Guests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\Alerts;
use App\Models\User;
use App\Models\EmailLog;
use App\Models\SysLog;
use App\Models\Branches;
use App\Models\Tickets;
use App\Models\TicketResponse;
use App\Models\Departments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Collection;



class HomeController extends Controller
{
    public function home_page()
    {
        $active_notice = Notice::whereStatus(1)->where('exdate','<',date('Y-m-d'))->first();
        return view('pages.frontend.home.index',compact('active_notice'));
    }
    public function login_page()
    {
        if (auth()->check()) {
            return redirect()->route('home'); 
        }
        return view('pages.frontend.login.index');
    }
    public function open_ticket_page()
    {
        $active_notice = Notice::whereStatus(1)->where('exdate','<',date('Y-m-d'))->first();
        $service_branches = Branches::where('status',1)->get();
        $service_types = Departments::where('status',1)->get();
        return view('pages.frontend.guest_areas.open_ticket',compact('active_notice','service_branches','service_types'));
    }

    public function check_ticket_status(Request $request)
    {
        $ticket = Tickets::where('email',$request->get('email'))->where('no', $request->get('ticket_no'))->with('ticketResponses')->first();
        if($ticket !== null){
            $active_notice = Notice::whereStatus(1)->where('exdate','<',date('Y-m-d'))->first();
            return view('pages.frontend.guest_areas.ticket_status_view', compact('ticket', 'active_notice'));
        }else{
            return back()->with('error_string','Invalid email or ticket no!!!');
        }
    }

    
    public function save_reply_ticket_data(Request $request)
    {
        if ($request->has('reply_message')
            && ($request->get('reply_message') !== '')
            && $request->has('ticket_status')
            && $request->get('ticket_status') !== null) {

            try {
                DB::beginTransaction();
                $ticket = Ticket::findOrFail($request->get('ticket_id'));
                $ticket_response = new TicketResponse();
                $customer_hidden = 0;

                $ticket_response->ticket_id = $request->get('ticket_id');
                $ticket_response->response = $request->get('reply_message');
                $ticket_response->hidden = $customer_hidden;
                $ticket_response->added_user = null;
                $ticket_response->ticket_status_id = $request->get('ticket_status');
                $ticket_response_save_result = $ticket_response->save();

                if ($ticket_response_save_result) {

                    if ($request->get('ticket_status') == 4) {
                        $ticket->is_closed = 1;
                        $ticket->save();
                    }

                    Alert::sendAlert($ticket->no, $request->get('reply_message'), 'Reply', $customer_hidden);
                    $log_msg = 'Ticket No. ' . $ticket->no . ' has a new reply from Web User.';
                    SysLog::insertLog('Web User', 'Reply Ticket', $log_msg, \Request::getClientIp());

                }

                DB::commit();
                return back()->with('success', 'Ticket Reply Successfully Saved!!!');

            } catch
            (\Throwable $exception) {
                DB::rollBack();
                return back()->with('error_string', 'Ticket Reply Insertion Process Failed');
            }
        } else {
            return back()->with('error_string', 'Submitted Data Validation Error');
        }

    }

    private function generateTicketNumber()
    {
        return 'TCK-' . time(); // Example: TCK-1708543200
    }
    
    public function open_ticket_save(Request $openTicketRequest)
    {
        try {
            DB::beginTransaction();

            $check_w_account = Tickets::where('wacc',$openTicketRequest->w_account_no)->where('is_closed',0)->first();
            if($check_w_account){
                $check_ticket_responses = TicketResponse::where('ticket_no',$check_w_account->no)->where('ticket_id',$check_w_account->id)->first();
                if($check_ticket_responses->count() > 0 && $check_ticket_responses->ticket_status_id != 4){
                    return back()->with('error_string', 'You already have an opened ticket, Please reply to the same ticket number #'.$check_w_account->no);
                }
            }

            $branch = Branches::findOrFail($openTicketRequest->service_branch);
            $ticket = new Tickets();
            $ticket->no = $this->generateTicketNumber();
            $ticket->customer = ''.$openTicketRequest->customer_name.'';
            $ticket->wacc = ''.$openTicketRequest->w_account_no.'';
            $ticket->email = ''.$openTicketRequest->email.'';
            $ticket->tel = ''.$openTicketRequest->telephone_no.'';
            $ticket->cell = ''.$openTicketRequest->cell_phone_no.'';
            $ticket->service_branch = $openTicketRequest->service_branch;
            $ticket->service_type = $openTicketRequest->service_type;
            $ticket->subject = ''.$openTicketRequest->subject.'';
            $ticket->priority = ''.$openTicketRequest->priority.'';
            $ticket->source = 'Web';
            $ticket->host = \Request::getClientIp();
            $response = $ticket->save();

            if ($response) {
                $ticket_response = new TicketResponse();
                $ticket_response->ticket_id = $ticket->id;
                $ticket_response->ticket_no = $ticket->no;
                $ticket_response->response = $openTicketRequest->message;
                $ticket_response->hidden = 0;
                $ticket_response->assigned_to = null;
                $ticket_response->ticket_status_id = 1;
                $ticket_response->is_first = 1;

                $ticket_response->save();
                Alerts::sendAlert($ticket->no, $openTicketRequest->message, 'New', 0);

                //Insert a record into tbl_email_log table
                if ($openTicketRequest->has('email') && $openTicketRequest->get('email') !== null){

                    $new_ticket_data                            = new Collection();
                    $new_ticket_data->customer_name             = ''.$ticket->customer.'';
                    $new_ticket_data->message_title             = "A request for support has been created";
                    $new_ticket_data->ticket_no                 = $ticket->no;
                    $new_ticket_data->current_message           = $openTicketRequest->get('message');
                    $new_ticket_data->current_priority          = $openTicketRequest->get('priority');
                    $new_ticket_data->first_ticket_created_at   = ''.$ticket->created_at.'';
                    $new_ticket_data->wacc                      = $ticket->wacc;
                    $new_ticket_data->email                     = str_replace("@", "&#64;", $ticket->email);
                    $new_ticket_data->telephone                 = ''.$ticket->tel.'';
                    $new_ticket_data->cellphone                 = ''.$ticket->cell.'';
                    $new_ticket_data->first_ticket_subject      = ''.$ticket->subject.'';
                    $new_ticket_data->first_ticket_response     = ''.$ticket->ticketResponses()->orderByDesc('id')->first()->response.'';

                    //$new_ticket_body = EmailLog::replaceTags($new_ticket_data);
                    $new_ticket_body = '';
                    if(!empty($ticket->email)){
                        $public_user = User::whereEmail('makarandapathirana@gmail.com')->first();

                        if($public_user){
                            EmailLog::insertLogRecord($ticket->email, null, 'New ticket (' . $ticket->no . ')', $new_ticket_body, 'Single', $public_user->id);
                        }else{
                            $new_public_user = new User();
                            $new_public_user->full_name     = 'Public User';
                            $new_public_user->username      = 'public_user';
                            $new_public_user->email         = 'makarandapathirana@gmail.com';
                            $new_public_user->branch_id     = 1;
                            $new_public_user->usertype_id   = 5;
                            $new_public_user->password      = Hash::make('makaranda123');
                            $new_public_user->save();
                            EmailLog::insertLogRecord($ticket->email, null, 'New ticket (' . $ticket->no . ')', $new_ticket_body, 'Single', $new_public_user->id);
                        }
                    }
                }

                SysLog::insertLog('Web User', 'New Ticket', ' New ticket (Ticket No. ' . $ticket->no . ') successfully added.', \Request::getClientIp());
            }
            DB::commit();
            return redirect()->route('guests.open_ticket')->with('success', 'Your Ticket Successfully Opened!!!');

        } catch (\Throwable $exception) {
            DB::rollBack();
            return back()->with('error_string', 'New Ticket Opening Failed!!! due to ' . $exception->getMessage());

        }
    }
}
