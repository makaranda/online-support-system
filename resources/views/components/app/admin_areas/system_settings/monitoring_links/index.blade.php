@extends('layouts.system_settings',[
    'parentSection' => 'System Settings',
    'childSection' => 'Monitoring Links',
])
@section('styles')

@endsection

@section("title") Monitoring Links @endsection
@section('content')
    <div class="tw-bg-white tw-p-6 tw-rounded-lg tw-shadow-lg">
        <h2 class="tw-text-2xl tw-font-bold tw-mb-2 tw-text-blue-600 tw-float-left">Monitoring Links</h2>

        {{--        <a href="{{route("user_types.create")}}" role="button"--}}
        {{--           class="btn btn-sm tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-purple-400 focus:tw-to-pink-500 focus:tw-text-white">--}}
        {{--            <i class="fa fa-plus-circle"></i>&nbsp;Add New Type--}}
        {{--        </a>--}}
        <a data-toggle="modal" title="Add New Monitoring Link"
           data-target="#create_modal"
           role="button"
           class="btn btn-sm tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-purple-400 focus:tw-to-pink-500 focus:tw-text-white">
            <i class="fa fa-plus-circle"></i>&nbsp;Add New Link
        </a>

        <hr class="mt-5"/>

        <div class="table-responsive">
            <table class="tw-w-full tw-table-auto">
                <thead>
                <tr class="tw-bg-gray-200 tw-text-gray-600 tw-uppercase tw-text-sm tw-leading-normal">
                    <th class="tw-py-3 tw-px-6 tw-text-left">Parent Item</th>
                    <th class="tw-py-3 tw-px-6 tw-text-left">Child Item</th>
                    <th class="tw-py-3 tw-px-6 tw-text-left">Link</th>
                    <th class="tw-py-3 tw-px-6 tw-text-center">Is Sidebar Element</th>
                    <th class="tw-py-3 tw-px-6 tw-text-center">Actions</th>
                </tr>
                </thead>
                <tbody class="tw-text-gray-600 tw-text-sm tw-font-light">
                @forelse($monitoring_links as $monitoring_link)
                    <tr class="tw-border-b tw-border-gray-200 hover:tw-bg-gray-100">
                        <td class="tw-py-3 tw-px-6 tw-text-left">{{$monitoring_link->parent_item_name}}&nbsp;&nbsp;<i class="{{$monitoring_link->parent_item_icon}}"></i></td>
                        <td class="tw-py-3 tw-px-6 tw-text-left">{{$monitoring_link->child_item_name}}&nbsp;&nbsp;<i class="{{$monitoring_link->child_item_icon}}"></i></td>
                        <td class="tw-py-3 tw-px-6 tw-text-center">{{$monitoring_link->link}}</td>
                        <td class="tw-py-3 tw-px-6 tw-text-center">
                                <span
                                    class="{{($monitoring_link->is_navbar_element == 1)?'tw-bg-green-200 tw-text-green-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs ':'tw-bg-red-200 tw-text-red-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs'}}">
                                    {{$monitoring_link->is_navbar_element == 1?'Yes':'No'}}</span>
                        </td>
                        <td class="tw-py-3 tw-px-6 tw-text-center">
                            @include('layouts.common.disable',  [ "form_id"=>"form_disable_".$monitoring_link->id, "action"=>route("monitoring_links.destroy",$monitoring_link)])
                            @include('layouts.common.enable',  [ "form_id"=>"form_enable_".$monitoring_link->id, "action"=>route("monitoring_links.destroy",$monitoring_link)])                            <div class="btn-group btn-group-sm btn-group-toggle tw-ml-3">
                                <div class="tw-flex tw-item-center tw-justify-center">

                                    @if(Auth::user()->isGranted('user_types.edit'))
                                        @if(Auth::user()->isGranted('user_types.update'))
                                            <div class="btn-group btn-group-sm btn-group-toggle tw-ml-3">
                                                <div class="tw-flex tw-item-center tw-justify-center">
                                                    @include('app.admin_areas.system_settings.monitoring_links.edit')
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                    <div
                                            class="tw-w-4 tw-ml-3 tw-mr-5 tw-transform hover:tw-text-purple-500 hover:tw-scale-110">
                                            @if(Auth::user()->isGranted('notices.destroy'))
                                                @if($monitoring_link->is_navbar_element == 0)
                                                    <input type="hidden" value="enable" name="enable" form="form_enable_{{$monitoring_link->id}}"/>
                                                    <button id="btnDelete" class="btn btn-sm tw-bg-green-200"
                                                            type="submit" name="btn_enabled"
                                                            form="form_enable_{{$monitoring_link->id}}"
                                                            title="Enable in Navigation Panel">
                                                        <i class="fa fa-check-circle tw-text-green-500"></i>
                                                    </button>
                                                @endif
                                                @if($monitoring_link->is_navbar_element == 1)
                                                    <input type="hidden" value="disable"  name="disable" form="form_disable_{{$monitoring_link->id}}"/>
                                                    <button id="btnDelete" class="btn btn-sm tw-bg-red-200"
                                                            type="submit" name="btn_disabled"
                                                            form="form_disable_{{$monitoring_link->id}}"
                                                            title="Disable in Navigation Panel">
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
            {{--            <x-pagination :items="$monitoring_links"/>--}}
            <div class="row">
                <div class="col-sm-8">
                    {{ $monitoring_links->onEachSide(2)->withQueryString()->links() }}
                </div>

                <div class="col-sm-4">
                    Showing {{ $monitoring_links->firstItem() }} to {{ $monitoring_links->lastItem() }} out
                    of {{ $monitoring_links->total() }} results
                </div>
            </div>
        </div>
    </div>
@endsection

@include('app.admin_areas.system_settings.monitoring_links.create')
