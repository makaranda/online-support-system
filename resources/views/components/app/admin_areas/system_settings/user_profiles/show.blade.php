@extends('layouts.system_settings',[
    'parentSection' => 'System Settings',
    'childSection' => 'User Profile',
])
@section('styles')

@endsection

@section("title") User Profile @endsection

@section('content')

    <div class="tw-bg-white tw-p-6 tw-rounded-lg tw-shadow-lg">
        <h2 class="tw-text-2xl tw-font-bold tw-mb-2 tw-text-indigo-600 tw-float-left ">User Details</h2>

        <div class="tw-rounded-lg">
            <div class="container">
                <table class="table tw-min-w-max tw-w-full tw-table-auto">
                    <thead>
                    <tr class="tw-text-sm tw-leading-normal">
                        <td class="tw-uppercase tw-py-3 tw-px-6 tw-text-left">Branch</td>
                        <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">
                            <div class="tw-flex tw-items-left">
                                    <span
                                        class="tw-font-medium">{{$user->branch->name.' ('.$user->branch->code.')'}}</span>
                            </div>
                        </td>
                    </tr>
                    <tr class="tw-text-sm tw-leading-normal">
                        <td class="tw-uppercase tw-py-3 tw-px-6 tw-text-left">Name</td>
                        <td class="tw-py-3 tw-px-6 tw-text-left">
                            <div class="tw-flex tw-items-left">
                                @switch($user->usertype_id)
                                    @case(1)
                                    <div class="tw-mr-2">
                                            <span class="tw-w-10 tw-h-10 tw-rounded-full tw-text-pink-500">
                                                <i class="fa fa-user-secret"></i>
                                                <i class="fa fa-star tw-text-yellow-500 tw-text-sm"></i>
                                            </span>
                                    </div>
                                    {{$user->full_name.' ('.$user->usertype->name.')'}}
                                    @break

                                    @case(2)
                                    <div class="tw-mr-2">
                                            <span class="tw-w-10 tw-h-10 tw-rounded-full tw-text-pink-500">
                                                <i class="fa fa-user-secret"></i>
                                            </span>
                                    </div>
                                    {{$user->full_name.' ('.$user->usertype->name.')'}}
                                    @break

                                    @case(3)
                                    <div class="tw-mr-2">
                                            <span class="tw-w-10 tw-h-10 tw-rounded-full tw-text-blue-600">
                                                <i class="fa fa-user-check"></i>
                                            </span>
                                    </div>
                                    {{$user->full_name.' ('.$user->usertype->name.')'}}
                                    @break

                                    @case(4)
                                    <div class="tw-mr-2">
                                            <span class="tw-w-10 tw-h-10 tw-rounded-full tw-text-yellow-600">
                                                <i class="fa fa-user-cog"></i>
                                            </span>
                                    </div>
                                    {{$user->full_name.' ('.$user->usertype->name.')'}}
                                    @break

                                    @case(5)
                                    <div class="tw-mr-2">
                                            <span class="tw-w-10 tw-h-10 tw-rounded-full tw-text-indigo-600">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                    </div>
                                    {{$user->full_name.' ('.$user->usertype->name.')'}}
                                    @break

                                @endswitch
                            </div>
                        </td>
                    </tr>
                    <tr class="tw-text-sm tw-leading-normal">
                        <td class="tw-uppercase tw-py-3 tw-px-6 tw-text-left">Cell Phone No</td>
                        <td class="tw-py-3 tw-px-6 tw-text-left">{{$user->cell_phone}}</td>
                    </tr>
                    <tr class="tw-text-sm tw-leading-normal">
                        <td class="tw-uppercase tw-py-3 tw-px-6 tw-text-left">Email</td>
                        <td class="tw-py-3 tw-px-6 tw-text-left">{{$user->email}}</td>
                    </tr>
                    <tr class="tw-text-sm tw-leading-normal">
                        <td class="tw-uppercase tw-py-3 tw-px-6 tw-text-left">Access Telephone No</td>
                        <td class="tw-py-3 tw-px-6 tw-text-left">{{$user->access_tpno}}</td>
                    </tr>
                    <tr class="tw-text-sm tw-leading-normal">
                        <td class="tw-uppercase tw-py-3 tw-px-6 tw-text-left">User Alerts</td>
                        <td class="tw-py-3 tw-px-6 tw-text-left">
                            <div class="btn-group">
                                @if($user->user_alert == 1)
                                    <span class="badge badge-pill tw-bg-purple-500 tw-text-white p-2">User Alerts &nbsp;<i class="fa fa-user-check tw-text-white-500"></i></span>
                                @endif

                                @if($user->new_ticket_alert == 1)
                                    <span class="badge badge-pill tw-bg-pink-500 tw-text-white tw-ml-3 p-2">New Ticket Alerts &nbsp;<i class="fa fa-user-check tw-text-white-500"></i></span>
                                @endif

                                @if($user->ticket_response_alert == 1)
                                    <span class="badge badge-pill tw-bg-green-500 tw-text-white tw-ml-3 p-2">Ticket Response Alerts &nbsp;<i class="fa fa-user-check tw-text-white-500"></i></span>
                                @endif
                            </div>
                        </td>
                    </tr>
                    <tr class="  tw-text-sm tw-leading-normal">
                        <td class="tw-uppercase tw-py-3 tw-px-6 tw-text-left">Registered At</td>
                        <td class="tw-py-3 tw-px-6 tw-text-left"><span
                                class="tw-bg-yellow-200 tw-text-yellow-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs">{{date('M j, Y',strtotime($user->registered_at))}}</span>
                        </td>
                    </tr>
                    <tr class="tw-text-sm tw-leading-normal">
                        <td class="tw-uppercase tw-py-3 tw-px-6 tw-text-left">Status</td>
                        <td class="tw-py-3 tw-px-6 tw-text-left">
                                <span
                                    class="{{($user->status == 1)?'tw-bg-green-200 tw-text-green-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs ':'tw-bg-red-200 tw-text-red-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs'}}">
                                    {{$user->get_status($user->status)}}</span>
                        </td>
                    </tr>
                    <tr class="  tw-text-sm tw-leading-normal">
                        <td class="tw-uppercase tw-py-3 tw-px-6 tw-text-left">Last Logged-In At</td>
                        <td class="tw-py-3 tw-px-6 tw-text-left">
                            <span
                                class="{{($user->last_login_at)?'tw-bg-blue-200 tw-text-blue-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs ':'tw-bg-purple-200 tw-text-purple-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs'}}">
                                    {{$user->last_login_at?$user->last_login_at:'No System Login History Found Yet'}}</span>
                        </td>
                    </tr>
                    <tr class="tw-text-sm tw-leading-normal">
                        <td class="tw-uppercase tw-py-3 tw-px-6 tw-text-left">Actions</td>
                        <td class="tw-py-3 tw-px-6 tw-text-left">
                            @include('layouts.common.deactivate_form',  [ "form_id"=>"form_delete_".$user->id, "action"=>route("users.destroy",$user)])
                            <div class="btn-group btn-group-sm btn-group-toggle tw-ml-3">
                                <div class="tw-flex tw-item-left tw-justify-left">
                                    @if(Auth::user()->isGranted('users.edit'))
                                        <div
                                            class="tw-w-4 tw-transform hover:tw-text-purple-500 hover:tw-scale-110">
                                            <a href="{{route('users.edit',$user)}}" class="btn btn-sm"
                                               title="Edit User Details">
                                                <i class="fa fa-pen tw-text-yellow-900"></i>
                                            </a>
                                        </div>
                                    @endif
                                    @if(Auth::user()->is_super_admin() && $user->status != 0 && Auth::user()->id != $user->id)
                                        @if(Auth::user()->isGranted('users.destroy'))
                                            <div
                                                class="tw-w-4 tw-ml-5 tw-transform hover:tw-text-purple-500 hover:tw-scale-110">
                                                <button id="btnDelete" class="btn btn-sm"
                                                        type="submit"
                                                        form="form_delete_{{$user->id}}"
                                                        title="De Activate User">
                                                    <i class="fa fa-user-alt-slash tw-text-red-500"></i>
                                                </button>
                                            </div>
                                        @endif
                                    @endif
                                    @if(Auth::user()->is_super_admin() && Auth::user()->isGranted('permissions.edit'))
                                        <div
                                            class="tw-w-4 tw-ml-5 tw-transform hover:tw-text-purple-500 hover:tw-scale-110">
                                            <a href="{{route('permissions.edit',$user)}}" role="button"
                                               class="btn btn-sm"
                                               title="Edit User Permissions">
                                                <i class="fa fa-lock-open tw-text-indigo-600"></i></a>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection
