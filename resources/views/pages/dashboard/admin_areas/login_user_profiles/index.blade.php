@extends('layouts.app',[
    'parentSection' => 'System User',
    'childSection' => 'User Profile',
])
@section('styles')

@endsection

@section("title") Logged In User Profile @endsection

@section('content')

{{--    <div class="tw-bg-white tw-p-6 tw-rounded-lg tw-shadow-lg">--}}
{{--        <h2 class="tw-text-2xl tw-font-bold tw-mb-2 tw-text-indigo-600 tw-float-left ">User Details</h2>--}}

{{--        <div class="tw-rounded">--}}
{{--            <div class="container">--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
	{{ $user->usertype_id }}
<div class="container-fluid tw-px-10">
    <main class="tw-h-full tw-overflow-y-auto">
        <div class="tw-bg-white tw-p-6 tw-rounded-lg tw-shadow-lg">
            <div class="card tw-border-white tw-rounded">
                <div class="card-header tw-bg-white">
                    <h2 class="tw-text-2xl tw-font-bold tw-mb-2 tw-text-gray-800 tw-float-left">Your Profile</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="tw-overflow-x-auto tw-w-full tw-rounded">
                                <div class="tw-w-full tw-mb-12 tw-rounded">
                                    <div class="tw-bg-white tw-shadow-md my-6">

                                        <table class="table tw-w-full tw-table-auto">
                                            <thead class="tw-bg-blue-100">
                                            <tr class="tw-border-b tw-border-gray-200 hover:tw-bg-gray-100">
                                                <td class="tw-uppercase tw-py-3 tw-px-6 tw-text-left">Branch</td>
                                                <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">
                                                    <div class="tw-flex tw-items-left">
                                                        <span
                                                            class="tw-font-medium">{{$user->branch->name.' ('.$user->branch->code.')'}}
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="tw-border-b tw-border-gray-200 hover:tw-bg-gray-100">
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
                                            <tr class="tw-border-b tw-border-gray-200 hover:tw-bg-gray-100">
                                                <td class="tw-uppercase tw-py-3 tw-px-6 tw-text-left">Username</td>
                                                <td class="tw-py-3 tw-px-6 tw-text-left">{{$user->username}}</td>
                                            </tr>
                                            <tr class="tw-border-b tw-border-gray-200 hover:tw-bg-gray-100">
                                                <td class="tw-uppercase tw-py-3 tw-px-6 tw-text-left">Cell Phone No</td>
                                                <td class="tw-py-3 tw-px-6 tw-text-left">{{$user->cell_phone}}</td>
                                            </tr>
                                            <tr class="tw-border-b tw-border-gray-200 hover:tw-bg-gray-100">
                                                <td class="tw-uppercase tw-py-3 tw-px-6 tw-text-left">Email</td>
                                                <td class="tw-py-3 tw-px-6 tw-text-left">{{$user->email}}</td>
                                            </tr>
                                            <tr class="tw-border-b tw-border-gray-200 hover:tw-bg-gray-100">
                                                <td class="tw-uppercase tw-py-3 tw-px-6 tw-text-left">Access Telephone No</td>
                                                <td class="tw-py-3 tw-px-6 tw-text-left">{{$user->access_tpno}}</td>
                                            </tr>
                                            <tr class="tw-border-b tw-border-gray-200 hover:tw-bg-gray-100">
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
                                            <tr class="tw-border-b tw-border-gray-200 hover:tw-bg-gray-100">
                                                <td class="tw-uppercase tw-py-3 tw-px-6 tw-text-left">Registered At</td>
                                                <td class="tw-py-3 tw-px-6 tw-text-left"><span
                                                        class="tw-bg-yellow-200 tw-text-yellow-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs">{{date('M j, Y',strtotime($user->registered_at))}}</span>
                                                </td>
                                            </tr>
                                            <tr class="tw-border-b tw-border-gray-200 hover:tw-bg-gray-100">
                                                <td class="tw-uppercase tw-py-3 tw-px-6 tw-text-left">Status</td>
                                                <td class="tw-py-3 tw-px-6 tw-text-left">
                                                <span
                                                    class="{{($user->status == 1)?'tw-bg-green-200 tw-text-green-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs ':'tw-bg-red-200 tw-text-red-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs'}}">
                                                    {{$user->get_status($user->status)}}
                                                </span>
                                                </td>
                                            </tr>
                                            <tr class="tw-border-b tw-border-gray-200 hover:tw-bg-gray-100">
                                                <td class="tw-uppercase tw-py-3 tw-px-6 tw-text-left">Last Logged-In At</td>
                                                <td class="tw-py-3 tw-px-6 tw-text-left">
                                                <span
                                                    class="{{($user->last_login_at)?'tw-bg-blue-200 tw-text-blue-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs ':'tw-bg-purple-200 tw-text-purple-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs'}}">
                                                    {{$user->last_login_at?$user->last_login_at:'No System Login History Found Yet'}}
                                                </span>
                                                </td>
                                            </tr>
                                            <tr class="tw-border-b tw-border-gray-200 hover:tw-bg-gray-100">
                                                <td class="tw-uppercase tw-py-3 tw-px-6 tw-text-left">Actions</td>
                                                <td class="tw-py-3 tw-px-6 tw-text-left">
                                                    @include('layouts.common.deactivate_form',  [ "form_id"=>"form_delete_".$user->id, "action"=>route("users.destroy",$user)])
                                                    <div class="btn-group btn-group-sm btn-group-toggle tw-ml-3">
                                                        <div class="tw-flex tw-item-left tw-justify-left">
                                                            @if(auth()->check())
                                                                <div
                                                                    class="tw-w-4 tw-transform hover:tw-text-purple-500 hover:tw-scale-110">
                                                                    <a class="btn btn-sm"
                                                                       title="Edit User Details" data-toggle="modal"
                                                                       data-target="#edit_modal">
                                                                        <i class="fa fa-pen tw-text-yellow-900"></i>
                                                                    </a>
                                                                </div>

                                                                <div class="modal fade tw-rounded-lg" id="edit_modal" role="dialog">
                                                                    <div class="modal-dialog">

                                                                        <!-- Modal content-->
                                                                        <div class="modal-content">
                                                                            <div class="modal-header tw-bg-gradient-to-r tw-from-green-400 tw-to-blue-500 tw-text-white">
                                                                                <h4 class="modal-title text-white"><span class="fa fa-user-cog tw-text-white"></span>&nbsp;
                                                                                    Edit Personal Data
                                                                                </h4>
                                                                                <i class="fa fa-times-circle tw-text-white close" type="button" data-dismiss="modal"></i>
                                                                            </div>

                                                                            <div class="modal-body">
                                                                                <form class="form_edit" id="edit_form" action="{{route('login_user_profiles.update',$user)}}" method="POST">
                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group form-group-sm">
                                                                                            <label class="tw-float-left">Full Name</label>
                                                                                            <input type="text" value="{{$user->full_name}}" name="full_name" required="" class="form-control form-control-sm" placeholder="Enter Full Name"/>
                                                                                        </div>
                                                                                        <div class="form-group form-group-sm">
                                                                                            <label class="tw-float-left">Username</label>
                                                                                            <input type="text" value="{{$user->username}}" name="username" required="" class="form-control form-control-sm" placeholder="Enter Username"/>
                                                                                        </div>
                                                                                        <div class="form-group form-group-sm">
                                                                                            <label class="tw-float-left">Cell Phone</label>
                                                                                            <input type="text" value="{{$user->cell_phone}}" required="" name="cell_phone" class="form-control form-control-sm" placeholder="Enter Cell Phone No"/>
                                                                                        </div>
                                                                                        <div class="form-group form-group-sm">
                                                                                            <label class="tw-float-left">Email</label>
                                                                                            <input type="text" name="email" value="{{$user->email}}" required="" class="form-control form-control-sm" placeholder="Enter Email"/>
                                                                                        </div>
                                                                                        <div class="form-group form-group-sm">
                                                                                            <label class="tw-float-left">Access Telephone NO</label>
                                                                                            <input type="text" name="access_tpno" value="{{$user->access_tpno}}" class="form-control form-control-sm" placeholder="Enter Access TP No"/>
                                                                                        </div>
                                                                                    </div>

                                                                                </form>
                                                                            </div>
                                                                            <div class="card-footer">
                                                                                <button type="submit" role="button" form="edit_form"
                                                                                        class="btn btn-sm tw-mt-3 tw-float-left tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">
                                                                                    <i class="fa fa-save"></i>&nbsp;Save
                                                                                </button>
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if(auth()->check())
                                                                <div class="tw-w-4 tw-ml-5 tw-transform hover:tw-text-purple-500 hover:tw-scale-110">
                                                                    <a href="" role="button"
                                                                       class="btn btn-sm" data-toggle="modal"
                                                                       data-target="#password_modal"
                                                                       title="Edit User Password">
                                                                        <i class="fa fa-key tw-text-indigo-600"></i></a>
                                                                    </a>
                                                                </div>
                                                                    <div class="modal fade  tw-rounded-lg" id="password_modal" role="dialog">
                                                                        <div class="modal-dialog">

                                                                            <!-- Modal content-->
                                                                            <div class="modal-content">
                                                                                <div class="modal-header tw-bg-gradient-to-r tw-from-green-400 tw-to-blue-500 tw-text-white">
                                                                                    <h4 class="modal-title text-white"><span class="fa fa-user-shield tw-text-white"></span>&nbsp;
                                                                                        Change Your Password
                                                                                    </h4>
                                                                                    <i class="fa fa-times-circle tw-text-white close" type="button" data-dismiss="modal"></i>
                                                                                </div>

                                                                                <div class="modal-body">
                                                                                    <form class="form_edit" id="password_form" action="{{route('login_user_profiles.update_user_password')}}" method="POST">
                                                                                        @csrf
                                                                                        <div class="col-sm-12">
                                                                                            <div class="form-group form-group-sm">
                                                                                                <label class="tw-float-left">Current Password</label>
                                                                                                <input type="password" name="current_password" required="" class="form-control form-control-sm" placeholder="Enter Current Password"/>
                                                                                            </div>
                                                                                            <div class="form-group form-group-sm">
                                                                                                <label class="tw-float-left">New Password</label>
                                                                                                <input type="password" name="new_password" required="" class="form-control form-control-sm" placeholder="Enter New Password"/>
                                                                                            </div>
                                                                                            <div class="form-group form-group-sm">
                                                                                                <label class="tw-float-left">Confirm Password</label>
                                                                                                <input type="password"  name="new_confirm_password" required="" class="form-control form-control-sm" placeholder="Enter Password Again to Confirm"/>
                                                                                            </div>
                                                                                        </div>

                                                                                    </form>
                                                                                </div>
                                                                                <div class="card-footer">
                                                                                    <button type="submit" role="button" form="password_form"
                                                                                            class="btn btn-sm tw-mt-3 tw-float-left tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">
                                                                                        <i class="fa fa-save"></i>&nbsp;Update
                                                                                    </button>
                                                                                </div>

                                                                            </div>

                                                                        </div>
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
                        </div>
                    </div>
                </div>
                <div class="card-footer tw-bg-white ">

                </div>
            </div>
        </div>
    </main>
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
    </style>
@endpush
@push('js')
    <script>

    </script>
@endpush
