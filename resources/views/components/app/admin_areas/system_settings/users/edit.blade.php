@extends('layouts.system_settings',[
    'parentSection' => 'System Settings',
    'childSection' => 'Users',
])
@section('styles')

@endsection

@section("title") Edit Users @endsection

@section('content')

    <div class="container">
        <div class="tw-bg-white tw-p-6 tw-rounded-lg tw-shadow-lg">
            <div class="card tw-border-white tw-rounded ">
            <div class="card-header tw-bg-white tw-border">
                <h2 class="tw-text-2xl tw-font-bold tw-mb-2 tw-text-blue-600 tw-float-left">Edit User</h2>
                <a href="{{route("users.index")}}" role="button"
                   class="btn btn-sm tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-purple-400 focus:tw-to-pink-500 focus:tw-text-white">
                    <i class="fa fa-list"></i>&nbsp;System Users
                </a>
            </div>
            <div class="card-body">
                <form action="{{route('users.update',$user)}}" method="POST" id="form_edit" class="form_edit">
                    @csrf
                    @method('PUT')

                    <div class="card tw-mb-5 tw-border-white">
                        <div class="card-header tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400 tw-h-10">
                            <label class="card-title">User Details</label>
                        </div>
                        <div class="card-body">
                            <div class="row" style="width:100%;">
                                <div class="col-sm-6">
                                    <div class="form-group form-group-sm tw-ml-3">
                                        <label class="tw-text-black">Branch</label>
                                        <select class="select2 form-control form-control-sm @error('branch')'is-invalid'@enderror"
                                                name="branch" style="width: 100%;">
                                            <option selected="" disabled="">Select Branch</option>
                                            @foreach($branches as $branch)
                                                @if(old('branch') == $branch->id)
                                                    <option selected=""
                                                            value="{{$branch->id}}">{{$branch->name.' ('.$branch->code.')'}}</option>
                                                @elseif($user->branch_id == $branch->id)
                                                        <option selected=""
                                                                value="{{$branch->id}}">{{$branch->name.' ('.$branch->code.')'}}</option>
                                                @else
                                                    <option
                                                        value="{{$branch->id}}">{{$branch->name.' ('.$branch->code.')'}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <x-invalid_feedback field="branch"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-group-sm tw-ml-3">
                                        <label class="tw-text-black">User Type</label>
                                        <select
                                            class="select2 form-control form-control-sm @error('user_type')'tw-border-red-500'@enderror" style="width: 100%;"
                                            name="user_type">
                                            <option selected="" disabled="">Select User Type</option>
                                            @foreach($usertypes as $usertype)
                                                @if(old('usertype'))
                                                    <option value="{{$usertype->id}}" selected="">{{$usertype->name}}</option>
                                                @elseif($user->usertype_id == $usertype->id)
                                                    <option selected=""
                                                            value="{{$usertype->id}}">{{$usertype->name}}</option>
                                                @else
                                                    <option value="{{$usertype->id}}">{{$usertype->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <x-invalid_feedback field="user_type"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="width:100%;">
                                <div class="col-sm-4">
                                    <div class="form-group form-group-sm tw-ml-3">
                                        <label class="tw-text-black">Full Name</label>
                                        <input type="text"
                                               class="form-control form-control-sm @error('full_name')'tw-border-red-500'@enderror"
                                               name="full_name" placeholder="Enter Full Name" value="{{$user->full_name}}"/>
                                        <x-invalid_feedback field="full_name"/>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-group-sm tw-ml-3">
                                        <label class="tw-text-black">Email</label>
                                        <input type="text"
                                               class="form-control form-control-sm @error('email')'tw-border-red-500'@enderror"
                                               name="email" placeholder="Enter Email Address" value="{{$user->email}}"/>
                                        <x-invalid_feedback field="email"/>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-group-sm tw-ml-3">
                                        <label class="tw-text-black">Cell Phone</label>
                                        <input type="text"
                                               class="form-control form-control-sm @error('cell_phone')'tw-border-red-500'@enderror"
                                               name="cell_phone" placeholder="Enter Cell Phone No" value="{{$user->cell_phone}}"/>
                                        <x-invalid_feedback field="cell_phone"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="width:100%;">
                                <div class="col-sm-4">
                                    <div class="form-group form-group-sm tw-ml-3">
                                        <label class="tw-text-black">Access Telephone No</label>
                                        <input type="text"
                                               class="form-control form-control-sm @error('access_tpno')'tw-border-red-500'@enderror"
                                               name="access_tpno" placeholder="Enter Telephone No" value="{{$user->access_tpno}}"/>
                                        <x-invalid_feedback field="access_tpno"/>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-group-sm tw-ml-3">
                                        <label class="tw-text-black">Extension</label>
                                        <input type="text"
                                               class="form-control form-control-sm @error('extension')'tw-border-red-500'@enderror"
                                               name="extension" placeholder="Enter Email Address" value="{{$user->extension}}"/>
                                        <x-invalid_feedback field="extension"/>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-group-sm tw-ml-3">
                                        <label class="tw-text-black">Username</label>
                                        <input type="text"
                                               class="form-control form-control-sm @error('username')'tw-border-red-500'@enderror"
                                               name="username" placeholder="Enter Username" value="{{$user->username}}"/>
                                        <x-invalid_feedback field="username"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card tw-border-white tw-bg-white">
                        <div class="card-header tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 tw-h-10 tw-rounded-full">
                            <label class="card-title tw-text-white">User Alerts</label>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group form-group-sm tw-ml-3">
                                        <input type="checkbox" class="i-check-flat-green" name="user_alerts" {{$user->user_alert?'checked':''}}/>&nbsp;&nbsp;&nbsp;<span class="tw-text-black">User Alerts</span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-group-sm tw-ml-3">
                                        <input type="checkbox" class="i-check-flat-green" name="new_ticket_alert" {{$user->new_ticket_alert?'checked':''}}/>&nbsp;&nbsp;&nbsp;<span class="tw-text-black">New Ticket</span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-group-sm tw-ml-3">
                                        <input type="checkbox" class="i-check-flat-green" name="ticket_response_alert" {{$user->ticket_response_alert?'checked':''}}/>&nbsp;&nbsp;&nbsp;<span class="tw-text-black">Ticket Response</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="card tw-border-white tw-bg-white">
                        <div class="card-header tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 tw-h-10 tw-rounded-full">
                            <label class="card-title tw-text-white">Add New User Password</label>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-sm tw-ml-3">
                                        <label class="tw-text-black">New Password <span class="text-gray-500">(Leave this empty if you don't want to change)</span></label>
                                        <input type="password"
                                               class="form-control form-control-sm @error('password')'tw-border-red-500'@enderror"
                                               name="password" placeholder="Enter User New Password" />
                                        <x-invalid_feedback field="password"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    @if($user->status == 0)
                        <div class="card tw-border-white tw-bg-white">
                            <div class="card-header tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 tw-h-10 tw-rounded-full">
                                <label class="card-title tw-text-white">User Status</label>
                            </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group form-group-sm tw-ml-3">
                                        <input type="checkbox" class="i-check-flat-green" name="status" {{$user->status == 1?'checked':''}}/>&nbsp;&nbsp;&nbsp;<span class="tw-text-black">Active</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </form>
            </div>
            <div class="card-footer tw-bg-white ">
                <button type="submit" role="button" form="form_edit"
                        class="btn btn-sm tw-mt-3 tw-float-left tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">
                    <i class="fa fa-save"></i>&nbsp;Update
                </button>
            </div>
        </div>
        </div>
    </div>



@endsection

@section('scripts')
    <script>

    </script>
@endsection
