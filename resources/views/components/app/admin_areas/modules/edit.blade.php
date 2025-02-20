@extends('layouts.system_settings',[
    'parentSection' => 'System Settings',
    'childSection' => 'Modules',
])
@section('styles')

@endsection

@section("title") Edit Module Details @endsection

@section('content')

    <div class="container">
        <div class="tw-bg-white tw-p-6 tw-rounded-lg tw-shadow-lg">
            <div class="card tw-border-white tw-rounded">
            <div class="card-header tw-bg-white">
                <h2 class="tw-text-2xl tw-font-bold tw-mb-2 tw-text-blue-600 tw-float-left">Edit Module Details</h2>
                <a href="{{route("modules.index")}}" role="button"
                   class="btn btn-sm tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-purple-400 focus:tw-to-pink-500 focus:tw-text-white">
                    <i class="fa fa-list"></i>&nbsp;System Modules
                </a>
            </div>
            <div class="card-body">
                <form action="{{route('modules.update',$module)}}" method="POST" id="form_edit" class="form_edit">
                    @csrf
                    @method('PUT')

                    <div class="card tw-mb-5 tw-border-white">
                        <div
                            class="card-header tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400 tw-h-10">
                            <label class="card-title">Module Details</label>
                        </div>
                        <div class="card-body">
                            <div class="row" style="width:100%;">
                                <div class="col-sm-6">
                                    <div class="form-group form-group-sm tw-ml-3">
                                        <label>Parent Module</label>
                                        <input type="text" class="form-control form-control-sm" name="parent_module"
                                               id="parent_module" placeholder="Enter Parent Module Name"
                                               value="{{old('parent_module')?old('parent_module'):$module->parent_module}}"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-group-sm tw-ml-3">
                                        <label>Sub Module</label>
                                        <input type="text" class="form-control" name="sub_module"
                                               id="sub_module" placeholder="Enter Sub Module Name"
                                               value="{{old('sub_module')?old('sub_module'):$module->sub_module}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="width:100%;">
                                <div class="col-sm-6">
                                    <div class="form-group form-group-sm tw-ml-3">
                                        <label>Parent Module Icon
                                            <li class="{{$module->parent_module_icon}}"></li>
                                        </label>
                                        <input type="text" class="form-control" name="parent_module_icon"
                                               id="parent_module_icon" placeholder="Enter Parent Module Icon"
                                               value="{{$module->parent_module_icon}}"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-group-sm tw-ml-3">
                                        <label>Module Route Name</label>
                                        <input type="text" class="form-control" name="route_name"
                                               id="route_name" placeholder="Enter Module Route Name"
                                               value="{{$module->route_name}}" readonly=""/>
                                    </div>
                                </div>
                            </div>
                            @if($is_sidebar_module)
                                <div class="row" style="width:100%;">
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-sm tw-ml-3">
                                            <label class="text-primary">Check if this module Is Sidebar Element??, if
                                                not,
                                                leave
                                                un-check </label>
                                            <br/>
                                            <input type="checkbox" class="i-check-flat-green" name="is_sidebar_element"
                                                   id="is_sidebar_element" {{$module->is_sidebar_element == 1? 'checked':''}}/>&nbsp;Is
                                            Sidebar Element
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="card tw-mb-5 tw-border-white">
                        <div
                            class="card-header tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400 tw-h-10">
                            <label class="card-title">Assign User Module Permissions</label>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <diV class="form-group">

                                        <label>Select User/s</label>
                                        <select name="users[]" id="users" class="select2-multiple form-control form-control-sm"
                                                multiple="" style="width: 100%;">
                                            @foreach($not_assigned_users as $not_assigned_user)
                                                <option
                                                    value="{{$not_assigned_user->id}}">
                                                    {{$not_assigned_user->full_name.' | '.$not_assigned_user->usertype->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </diV>

                                </div>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-header ">
                                            <label class="card-title">Users that Assigned with <span class="tw-bg-blue-200 tw-text-blue-700 tw-rounded-full tw-h-6 tw-p-1.5">{{$module->sub_module}} Module</span> </label>
                                        </div>
                                        <div class="card-body">
                                            @foreach($assigned_users as $assign_user)
                                                <h6><span
                                                        class="badge  tw-text-green-700 tw-bg-green-200 tw-h-6 tw-p-1.5 tw-rounded-full">{{$assign_user->full_name.' | '.$assign_user->usertype->name}}</span>
                                                </h6>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
