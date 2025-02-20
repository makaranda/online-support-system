@extends('layouts.system_settings',[
    'parentSection' => 'System Settings',
    'childSection' => 'Modules',
])
@section('styles')

@endsection

@section("title") System Modules @endsection

@section('content')

    <div class="container">
        <div class="tw-bg-white tw-p-6 tw-rounded-lg tw-shadow-lg">
            <h2 class="tw-text-2xl tw-font-bold tw-mb-2 tw-text-blue-600 tw-float-left">System Modules</h2>

            <a href="{{route("users.index")}}" role="button"
               class="btn btn-sm tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-purple-400 focus:tw-to-pink-500 focus:tw-text-white">
                <i class="fa fa-list"></i>&nbsp;&nbsp;System Users
            </a>

            <hr class="mt-5"/>

            <div class="table-responsive">
                <table class="tw-w-full tw-table-auto">
                    <thead>
                    <tr class="tw-bg-gray-200 tw-text-gray-600 tw-uppercase tw-text-sm tw-leading-normal">
                        <th class="tw-py-3 tw-px-6 tw-text-left">Parent Module</th>
                        <th class="tw-py-3 tw-px-6 tw-text-left">Sub Module</th>
                        <th class="tw-py-3 tw-px-6 tw-text-center">Route Name</th>
                        <th class="tw-py-3 tw-px-6 tw-text-center">Is Navbar Element</th>
                        <th class="tw-py-3 tw-px-6 tw-text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="tw-text-gray-600 tw-text-sm tw-font-light">
                    <tr><td colspan="5">&nbsp;</td></tr>
                    @forelse($module_data as $key => $modules)
                        <tr class="tw-bg-gradient-to-r tw-from-green-400 tw-to-blue-500 tw-h-10">
                            <th colspan="5" class="text-center font-weight-bold tw-text-white">{{$key}}</th>
                        </tr>
                        @foreach($modules as $module)
                        <tr class="tw-border-b tw-border-gray-200 hover:tw-bg-gray-100">
                            <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">
                                <div class="tw-flex tw-items-center">
                                    <span
                                        class="tw-font-medium">{{$key}}</span>
                                </div>
                            </td>
                            <td class="tw-py-3 tw-px-6 tw-text-left">
                                <div class="tw-flex tw-items-center">
                                    <span class="tw-font-medium">{{$module->sub_module}}</span>
                                </div>
                            </td>
                            <td class="tw-py-3 tw-px-6 tw-text-left">
                                <div class="tw-flex tw-items-center">
                                    <span class="tw-font-medium">{{$module->route_name}}</span>
                                </div>
                            </td>
                            <td class="tw-py-3 tw-px-6 tw-text-center">
                                <span class="{{($module->is_sidebar_element == 1)?'tw-bg-green-200 tw-text-green-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs ':'tw-bg-blue-200 tw-text-blue-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs'}}">
                                    {{$module->is_sidebar_element == 1 ?'Yes':'No'}}</span>
                            </td>
                            <td class="tw-py-3 tw-px-6">
                                @include('layouts.common.delete_form',  [ "form_id"=>"form_delete_permission_".$module->id, "action"=>route("permissions.destroy",$module)])
                                @if(Auth::user()->isGranted('modules.edit'))
                                    <div class="btn-group">
                                        <div class="tw-w-4 tw-transform hover:tw-text-purple-500 hover:tw-scale-110">
                                            <a href="{{route('modules.edit',$module)}}" class="btn btn-sm" title="Edit Module Details">
                                                <i class="fa fa-pen tw-text-yellow-900"></i>
                                            </a>
                                        </div>

                                        @if(Auth::user()->is_super_admin())
                                            @if(Auth::user()->isGranted('permissions.destroy',$module))
                                                @if(count($module->permissions) > 0)
                                                    <div
                                                        class="tw-w-4 tw-transform hover:tw-text-purple-500 hover:tw-scale-110 tw-ml-5">
                                                        <button id="btnDelete" class="btn btn-sm"
                                                                type="submit"
                                                                form="form_delete_permission_{{$module->id}}"
                                                                title="Clear User Module Allocations">
                                                            <i class="fa fa-user-lock tw-text-blue-500"></i>
                                                        </button>
                                                    </div>
                                                @endif
                                            @endif
                                        @endif
                                    </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
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
    </div>

@endsection

@section('scripts')

@endsection
