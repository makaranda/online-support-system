@extends('layouts.app',[
    'parentSection' => 'Messages',
])


@section('title','SMS Message History')

@section('styles')

@endsection

@section('content')
    <div class="container-fluid tw-px-10">
        <main class="tw-h-full tw-overflow-y-auto tw-bg-gray-100 tw-rounded-lg">
            <div class="tw-container tw-px-6 tw-mx-auto tw-grid tw-rounded-lg">
                <h2
                    class="tw-my-6 tw-text-2xl tw-font-semibold tw-text-gray-700 dark:tw-text-gray-200"
                >
                    Message History for {{$id}}
                    <a href="{{route("sms_messages.index",['date_range'=>date("m/d/Y", strtotime($from)).' - '.date("m/d/Y", strtotime($to))])}}" role="button"
                       class="btn btn-sm tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400 hover:tw-from-blue-400 hover:tw-to-green-400 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">
                        <i class="fa fa-envelope"></i>&nbsp;SMS History
                    </a>
                </h2>


                <div class="row">
                    <div class="col-sm-12">
                        <div class="tw-overflow-x-auto tw-w-full tw-rounded">
                            <div class="tw-w-full tw-mb-12 tw-rounded">
                                <div class="tw-bg-white tw-shadow-md my-6">
                                    <table class="tw-w-full tw-table-auto ">
                                        <thead>
                                        <tr class="tw-bg-gray-200 tw-text-gray-800 text-uppercase tw-text-sm tw-leading-normal">
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Sent @</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Message</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Created By</th>
                                        </tr>
                                        </thead>
                                        <tbody class="tw-text-gray-600 tw-text-sm tw-font-light tw-bg-white">
                                        @php $count=0 @endphp
                                        @forelse($messages as $sms_data)
                                           @php
                                               $user    = $sms_data->smsMessage->addedUser;
                                               $message = $sms_data->smsMessage;
                                           @endphp
                                            <tr class="tw-border-b tw-border-gray-200 hover:tw-bg-gray-100">
                                                <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">
                                                    <div class="tw-flex tw-items-left">
                                                        <span class="tw-font-medium">{{$message->added_time}}</span>
                                                    </div>
                                                </td>
                                                <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">
                                                    <div class="tw-flex tw-items-left">
                                                        <span class="tw-font-medium tw-text-justify">{{$message->message}}</span>
                                                    </div>
                                                </td>
                                                <td class="tw-py-3 tw-px-6 tw-text-left tw-whitespace-nowrap">
                                                    <div class="tw-flex tw-items-left">
                                                        <span class="tw-font-medium">{{$user->username.' ( '.$user->email.' )'}}</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="tw-py-3 tw-px-6 tw-text-center">SMS Messages Not Found Yet</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                        <tfoot>
                                        <tr class="tw-bg-gray-200 tw-text-gray-600 tw-uppercase tw-text-sm tw-leading-normal">
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Sent @</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Message</th>
                                            <th class="tw-py-3 tw-px-6 tw-text-left">Created By</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tw-shadow-md tw-bg-gray-100">{{$messages->links()}}</div>
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
