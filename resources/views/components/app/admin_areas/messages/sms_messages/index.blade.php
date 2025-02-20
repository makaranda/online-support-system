@extends('layouts.app',[
    'parentSection' => 'Messages',
])


@section('title','Message History')

@section('styles')

@endsection

@section('content')
    <div class="container-fluid tw-px-10">
        <main class="tw-h-full tw-overflow-y-auto tw-bg-gray-100 tw-rounded-lg">
            <div class="tw-container tw-px-6 tw-mx-auto tw-grid tw-rounded-lg">
                <h2
                    class="tw-my-6 tw-text-2xl tw-font-semibold tw-text-gray-700 dark:tw-text-gray-200"
                >
                    SMS History
                    <a href="{{route("sms_messages.create")}}" role="button"
                       class="btn btn-sm tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400 hover:tw-from-blue-400 hover:tw-to-green-400 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">
                        <i class="fa fa-envelope"></i>&nbsp;Send New SMS
                    </a>
                </h2>

                <div class="col-sm-12">
                    <div class="tw-container tw-px-6 tw-mx-auto tw-grid tw-rounded-lg tw-mt-5 tw-mb-5">
                        <div class="row">
                            <div class="card table-responsive tw-rounded-lg">
                                <h4 class="tw-mt-3 tw-ml-4 tw-text-xl tw-font-semibold tw-text-gray-700 dark:tw-text-gray-200">
                                    Search Message History
                                </h4>
                                <div class="card-body tw-bg-white">
                                    <form action="{{route('sms_messages.index')}}" method="GET">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <label>Date Range</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                           name="date_range" id="date_range"
                                                           placeholder="Select Date Range" autocomplete="off"
                                                           value="{{\Illuminate\Support\Facades\Request::has('date_range')
                                                            && \Illuminate\Support\Facades\Request::get('date_range') !== null
                                                           ? \Illuminate\Support\Facades\Request::get('date_range')
                                                           :date("m/d/Y", strtotime($from)).' - '.date("m/d/Y", strtotime($to))}}
                                                           "/>
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                    <button type="submit" id="btn_search"
                                                            class="btn btn-sm btn-block tw-bg-blue-500 text-white"><i
                                                            class="fa fa-search"></i></button>
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                    <a href="{{route('sms_messages.index')}}" id="btn_search"
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
                    <div class="col-sm-12">
                        <div class="tw-overflow-x-auto tw-w-full tw-rounded">
                            <div class="tw-w-full tw-mb-12 tw-rounded">
                                <div class="tw-bg-white tw-shadow-md my-6">
                                    <table class="tw-w-full tw-table-auto ">
                                        <thead>

                                        <tr class="tw-bg-gray-400 tw-text-gray-800 text-uppercase tw-text-sm tw-leading-normal">
                                            <th class="tw-py-3 tw-px-6 tw-text-center text-md" colspan="4">Considered Date Period is {{$from.' - '.$to}}</th>
                                        </tr>
                                        <tr class="tw-bg-gray-200 tw-text-gray-800 text-uppercase tw-text-sm tw-leading-normal">
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Date</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Number</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Count</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-center">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody class="tw-text-gray-600 tw-text-sm tw-font-light tw-bg-white">
                                        @php
                                            $count=0;
                                         @endphp
                                        @forelse($sms_data_collection as $sms_data)
                                            <tr class="tw-border-b tw-border-gray-200 hover:tw-bg-gray-100">
                                                <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">
                                                    <div class="tw-flex tw-items-left">
                                                        <span class="tw-font-medium">{{$sms_data->created_at}}</span>
                                                    </div>
                                                </td>
                                                <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">
                                                    <div class="tw-flex tw-items-left">
                                                        <span class="tw-font-medium">{{$sms_data->number}}</span>
                                                    </div>
                                                </td>
                                                <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">
                                                    <div class="tw-flex tw-items-left">
                                                        <span class="tw-font-medium tw-bg-indigo-600 tw-rounded-full tw-px-3 tw-py-1.5 tw-text-white tw-font-bold">
                                                            {{\App\Models\SmsNumber::getSmsCount($sms_data->number,$from,$to)}}
                                                        </span>
                                                    </div>
                                                </td>

                                                <td class="tw-py-3 tw-px-6 tw-text-center">
                                                    <div class="tw-flex tw-item-center tw-justify-center">
                                                        @if(Auth::user()->isGranted('sms_messages.index'))
                                                            <div class="tw-w-4 tw-mr-2 tw-transform hover:tw-text-purple-500 hover:tw-scale-110 focus:tw-text-purple-500">
                                                                <a href="{{route('sms_messages.show',['id'=> $sms_data->number,'from'=> $from,'to'=>$to])}}" class="btn btn-sm"
                                                                   role="button" title="View Emails">
                                                                    <i class="fa fa-eye tw-text-green-500 tw-font-bold"></i>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="tw-py-3 tw-px-6 tw-text-center">Recently Sent
                                                    SMS History Not Found Yet
                                                </td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                        <tfoot>
                                        <tr class="tw-bg-gray-200 tw-text-gray-600 tw-uppercase tw-text-sm tw-leading-normal">
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Date</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Number</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Count</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-center">Actions</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tw-shadow-md tw-bg-gray-100">{{$sms_data_collection->links()}}</div>
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
