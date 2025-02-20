@extends('layouts.app',[
    'parentSection' => 'Tickets',
])


@section('title','All Opened Tickets')

@section('styles')

@endsection

@section('content')
    <div class="container-fluid tw-px-10">
        <main class="tw-h-full tw-overflow-y-auto tw-bg-gray-100 tw-rounded-lg">
            <div class="tw-container tw-px-6 tw-mx-auto tw-grid tw-rounded-lg">
                <div class="row">
                    <div class="col-sm-8">
                        <h2 class="tw-my-6 tw-text-2xl tw-font-semibold tw-text-gray-700 tw-text-left">Quick Links</h2>
                    </div>
                    <div class="col-sm-4">
                        <h5 class="tw-my-6 tw-text-2xl tw-font-semibold tw-text-white tw-text-right "><span class="tw-bg-gradient-to-r tw-from-green-400 tw-to-blue-500 tw-p-2 tw-rounded-full">All Tickets : {{$all_ticket_total}}</span></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="tw-grid tw-gap-6 tw-mb-8 md:tw-grid-cols-2 xl:tw-grid-cols-3">
                            <!-- Card -->
                            <a href="{{route('tickets.create')}}" style="cursor: pointer;text-decoration: none" class="tw-text-white hover:tw-text-green-400">
                                <div class="tw-flex tw-items-center tw-p-2 tw-bg-white tw-rounded-lg tw-shadow-xs ">
                                    <div class="tw-p-3 tw-mr-4 tw-bg-black tw-rounded-full">
                                        <i class="fa fa-clone fa-lg"></i>
                                    </div>
                                    <div>
                                        <p class="tw-mb-2 tw-text-sm tw-font-medium tw-text-gray-600 dark:tw-text-gray-400">Open New Ticket</p>
                                    </div>
                                </div>
                            </a>

                            <a href="{{route('tickets.recent_tickets')}}" style="cursor: pointer;text-decoration: none" class="tw-text-white hover:tw-text-green-400">
                                <div class="tw-flex tw-items-center tw-p-2 tw-bg-white tw-rounded-lg tw-shadow-xs">
                                    <div class="tw-p-3 tw-mr-4 tw-bg-black tw-rounded-full">
                                        <i class="fa fw fa-sticky-note fa-lg "></i>
                                    </div>
                                    <div>
                                        <p class="tw-mb-2 tw-text-sm tw-font-medium tw-text-gray-600 ">
                                            Recent Tickets
                                            <span class="tw-text-white tw-font-bold badge badge-secondary p-1" style="font-size: 15px">{{$recent_ticket_count}}</span>
                                        </p>

                                    </div>
                                </div>
                            </a>

                            <a href="{{route('tickets.opened_tickets')}}" style="cursor: pointer;text-decoration: none" class="tw-text-green-400 hover:tw-text-white">
                                <div class="tw-flex tw-items-center tw-p-2 tw-bg-white tw-rounded-lg tw-shadow-xs">
                                    <div class="tw-p-3 tw-mr-4 tw-bg-black tw-rounded-full">
                                        <i class="fa fw fa-file-alt fa-lg"></i>
                                    </div>
                                    <div>
                                        <p class="tw-mb-2 tw-text-sm tw-font-medium tw-text-gray-600 ">
                                            All Opened Tickets
                                            <span class="tw-text-white tw-font-bold badge badge-secondary p-1" style="font-size: 15px">{{$opened_ticket_count}}</span>
                                        </p>

                                    </div>
                                </div>
                            </a>

                            <a href="{{route('tickets.assigned_tickets')}}" style="cursor: pointer;text-decoration: none" class="tw-text-white hover:tw-text-green-400 ">
                                <div class="tw-flex tw-items-center tw-p-2 tw-bg-white tw-rounded-lg tw-shadow-xs">
                                    <div class="tw-p-3 tw-mr-4 tw-bg-black tw-rounded-full">
                                        <i class="fa fw fa-file-contract fa-lg"></i>
                                    </div>
                                    <div>
                                        <p class="tw-mb-2 tw-text-sm tw-font-medium tw-text-gray-600">
                                            Assigned Ticket
                                            <span class="tw-text-white tw-font-bold badge badge-secondary p-1" style="font-size: 15px">{{$assigned_ticket_count}}</span>
                                        </p>
                                    </div>
                                </div>
                            </a>

                            <a href="{{route('call_open_tickets.index')}}" style="cursor: pointer;text-decoration: none" class="tw-text-white hover:tw-text-green-400">
                                <div class="tw-flex tw-items-center tw-p-2 tw-bg-white tw-rounded-lg tw-shadow-xs">
                                    <div class="tw-p-3 tw-mr-4 tw-bg-black tw-rounded-full">
                                        <i class="fa fw fa-phone-alt fa-lg"></i>
                                    </div>
                                    <div>
                                        <p class="tw-mb-2 tw-text-sm tw-font-medium tw-text-gray-600 ">
                                            Call With Tickets
                                            <span class="tw-text-white tw-font-bold badge badge-secondary p-1" style="font-size: 15px">{{$call_for_ticket_count}}</span>
                                        </p>
                                    </div>
                                </div>
                            </a>

                            <a href="{{route('tickets.closed_tickets')}}" style="cursor: pointer;text-decoration: none" class="tw-text-white hover:tw-text-green-400">
                                <div class="tw-flex tw-items-center tw-p-2 tw-bg-white tw-rounded-lg tw-shadow-xs">
                                    <div class="tw-p-3 tw-mr-4 tw-bg-black tw-rounded-full">
                                        <i class="fa fw fa-check-circle fa-lg"></i>
                                    </div>
                                    <div>
                                        <p class="tw-mb-2 tw-text-sm tw-font-medium tw-text-gray-600 ">
                                            Closed Ticket
                                            <span class="tw-text-white tw-font-bold badge badge-secondary p-1" style="font-size: 15px">{{$closed_ticket_count}}</span>
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
            <div class="tw-container tw-px-6 tw-mx-auto tw-grid tw-rounded-lg">
                <h2
                    class="tw-my-6 tw-text-2xl tw-font-semibold tw-text-gray-700 dark:tw-text-gray-200"
                >
                    All Opened Tickets
                </h2>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card table-responsive tw-rounded-lg">
                            <div class="card-body tw-bg-white">
                                <form action="{{route('tickets.opened_tickets')}}" method="GET">
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
                                                <select class="select2 form-control form-control-sm" name="branch" id="branch" style="width: 100%;">
                                                    <option value="0" selected="" disabled="">Select Branch</option>
                                                    @foreach(\App\Models\Branch::whereStatus(1)->get() as $branch)
                                                        @if(\Illuminate\Support\Facades\Request::has('branch') && \Illuminate\Support\Facades\Request::get('branch') !== null && \Illuminate\Support\Facades\Request::get('branch') == $branch->id)
                                                            <option value="{{$branch->id}}" selected="">{{$branch->name.' ('.$branch->code.')'}}</option>
                                                        @else
                                                            <option value="{{$branch->id}}">{{$branch->name.' ('.$branch->code.')'}}</option>
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
                                                <select class="select2 form-control form-control-sm" name="priority" id="priority" style="width: 100%;">
                                                    <option selected="" disabled="" value="0">Select Priority</option>
                                                    @foreach($priorities as $key => $priority)
                                                        @if(
                                                        \Illuminate\Support\Facades\Request::has('priority')
                                                        && \Illuminate\Support\Facades\Request::get('priority') !== null
                                                        && \Illuminate\Support\Facades\Request::get('priority') === $priority
                                                        )
                                                            <option selected="" value="{{$priority}}">{{$priority}}</option>

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
                                                <select class="select2 form-control form-control-sm" name="created_by" id="created_by" style="width: 100%;">
                                                    <option selected="" disabled="" >Select Created By</option>
                                                    <option value="0" >Created By Public User</option>
                                                    @foreach($active_users as $active_user)
                                                        @if(
                                                        \Illuminate\Support\Facades\Request::has('created_by')
                                                        && \Illuminate\Support\Facades\Request::get('created_by') !== null
                                                        && \Illuminate\Support\Facades\Request::get('created_by') == $active_user->id
                                                        )
                                                            <option selected="" value="{{$active_user->id}}">{{$active_user->username}}</option>

                                                        @else
                                                            <option value="{{$active_user->id}}">{{$active_user->username}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Assigned To</label>
                                                <select class="select2 form-control form-control-sm" name="assigned_to" id="assigned_to" style="width: 100%;">
                                                    <option selected="" disabled="" >Select Assigned To</option>
                                                    <option value="0" >Not Assigned</option>
                                                    @foreach($active_users as $active_user)
                                                        @if(
                                                        \Illuminate\Support\Facades\Request::has('assigned_to')
                                                        && \Illuminate\Support\Facades\Request::get('assigned_to') !== null
                                                        && \Illuminate\Support\Facades\Request::get('assigned_to') == $active_user->id
                                                        )
                                                            <option selected="" value="{{$active_user->id}}">{{$active_user->username}}</option>

                                                        @else
                                                            <option value="{{$active_user->id}}">{{$active_user->username}}</option>
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
                                                <button type="submit" id="btn_search" class="btn btn-sm btn-block tw-bg-blue-500 text-white"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>&nbsp;</label>
                                                <a href="{{route('tickets.opened_tickets')}}" id="btn_search" class="btn btn-sm btn-block tw-bg-blue-500 text-white"><i class="fa fa-undo" title="Re-Load Recent Tickets"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="tw-overflow-x-auto tw-w-full tw-rounded">
                            <div class="tw-w-full tw-mb-12 tw-rounded">
                                <div class="tw-bg-white tw-shadow-md my-6">
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
                                        @forelse($opened_tickets as $ticket)
                                            <?php $lastResponse = \App\Models\Ticket::getLastResponseByTicket($ticket); ?>
                                            <tr class="tw-border-b tw-border-gray-200 hover:tw-bg-gray-100">
                                                <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">
                                                    <div class="tw-flex tw-items-left">
                                                        <span class="tw-font-bold">{{$ticket->no}}</span>
                                                    </div>
                                                    <div class="tw-flex tw-items-left">
                                                        <span class="tw-text-gray-500">{{$ticket->date}}</span>
                                                    </div>
                                                    <div class="tw-flex tw-items-left">
                                                        <span>Created By : {{($ticket->createdBy)?$ticket->createdBy->username:'Public User'}}</span>
                                                    </div>
                                                </td>
                                                <td class="tw-py-3 tw-px-6 tw-text-left">
                                                    <div class="tw-flex tw-items-left">
                                                        <span>{{(strlen($ticket->subject)>50)?substr($ticket->subject,1,50):$ticket->subject}}</span>
                                                    </div>
                                                    <div class="tw-flex tw-items-left">
                                                        @switch($ticket->priority)

                                                            @case('Low')
                                                            Priority : <span
                                                                class="tw-bg-green-200 tw-text-green-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs">{{$ticket->priority}}</span>
                                                            @break

                                                            @case('Normal')
                                                            Priority : <span
                                                                class="tw-bg-blue-200 tw-text-blue-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs">{{$ticket->priority}}</span>
                                                            @break

                                                            @case('High')
                                                            Priority : <span
                                                                class="tw-bg-pink-200 tw-text-pink-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs">{{$ticket->priority}}</span>
                                                            @break

                                                        @endswitch
                                                    </div>
                                                    <div class="tw-flex tw-items-left">
                                                        <span>Assigned To : {{$ticket->assignedTo?$ticket->assignedTo->username:'-'}}</span>
                                                    </div>
                                                </td>
                                                <td class="tw-py-3 tw-px-6 tw-text-left" style="overflow-wrap: anywhere" >
                                                    <div class="tw-flex tw-items-left">
                                                        <span> <strong>Last Resonse :</strong> {{$lastResponse->response}}</span>
                                                    </div>
                                                    <div class="tw-flex tw-items-left">
                                                        <span> <strong>Current Status :</strong> {{$lastResponse->ticketStatus->name}}</span>
                                                    </div>
                                                </td>
                                                <td class="tw-py-3 tw-px-6 tw-text-left">
                                                    <div class="tw-flex tw-items-left">
                                                        <span>{{(strlen($ticket->customer)>30?substr($ticket->customer,1,30).'...':$ticket->customer)}}</span>
                                                    </div>
                                                    <div class="tw-flex tw-items-left">
                                                        <span>W-Account : {{($ticket->wacc)?$ticket->wacc:''}}</span>
                                                    </div>
                                                    <div class="tw-flex tw-items-left">
                                                        @switch($ticket->customer_type)
                                                            @case(1)
                                                            Type : <span
                                                                class="tw-bg-gray-300 tw-text-dark tw-py-1 tw-px-2 tw-rounded-lg tw-text-xs tw-font-bold">Individual / Private</span>
                                                            @break

                                                            @case(2)
                                                            Type : <span
                                                                class="tw-bg-yellow-200 tw-text-yellow-800 tw-py-1 tw-px-2 tw-rounded-lg tw-text-xs tw-font-bold">Small Mediam Enterprise</span>
                                                            @break

                                                            @case(3)
                                                            Type : <span
                                                                class="tw-bg-blue-200 tw-text-blue-800 tw-py-1 tw-px-2 tw-rounded-lg tw-text-xs tw-font-bold">Corporate</span>
                                                            @break

                                                            @case(4)
                                                            Type : <span
                                                                class="tw-bg-indigo-200 tw-text-indigo-700 tw-py-1 tw-px-2 tw-rounded-full tw-text-xs tw-font-bold"> V I P &nbsp;<i class="fa fa-check-circle tw-text-indigo-700"></i></span>
                                                            @break

                                                            @case(5)
                                                            Type : <span
                                                                class="tw-bg-green-200 tw-text-green-700 tw-py-1 tw-px-2 tw-rounded-full tw-text-xs tw-font-bold">V V I P&nbsp;<i class="fa fa-check-circle tw-text-green-700"></i></span>
                                                            @break

                                                            @default
                                                            Type : <span
                                                                class="tw-bg-pink-200 tw-text-pink-700 tw-py-1 tw-px-2 tw-rounded-lg tw-text-xs tw-font-bold">Not Specified &nbsp;<i class="fa fa-d tw-text-white"></i></span>
                                                        @endswitch
                                                    </div>
                                                </td>
                                                <td class="tw-py-3 tw-px-6 tw-text-center">
                                                    <div class="tw-flex tw-item-center tw-justify-center">
                                                        @if(Auth::user()->isGranted('tickets.show'))
                                                            @if(Auth::user()->isGranted('tickets.assigned_tickets'))
                                                                <div
                                                                    class="btn-group btn-group-sm btn-group-toggle tw-ml-3">
                                                                    <div
                                                                        class="tw-flex tw-item-center tw-justify-center">
                                                                        <button type="button"
                                                                                class="btn btn-sm btn-light"
                                                                                title="View Ticket Details"
                                                                                onclick="loadModal({{$ticket->id}})">
                                                                            <i class="fa fa-ticket-alt tw-text-green-500 tw-font-bold"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endif
                                                    </div>

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="tw-py-3 tw-px-6 tw-text-center">Recently Added
                                                    Tickets Not Found Yet
                                                </td>
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
                            @include('components.pagination', ['items' => $opened_tickets])
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    @include('app.admin_areas.tickets.model_views.show')

@endsection

@section('scripts')
    <script>
        $(function() {

            $('input[name="date_range"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            $('input[name="date_range"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            });

            $('input[name="date_range"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });

        });
    </script>

    @include('app.admin_areas.tickets.model_views.popup_modal_scripts')

@endsection
