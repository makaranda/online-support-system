@extends('layouts.system_settings',[
    'parentSection' => 'System Settings',
    'childSection' => 'SMS Templates',
])
@section('styles')

@endsection

@section("title") SMS Templates @endsection
@section('content')
    <div class="tw-bg-white tw-p-6 tw-rounded-lg tw-shadow-lg">
        <h2 class="tw-text-2xl tw-font-bold tw-mb-2 tw-text-blue-600 tw-float-left">SMS Templates</h2>
        <a data-toggle="modal" title="Add New SMS Template"
           data-target="#create_modal"
           role="button"
           class="btn btn-sm tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-purple-400 focus:tw-to-pink-500 focus:tw-text-white">
            <i class="fa fa-plus-circle"></i>&nbsp;Add New Template
        </a>

        <hr class="mt-5"/>

        <div class="table-responsive">
            <table class="tw-w-full tw-table-auto">
                <thead>
                <tr class="tw-bg-gray-200 tw-text-gray-600 tw-uppercase tw-text-sm tw-leading-normal">
                    <th class="tw-py-3 tw-px-6 tw-text-left">Topic</th>
                    <th class="tw-py-3 tw-px-6 tw-text-left">Message</th>
                    <th class="tw-py-3 tw-px-6 tw-text-center">Status</th>
                    <th class="tw-py-3 tw-px-6 tw-text-center">Actions</th>
                </tr>
                </thead>
                <tbody class="tw-text-gray-600 tw-text-sm tw-font-light">
                @forelse($sms_templates as $template)
                    <tr class="tw-border-b tw-border-gray-200 hover:tw-bg-gray-100">
                        <td class="tw-pl-5">{{$template->topic}}</td>
                        <td>{{strlen($template->message)< 20 ?$template->message:substr($template->message,1,20)}}....</td>
                        <td class="tw-py-3 tw-px-6 tw-text-center">
                                <span
                                    class="{{($template->status == 1)?'tw-bg-green-200 tw-text-green-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs ':'tw-bg-red-200 tw-text-red-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs'}}">
                                    {{$template->get_status($template->status)}}</span>
                        </td>
                        <td class="tw-py-3 tw-px-6 tw-text-center">
                            @include('layouts.common.unavailable_form',  [ "form_id"=>"form_delete_".$template->id, "action"=>route("sms_templates.destroy",$template)])
                            <div class="btn-group btn-group-sm btn-group-toggle tw-ml-3">
                                <div class="tw-flex tw-item-center tw-justify-center">

                                    @if(Auth::user()->isGranted('sms_templates.show'))
                                        <div class="btn-group btn-group-sm btn-group-toggle tw-ml-3">
                                            <div class="tw-flex tw-item-center tw-justify-center">
                                                @include('app.admin_areas.system_settings.sms.sms_templates.show')
                                            </div>
                                        </div>
                                    @endif
                                    @if(Auth::user()->isGranted('sms_templates.edit'))
                                        @if(Auth::user()->isGranted('sms_templates.update'))
                                            <div class="btn-group btn-group-sm btn-group-toggle tw-ml-3">
                                                <div class="tw-flex tw-item-center tw-justify-center">
                                                    @include('app.admin_areas.system_settings.sms.sms_templates.edit')
                                                </div>
                                            </div>
                                        @endif
                                    @endif

                                    <div
                                        class="tw-w-4 tw-ml-3 tw-mr-5 tw-transform hover:tw-text-purple-500 hover:tw-scale-110">
                                        @if(Auth::user()->isGranted('sms_templates.destroy'))
                                            @if($template->status == 1)
                                                <button id="btnDelete" class="btn btn-sm"
                                                        type="submit"
                                                        form="form_delete_{{$template->id}}"
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
                        <td class="tw-py-3 tw-px-6 tw-text-center tw-bg-purple-200 tw-text-purple-600" colspan="4">
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
            {{--            <x-pagination :items="$sms_templates"/>--}}
            <div class="row">
                <div class="col-sm-8">
                    {{ $sms_templates->onEachSide(2)->withQueryString()->links() }}
                </div>

                <div class="col-sm-4">
                    Showing {{ $sms_templates->firstItem() }} to {{ $sms_templates->lastItem() }} out
                    of {{ $sms_templates->total() }} results
                </div>
            </div>
        </div>
    </div>
@endsection

@include('app.admin_areas.system_settings.sms.sms_templates.create')
