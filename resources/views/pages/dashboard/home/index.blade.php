@extends('layouts.app')
@section('title','Dashboard')
@section('content')

<div class="container-fluid tw-px-10">
    <main class="tw-h-full tw-overflow-y-auto tw-bg-gray-100 tw-rounded-lg">
        <div class="tw-container tw-px-6 tw-mx-auto tw-grid tw-rounded-lg">
            <div class="row">
                <div class="col-sm-8">
                    <h2 class="tw-my-6 tw-text-2xl tw-font-semibold tw-text-gray-700 tw-text-left">Quick Links</h2>
                </div>
                <div class="col-sm-4">
                    <h5 class="tw-my-6 tw-text-2xl tw-font-semibold tw-text-white tw-text-right "><span
                            class="tw-bg-gradient-to-r tw-from-green-400 tw-to-blue-500 tw-p-2 tw-rounded-full">All Tickets : {{$all_ticket_total}}</span>
                    </h5>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="tw-grid tw-gap-6 tw-mb-8 md:tw-grid-cols-2 xl:tw-grid-cols-3">
                        <!-- Card -->
                        {{-- {{route('tickets.create')}} --}}
                        <a href="" style="cursor: pointer;text-decoration: none"
                           class="tw-text-white hover:tw-text-green-400">
                            <div class="tw-flex tw-items-center tw-p-2 tw-bg-white tw-rounded-lg tw-shadow-xs ">
                                <div class="tw-p-3 tw-mr-4 tw-bg-black tw-rounded-full">
                                    <i class="fa fa-clone fa-lg"></i>
                                </div>
                                <div>
                                    <p class="tw-mb-2 tw-text-sm tw-font-medium tw-text-gray-600 dark:tw-text-gray-400">
                                        Open New Ticket</p>
                                </div>
                            </div>
                        </a>
                        {{-- {{route('tickets.recent_tickets')}} --}}
                        <a href=""
                           style="cursor: pointer;text-decoration: none"
                           class="tw-text-white hover:tw-text-green-400 ">
                            <div class="tw-flex tw-items-center tw-p-2 tw-bg-white tw-rounded-lg tw-shadow-xs">
                                <div class="tw-p-3 tw-mr-4 tw-bg-black tw-rounded-full">
                                    <i class="fa fw fa-sticky-note fa-lg"></i>
                                </div>
                                <div>
                                    <p class="tw-mb-2 tw-text-sm tw-font-medium tw-text-gray-600">
                                        Recent Tickets
                                        <span class="tw-text-white tw-font-bold badge badge-secondary p-1"
                                              style="font-size: 15px">{{$recent_ticket_count}}</span>
                                    </p>
                                </div>
                            </div>
                        </a>
                        {{-- {{route('tickets.opened_tickets')}} --}}
                        <a href="" style="cursor: pointer;text-decoration: none"
                           class="tw-text-white hover:tw-text-green-400">
                            <div class="tw-flex tw-items-center tw-p-2 tw-bg-white tw-rounded-lg tw-shadow-xs">
                                <div class="tw-p-3 tw-mr-4 tw-bg-black tw-rounded-full">
                                    <i class="fa fw fa-file-alt fa-lg"></i>
                                </div>
                                <div>
                                    <p class="tw-mb-2 tw-text-sm tw-font-medium tw-text-gray-600 ">
                                        All Opened Tickets
                                        <span class="tw-text-white tw-font-bold badge badge-secondary p-1"
                                              style="font-size: 15px">{{$opened_ticket_count}}</span>
                                    </p>

                                </div>
                            </div>
                        </a>
                        {{-- {{route('tickets.assigned_tickets')}} --}}
                        <a href="" style="cursor: pointer;text-decoration: none"
                           class="tw-text-green-400 hover:tw-text-white">
                            <div class="tw-flex tw-items-center tw-p-2 tw-bg-white tw-rounded-lg tw-shadow-xs">
                                <div class="tw-p-3 tw-mr-4 tw-bg-black tw-rounded-full">
                                    <i class="fa fw fa-file-contract fa-lg"></i>
                                </div>
                                <div>
                                    <p class="tw-mb-2 tw-text-sm tw-font-medium tw-text-gray-600 ">
                                        Assigned Ticket
                                        <span class="tw-text-white tw-font-bold badge badge-secondary p-1"
                                              style="font-size: 15px">{{$assigned_ticket_count}}</span>
                                    </p>

                                </div>
                            </div>
                        </a>
                        {{-- {{route('call_open_tickets.index')}} --}}
                        <a href="" style="cursor: pointer;text-decoration: none"
                           class="tw-text-white hover:tw-text-green-400">
                            <div class="tw-flex tw-items-center tw-p-2 tw-bg-white tw-rounded-lg tw-shadow-xs">
                                <div class="tw-p-3 tw-mr-4 tw-bg-black tw-rounded-full">
                                    <i class="fa fw fa-phone-alt fa-lg"></i>
                                </div>
                                <div>
                                    <p class="tw-mb-2 tw-text-sm tw-font-medium tw-text-gray-600 ">
                                        Call With Tickets
                                        <span class="tw-text-white tw-font-bold badge badge-secondary p-1"
                                              style="font-size: 15px">{{$call_for_ticket_count}}</span>
                                    </p>
                                </div>
                            </div>
                        </a>
                        {{-- {{route('tickets.closed_tickets')}} --}}
                        <a href="" style="cursor: pointer;text-decoration: none"
                           class="tw-text-white hover:tw-text-green-400">
                            <div class="tw-flex tw-items-center tw-p-2 tw-bg-white tw-rounded-lg tw-shadow-xs">
                                <div class="tw-p-3 tw-mr-4 tw-bg-black tw-rounded-full">
                                    <i class="fa fw fa-check-circle fa-lg"></i>
                                </div>
                                <div>
                                    <p class="tw-mb-2 tw-text-sm tw-font-medium tw-text-gray-600 ">
                                        Closed Ticket
                                        <span class="tw-text-white tw-font-bold badge badge-secondary p-1"
                                              style="font-size: 15px">{{$closed_ticket_count}}</span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <br/>
    <main class="tw-h-full tw-overflow-y-auto tw-bg-gray-100 tw-rounded-lg">
        <div class="tw-container tw-px-6 tw-mx-auto tw-grid tw-rounded-lg tw-mt-5 tw-mb-5">
            <h2
                class="tw-my-2 tw-text-2xl tw-font-semibold tw-text-gray-700 dark:tw-text-gray-200"
            >
                Assigned Tickets
            </h2>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card table-responsive tw-rounded-lg">
                        <div class="card-body tw-bg-white">
                            <form action="{{route('home')}}" method="GET">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Ticket No</label>
                                            <input type="text" class="form-control form-control-sm"
                                                   name="ticket_no" id="ticket_no"
                                                   placeholder="Enter Ticket No"
                                                   value="{{\Illuminate\Support\Facades\Request::has('ticket_no') && \Illuminate\Support\Facades\Request::get('ticket_no') !== null ? \Illuminate\Support\Facades\Request::get('ticket_no'):''}}"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Date Range</label>
                                            <input type="text" class="form-control form-control-sm"
                                                   name="date_range" id="date_range"
                                                   placeholder="Select Date Range" autocomplete="off"
                                                   value="{{\Illuminate\Support\Facades\Request::has('date_range') && \Illuminate\Support\Facades\Request::get('date_range') !== null ? \Illuminate\Support\Facades\Request::get('date_range'):''}}"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Branch</label>
                                            <select class="select2 form-control form-control-sm" name="branch"
                                                    id="branch" style="width: 100%;">
                                                <option value="0" selected="" disabled="">Select Branch</option>
                                                @foreach(\App\Models\Branches::whereStatus(1)->get() as $branch)
                                                    @if(\Illuminate\Support\Facades\Request::has('branch') && \Illuminate\Support\Facades\Request::get('branch') !== null && \Illuminate\Support\Facades\Request::get('branch') == $branch->id)
                                                        <option value="{{$branch->id}}"
                                                                selected="">{{$branch->name.' ('.$branch->code.')'}}</option>
                                                    @else
                                                        <option
                                                            value="{{$branch->id}}">{{$branch->name.' ('.$branch->code.')'}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Customer</label>
                                            <input type="text" class="form-control form-control-sm"
                                                   name="customer" id="customer"
                                                   placeholder="Enter Customer Name"
                                                   value="{{\Illuminate\Support\Facades\Request::has('customer') && \Illuminate\Support\Facades\Request::get('customer') !== null ? \Illuminate\Support\Facades\Request::get('customer'):''}}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Customer Type</label>
                                            <select required="" class="form-control form-control-sm @error('customer_type') tw-border-red-600 @enderror"
                                                    name="customer_type" id="customer_type">
                                                <option selected="" disabled="">Select Customer Type</option>
                                                @foreach($customer_types as $key => $customer_type)
                                                    @if(
                                                    \Illuminate\Support\Facades\Request::has('customer_type')
                                                    && \Illuminate\Support\Facades\Request::get('customer_type') !== null
                                                    && \Illuminate\Support\Facades\Request::get('customer_type') == $key
                                                    )
                                                        <option selected=""
                                                                value="{{$key}}" selected="" >{{$customer_type}}</option>
                                                    @else
                                                        <option
                                                            value="{{$key}}">{{$customer_type}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Priority</label>
                                            <select class="select2 form-control form-control-sm" name="priority"
                                                    style="width: 100%;">
                                                <option selected="" disabled="" value="0">Select Priority</option>
                                                @foreach($priorities as $key => $priority)
                                                    @if(
                                                    \Illuminate\Support\Facades\Request::has('priority')
                                                    && \Illuminate\Support\Facades\Request::get('priority') !== null
                                                    && \Illuminate\Support\Facades\Request::get('priority') === $priority
                                                    )
                                                        <option selected=""
                                                                value="{{$priority}}">{{$priority}}</option>

                                                    @else
                                                        <option value="{{$priority}}">{{$priority}}</option>
                                                    @endif
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Created By</label>
                                            <select class="select2 form-control form-control-sm" name="created_by"
                                                    id="created_by" style="width: 100%;">
                                                <option selected="" disabled="">Select Created By</option>
                                                <option value="0">Created By Public User</option>
                                                @foreach($active_users as $active_user)
                                                    @if(
                                                    \Illuminate\Support\Facades\Request::has('created_by')
                                                    && \Illuminate\Support\Facades\Request::get('created_by') !== null
                                                    && \Illuminate\Support\Facades\Request::get('created_by') == $active_user->id
                                                    )
                                                        <option selected=""
                                                                value="{{$active_user->id}}">{{$active_user->username}}</option>

                                                    @else
                                                        <option
                                                            value="{{$active_user->id}}">{{$active_user->username}}</option>
                                                    @endif
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Assigned To</label>
                                            <select class="select2 form-control form-control-sm" name="assigned_to"
                                                    id="assigned_to" style="width: 100%;">
                                                <option selected="" disabled="">Select Assigned To</option>
                                                <option value="0">Not Assigned</option>
                                                @foreach($active_users as $active_user)
                                                    @if(
                                                    \Illuminate\Support\Facades\Request::has('assigned_to')
                                                    && \Illuminate\Support\Facades\Request::get('assigned_to') !== null
                                                    && \Illuminate\Support\Facades\Request::get('assigned_to') === $active_user->id
                                                    )
                                                        <option selected=""
                                                                value="{{$active_user->id}}">{{$active_user->username}}</option>

                                                    @else
                                                        <option
                                                            value="{{$active_user->id}}">{{$active_user->username}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                            <button type="submit" id="btn_search"
                                                    class="btn btn-sm btn-block tw-bg-blue-500 text-white"><i
                                                    class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                            <a href="{{route('home')}}" id="btn_search"
                                               class="btn btn-sm btn-block tw-bg-blue-500 text-white"><i
                                                    class="fa fa-undo" title="Re-Load Recent Tickets"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tw-container tw-px-6 tw-mx-auto tw-grid tw-rounded-lg tw-mt-5 tw-mb-5">

            <div class="row">
                <div class="tw-container tw-px-6 tw-mx-auto tw-grid tw-rounded-lg tw-mt-3">
                    <div class="row tw-mb-5 ">
                        <div class="tw-overflow-x-auto tw-w-full tw-rounded">
                            <div class="tw-w-full tw-mb-12 tw-rounded">
                                <div class="tw-bg-white tw-shadow-md my-6">
                                    {{-- {{ var_dump($recent_tickets) }} --}}
                                    {{-- {{Auth::user()->usertype_id}} --}}
                                    <table class="tw-w-full tw-table-auto table">
                                        <thead>
                                        <tr class="tw-bg-gray-200 tw-text-gray-800 text-uppercase tw-text-sm tw-leading-normal">
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Ticket No & Date</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Subject & Priority</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Last Response</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Customer</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-center">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody class="tw-text-gray-600 tw-text-sm tw-font-light tw-bg-white">
                                            @forelse($recent_tickets as $ticket)
                                            <?php 
                                                // Get the latest response for the ticket
                                                $lastResponse = \App\Models\Tickets::getLastResponseByTicket($ticket); 
                                                $ticketDate = \Carbon\Carbon::parse($ticket->date)->format('d M, Y'); 
                                            ?>
                                            <tr class="tw-border-b tw-border-gray-200 hover:tw-bg-gray-100">
                                                <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">
                                                    <div class="tw-flex tw-items-left">
                                                        <span class="tw-font-bold">{{ $ticket->no }}</span>
                                                    </div>
                                                    <div class="tw-flex tw-items-left">
                                                        <span class="tw-text-gray-500">{{ $ticketDate }}</span>
                                                    </div>
                                                    <div class="tw-flex tw-items-left">
                                                        <span>Created By : {{ $ticket->createdBy ? $ticket->createdBy->username : 'Public User' }}</span>
                                                    </div>
                                                </td>
                                                <td class="tw-py-3 tw-px-6 tw-text-left">
                                                    <div class="tw-flex tw-items-left">
                                                        <span>{{ Str::limit($ticket->subject, 50) }}</span>
                                                    </div>
                                                    <div class="tw-flex tw-items-left">
                                                        @switch($ticket->priority)
                                                            @case('Low')
                                                                Priority : <span class="tw-bg-green-200 tw-text-green-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs">{{ $ticket->priority }}</span>
                                                                @break
                                                            @case('Normal')
                                                                Priority : <span class="tw-bg-blue-200 tw-text-blue-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs">{{ $ticket->priority }}</span>
                                                                @break
                                                            @case('High')
                                                                Priority : <span class="tw-bg-pink-200 tw-text-pink-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs">{{ $ticket->priority }}</span>
                                                                @break
                                                        @endswitch
                                                    </div>
                                                    <div class="tw-flex tw-items-left">
                                                        <span>Assigned To : {{ $ticket->assignedTo ? $ticket->assignedTo->username : 'N/A' }}</span>
                                                    </div>
                                                </td>
                                                <td class="tw-py-3 tw-px-6 tw-text-left" style="overflow-wrap: anywhere">
                                                    <div class="tw-flex tw-items-left">
                                                        <span><strong>Last Response :</strong> {{ $lastResponse ? $lastResponse->response : 'No response yet' }}</span>
                                                    </div>
                                                    <div class="tw-flex tw-items-left">
                                                        <span><strong>Current Status :</strong> {{ $lastResponse && $lastResponse->ticketStatus ? $lastResponse->ticketStatus->name : 'No status available' }}</span>
                                                    </div>
                                                </td>
                                                <td class="tw-py-3 tw-px-6 tw-text-left">
                                                    <div class="tw-flex tw-items-left">
                                                        <span>{{ Str::limit($ticket->customer, 30) }}</span>
                                                    </div>
                                                    <div class="tw-flex tw-items-left">
                                                        <span>W-Account : {{ $ticket->wacc ?? 'N/A' }}</span>
                                                    </div>
                                                    <div class="tw-flex tw-items-left">
                                                        @switch($ticket->customer_type)
                                                            @case(1)
                                                                Type : <span class="tw-bg-gray-300 tw-text-dark tw-py-1 tw-px-2 tw-rounded-lg tw-text-xs tw-font-bold">Individual / Private</span>
                                                                @break
                                                            @case(2)
                                                                Type : <span class="tw-bg-yellow-200 tw-text-yellow-800 tw-py-1 tw-px-2 tw-rounded-lg tw-text-xs tw-font-bold">Small Medium Enterprise</span>
                                                                @break
                                                            @case(3)
                                                                Type : <span class="tw-bg-blue-200 tw-text-blue-800 tw-py-1 tw-px-2 tw-rounded-lg tw-text-xs tw-font-bold">Corporate</span>
                                                                @break
                                                            @case(4)
                                                                Type : <span class="tw-bg-indigo-200 tw-text-indigo-700 tw-py-1 tw-px-2 tw-rounded-full tw-text-xs tw-font-bold">V I P <i class="fa fa-check-circle tw-text-indigo-700"></i></span>
                                                                @break
                                                            @case(5)
                                                                Type : <span class="tw-bg-green-200 tw-text-green-700 tw-py-1 tw-px-2 tw-rounded-full tw-text-xs tw-font-bold">V V I P <i class="fa fa-check-circle tw-text-green-700"></i></span>
                                                                @break
                                                            @default
                                                                Type : <span class="tw-bg-pink-200 tw-text-pink-700 tw-py-1 tw-px-2 tw-rounded-lg tw-text-xs tw-font-bold">Not Specified <i class="fa fa-d tw-text-white"></i></span>
                                                        @endswitch
                                                    </div>
                                                </td>
                                                <td class="tw-py-3 tw-px-6 tw-text-center">
                                                    <div class="tw-flex tw-item-center tw-justify-center">
                                                
                                                                <div class="btn-group btn-group-sm btn-group-toggle tw-ml-3">
                                                                    <div class="tw-flex tw-item-center tw-justify-center">
                                                                        <button type="button" class="btn btn-sm btn-light" title="View Ticket Details" onclick="loadModal({{ $ticket->id }});">
                                                                            <i class="fa fa-ticket-alt tw-text-green-500 tw-font-bold"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                   
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="tw-py-3 tw-px-6 tw-text-center">No tickets found</td>
                                            </tr>
                                        @endforelse
                                        
                                        </tbody>
                                        <tfoot>
                                            <tr class="tw-bg-gray-200 tw-text-gray-600 tw-uppercase tw-text-sm tw-leading-normal">
                                                <th class="tw-py-3 tw-px-6 tw-text-left">Ticket No & Date</th>
                                                <th class="tw-py-3 tw-px-6 tw-text-left">Subject & Priority</th>
                                                <th class="tw-py-3 tw-px-6 tw-text-left">Last Response</th>
                                                <th class="tw-py-3 tw-px-6 tw-text-left">Customer</th>
                                                <th class="tw-py-3 tw-px-6 tw-text-center">Actions</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tw-shadow-md tw-bg-gray-100">
                            {{$recent_tickets->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>


<!-- Ticket Modal Start Here -->
<div class="modal tw-rounded-lg" id="view_modal" role="dialog" data-backdrop="static"
     data-keyboard="false" style="font-size: 11px;">
    <div class="modal-dialog modal-dialog-top modal-xl  table-responsive " style="height: 70%;">
        <!-- Modal content-->
        <div class="modal-content tw-rounded-lg" style="height: 100%;">
            <div class="modal-header tw-bg-gradient-to-r tw-from-green-400 tw-to-blue-500 tw-text-white">
                <h4 class="modal-title text-white"><span class="fa fa-check-double tw-text-white"></span>
                    Ticket Status ( Ticket No - <span id="modal_span_ticket_no"> </span>)
                </h4>
                <div class="btn-group-sm btn-group-toggle">
                    <button type="button" onclick="closeAndReloadPage();" class="btn btn-sm btn-light hover:tw-bg-green-600 hover:tw-text-white" title="Close and Reload whole page"><i class="fa fa-lg fa-undo-alt"></i>&nbsp;Reload</button>
                    <button type="button" onclick="closeModal();" class="btn btn-sm btn-light hover:tw-bg-red-600 hover:tw-text-white" title="Close the Ticket Detail View" data-dismiss="modal"><i class="fa fa-lg fa-times-circle"></i>&nbsp;Close</button>
                </div>
            </div>

            <div class="modal-body tw-bg-gray-200" style="max-height: calc(100% - 120px);overflow-y: scroll;">
                <!-- Big section cards -->
                <h4 class="tw-mb-4 tw-text-lg tw-font-semibold tw-text-gray-600 dark:tw-text-gray-300 text-center">
                    Ticket Details
                </h4>

                <div
                    class="tw-px-4 tw-py-3 tw-mb-8 tw-bg-white tw-rounded-lg tw-shadow-md dark:tw-bg-gray-800 table-responsive">
                    <table class="table table-borderless table-striped" id="modal_tbl_ticket">
                        <tr>
                            <th class="tw-text-left">Branch</th>
                            <td class="tw-text-left"><span id="modal_tbl_tk_branch"></span></td>
                            <th class="tw-text-left">Service Type</th>
                            <td class="tw-text-left"
                                colspan="2"><span id="modal_tbl_tk_type"></span></td>
                        </tr>
                        <tr>
                            <th class="tw-text-left">Customer Name</th>
                            <td class="tw-text-left"><span id="modal_tbl_tk_customer"></span> </td>
                            <th class="tw-text-left">Customer Type</th>
                            <td class="tw-text-left"><span id="modal_tbl_tk_customer_type"></span> </td>
                        </tr>
                        <tr>
                            <th class="tw-text-left">Contact Details</th>
                            <td class="tw-text-left" colspan="3">
                                <span id="modal_tbl_tk_contact_email"></span>
                                <span id="modal_tbl_tk_contact_tel"></span>
                                <span id="modal_tbl_tk_contact_cel"></span>
                                <span id="modal_tbl_tk_send_sms"></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="tw-text-left">Issue Subject</th>
                            <td class="tw-text-left"><span id="modal_tbl_tk_subject"></span></td>
                            <th class="tw-text-left">Priority</th>
                            <td class="tw-text-left">
                                <div id="modal_tbl_tk_priority"></div>
                            </td>
                        </tr>
                        <tr>
                            <th class="tw-text-left">Ticket</th>
                            <td class="tw-text-left" colspan="3">
                                <span id="modal_tbl_tk_assign"></span>
                            </td>
                        </tr>
                    </table>
                    <br/>
                    <h4 class="tw-mb-4 tw-text-lg tw-font-semibold tw-text-gray-600 dark:tw-text-gray-300 text-center">
                        Ticket Response History Details
                    </h4>
                    <div
                        class="tw-px-4 tw-py-3 tw-mb-8 tw-bg-white tw-rounded-lg tw-shadow-md dark:tw-bg-gray-800 table-responsive">
                        <table class="table table-borderless table-striped">
                            <thead>
                            <tr>
                                <th class="tw-text-left">Date</th>
                                <th class="tw-text-left">By</th>
                                <th class="tw-text-left">Status</th>
                                <th class="tw-text-left">Message</th>
                                <th class="tw-text-left">Call Info</th>
                                <th class="tw-text-left">Attachments</th>
                            </tr>
                            </thead>
                            <tbody id="tbl_ticket_response_history_tbl_body"></tbody>
                        </table>
                    </div>
                    <div class="btn-group btn-group-justified tw-w-full tw-bg-white tw-text-black tw-rounded-lg"
                         id="ticket_assign_transfer_reply_section">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <span class="tw-pb-3"></span>
            </div>
        </div>
    </div>
</div>

@endsection

@push('css')
    <style>
        body,* {
            font-family: "Source Sans Pro", sans-serif;
        }
        .gradient {
            background: linear-gradient(90deg, #00c3ff 0%, mediumpurple 50%);
        }
        .h4, h4 {
            font-size: 1.5rem;
        }
    </style>
@endpush

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $(function () {

                $('input[name="date_range"]').daterangepicker({
                    autoUpdateInput: false,
                    locale: {
                        cancelLabel: 'Clear'
                    }
                });

                $('input[name="date_range"]').on('apply.daterangepicker', function (ev, picker) {
                    $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
                });

                $('input[name="date_range"]').on('cancel.daterangepicker', function (ev, picker) {
                    $(this).val('');
                });

                });
        });
        </script>
        <script>
                function loadModal(ticket_id) {
                    console.log('Test');
                    //$('#preloader').show();
                    $.ajax({
                        type: 'GET',
                        url: "{{route('tickets.get_ticket_data')}}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            ticket_id: ticket_id,
                        },
                        dataType: 'json',
                        success: function (data) {


                            if (data.message === 'success') {
                                // Add Ticket No in modal Title
                                $('#modal_span_ticket_no').text(data.no);

                                // Set Service Branch
                                $('#modal_tbl_tk_branch').text(data.service_branch);

                                // Set Service Type
                                $('#modal_tbl_tk_type').text(data.service_type);

                                // Set Customer Name
                                $('#modal_tbl_tk_customer').text(data.customer_name);

                                // Set Customer Type

                                switch (data.customer_type) {
                                    case 1:
                                        let individual = "<span class='tw-bg-gray-300 tw-text-dark tw-py-1 tw-px-2 tw-rounded-lg tw-text-xs tw-font-bold'>Individual / Private</span>";
                                        $('#modal_tbl_tk_customer_type').html(individual);
                                        break;
                                    case 2:
                                        let enterprise = "<span class='tw-bg-yellow-200 tw-text-yellow-800 tw-py-1 tw-px-2 tw-rounded-lg tw-text-xs tw-font-bold'>Small Medium Enterprise</span>";
                                        $('#modal_tbl_tk_customer_type').html(enterprise);
                                        break;
                                    case 3:
                                        let corporate = "<span class='tw-bg-blue-200 tw-text-blue-800 tw-py-1 tw-px-2 tw-rounded-lg tw-text-xs tw-font-bold'>Corporate</span>";
                                        $('#modal_tbl_tk_customer_type').html(corporate);
                                        break;
                                    case 4:
                                        let vip = "<span class='tw-bg-indigo-200 tw-text-indigo-700 tw-py-1 tw-px-2 tw-rounded-full tw-text-xs tw-font-bold'>V I P <i class='fa fa-check-circle tw-text-indigo-700'></i></span>";
                                        $('#modal_tbl_tk_customer_type').html(vip);
                                        break;
                                    case 5:
                                        let vvip = "<span class='tw-bg-green-200 tw-text-green-700 tw-py-1 tw-px-2 tw-rounded-full tw-text-xs tw-font-bold'>V V I P <i class='fa fa-check-circle tw-text-green-700'></i></span>";
                                        $('#modal_tbl_tk_customer_type').html(vvip);
                                        break;
                                    default:
                                        let non_specified = "<span class='tw-bg-pink-200 tw-text-pink-700 tw-py-1 tw-px-2 tw-rounded-lg tw-text-xs'>Non Specified</span>";
                                        $('#modal_tbl_tk_customer_type').html(non_specified);
                                }


                                // Set Customer Email
                                $('#modal_tbl_tk_contact_email').text(data.email);

                                // Add Telephone no
                                if (data.tel) $('#modal_tbl_tk_contact_tel').text(' | Tel : ' + data.tel);

                                // Add SMS Number and button for SMS modal load
                                if (data.cell !== '') {
                                    $('#modal_tbl_tk_contact_cel').text(' | Cell : ' + data.cell);
                                    let btn_sms_modal = "<button data-toggle='modal' data-target='#sms_modal' class='btn btn-sm tw-bg-blue-500 tw-text-white tw-rounded-full' title='Enter SMS Content'><i class='fa fa-lg fa-sms tw-text-white'></i></button>"
                                    $('#modal_tbl_tk_send_sms').html(btn_sms_modal);
                                }

                                // Set Subject
                                $('#modal_tbl_tk_subject').text(data.subject);

                                // Apply Ticket Priority
                                switch (data.priority) {
                                    case 'Low':
                                        let badge_low = "<span class='tw-bg-green-200 tw-text-green-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs'>" + data.priority + "</span>";
                                        $('#modal_tbl_tk_priority').html(badge_low);
                                        break;
                                    case 'Normal':
                                        let badge_normal = "<span class='tw-bg-blue-200 tw-text-blue-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs'>" + data.priority + "</span>";
                                        $('#modal_tbl_tk_priority').html(badge_normal);
                                        break;
                                    case 'High':
                                        let badge_high = "<span class='tw-bg-pink-200 tw-text-pink-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs'>" + data.priority + "</span>";
                                        $('#modal_tbl_tk_priority').html(badge_high);
                                        break;
                                    default:
                                        $('#modal_tbl_tk_priority').text(data.priority);
                                }

                                // Set Ticket Detail in first table ticket section
                                if (data.assigned_to != null)
                                    $('#modal_tbl_tk_assign').html("Assigned To <span class='tw-text-indigo-600 tw-font-bold'>" + data.assigned_to.username + "</span> By <span class='tw-text-green-600 tw-font-bold'>" + data.assigned_by.username + "</span>");
                                else
                                    $('#modal_tbl_tk_assign').html("<span class='tw-bg-pink-100 tw-text-pink-500 tw-py-2 tw-px-2 tw-rounded-full'>Ticket Not Assigned to User Yet</span>");

                                //clear Ticket Response Table Body
                                $('#tbl_ticket_response_history_tbl_body').empty();

                                // Fill Ticket Response Table Body
                                $.each(data.ticket_responses, function (index, value) {
                                    let tr = '<tr>';
                                    tr += '<td>' + value['date'] + '</td>';
                                    tr += '<td>' + value['added_user'] + '</td>';
                                    tr += '<td>' + value['status'] + '</td>';
                                    tr += '<td class="tw-text-left">' + value['response'] + '</td>';

                                    // Alpply Ticket Call Record Infor modal and call record play option
                                    if(value['asteriskid']){

                                        //$('#modal_call_info_tk_no'+value['id']).text(value['ticket_no']);
                                        let play_audio_url = 'tickets/play_call_record/'+value['asteriskid'];
                                        let modal_link = "<a class='btn btn-light btn-sm' title='Other Call Information' data-toggle='modal' data-target='#call_info_modal'><i class='fa fa-info-circle'></i></a>";
                                        // let play_audio_onclick_event = window.open(this.href,'targetWindow','toolbar=no,location=center,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=200'); return false;
                                        let play_audio_link = "<a class='btn btn-light btn-sm' href='"+play_audio_url+"' title='Listen the Call Record' target='_blank' ><i class='fa fa-play-circle'></i></a>";

                                        //Set values in call_record info modal
                                        generateModalDiv(value);

                                        // Add <td> to <tr>
                                        tr += '<td class="tw-text-left">' + modal_link + play_audio_link +'</td>';

                                    }else{
                                        tr +='<td>&nbsp;</td>';
                                    }

                                    tr += '<td class="tw-text-left">';

                                        $.each(value['attachments'], function (key, attachment) {
                                            let title = attachment['file_name'];
                                            title = title.substring(title.lastIndexOf("/") + 1);
                                            title = title.substring(title.indexOf('_') + 1);
                                            tr += '<a class="btn btn-default btn-block tw-bg-gray-300 btn-sm hover:tw-bg-yellow-500 mb-2" title="'+title+'" href="tickets/download_attachment/'+attachment['id']+'"><i class="fa fa-md fa-file-download"></i></a>'
                                        });

                                    tr += '</td></tr>';

                                    $('#tbl_ticket_response_history_tbl_body').append(tr);
                                });
                                console.log(data.last_ticket_response);
                                // Add Assign,Transfer and reply Buttons
                                if (data.last_ticket_response && (data.last_ticket_response.ticket_status_id < 4 || data.last_ticket_response.ticket_status_id === 6 || data.last_ticket_response.ticket_status_id === 7)) 
                                {
                                    let assign_ticket_modal_link = "<a class='btn btn-lg tw-bg-gradient-to-r hover:tw-from-blue-400 hover:tw-to-green-500' data-toggle='modal' data-target='#assign_ticket_modal' onclick='loadAssignTicketModal();'><span class='fa fa-hdd'></span>&nbsp;Assign</a>";
                                    
                                    let transfer_ticket_modal_link = "<a class='btn btn-lg tw-bg-gradient-to-r hover:tw-from-blue-400 hover:tw-to-green-500' data-toggle='modal' data-target='#transfer_ticket_modal' onclick='loadTransferTicketModal();'><span class='fa fa-random'></span>&nbsp;Transfer</a>";
                                    
                                    let reply_ticket_modal_link = "<a class='btn btn-lg tw-bg-gradient-to-r hover:tw-from-blue-400 hover:tw-to-green-500' data-toggle='modal' data-target='#reply_ticket_modal' onclick='loadReplyTicketModal();'><span class='fa fa-reply'></span>&nbsp;Reply</a>";

                                    $('#ticket_assign_transfer_reply_section').html(assign_ticket_modal_link + transfer_ticket_modal_link + reply_ticket_modal_link);
                                } else {
                                    console.warn("No last_ticket_response found or ticket_status_id is missing.");
                                }

                                // Added Re-Open Button if Ticket has Closed
                                if(data.is_closed === 1 && data.last_ticket_response.ticket_status_id === 4){
                                    let reopen_ticket_modal_link ="<a class='btn btn-lg tw-bg-gradient-to-r hover:tw-from-blue-400 hover:tw-to-green-500' data-toggle='modal' data-target='#reopen_ticket_modal' onclick='loadReopenTicketModal();'><span class='fa fa-retweet'></span>&nbsp;Re Open</a>";
                                    $('#ticket_assign_transfer_reply_section').html(reopen_ticket_modal_link);
                                }

                                //Set Default Values for all sub modals
                                $('#assign_tk_modal_ticket_no').text(data.no);
                                $('#reopen_tk_modal_ticket_no').text(data.no);
                                $('#reply_tk_modal_ticket_no').text(data.no);
                                $('#transfer_tk_modal_ticket_no').text(data.no);
                                $('#modal_call_info_tk_no').text(data.no);
                                $('#sms_modal_tk_no').text(data.no);

                                $('#assign_tk_id').val(data.id);
                                $('#reopen_tk_id').val(data.id);
                                $('#reply_tk_id').val(data.id);
                                $('#transfer_tk_id').val(data.id);
                                $('#sms_tk_id').val(data.id);
                                $('#sms_mobile').val(data.cell);

                                $('#transfer_modal_current_branch').text(data.service_branch);

                                //Open Main Modal
                                $('#view_modal').modal('show');

                                setTimeout(function() {
                                    $('#preloader').hide();
                                }, 3000);

                                //console.log(data);
                            } else {
                                let message = 'Ticket Data Loading Error!!!';
                                $.notify("Error:" + message, "error");
                                $('#preloader').hide();
                            }
                        },
                        error: function (xhr) {
                            // console.log(xhr.responseText);
                            let message = 'Ticket Data Loading Error!!!';
                            $.notify("Error:" + message, "error");
                            $('#preloader').hide();
                        }
                    });
                }

                //Open Assign Ticket Modal
                function loadAssignTicketModal(){
                    $('#assign_ticket_modal').modal('show');
                }

                //Open Re-Open Ticket Modal
                function loadReopenTicketModal(){
                    $('#reopen_ticket_modal').modal('show');
                }

                //Open Reply Ticket Modal
                function loadReplyTicketModal(){
                    $('#reply_ticket_modal').modal('show');
                }

                //Open Transfer Ticket Modal
                function loadTransferTicketModal(){
                    $('#transfer_ticket_modal').modal('show');
                }

                // close the ticket detail modal
                function closeModal() {
                    $('#modal_span_ticket_no').empty();
                    $('#modal_tbl_tk_branch').empty();
                    $('#modal_tbl_tk_type').empty();
                    $('#modal_tbl_tk_customer').empty();
                    $('#modal_tbl_tk_customer_type').empty();
                    $('#modal_tbl_tk_contact_email').empty();
                    $('#modal_tbl_tk_contact_tel').empty();
                    $('#modal_tbl_tk_contact_cel').empty();
                    $('#modal_tbl_tk_send_sms').empty();
                    $('#modal_tbl_tk_subject').empty();
                    $('#modal_tbl_tk_priority').empty();
                    $('#modal_tbl_tk_assign').empty();
                    $('#tbl_ticket_response_history_tbl_body').empty();

                    $('#assign_tk_modal_ticket_no').empty();
                    $('#reopen_tk_modal_ticket_no').empty();
                    $('#reply_tk_modal_ticket_no').empty();
                    $('#transfer_tk_modal_ticket_no').empty();

                    $('#assign_tk_id').val('');
                    $('#reopen_tk_id').val('');
                    $('#reply_tk_id').val('');
                    $('#transfer_tk_id').val('');

                    $('#transfer_modal_current_branch').text('')

                    $('#modal_call_info_tk_no').text('');
                    $('#modal_call_info_call').empty()
                    $('#modal_call_info_inquiry_type').empty();
                    $('#modal_call_info_call_type').empty();
                    $('#modal_call_info_line').empty()
                    $('#modal_call_info_call_duration').empty();
                    $('#modal_call_info_call_time').empty();

                    $('#view_modal').hide();
                }

      
    </script>
@endpush
