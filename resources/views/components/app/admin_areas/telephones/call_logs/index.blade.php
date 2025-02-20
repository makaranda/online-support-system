@extends('layouts.app',[
    'parentSection' => 'Telephone',
])


@section('title','Call Logs')

@section('styles')

@endsection

@section('content')
    <div class="container-fluid tw-px-10">
        <main class="tw-h-full tw-overflow-y-auto tw-bg-gray-100 tw-rounded-lg">
            <div class="tw-container tw-px-6 tw-mx-auto tw-grid tw-rounded-lg">
                <h2
                    class="tw-my-6 tw-text-2xl tw-font-semibold tw-text-gray-700 dark:tw-text-gray-200"
                >
                    Call Log History
{{--                    <a href="{{route("emails.create")}}" role="button"--}}
{{--                       class="btn btn-sm tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400 hover:tw-from-blue-400 hover:tw-to-green-400 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">--}}
{{--                        <i class="fa fa-envelope"></i>&nbsp;Send New Email--}}
{{--                    </a>--}}
                </h2>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <label class="card-title">#Tags</label>
                                <div class="col-sm-12">
                                    <div class="btn-group btn-group-sm btn-group-toggle tw-rounded-xl">
                                        <a class="btn btn-sm hover:tw-text-white hover:tw-bg-green-500 {{(\Illuminate\Support\Facades\URL::getRequest()->getQueryString() == null)?'tw-text-xs tw-rounded-xl tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400':'btn btn-sm tw-text-xs tw-bg-gray-200 tw-rounded-xl tw-text-blue-500 hover:tw-text-white'}}" style="font-size:12px;text-decoration: none;" role="button" href="{{route('call_logs.index')}}">
                                            # All Call Logs
                                        </a>
                                        <?php  //dd(\Illuminate\Support\Facades\URL::getRequest()->getQueryString());  ?>
                                        <a id="head_office_call_center_in" class="btn btn-sm hover:tw-text-blue-500 hover:tw-bg-white {{(\Illuminate\Support\Facades\URL::getRequest()->getQueryString() == 'destination=45551')?'tw-text-xs tw-rounded-xl tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400':'tw-text-xs tw-bg-gray-200 tw-rounded-xl tw-text-blue-500'}}" style="font-size:12px;text-decoration: none;" role="button" href="{{route('call_logs.index',['destination'=>'45551'])}}">
                                            # Head Office Call-Center IN
                                        </a>
                                        <a class="btn btn-sm hover:tw-text-blue-500 hover:tw-bg-white {{(\Illuminate\Support\Facades\URL::getRequest()->getQueryString() == 'source=20030')?'tw-text-xs tw-rounded-xl tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400':'tw-text-xs tw-bg-gray-200 tw-rounded-xl tw-text-blue-500'}}" style="font-size:12px;text-decoration: none;" role="button" href="{{route('call_logs.index',['source'=>'20030'])}}">
                                            # Head Office Call-Center OUT
                                        </a>
                                        <a class="btn btn-sm hover:tw-text-blue-500 hover:tw-bg-white {{(\Illuminate\Support\Facades\URL::getRequest()->getQueryString() == 'destination=20035')?'tw-text-xs tw-rounded-xl tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400':'tw-text-xs tw-bg-gray-200 tw-rounded-xl tw-text-blue-500'}}" style="font-size:12px;text-decoration: none;" role="button" href="{{route('call_logs.index',['destination' => '20035'])}}">
                                            # Head Office Reception IN
                                        </a>
                                        <a class="btn btn-sm hover:tw-text-blue-500 hover:tw-bg-white {{(\Illuminate\Support\Facades\URL::getRequest()->getQueryString() == 'source=20035')?'tw-text-xs tw-rounded-xl tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400':'tw-text-xs tw-bg-gray-200 tw-rounded-xl tw-text-blue-500'}}" style="font-size:12px;text-decoration: none;" role="button" href="{{route('call_logs.index',['source' => '20035'])}}">
                                            # Head Office Reception OUT
                                        </a>
                                        <a class="btn btn-sm hover:tw-text-blue-500 hover:tw-bg-white {{(\Illuminate\Support\Facades\URL::getRequest()->getQueryString() == 'destination=20040')?'tw-text-xs tw-rounded-xl tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400':'tw-text-xs tw-bg-gray-200 tw-rounded-xl tw-text-blue-500'}}" style="font-size:12px;text-decoration: none;" role="button" href="{{route('call_logs.index',['destination' => '20040'])}}">
                                            # City Center IN
                                        </a>
                                        <a class="btn btn-sm hover:tw-text-blue-500 hover:tw-bg-white {{(\Illuminate\Support\Facades\URL::getRequest()->getQueryString() == 'source=20040')?'tw-text-xs tw-rounded-xl tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400':'tw-text-xs tw-bg-gray-200 tw-rounded-xl tw-text-blue-500'}}" style="font-size:12px;text-decoration: none;" role="button" href="{{route('call_logs.index',['source' => '20040'])}}">
                                            # City Center OUT
                                        </a>
                                        <a class="btn btn-sm hover:tw-text-blue-500 hover:tw-bg-white {{(\Illuminate\Support\Facades\URL::getRequest()->getQueryString() == 'destination=20042')?'tw-text-xs tw-rounded-xl tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400':'tw-text-xs tw-bg-gray-200 tw-rounded-xl tw-text-blue-500'}}" style="font-size:12px;text-decoration: none;" role="button" href="{{route('call_logs.index',['destination' => '20042'])}}">
                                            # 7-11 IN
                                        </a>
                                        <a class="btn btn-sm hover:tw-text-blue-500 hover:tw-bg-white {{(\Illuminate\Support\Facades\URL::getRequest()->getQueryString() == 'source=20042')?'tw-text-xs tw-rounded-xl tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400':'tw-text-xs tw-bg-gray-200 tw-rounded-xl tw-text-blue-500'}}" style="font-size:12px;text-decoration: none;" role="button" href="{{route('call_logs.index',['source' => '20042'])}}">
                                            # 7-11 OUT
                                        </a>
                                        <a class="btn btn-sm hover:tw-text-blue-500 hover:tw-bg-white {{(\Illuminate\Support\Facades\URL::getRequest()->getQueryString() == 'destination=20044')?'tw-text-xs tw-rounded-xl tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400':'tw-text-xs tw-bg-gray-200 tw-rounded-xl tw-text-blue-500'}}" style="font-size:12px;text-decoration: none;" role="button" href="{{route('call_logs.index',['destination' => '20044'])}}">
                                            # Mzuzu IN
                                        </a>
                                        <a class="btn btn-sm hover:tw-text-blue-500 hover:tw-bg-white {{(\Illuminate\Support\Facades\URL::getRequest()->getQueryString() == 'source=20044')?'tw-text-xs tw-rounded-xl tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400':'tw-text-xs tw-bg-gray-200 tw-rounded-xl tw-text-blue-500'}}" style="font-size:12px;text-decoration: none;" role="button" href="{{route('call_logs.index',['source' => '20044'])}}">
                                            # Mzuzu OUT
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer tw-bg-white">
                                <form action="{{route('call_logs.index')}}" method="GET">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>No</label>
                                                <input type="text" class="form-control form-control-sm"
                                                       name="no" id="no" autocomplete="off"
                                                       placeholder="Enter No"
                                                        value="{{\Illuminate\Support\Facades\Request::has('no') && \Illuminate\Support\Facades\Request::get('no') !== null ? \Illuminate\Support\Facades\Request::get('no'):''}}"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Date Range</label>
                                                <input type="text" class="form-control form-control-sm"
                                                       name="date_range" id="date_range" autocomplete="off"
                                                       placeholder="Select Date Range"
                                                       value="{{\Illuminate\Support\Facades\Request::has('date_range') && \Illuminate\Support\Facades\Request::get('date_range') !== null ? \Illuminate\Support\Facades\Request::get('date_range'):''}}"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Source</label>
                                                <input type="text" class="form-control form-control-sm"
                                                       name="source" id="source" autocomplete="off"
                                                       placeholder="Enter Source"
                                                       value="{{\Illuminate\Support\Facades\Request::has('source') && \Illuminate\Support\Facades\Request::get('source') !== null ? \Illuminate\Support\Facades\Request::get('source'):''}}"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Destination</label>
                                                <input type="text" class="form-control form-control-sm"
                                                       name="destination" id="destination" autocomplete="off"
                                                       placeholder="Enter Destination"
                                                       value="{{\Illuminate\Support\Facades\Request::has('destination') && \Illuminate\Support\Facades\Request::get('destination') !== null ? \Illuminate\Support\Facades\Request::get('destination'):''}}"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <label>Search</label>
                                                <button type="submit" class="btn btn-sm btn-block tw-bg-blue-500 text-white"><i class="fa fa-search"></i></button>
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
                                            <th class="tw-py-3 tw-px-6 tw-text-left">About <span class="tw-text-sm tw-bg-blue-500 tw-text-white tw-rounded-full tw-px-2">{{$call_log_count}}</span> results</th>
                                            <th colspan="7"></th>
                                        </tr>
                                        <tr class="tw-bg-gray-200 tw-text-gray-800 text-uppercase tw-text-sm tw-leading-normal">
{{--                                            <th class="tw-py-3 tw-px-6 tw-text-left">No .</th>--}}
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Call Date</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Source</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Destination</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Duration</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Disposition</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="tw-text-gray-600 tw-text-sm tw-font-light tw-bg-white">
                                        @forelse($call_logs as $call_log)
                                            <tr class="tw-border-b tw-border-gray-200 hover:tw-bg-gray-100">
{{--                                                <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">--}}
{{--                                                    <div class="tw-flex tw-items-left">--}}
{{--                                                        <span class="tw-font-medium">{{$call_log->id}}</span>--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
                                                <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">
                                                    <div class="tw-flex tw-items-left">
                                                        <span class="tw-font-medium">{{$call_log->calldate}}</span>
                                                    </div>
                                                </td>
                                                <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">
                                                    <div class="tw-flex tw-items-left">
                                                        <span class="tw-font-medium">
                                                            @if(strlen($call_log->cnam)>0)
                                                                {{$call_log->cnum}}&nbsp;<small>{{' ('.$call_log->cnam.')' }}</small>
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
                                                            <span class="tw-text-sm tw-bg-green-100 tw-text-green-500 tw-px-2 tw-rounded-full">{{$call_log->disposition}}</span>
                                                            @break

                                                            @case('NO ANSWER')
                                                            <span class="tw-text-sm tw-bg-blue-100 tw-text-blue-500 tw-px-2 tw-rounded-full">{{$call_log->disposition}}</span>
                                                            @break

                                                            @case('FAILED')
                                                            <span class="tw-text-sm tw-bg-pink-100 tw-text-pink-500 tw-px-2 tw-rounded-full">{{$call_log->disposition}}</span>
                                                            @break

                                                            @default
                                                            <span class="tw-text-sm tw-bg-yellow-100 tw-text-yellow-500 tw-px-2 tw-rounded-full">{{$call_log->disposition}}</span>
                                                        @endswitch

                                                    </div>
                                                </td>


                                                <td class="tw-py-3 tw-px-6 tw-text-center">
                                                    <div class="btn-group btn-group-toggle btn-group-sm">
                                                        @php  $ticket_data = \App\Models\CrmCdr::getTicketDataByUniqueId($call_log->uniqueid); @endphp


                                                        @if($ticket_data['count'] == 0)

                                                            <a href="{{route('tickets.create',['uid'=>$call_log->uniqueid])}}" class="btn btn-sm btn-light"
                                                               role="button" title="Open a Ticket">
                                                                <i class="fa fa-ticket-alt tw-text-blue-500 tw-font-bold"></i>
                                                            </a>

                                                        @else
                                                            @if(Auth::user()->isGranted('tickets.show'))
                                                                @if(Auth::user()->isGranted('tickets.assigned_tickets'))
                                                                    @if($ticket_data['ticket_id'] !== null)
                                                                        @php  $ticket = \App\Models\Ticket::whereId($ticket_data['ticket_id'])->first(); @endphp
                                                                        @include('app.admin_areas.tickets.model_views.show')
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        @endif

                                                        <a class="btn btn-sm ml-6 btn-light" role="button" title="Play Audio" href="{{route('tickets.play_call_record',['uniqueid'=> $call_log->uniqueid])}}" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=200'); return false;"><i class="fa fa-play-circle tw-text-yellow-500 tw-font-bold tw-text-black"></i>&nbsp;</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="tw-py-3 tw-px-6 tw-text-center">
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
                            @include('components.pagination', ['items' => $call_logs])
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
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

@endsection
