@extends('layouts.app',[
    'parentSection' => 'Home',
])


@section('title','Call Logs')

@section('styles')

@endsection

@section('content')
    <div class="container-fluid tw-px-10">

        <main class="tw-h-full tw-overflow-y-auto tw-bg-gray-100 tw-rounded-lg">
            <div class="tw-container tw-px-6 tw-mx-auto tw-grid tw-rounded-lg">
                <h2
                    class="tw-my-6 tw-text-2xl tw-font-semibold tw-text-gray-700 "
                >
                    Quick Links
                </h2>
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

                            <a href="{{route('home')}}" style="cursor: pointer;text-decoration: none" class="tw-text-white hover:tw-text-green-500">
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

                            <a href="{{route('tickets.opened_tickets')}}" style="cursor: pointer;text-decoration: none" class="tw-text-white hover:tw-text-green-400">
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

                            <a href="{{route('call_open_tickets.index')}}" style="cursor: pointer;text-decoration: none" class="tw-text-green-400 hover:tw-text-white">
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
                    Call With Tickets
{{--                                        <a href="{{route("home")}}" role="button"--}}
{{--                                           class="btn btn-sm tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400 hover:tw-from-blue-400 hover:tw-to-green-400 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">--}}
{{--                                            <i class="fa fa-home"></i>&nbsp;Home--}}
{{--                                        </a>--}}
                </h2>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card ">
                            <div class="card-body tw-bg-white tw-rounded-lg">
                                <form action="{{route('call_open_tickets.index')}}" method="GET">
                                    <div class="row">
{{--                                        <div class="col-sm-2">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label>No</label>--}}
{{--                                                <input type="text" class="form-control form-control-sm"--}}
{{--                                                       name="no" id="no"--}}
{{--                                                       placeholder="Enter Ticket No"--}}
{{--                                                       value="{{\Illuminate\Support\Facades\Request::has('no') && \Illuminate\Support\Facades\Request::get('no') !== null ? \Illuminate\Support\Facades\Request::get('no'):''}}"/>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Date Range</label>
                                                <input type="text" class="form-control form-control-sm"
                                                       name="date_range" id="date_range"
                                                       placeholder="Select Date Range"
                                                       autocomplete="off"
                                                       value="{{\Illuminate\Support\Facades\Request::has('date_range') && \Illuminate\Support\Facades\Request::get('date_range') !== null ? \Illuminate\Support\Facades\Request::get('date_range'):''}}"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Source</label>
                                                <input type="text" class="form-control form-control-sm"
                                                       name="source" id="source"
                                                       placeholder="Enter Source"
                                                       value="{{\Illuminate\Support\Facades\Request::has('source') && \Illuminate\Support\Facades\Request::get('source') !== null ? \Illuminate\Support\Facades\Request::get('source'):''}}"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Destination</label>
                                                <input type="text" class="form-control form-control-sm"
                                                       name="destination" id="destination"
                                                       placeholder="Enter Destination"
                                                       value="{{\Illuminate\Support\Facades\Request::has('destination') && \Illuminate\Support\Facades\Request::get('destination') !== null ? \Illuminate\Support\Facades\Request::get('destination'):''}}"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <label>Search</label>
                                                <button type="submit"
                                                        class="btn btn-sm btn-block tw-bg-blue-500 text-white"><i
                                                        class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row tw-mt-4">
                    <div class="col-sm-12">
                        <div class="tw-overflow-x-auto tw-w-full tw-rounded">
                            <div class="tw-w-full tw-mb-12 tw-rounded">
                                <div class="tw-bg-white tw-shadow-md my-6">
                                    <table class="tw-w-full tw-table-auto ">
                                        <thead>
                                        <tr class="tw-bg-blue-200 tw-text-gray-800 text-uppercase tw-text-sm tw-leading-normal">
                                            <th class="tw-py-3 tw-px-6 tw-text-left">About <span
                                                    class="tw-text-sm tw-bg-blue-500 tw-text-white tw-rounded-full tw-px-2">{{$call_log_count}}</span>
                                                results
                                            </th>
                                            <th colspan="7"></th>
                                        </tr>
                                        <tr class="tw-bg-gray-200 tw-text-gray-800 text-uppercase tw-text-sm tw-leading-normal">
{{--                                            <th class="tw-py-3 tw-px-6 tw-text-left">#</th>--}}
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Call Date</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Source</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Destination</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Duration</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Disposition</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="tw-text-gray-600 tw-text-sm tw-font-light tw-bg-white">
                                        @forelse($call_log_with_tickets as $call_log_with_ticket)
                                            @php  $call_log = \App\Models\CrmCdr::whereUniqueid($call_log_with_ticket->asteriskid)->first() @endphp
                                            @if($call_log !== null)
                                                <tr class="tw-border-b tw-border-gray-200 hover:tw-bg-gray-100">
{{--                                                    <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">--}}
{{--                                                        <div class="tw-flex tw-items-left">--}}
{{--                                                            <span class="tw-font-medium">{{$call_log->id}}</span>--}}
{{--                                                        </div>--}}
{{--                                                    </td>--}}
                                                    <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">
                                                        <div class="tw-flex tw-items-left">
                                                            <span class="tw-font-medium">{{$call_log->calldate}}</span>
                                                        </div>
                                                    </td>
                                                    <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">
                                                        <div class="tw-flex tw-items-left">
                                                        <span class="tw-font-medium">
                                                            @if(strlen($call_log->cnam)>0)
                                                                {{$call_log->cnum}}&nbsp;
                                                                <small>{{' ('.$call_log->cnam.')' }}</small>
                                                            @else
                                                                {{$call_log->cnum}}
                                                            @endif
                                                        </span>
                                                        </div>
                                                    </td>
                                                    <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">
                                                        <div class="tw-flex tw-items-left">
                                                            <span class="tw-font-medium">{{$call_log->dst}}</span>
                                                        </div>
                                                    </td>
                                                    <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">
                                                        <div class="tw-flex tw-items-left">
                                                            <span class="tw-font-medium">{{$call_log->duration}}</span>
                                                        </div>
                                                    </td>

                                                    <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">
                                                        <div class="tw-flex tw-items-left">
                                                            @switch($call_log->disposition)
                                                                @case('ANSWERED')
                                                                <span
                                                                    class="tw-text-sm tw-bg-green-100 tw-text-green-500 tw-px-2 tw-rounded-full">{{$call_log->disposition}}</span>
                                                                @break

                                                                @case('NO ANSWER')
                                                                <span
                                                                    class="tw-text-sm tw-bg-blue-100 tw-text-blue-500 tw-px-2 tw-rounded-full">{{$call_log->disposition}}</span>
                                                                @break

                                                                @case('FAILED')
                                                                <span
                                                                    class="tw-text-sm tw-bg-pink-100 tw-text-pink-500 tw-px-2 tw-rounded-full">{{$call_log->disposition}}</span>
                                                                @break

                                                                @default
                                                                <span
                                                                    class="tw-text-sm tw-bg-yellow-100 tw-text-yellow-500 tw-px-2 tw-rounded-full">{{$call_log->disposition}}</span>
                                                            @endswitch

                                                        </div>
                                                    </td>


                                                    <td class="tw-py-3 tw-px-6 tw-text-center">
                                                        <div class="btn-group btn-group-toggle btn-group-sm">
                                                        @php
                                                            $ticket_data = \App\Models\CrmCdr::getTicketDataByUniqueId($call_log->uniqueid);
                                                        @endphp

                                                        @if(Auth::user()->isGranted('tickets.show'))
                                                            @if(Auth::user()->isGranted('tickets.assigned_tickets'))
                                                                @php  $ticket = \App\Models\Ticket::whereId($ticket_data['ticket_id'])->first(); @endphp
                                                                @include('app.admin_areas.tickets.model_views.show')
                                                            @endif
                                                        @endif
                                                        <!--  In most browsers it will not work if it is not written without line breaks, once the variables are setup have everything in one line-->
                                                            <a class="btn btn-sm btn-light ml-6" role="button" title="Play Call Record" href="{{route('tickets.play_call_record',['uniqueid'=> $call_log->uniqueid])}}" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=200'); return false;"><i class="fa fa-play-circle tw-text-yellow-500 tw-font-bold tw-text-black"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @empty
                                            <tr>
                                                <td colspan="6" class="tw-py-3 tw-px-6 tw-text-center">
                                                    Recent Call Log History Not Found
                                                </td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                        <tfoot>
                                        <tr class="tw-bg-gray-200 tw-text-gray-600 tw-uppercase tw-text-sm tw-leading-normal">
{{--                                            <th class="tw-py-3 tw-px-6 tw-text-left">No .</th>--}}
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Call Date</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Source</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Destination</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Duration</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Disposition</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-center">Action</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tw-shadow-md tw-bg-gray-100">
                            @include('components.pagination', ['items' => $call_log_with_tickets])
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
@endsection

@section('scripts')
    <script>
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

    </script>

@endsection
