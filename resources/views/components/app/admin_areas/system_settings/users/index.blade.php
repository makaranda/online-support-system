@extends('layouts.system_settings',[
    'parentSection' => 'System Settings',
    'childSection' => 'Users',
])
@section('styles')

@endsection

@section("title") System Users @endsection
@section('content')
    <div class="tw-bg-white tw-p-6 tw-rounded-lg tw-shadow-lg">
        <h2 class="tw-text-2xl tw-font-bold tw-mb-2 tw-text-blue-600 tw-float-left">System Users</h2>
        <a href="{{route("users.create")}}" role="button"
           class="btn btn-sm tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-purple-400 focus:tw-to-pink-500 focus:tw-text-white">
            <i class="fa fa-plus-circle"></i>&nbsp;Add New User
        </a>
        <a href="{{route("user_types.index")}}" role="button"
           class="btn btn-sm tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-purple-400 focus:tw-to-pink-500 focus:tw-text-white tw-mr-1">
            <i class="fa fa-user-shield"></i>&nbsp;User Types
        </a>
        <hr class="mt-5"/>
        <div class="tw-bg-white tw-p-6 tw-rounded-lg tw-shadow-lg">
            <form action="{{route('users.index')}}" method="GET">
                @csrf
                <div class="row">
                    <div class="col-sm-12"><h5 class="tw-text-gray-600 ">Search User/s</h5></div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <input type="text" name="user" id="user" class="form-control form-control-sm" placeholder="Search By Username"/>
                    </div>
                    <div class="col-sm-3">
                        <select class="form-control form-control-sm" name="branch" id="branch">
                            <option selected="" disabled="" value="0">Search By Branch</option>
                            @foreach(\App\Models\Branch::whereStatus(1)->get() as $branch)
                                <option value="{{$branch->id}}">{{$branch->name.'('.$branch->code.')'}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select class="form-control form-control-sm" name="user_type" id="user_type">
                            <option selected="" disabled="" value="0">Search By User Type</option>
                            @foreach(\App\Models\Usertype::whereStatus(1)->get() as $user_type)
                                <option value="{{$user_type->id}}">{{$user_type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-1">
                        <button type="submit" class="btn btn-outline-secondary btn-sm btn-block"><i class="fa fa-search"></i></button>
                    </div>
                    <div class="col-sm-1">
                        <a href="{{route('users.index')}}" class="btn btn-outline-secondary btn-sm btn-block"><i class="fa fa-undo"></i></a>
                    </div>
                </div>
            </form>
        </div>
        <br/>

        <div class="table-responsive">

            <table class="tw-w-full tw-table-auto" >
                <thead>
                <tr>
                    <td colspan="5">
                        <div class="col-sm-3 float-right mb-3">
                            <input type="text" class="form-control form-group-sm float-right" id="search" placeholder="Search Table Data"/>
                        </div>
                    </td>
                </tr>
                <tr class="tw-bg-gray-200 tw-text-gray-600 tw-uppercase tw-text-sm tw-leading-normal">
                    <th class="tw-py-3 tw-px-6 tw-text-left">Branch</th>
                    <th class="tw-py-3 tw-px-6 tw-text-left">Name & Contacts</th>
                    <th class="tw-py-3 tw-px-6 tw-text-center">Status</th>
                    <th class="tw-py-3 tw-px-6 tw-text-center">Actions</th>
                    <th class="tw-py-3 tw-px-6 tw-text-center">Permission</th>
                </tr>
                </thead>
                <tbody class="tw-text-gray-600 tw-text-sm tw-font-light" id="tbl_users">
                @forelse($users as $user)
                    <tr class="tw-border-b tw-border-gray-200 hover:tw-bg-gray-100">
                        <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">
                            <div class="tw-flex tw-items-center">
                                    <span
                                        class="tw-font-medium">{{$user->branch->name.' ('.$user->branch->code.')'}}</span>
                            </div>
                        </td>
                        <td class="tw-py-3 tw-px-6 tw-text-left">
                            <div class="tw-flex tw-items-center">
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
                            <div class="tw-flex tw-items-center">
                                <span>Phone: {{$user->cell_phone}} | Email : {{$user->email}}</span>
                            </div>
                        </td>
                        <td class="tw-py-3 tw-px-6 tw-text-center">
                                <span
                                    class="{{($user->status == 1)?'tw-bg-green-200 tw-text-green-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs ':'tw-bg-red-200 tw-text-red-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs'}}">
                                    {{$user->get_status($user->status)}}</span>
                        </td>
                        <td class="tw-py-3 tw-px-6 tw-text-center">
                            @include('layouts.common.deactivate_form',  [ "form_id"=>"form_delete_".$user->id, "action"=>route("users.destroy",$user)])
                            <div class="btn-group btn-group-sm btn-group-toggle tw-ml-3">
                                <div class="tw-flex tw-item-center tw-justify-center">
                                    @if(Auth::user()->isGranted('users.show'))
                                        <div
                                            class="tw-w-4 tw-transform hover:tw-text-purple-500 hover:tw-scale-110">
                                            <a href="{{route('users.show',$user)}}" class="btn btn-sm"
                                               title="View User Details">
                                                <i class="fa fa-eye tw-text-blue-500"></i>
                                            </a>
                                        </div>
                                    @endif
                                    @if($user->status == 1)
                                        @if(Auth::user()->isGranted('users.edit'))
                                            <div
                                                class="tw-w-4 tw-ml-5 tw-transform hover:tw-text-purple-500 hover:tw-scale-110">
                                                <a href="{{route('users.edit',$user)}}" class="btn btn-sm"
                                                   title="Edit User Details">
                                                    <i class="fa fa-pen tw-text-yellow-900"></i>
                                                </a>
                                            </div>
                                        @endif
                                    @endif
                                    <div
                                        class="tw-w-4 tw-ml-5 tw-mr-5 tw-transform hover:tw-text-purple-500 hover:tw-scale-110">
                                        @if(Auth::user()->is_super_admin() && $user->status == 1 && Auth::user()->id != $user->id)
                                            @if(Auth::user()->isGranted('users.destroy'))
                                                <button id="btnDelete" class="btn btn-sm"
                                                        type="submit"
                                                        form="form_delete_{{$user->id}}"
                                                        title="De Activate User">
                                                    <i class="fa fa-user-alt-slash tw-text-red-500"></i>
                                                </button>
                                            @endif
                                        @endif
                                    </div>
                                    @if($user->status == 1)
                                        @if(Auth::user()->isGranted('user_types.edit'))
                                            <div class="btn-group btn-group-sm btn-group-toggle tw-ml-3">
                                                <div class="tw-flex tw-item-center tw-justify-center">
                                                    @include('app.admin_areas.system_settings.users.departments.create')
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="tw-py-3 tw-px-6 tw-text-center tw-content-center">
                            @if($user->status == 1)
                                @if(Auth::user()->is_super_admin() && Auth::user()->isGranted('permissions.edit'))
                                    <div
                                        class="tw-w-4 tw-mr-2 tw-transform hover:tw-text-purple-500 hover:tw-scale-110">
                                        <a href="{{route('permissions.edit',$user)}}" role="button" class="btn btn-sm"
                                           title="Edit User Permissions">
                                            <i class="fa fa-lock-open tw-text-gray-500"></i></a>
                                        </a>
                                    </div>
                                @endif
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="tw-py-3 tw-px-6 tw-text-center tw-bg-purple-200 tw-text-purple-600" colspan="5">
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
            @include('components.pagination', ['items' => $users])
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function (){
            $('#search').keyup(function (){
                if($(this).val()) search_table($(this).val());
            });

            function search_table(value){
                $('#tbl_users tr').each(function (){
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
