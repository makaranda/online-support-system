@extends('layouts.app',[
    'parentSection' => 'Messages',
])


@section('title','Add Notice')

@section('styles')

@endsection

@section('content')
    <div class="container-fluid tw-px-10">
        <main class="tw-h-full tw-overflow-y-auto">
            <div class="tw-bg-white tw-p-6 tw-rounded-lg tw-shadow-lg">
                <div class="card tw-border-white tw-rounded">
                    <div class="card-header tw-bg-white">
                        <h2 class="tw-text-2xl tw-font-bold tw-mb-2 tw-text-gray-800 tw-float-left">All Notices</h2>

                        <a href="{{route("notices.create")}}" role="button"
                           class="btn btn-sm tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400 hover:tw-from-blue-400 hover:tw-to-green-400 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">
                            <i class="fa fa-flag"></i>&nbsp;Add New Notice
                        </a>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="tw-overflow-x-auto tw-w-full tw-rounded">
                                    <div class="tw-w-full tw-mb-12 tw-rounded">
                                        <div class="tw-bg-white tw-shadow-md my-6">
                                            <table class="tw-w-full tw-table-auto ">
                                                <thead>
                                                <tr class="tw-bg-gray-200 tw-text-gray-800 text-uppercase tw-text-sm tw-leading-normal">
                                                    <th class="tw-py-3 tw-px-6 tw-text-left">Title</th>
                                                    <th class="tw-py-3 tw-px-6 tw-text-left">Exp. Date</th>
                                                    <th class="tw-py-3 tw-px-6 tw-text-left">Message</th>
                                                    <th class="tw-py-3 tw-px-6 tw-text-left">Created By</th>
                                                    <th class="tw-py-3 tw-px-6 tw-text-center">Status</th>
                                                    <th class="tw-py-3 tw-px-6 tw-text-center">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody class="tw-text-gray-600 tw-text-sm tw-font-light tw-bg-white">
                                                @php $count=0 @endphp
                                                @forelse($notices as $notice)
                                                    <tr class="tw-border-b tw-border-gray-200 hover:tw-bg-gray-100">
                                                        <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">
                                                            <div class="tw-flex tw-items-left">
                                                                <span class="tw-font-medium">{{$notice->title}}</span>
                                                            </div>
                                                        </td>
                                                        <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">
                                                            <div class="tw-flex tw-items-left">
                                                                <span class="tw-font-medium tw-bg-blue-200 tw-text-blue-700 tw-rounded-xl tw-py-1 tw-px-2">{{$notice->exdate}}</span>
                                                            </div>
                                                        </td>
                                                        <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">
                                                            <div class="tw-flex tw-items-left">
                                                                <span class="tw-font-medium">{{strlen($notice->msg) < 10 ? $notice->msg:substr($notice->msg,0,10).'...'}}</span>
                                                                @include('app.admin_areas.messages.notices.show')
                                                            </div>
                                                        </td>
                                                        <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">
                                                            <div class="tw-flex tw-items-left">
                                                                <span class="tw-font-medium">
                                                                    {{$notice->addedBy->username.' ('.$notice->addedBy->userType->name.')'}}
                                                                </span>

                                                            </div>
                                                        </td>
                                                        <td class="tw-py-3 tw-px-6 tw-text-center">
                                                            <span
                                                                class="{{($notice->status == 1)?'tw-bg-green-200 tw-text-green-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs ':'tw-bg-red-200 tw-text-red-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs'}}">
                                                                {{$notice->get_status($notice->status)}}</span>
                                                        </td>
                                                        @include('layouts.common.disable',  [ "form_id"=>"form_disable_".$notice->id, "action"=>route("notices.destroy",$notice)])
                                                        @include('layouts.common.enable',  [ "form_id"=>"form_enable_".$notice->id, "action"=>route("notices.destroy",$notice)])
                                                        <td class="tw-py-3 tw-px-6 tw-text-center">
                                                            <div
                                                                class="tw-w-4 tw-ml-3 tw-mr-5 tw-transform hover:tw-text-purple-500 hover:tw-scale-110">
                                                                @if(Auth::user()->isGranted('notices.destroy'))
                                                                    @if($notice->status == 0)
                                                                        <input type="hidden" value="enable" name="enable" form="form_enable_{{$notice->id}}"/>
                                                                        <button id="btnDelete" class="btn btn-sm tw-bg-green-200"
                                                                                type="submit" name="btn_enabled"
                                                                                form="form_enable_{{$notice->id}}"
                                                                                title="Enable Notice">
                                                                            <i class="fa fa-check-circle tw-text-green-500"></i>
                                                                        </button>
                                                                    @endif
                                                                    @if($notice->status == 1)
                                                                            <input type="hidden" value="disable"  name="disable" form="form_disable_{{$notice->id}}"/>
                                                                        <button id="btnDelete" class="btn btn-sm tw-bg-red-200"
                                                                                type="submit" name="btn_disabled"
                                                                                form="form_disable_{{$notice->id}}"
                                                                                title="Disable Notice">
                                                                            <i class="fa fa-times-circle tw-text-red-500"></i>
                                                                        </button>
                                                                    @endif
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="7" class="tw-py-3 tw-px-6 tw-text-center">
                                                            Recently Added Notices Not Found Yet
                                                        </td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                                <tfoot>
                                                <tr class="tw-bg-gray-200 tw-text-gray-600 tw-uppercase tw-text-sm tw-leading-normal">
                                                    <th class="tw-py-3 tw-px-6 tw-text-left">Title</th>
                                                    <th class="tw-py-3 tw-px-6 tw-text-left">Exp. Date</th>
                                                    <th class="tw-py-3 tw-px-6 tw-text-left">Message</th>
                                                    <th class="tw-py-3 tw-px-6 tw-text-left">Created By</th>
                                                    <th class="tw-py-3 tw-px-6 tw-text-center">Status</th>
                                                    <th class="tw-py-3 tw-px-6 tw-text-center">Action</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tw-shadow-md tw-bg-gray-100">
                                  {{ $notices->links() }}
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

@section('scripts')

    <script>

    </script>
@endsection
