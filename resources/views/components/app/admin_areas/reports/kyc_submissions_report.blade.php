@extends('layouts.app',[
    'parentSection' => 'Reports',
])


@section('title','KYC Submission Report')

@section('styles')

@endsection

@section('content')
    <div class="container-fluid tw-px-10">
        <main class="tw-h-full tw-overflow-y-auto tw-bg-gray-100 tw-rounded-lg">
            <div class="tw-container tw-px-6 tw-mx-auto tw-grid tw-rounded-lg">
                <h2
                    class="tw-my-6 tw-text-2xl tw-font-semibold tw-text-gray-700 "
                >
                    Search Options
                </h2>
                <div class="row ">
                    <div class="col-sm-12">
                        <div class="card table-responsive tw-rounded-lg">
                            <div class="card-body tw-bg-white">
                                <form action="{{route('reports.kyc_submission_report')}}" method="GET">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label date_range>Date Range</label>
                                                <input type="text" class="form-control form-control-sm"
                                                       name="date_range" id="date_range" autocomplete="off"
                                                       placeholder="Select Date Range"
                                                       value="{{\Illuminate\Support\Facades\Request::has('date_range') && \Illuminate\Support\Facades\Request::get('date_range') !== null ? \Illuminate\Support\Facades\Request::get('date_range'):''}}"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="wacc">W-Account No</label>
                                                <input type="text" class="form-control form-control-sm" name="wacc" id="wacc" autocomplete="off" placeholder="Enter W-Account No"
                                                       value="{{\Illuminate\Support\Facades\Request::has('wacc') && \Illuminate\Support\Facades\Request::get('wacc') !== null ? \Illuminate\Support\Facades\Request::get('wacc'):''}}"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="wacc">Customer Name</label>
                                                <input type="text" class="form-control form-control-sm" name="customer_name" id="customer_name" autocomplete="off" placeholder="Enter Customer Name"
                                                       value="{{\Illuminate\Support\Facades\Request::has('customer_name') && \Illuminate\Support\Facades\Request::get('customer_name') !== null ? \Illuminate\Support\Facades\Request::get('customer_name'):''}}"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <label>Search</label>
                                                <button type="submit" id="btn_search" class="btn btn-sm btn-block tw-bg-blue-500 text-white"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <label>Re-Load</label>
                                                <a href="{{route('reports.kyc_submission_report')}}" id="btn_clear_search" class="btn btn-sm btn-block tw-bg-gray-700 text-white"><i class="fa fa-redo"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br/>
                    </div>
                </div>
            </div>
        </main>

        <br/>
        <main class="tw-h-full tw-overflow-y-auto tw-bg-gray-100 tw-rounded-lg">
            <div class="tw-container tw-px-6 tw-mx-auto tw-grid tw-rounded-lg tw-mt-5 tw-mb-5">
                <h2
                    class="tw-my-6 tw-text-2xl tw-font-semibold tw-text-gray-700 dark:tw-text-gray-200"
                >
                    KYC Form Submission Report
                </h2>

                <br/>
                <div class="row">
                    <div class="tw-container tw-px-6 tw-mx-auto tw-grid tw-rounded-lg tw-mt-5">
                        <div class="row tw-mb-5 ">
                            <div class="tw-overflow-x-auto tw-w-full tw-rounded" >
                                <div class="tw-w-full tw-mb-12 tw-rounded">
                                    <div class="tw-bg-white tw-shadow-md my-6">
                                        <table class="tw-min-w-max tw-w-full tw-table-auto">
                                            <thead>
                                            <tr>
                                                <td colspan="5">
                                                    <div class="col-sm-3 float-right mb-3 mt-3">
                                                        <input type="text" class="form-control form-group-sm float-right" id="search" placeholder="Search Table Data"/>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="tw-bg-gray-200 tw-text-gray-800 text-uppercase tw-text-sm tw-leading-normal">
                                                <th class="tw-py-3 tw-px-6 tw-text-center">@</th>
                                                <th class="tw-py-3 tw-px-6 tw-text-center">W-ACC</th>
                                                <th class="tw-py-3 tw-px-6 tw-text-center">Customer</th>
                                                <th class="tw-py-3 tw-px-6 tw-text-center">Con Type</th>
                                            </tr>
                                            </thead>
                                            <tbody class="tw-text-gray-600 tw-text-sm tw-font-light tw-bg-white" id="tbl_data">
                                            @forelse($kyc_form_subimissions as $kyc_form_submission)
                                                <tr class="tw-border-b tw-border-gray-200 hover:tw-bg-gray-100">
                                                    <td class="tw-py-3 tw-px-6 tw-text-center tw-whitespace-nowrap tw-bg-blue-200 tw-font-medium">
                                                        {{$kyc_form_submission->created_at}}
                                                    </td>
                                                    <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap ">
                                                        <div class="tw-flex tw-items-center">
                                                            <span class="tw-font-medium">{{$kyc_form_submission->waccount}}</span>
                                                        </div>
                                                    </td>

                                                    <td class="tw-py-3 tw-px-6 tw-text-center tw-bg-green-200 tw-font-medium">
                                                        <div class="tw-rounded tw-bg-white tw-p-2">
                                                            <div class="tw-flex tw-items-center">
                                                                    <span class="tw-font-medium"><strong>Name - </strong>{{$kyc_form_submission->customer_name}}</span>
                                                            </div>
                                                            <div class="tw-flex tw-items-center">
                                                                    <span class="tw-font-medium"><strong>City - </strong>{{$kyc_form_submission->city}}</span>
                                                            </div>
                                                            <div class="tw-flex tw-items-center">
                                                                <span class="tw-font-medium">
                                                                    @if($kyc_form_submission->contact_person)<strong>Contact Person - </strong>{{$kyc_form_submission->contact_person.'('.$kyc_form_submission->contact_phone.')'}} @endif
                                                                </span>
                                                            </div>
                                                            <div class="tw-flex tw-items-center">
                                                                <span class="tw-font-medium">
                                                                    @if($kyc_form_submission->email1)<strong>Email - </strong>{{$kyc_form_submission->email1}} @endif
                                                                    @if($kyc_form_submission->email2)<strong> | </strong>{{$kyc_form_submission->email2}} @endif
                                                                </span>
                                                            </div>
                                                            <div class="tw-flex tw-items-center">
                                                                <span class="tw-font-medium">
                                                                    @if($kyc_form_submission->phone1)<strong>Phone - </strong>{{$kyc_form_submission->phone1}} @endif
                                                                    @if($kyc_form_submission->phone2)<strong> | </strong>{{$kyc_form_submission->phone2}} @endif
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap ">
                                                        <div class="tw-flex tw-items-center">
                                                            <span class="tw-font-medium">{{$kyc_form_submission->connection_type}}</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="tw-py-3 tw-px-6 tw-text-center">No Data Found Yet</td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                            <tfoot>
                                            <tr class="tw-bg-gray-200 tw-text-gray-600 tw-uppercase tw-text-sm tw-leading-normal">
                                                <th class="tw-py-3 tw-px-6 tw-text-center">@</th>
                                                <th class="tw-py-3 tw-px-6 tw-text-center">W-ACC</th>
                                                <th class="tw-py-3 tw-px-6 tw-text-center">Customer</th>
                                                <th class="tw-py-3 tw-px-6 tw-text-center">Con Type</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tw-shadow-md tw-bg-gray-100">
                                {!! $kyc_form_subimissions->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <br/>
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

    <script>
        $(document).ready(function (){
            $('#search').keyup(function (){
                if($(this).val()) search_table($(this).val());
            });

            function search_table(value){
                $('#tbl_data tr').each(function (){
                    let found = false;

                    $(this).each(function (){
                        if($(this).text().toLowerCase().indexOf(value.toLowerCase()) > 0){
                            found = true;
                        }
                    });

                    if(found === true){
                        $(this).show();
                    }else{
                        $(this).hide();
                    }

                });
            }
        });

    </script>

@endsection
