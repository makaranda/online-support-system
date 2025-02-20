@extends('layouts.app',[
    'parentSection' => 'Messages',
])


@section('title','View Emails')

@section('styles')

@endsection

@section('content')
    <div class="container-fluid tw-px-10">
        <main class="tw-h-full tw-overflow-y-auto tw-bg-gray-100 tw-rounded-lg">
            <div class="tw-container tw-px-6 tw-mx-auto tw-grid tw-rounded-lg">
                <h2
                    class="tw-my-6 tw-text-2xl tw-font-semibold tw-text-gray-700 dark:tw-text-gray-200"
                >
                    Email History belongs to {{$user->name}}
                    <a href="{{route("emails.index")}}" role="button"
                       class="btn btn-sm tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400 hover:tw-from-blue-400 hover:tw-to-green-400 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">
                        <i class="fa fa-history"></i>&nbsp;Email History
                    </a>
                </h2>


                <div class="row">
                    <div class="col-sm-12">
                        <div class="tw-overflow-x-auto tw-w-full tw-rounded">
                            <div class="tw-w-full tw-mb-12 tw-rounded">
                                <div class="tw-bg-white tw-shadow-md my-6">
                                    <table class="tw-min-w-max tw-w-full tw-table-auto ">
                                        <thead>
                                        <tr class="tw-bg-gray-200 tw-text-gray-800 text-uppercase tw-text-sm tw-leading-normal">
                                            <th class="tw-py-3 tw-px-6 tw-text-left">#</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Subject</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Type</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Time</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Created By</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-center">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody class="tw-text-gray-600 tw-text-sm tw-font-light tw-bg-white">
                                        @forelse($email_logs as $email_log)
                                            <tr class="tw-border-b tw-border-gray-200 hover:tw-bg-gray-100">

                                                <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">
                                                    <div class="tw-flex tw-items-left">
                                                        <span class="tw-font-medium">{{$email_log->id}}</span>
                                                    </div>
                                                </td>
                                                <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">
                                                    <div class="tw-flex tw-items-left">
                                                        <span class="tw-font-medium">{{$email_log->subject}}</span>
                                                    </div>
                                                </td>
                                                <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">
                                                    <div class="tw-flex tw-items-left">
                                                        <span class="{{$email_log->type === 'Single'?'tw-font-small tw-p-1.5 tw-bg-indigo-200 tw-rounded-lg tw-text-indigo-600 tw-font-bold':'tw-font-small tw-bg-green-200 tw-rounded-lg tw-p-1.5 tw-text-green-600 tw-font-bold'}}">
                                                            {{$email_log->type}}
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">
                                                    <div class="tw-flex tw-items-left">
                                                        <span class="tw-font-medium">{{$email_log->time}}</span>
                                                    </div>
                                                </td>
                                                <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">
                                                    <div class="tw-flex tw-items-left">
                                                        <span class="tw-font-medium">{{($email_log->user)?$email_log->user->username.' ('.$email_log->user->userType->name.')':''}}</span>
                                                    </div>
                                                </td>

                                                <td class="tw-py-3 tw-px-6 tw-text-center btn-group btn-group-sm btn-group-toggle ">
                                                    @if($email_log->msg !== null)
                                                        <div class="tw-flex tw-item-center tw-justify-center tw-mr-5">
                                                            @if(Auth::user()->isGranted('emails.show'))
                                                                @include('app.admin_areas.messages.emails.show_message')
                                                            @endif
                                                        </div>
                                                    @endif
                                                    @if($email_log->attachments !== null)
                                                        <div class="tw-flex tw-item-center tw-justify-center">
                                                            @if(Auth::user()->isGranted('emails.show'))
                                                                @include('app.admin_areas.messages.emails.attachments')
                                                            @endif
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="tw-py-3 tw-px-6 tw-text-center">Recently Sent
                                                    Email History Not Found Yet
                                                </td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                        <tfoot>
                                        <tr class="tw-bg-gray-200 tw-text-gray-600 tw-uppercase tw-text-sm tw-leading-normal">
                                            <th class="tw-py-3 tw-px-6 tw-text-left">#</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Subject</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Type</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Time</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Created By</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-center">Actions</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tw-shadow-md tw-bg-gray-100">
                            {{$email_logs->links()}}
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
@endsection

@section('scripte')

    <script>

    </script>
@endsection
