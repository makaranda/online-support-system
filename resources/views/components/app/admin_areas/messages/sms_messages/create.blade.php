@extends('layouts.app',[
    'parentSection' => 'Messages',
])

@section('title','Send SMS')

@section('content')
    <div class="container-fluid tw-px-10">
        <main class="tw-h-full tw-overflow-y-auto">
            <div class="tw-bg-white tw-p-6 tw-rounded-lg tw-shadow-lg">
                <div class="card tw-border-white tw-rounded">
                    <div class="card-header tw-bg-white">
                        <h2 class="tw-text-2xl tw-font-bold tw-mb-2 tw-text-gray-800 tw-float-left">Send Single/Bulk SMS</h2>

                        <a href="{{route("home")}}" role="button"
                           class="btn btn-sm tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400 hover:tw-from-blue-400 hover:tw-to-green-400 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">
                            <i class="fa fa-home"></i>&nbsp;Home
                        </a>

                    </div>
                    <div class="card-body">
                        <form action="{{route('sms_messages.store')}}" method="POST" id="form_create" class="form_create">
                            @csrf

                            <div class="card tw-mb-5 tw-border-white">
                                <div
                                    class="card-header tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 tw-h-10">
                                    <label class="card-title tw-text-white">SMS Sending Details</label>
                                </div>
                                <div class="card-body">
                                    <div class="row" style="width:100%;">
                                        <div class="col-sm-3">
                                            <div class="tw-mt-1">
                                                <label class="tw-inline-flex tw-items-center">
                                                    <input type="radio" checked="" class="tw-form-radio tw-h-5 tw-w-5" name="type" value="Custom Message" id="custom_message">
                                                    <span class="tw-ml-4 tw-text-xl">Custom Message</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="tw-mt-1">
                                                <label class="tw-inline-flex tw-items-center">
                                                    <input type="radio" class="tw-form-radio tw-h-5 tw-w-5" name="type" value="From SMS Template" id="from_template">
                                                    <span class="tw-ml-4 tw-text-xl">From Template</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="card tw-mb-5 tw-rounded-lg">
                                        <div class="card-body tw-bg-gray-200">
                                            <div class="row mb-3">
                                                <div class="col-sm-12">
                                                    <label>Phone Number/s <i class="fa fa-asterisk tw-text-pink-700 tw-text-xs"></i></label>
                                                    <textarea class="form-control form-control-sm @error('phone_numbers') tw-border-red-600 @enderror"
                                                      name="phone_numbers" id="phone_numbers" rows="5" placeholder="Enter Phone Number/s Here..."
                                                      required="">{{old('phone_numbers')}}</textarea>
                                                    <x-invalid_feedback field="phone_numbers"/>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="container-fluid">
                                                    <div class="col-sm-12 tw-bg-blue-400 tw-text-black tw-rounded-lg tw-py-3 tw-px-3">
                                                        <span><i class="fa fa-info-circle tw-text-dark "></i>&nbsp;Number Format </span><br/>
                                                        <span> Eg :- +26599X, +26588X or 088X, 099X </span><br/>
                                                        <span>Use commas (,) if you are using multiple numbers</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card tw-border-white tw-bg-white tw-border-rounded">
                                <div
                                    class="card-header tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 tw-h-10">
                                    <label class="card-title tw-text-white">SMS Message</label>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-sm ">
                                                <label>SMS Topic <i class="fa fa-asterisk tw-text-pink-700 tw-text-xs"></i></label>
                                                <input type="text"
                                                       class="form-control form-control-sm @error('topic') tw-border-red-600 @enderror" id="topic"
                                                       name="topic" placeholder="Enter Subject of the Ticket" required="" value="{{old('topic')}}"/>
                                                <x-invalid_feedback field="topic"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-sm">
                                                <label>SMS Message (Body) <i class="fa fa-asterisk tw-text-pink-700 tw-text-xs"></i></label>
                                                <textarea name="message" id="message" maxlength="160" class="form-control form-control-sm @error('message') tw-border-red-600 @enderror"
                                                          rows="10" required="" placeholder="Enter SMS Message Here...">{{old('message')}}</textarea>

                                                <x-invalid_feedback field="message"/>
                                            </div>
                                            <div class="form-group form-control-sm">
                                                <label id="remaining" class="tw-text-green-500 tw-font-bold"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer tw-bg-white ">
                        <button type="submit" role="button" form="form_create"
                                class="btn btn-sm tw-mt-3 tw-float-left tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">
                            <i class="fa fa-save"></i>&nbsp;save
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            let $remaining = $('#remaining'),
                $messages = $remaining.next();
            $('#message').on('keyup click change', function(){
                let chars = this.value.length,
                    messages = Math.ceil(chars / 160),
                    remaining = messages * 160 - (chars % (messages * 160) || messages * 160);

                $remaining.text(remaining + ' characters remaining');
                $messages.text(messages + ' message(s)');
            });


            $("#div_sms_template").hide();

            $("#from_template").click(function() {
                $("#div_sms_template").show();
                clearSMSMessage();
            });

            $("#custom_message").click(function() {
                $("#div_sms_template").hide();
                clearSMSMessage();
            });

            $('#sms_template').on('change', function() {
                let template_id = $('#sms_template').val();
                $.ajax({
                    type: "POST",
                    url : "{{route('sms_messages.get_sms_template')}}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        template_id: template_id,
                    },
                    dataType: 'json',
                    success:function(data) {
                        $("#topic").val(data['topic']); // topic
                        $("#message").val(data['message']);// message
                    }
                });
            });

            function clearSMSMessage() {
                $("#message").val('');
                $("#topic").val('');
                $("#sms_template").val(0);
            }

        });


    </script>


@endsection
