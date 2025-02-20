@extends('layouts.system_settings',[
    'parentSection' => 'System Settings',
    'childSection' => 'Activity Log',
])
@section('styles')

@endsection

@section("title") Activity Log @endsection
@section('content')
    <div class="tw-bg-white tw-p-6 tw-rounded-lg tw-shadow-lg">
        <h2 class="tw-text-2xl tw-font-bold tw-mb-2 tw-text-blue-600 tw-float-left">User Activity Log</h2>
        <hr class="mt-5"/>
        <div class="tw-bg-white tw-p-6 tw-rounded-lg tw-shadow-lg">
            <form action="{{route('activity_logs.index')}}" method="GET">
                @csrf
                <div class="row">
                    <div class="col-sm-12"><h5 class="tw-text-gray-600 ">Search Activities</h5></div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <input type="text" name="date_range" id="date_range" class="form-control form-control-sm"
                           placeholder="Search By Date Range" autocomplete="off"
                           value="{{\Illuminate\Support\Facades\Request::has('date_range') && \Illuminate\Support\Facades\Request::get('date_range') !== null ? \Illuminate\Support\Facades\Request::get('date_range'):''}}"/>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="ip_address" id="ip_address" class="form-control form-control-sm"
                               placeholder="Search By Ip Address" autocomplete="off"
                               value="{{\Illuminate\Support\Facades\Request::has('ip_address') && \Illuminate\Support\Facades\Request::get('ip_address') !== null ? \Illuminate\Support\Facades\Request::get('ip_address'):''}}"/>
                    </div>
                    <div class="col-sm-2">
                        <select class="form-control form-control-sm" name="event" id="event" autocomplete="off">
                            <option selected="" disabled="" value="0">Search By Event</option>
                            @foreach($events as $key => $event)
                                @if(\Illuminate\Support\Facades\Request::has('event') && \Illuminate\Support\Facades\Request::get('event') === $event )
                                    <option value="{{$event}}" selected="">{{Str::upper($event)}}</option>
                                @else
                                    <option value="{{$event}}">{{Str::upper($event)}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select class="form-control form-control-sm" name="user" id="user" autocomplete="off" style="width: 100%;">
                            <option selected="" disabled="" value="0">Search By User</option>
                            <option value="{{null}}">Public Users</option>
                            @foreach($users as $user)
                                @if(\Illuminate\Support\Facades\Request::has('user') && \Illuminate\Support\Facades\Request::get('user') == $user->id )
                                    <option value="{{$user->id}}" selected="">{{$user->full_name}}</option>
                                @else
                                    <option value="{{$user->id}}">{{$user->full_name}}</option>
                                @endif
                            @endforeach

                        </select>
                    </div>
                    <div class="col-sm-1">
                        <button type="submit" class="btn btn-outline-secondary btn-sm btn-block"><i class="fa fa-search"></i></button>
                    </div>
                    <div class="col-sm-1">
                        <a href="{{route('activity_logs.index')}}" class="btn btn-outline-secondary btn-sm btn-block"><i class="fa fa-undo"></i></a>
                    </div>
                </div>
            </form>
        </div>
        <br/>

        <div class="table-responsive">

            <table class="tw-w-full tw-table-auto" >
                <thead>
                <tr class="tw-bg-gray-200 tw-text-gray-600 tw-uppercase tw-text-sm tw-leading-normal">
                    <th class="tw-py-3 tw-px-6 tw-text-center">Date</th>
                    <th class="tw-py-3 tw-px-6 tw-text-center">User</th>
                    <th class="tw-py-3 tw-px-6 tw-text-left">Module</th>
                    <th class="tw-py-3 tw-px-6 tw-text-center">Event</th>
                    <th class="tw-py-3 tw-px-6 tw-text-center">IP Address</th>
                    <th class="tw-py-3 tw-px-6 tw-text-center">Action</th>
                </tr>
                </thead>
                <tbody class="tw-text-gray-600 tw-text-sm tw-font-light" id="tbl_logs">
                @forelse($activity_logs as $activity_log)
                    <tr class="tw-border-b tw-border-gray-200 hover:tw-bg-gray-100">
                        <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">
                            <div class="tw-flex tw-items-center">
                                <span class="tw-font-medium">{{$activity_log->created_at}}</span>
                            </div>
                        </td>
                        <td class="tw-py-3 tw-px-6 tw-text-center">
                            <div class="tw-flex tw-items-center">
                                <span>{{( $activity_log->user_id !== null )?$activity_log->user->full_name.' ('.$activity_log->user->username.') ':'Public User'}}</span>
                            </div>
                        </td>
                        <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">
                            <div class="tw-flex tw-items-center">
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
                            </div>
                        </td>
                        <td class="tw-py-3 tw-px-6 tw-text-center text-xs">
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
                        <td class="tw-py-3 tw-px-6 tw-text-center">
                            <span>{{$activity_log->ip_address}}</span>
                        </td>
                        <td class="tw-py-3 tw-px-6 tw-text-center">
                            <div class="btn-group btn-group-sm btn-group-toggle tw-ml-3">
                                <div class="btn-group btn-group-sm btn-group-toggle tw-ml-3">
                                    <div class="tw-flex tw-item-center tw-justify-center">
                                        @include('app.admin_areas.system_settings.activity_logs.show')
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="tw-py-3 tw-px-6 tw-text-center tw-bg-purple-200 tw-text-purple-600" colspan="6">
                            No Date Found Yet !!!
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="tw-bg-white tw-p-6 tw-rounded-lg tw-shadow-lg">
        <div class="tw-row-auto">
            {{--            <x-pagination :items="$users"/>--}}
            <div class="row">
                <div class="col-sm-8">
                    {{ $activity_logs->onEachSide(2)->withQueryString()->links() }}
                </div>

                <div class="col-sm-4">
                    Showing {{ $activity_logs->firstItem() }} to {{ $activity_logs->lastItem() }} out
                    of {{ $activity_logs->total() }} results
                </div>
            </div>
        </div>
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
