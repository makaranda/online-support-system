<div class="tw-w-4 tw-mr-2 tw-transform hover:tw-text-purple-500 hover:tw-scale-110">
    <button type="button" class="btn btn-sm" data-id="{{$activity_log->id}}"
            role="button" data-toggle="modal" title="View Activity Details"
            data-target="#view_modal{{$activity_log->id}}" >
        <i class="fa fa-eye tw-text-blue-500 tw-font-bold"></i>
    </button>
</div>

@section('styles')

@endsection
<!-- Start Model -->

<div class="modal fade tw-rounded-lg" id="view_modal{{$activity_log->id}}" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header tw-bg-gradient-to-r tw-from-green-400 tw-to-blue-500 tw-text-white">
                <h4 class="modal-title text-white"><span class="fa fa-th tw-text-white"></span>&nbsp;
                    Activity Details
                </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <table class="table table-striped table-bordered table-condensed">
                    <tr>
                        <th style="text-align: left;">Date</th>
                        <td style="text-align: left;">{{$activity_log->created_at}}</td>
                    </tr>
                    <tr>
                        <th style="text-align: left;">Activity Done By</th>
                        <td style="text-align: left;">
                            {{($activity_log->user_id !== null)?$activity_log->user->full_name.' ( '.$activity_log->user->email.' )':'Public Users'}}</td>
                    </tr>
                    <tr>
                        <th style="text-align: left;">Related Module</th>
                        <td style="text-align: left;">
                            @php
                                $modules = explode('\\',$activity_log->auditable_type);
                            @endphp
                            @if(count($modules) == 1)
                                <span class="tw-font-medium">{{$modules[0]}}</span>
                            @elseif(count($modules) == 3)
                                <span class="tw-font-medium">{{$modules[2]}}</span>
                            @else
                                <span class="tw-font-medium">$activity_log->user_type</span>
                            @endif
                        </td>
                    </tr>
                    <tr style="text-align: left;">
                        <th>Event Fired</th>
                        <td>
                            @switch($activity_log->event)
                                @case("created")
                                <div class="tw-mr-2">
                                    <span class="tw-w-10 tw-h-10 tw-rounded-full tw-bg-green-200 tw-text-green-700 tw-font-bold tw-px-2 tw-py-1">
                                        {{Str::upper($activity_log->event)}}
                                    </span>
                                </div>
                                @break

                                @case("updated")
                                <div class="tw-mr-2">
                                    <span class="tw-w-10 tw-h-10 tw-rounded-full tw-bg-yellow-400 tw-text-yellow-800 tw-font-bold tw-px-2 tw-py-1">
                                        {{Str::upper($activity_log->event)}}
                                    </span>
                                </div>
                                @break

                                @case("deleted")
                                <div class="tw-mr-2">
                                    <span class="tw-w-10 tw-h-10 tw-rounded-full tw-bg-red-300 tw-text-red-700 tw-font-bold tw-px-2 tw-py-1">
                                        {{Str::upper($activity_log->event)}}
                                    </span>
                                </div>
                                @break

                                @case("Login")
                                <div class="tw-mr-2">
                                    <span class="tw-w-10 tw-h-10 tw-rounded-full tw-bg-blue-400 tw-text-blue-700 tw-font-bold tw-px-2 tw-py-1">
                                       {{Str::upper($activity_log->event)}}
                                    </span>
                                </div>
                                @break

                                @case("Logged Out")
                                <div class="tw-mr-">
                                    <span class="tw-w-10 tw-h-10 tw-rounded-full tw-bg-purple-400 tw-text-purple-700 tw-font-bold tw-px-2 tw-py-1">
                                        LOGOUT
                                    </span>
                                </div>
                                @break

                                @default
                                <div class="tw-mr-2">
                                    <span class="tw-w-10 tw-h-10 tw-rounded-full tw-bg-gray-500 tw-text-gray-800 tw-font-bold tw-px-2 tw-py-1">
                                        {{Str::upper($activity_log->event)}}
                                    </span>
                                </div>
                                @break

                            @endswitch
                        </td>
                    </tr>
                    <tr style="text-align: left;">
                        <th>Old Values</th>
                        <td>
                            @php
                                $old_data = json_decode($activity_log->old_values);
                            @endphp
                            @foreach ($old_data as $key => $data)
                                <li>{{$key.' -> '.$data}}</li>
                            @endforeach
                        </td>
                    </tr>
                    <tr style="text-align: left;">
                        <th>New Values</th>
                        <td>
                            @php
                                $new_data = json_decode($activity_log->new_values);
                            @endphp
                            @foreach ($new_data as $key => $data)
                                <li>{{$key.' -> '.$data}}</li>
                            @endforeach
                        </td>
                    </tr>
                    <tr style="text-align: left;">
                        <th>IP Address</th>
                        <td>{{$activity_log->ip_address}}</td>
                    </tr>
                    <tr style="text-align: left;">
                        <th>Request URL</th>
                        <td>{{$activity_log->url}}</td>
                    </tr>
                </table>
            </div>
            <div class="card-footer">&nbsp;</div>

        </div>

    </div>
</div>

@section('scripts')

@endsection
