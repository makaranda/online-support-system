@extends('layouts.app',[
    'parentSection' => 'Information',
    'childSection' => 'Package Information',
])
@section('styles')

@endsection

@section("title") Package Information @endsection
@section('content')
    <div class="container-fluid tw-px-10">
        <main class="tw-h-full tw-overflow-y-auto tw-bg-gray-100 tw-rounded-lg">
            <div class="tw-container tw-px-6 tw-mx-auto tw-grid tw-rounded-lg">
                <h2
                    class="tw-my-6 tw-text-2xl tw-font-semibold tw-text-gray-700 dark:tw-text-gray-200"
                >
                    Package Information
                    <a href="{{route("package_infos.create")}}" role="button"
                       class="btn btn-sm tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-purple-400 focus:tw-to-pink-500 focus:tw-text-white">
                        <i class="fa fa-plus-circle"></i>&nbsp;Add New Package Information
                    </a>
                </h2>


                <div class="row">
                    <div class="col-sm-12">
                        <div class="tw-overflow-x-auto tw-w-full tw-rounded">
                            <div class="tw-w-full tw-mb-12 tw-rounded">
                                <div class="tw-bg-white tw-shadow-md my-6">
                                    <table class="tw-w-full tw-table-auto">
                                        <thead>
                                        <tr class="tw-bg-gray-200 tw-text-gray-600 tw-uppercase tw-text-sm tw-leading-normal">
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Service</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-center">Status</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-center">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody class="tw-text-gray-600 tw-text-sm tw-font-light">
                                        @forelse($package_infos as $package_info)
                                            <tr class="tw-border-b tw-border-gray-200 hover:tw-bg-gray-100">
                                                <td class="tw-pl-5">{{($package_info->service)?$package_info->service->name:'No Service Found'}}</td>
                                                <td class="tw-py-3 tw-px-6 tw-text-center">
                                                    <span
                                                        class="{{($package_info->status == 1)?'tw-bg-green-200 tw-text-green-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs ':'tw-bg-red-200 tw-text-red-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs'}}">
                                                        {{$package_info->get_status($package_info->status)}}
                                                    </span>
                                                </td>
                                                <td class="tw-py-3 tw-px-6 tw-text-center">
                                                    @include('layouts.common.unavailable_form',  [ "form_id"=>"form_delete_".$package_info->id, "action"=>route("package_infos.destroy",$package_info)])
                                                    <div class="btn-group btn-group-sm btn-group-toggle tw-ml-3">
                                                        <div class="tw-flex tw-item-center tw-justify-center">

                                                            @if(Auth::user()->isGranted('package_infos.show'))
                                                                <div class="btn-group btn-group-sm btn-group-toggle tw-ml-3">
                                                                    <div class="tw-flex tw-item-center tw-justify-center">
                                                                        @include('app.admin_areas.information.package_infos.show')
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if(Auth::user()->isGranted('package_infos.edit'))
                                                                @if(Auth::user()->isGranted('package_infos.update'))
                                                                    <div class="btn-group btn-group-sm btn-group-toggle tw-ml-3">
                                                                        <div class="tw-flex tw-item-center tw-justify-center">
                                                                            <div class="tw-w-4 tw-mr-2 tw-transform hover:tw-text-purple-500 hover:tw-scale-110">
                                                                                <a href="{{route('package_infos.edit',$package_info)}}" class="btn btn-sm" role="button" title="Edit Email Configs">
                                                                                    <i class="fa fa-pen tw-text-yellow-900 tw-font-bold"></i>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endif

                                                            <div
                                                                class="tw-w-4 tw-ml-3 tw-mr-5 tw-transform hover:tw-text-purple-500 hover:tw-scale-110">
                                                                @if(Auth::user()->isGranted('package_infos.destroy'))
                                                                    @if($package_info->status == 1)
                                                                        <button id="btnDelete" class="btn btn-sm"
                                                                                type="submit"
                                                                                form="form_delete_{{$package_info->id}}"
                                                                                title="De Activate User">
                                                                            <i class="fa fa-times-circle tw-text-red-500"></i>
                                                                        </button>
                                                                    @endif
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="tw-py-3 tw-px-6 tw-text-center tw-bg-purple-200 tw-text-purple-600" colspan="3">
                                                    No Date Found Yet !!!
                                                </td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                        <tfoot>
                                        <tr class="tw-bg-gray-200 tw-text-gray-600 tw-uppercase tw-text-sm tw-leading-normal">
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Service</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-center">Status</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-center">Actions</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tw-shadow-md tw-bg-gray-100">
                            {{$package_infos->links()}}
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
@endsection





