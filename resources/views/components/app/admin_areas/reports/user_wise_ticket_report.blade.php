@extends('layouts.app',[
    'parentSection' => 'Reports',
])


@section('title','User Wise Report')

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
                                <form action="{{route('reports.user_wise_ticket_report')}}" method="GET">
                                    <div class="row tw-bg-gray-300 tw-rounded-lg mb-3 tw-p-2">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Select Assigned User by Branch</label>
                                                <select class="form-control form-control-sm" id="branch" style="width: 100%;">
                                                    <option value="0" selected="" disabled="">Select Branch</option>
                                                    @foreach($branches as $branch)
                                                        <option value="{{$branch->id}}">{{$branch->name.' ('.$branch->code.')'}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>&nbsp;</label>
                                                <select class="form-control form-control-sm" name="assigned_user" id="assigned_user" style="width: 100%;">
                                                    <option value="0" selected="" disabled="">Select Assigned User</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
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
                                                <label>Search</label>
                                                <button type="submit" id="btn_search" class="btn btn-sm btn-block tw-bg-blue-500 text-white"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Re-Load</label>
                                                <a href="{{route('reports.user_wise_ticket_report')}}" id="btn_clear_search" class="btn btn-sm btn-block tw-bg-gray-700 text-white"><i class="fa fa-redo"></i></a>
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
                    User Wise Ticket Report
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
                                            <tr class="tw-bg-gray-200 tw-text-gray-800 text-uppercase tw-text-sm tw-leading-normal">
                                                <th class="tw-py-3 tw-px-6 tw-text-left">User</th>
                                                <th class="tw-py-3 tw-px-6 tw-text-center">Total Opened</th>
                                                <th class="tw-py-3 tw-px-6 tw-text-center">Total Closed</th>
                                                <th class="tw-py-3 tw-px-6 tw-text-center">Total Pending</th>
                                            </tr>
                                            </thead>
                                            <tbody class="tw-text-gray-600 tw-text-sm tw-font-light tw-bg-white">
                                            @forelse($search_results as $user => $ticket_count)
                                                <tr class="tw-border-b tw-border-gray-200 hover:tw-bg-gray-100">
                                                    <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap ">
                                                        <div class="tw-flex tw-items-center">
                                                            <span class="tw-font-medium">{{$user}}</span>
                                                        </div>
                                                    </td>
                                                    <td class="tw-py-3 tw-px-6 tw-text-center tw-whitespace-nowrap tw-bg-blue-200 tw-font-medium">
                                                        {{$ticket_count['opened']}}
                                                    </td>
                                                    <td class="tw-py-3 tw-px-6 tw-text-center tw-bg-green-200 tw-font-medium">
                                                        {{$ticket_count['closed']}}
                                                    </td>
                                                    <td class="tw-py-3 tw-px-6 tw-text-center tw-bg-pink-200 tw-font-medium">
                                                        {{$ticket_count['pending']}}
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="9" class="tw-py-3 tw-px-6 tw-text-center">No Data Found Yet</td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                            <tfoot>
                                            <tr class="tw-bg-gray-200 tw-text-gray-600 tw-uppercase tw-text-sm tw-leading-normal">
                                                <th class="tw-py-3 tw-px-6 tw-text-left">User</th>
                                                <th class="tw-py-3 tw-px-6 tw-text-center">Total Opened</th>
                                                <th class="tw-py-3 tw-px-6 tw-text-center">Total Closed</th>
                                                <th class="tw-py-3 tw-px-6 tw-text-center">Total Pending</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tw-shadow-md tw-bg-gray-100">
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

        $('#branch').change(function(){
           let branch_id = $('#branch').val();
            loadBranchUsers(branch_id);
        });


        function loadBranchUsers(branch_id){
            $.ajax({
                type: 'POST',
                url: "{{route('tickets.load_branch_users')}}",
                data: {"_token": "{{ csrf_token() }}", branch_id: branch_id},
                dataType: 'json',
                success: function (data) {
                    $('#assigned_user').empty();
                    // console.log(JSON.stringify(data));
                    $('#assigned_user').append('<option value="' + 0 + '" selected="" disabled="">Select Assigned User</option>');
                    $.each(data, function(i, d) {
                        $('#assigned_user').append('<option value="' + d.id + '">' +d.username+' | '+ d.email + ' ('+ d.user_type.name +') </option>');
                    });
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                    $.alert({
                        title: 'Alert!',
                        type: 'red',
                        content: 'Branch Users Loading Error!',
                    });
                }
            });
        }
    </script>

@endsection
