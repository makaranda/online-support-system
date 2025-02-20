@extends('layouts.app',[
    'parentSection' => 'Messages',
])

@section('title','Send Email/s')

@section('content')
    <div class="container-fluid tw-px-10">
        <main class="tw-h-full tw-overflow-y-auto">
            <div class="tw-bg-white tw-p-6 tw-rounded-lg tw-shadow-lg">
                <div class="card tw-border-white tw-rounded">
                    <div class="card-header tw-bg-white">
                        <h2 class="tw-text-2xl tw-font-bold tw-mb-2 tw-text-gray-800 tw-float-left">Send an Email to Customer/s.</h2>

                        <a href="{{route("emails.index")}}" role="button"
                           class="btn btn-sm tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400 hover:tw-from-blue-400 hover:tw-to-green-400 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">
                            <i class="fa fa-history"></i>&nbsp;Email History
                        </a>

                    </div>
                    <div class="card-body">
                        <form action="{{route('emails.store')}}" method="POST" id="form_create" class="form_create" enctype="multipart/form-data">
                            @csrf

                            <div class="card tw-mb-5 tw-border-white">
                                <div
                                    class="card-header tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 tw-h-10">
                                    <label class="card-title tw-text-white">Email Sending Details</label>
                                </div>
                                <div class="card-body">
                                    <div class="row" style="width:100%;">
                                        <div class="col-sm-3">
                                            <div class="tw-mt-1">
                                                <label class="tw-inline-flex tw-items-center">
                                                    <input type="radio" checked="" class="tw-form-radio tw-h-8 tw-w-8" name="type" value="Single" id="single">
                                                    <span class="tw-ml-4 tw-text-xl">Single</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="tw-mt-1">
                                                <label class="tw-inline-flex tw-items-center">
                                                    <input type="radio" class="tw-form-radio tw-h-8 tw-w-8" name="type" value="Bulk" id="bulk">
                                                    <span class="tw-ml-4 tw-text-xl">Bulk</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="card tw-mb-5">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Email Address <i class="fa fa-asterisk tw-text-pink-700 tw-text-xs"></i>&nbsp;<span id="email_alert"></span></label>
                                                    <input type="text" autocomplete="off" class="form-control form-control-sm @error('email_address') tw-border-red-600 @enderror"
                                                           name="email_address" id="email_address" placeholder="Enter Email Address"/>
                                                    <x-invalid_feedback field="email_address"/>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Email Template <i class="fa fa-asterisk tw-text-pink-700 tw-text-xs"></i></label>
                                                    <select class="form-control form-control-sm @error('email_template') tw-border-red-600 @enderror" name="email_template" id="email_template">
                                                        <option selected="" disabled="">Select Email Template</option>
                                                        @foreach($emil_templates as $email_template)
                                                            <option value="{{$email_template->id}}">{{$email_template->topic}}</option>
                                                        @endforeach
                                                    </select>
                                                    <x-invalid_feedback field="email_template"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card tw-bg-gray-200" id="div_bulk">
                                        <div class="card-body tw-bg-gray-150 tw-rounded-lg">
                                            <div class="row">
                                                <div class="col-sm-4" >
                                                    <label>User Branch <i class="fa fa-asterisk tw-text-pink-700 tw-text-xs"></i></label>
                                                    <select class="form-control form-control-sm @error('user_branch') tw-border-red-600 @enderror" name="user_branch" id="user_branch">
                                                        <option selected="" disabled="">Select Branch</option>
                                                        @foreach($branches as $user_branch)
                                                            <option value="{{$user_branch->id}}">{{$user_branch->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <x-invalid_feedback field="user_branch"/>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>Connection Type <i class="fa fa-asterisk tw-text-pink-700 tw-text-xs"></i></label>
                                                    <select class="form-control form-control-sm @error('connection_type') tw-border-red-600 @enderror" name="connection_type" id="connection_type">
                                                        <option selected="" disabled="">Select Connection Type</option>
                                                        @foreach($connection_types as $connection_type)
                                                            <option value="{{$connection_type->con_name}}">{{$connection_type->con_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <x-invalid_feedback field="connection_type"/>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>Customer Group <i class="fa fa-asterisk tw-text-pink-700 tw-text-xs"></i></label>
                                                    <select class="form-control form-control-sm @error('customer_group') tw-border-red-600 @enderror" name="customer_group" id="customer_group">
                                                        <option selected="" disabled="">Select Customer Group</option>
                                                        @foreach($customer_groups as $key => $customer_group)
                                                            <option value="{{$key}}">{{$customer_group}}</option>
                                                        @endforeach
                                                    </select>
                                                    <x-invalid_feedback field="customer_group"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card tw-border-white tw-bg-white tw-border-rounded">
                                <div
                                    class="card-header tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 tw-h-10">
                                    <label class="card-title tw-text-white">Email Message</label>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-sm ">
                                                <label>Email Subject <i class="fa fa-asterisk tw-text-pink-700 tw-text-xs"></i></label>
                                                <input type="text" autocomplete="off"
                                                       class="form-control form-control-sm @error('subject') tw-border-red-600 @enderror" id="subject"
                                                       name="subject" placeholder="Enter Subject of the Ticket" required="" value="{{old('subject')}}"/>
                                                <x-invalid_feedback field="subject"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-sm">
                                                <label>Email Message (Body) <i class="fa fa-asterisk tw-text-pink-700 tw-text-xs"></i></label>
                                                <textarea name="message" id="message" class="form-control form-control-sm @error('message') tw-border-red-600 @enderror" rows="10" required="">{{old('message')}}</textarea>

                                                <x-invalid_feedback field="message"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card tw-border-white tw-bg-white tw-border-rounded">
                                <div
                                    class="card-header tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 tw-h-10">
                                    <label class="card-title tw-text-white">Email Attachments</label>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-sm tw-ml-3">
                                                <label>Select Attachment/s</label>
                                                <input type="file" style="width: 100%;" name="attachments[]"
                                                       class="form-control @error('attachments') tw-border-red-600 @enderror"
                                                       multiple accept="image/*,.pdf,.doc,.docx,.xlsx,.xls,.csv" />
                                                <x-invalid_feedback field="attachments"/>
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
    <script type="text/javascript" src="{{asset('vendors/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
        CKEDITOR.replace( 'message', { height:'300px'},{allowedContent: true} );
        CKEDITOR.instances['message'].setData('<p>Dear Valued Customer</p><p>&nbsp;</p><p>******************* <b>Please add email content here </b>**********************<br/>Please note that we have a fibre connectivity problem in Mozambique. Thus the internet connection to Blantye, Lilongwe, Zomba & Mzuzu have been affected. Our engineers are already on the ground to restore services.<br/><b>******************* Please add email content here **********************</b></p><br/>Apologies for any inconvenience caused.<p>Sincerely</p><p>Help Desk<br />Globe Internet Limited</p><p><strong>callcentre@globemw.net</strong>&nbsp; |&nbsp; <strong>0212 951 965</strong>&nbsp; |&nbsp; <strong>01 841 044</strong>&nbsp; |&nbsp; <strong><a href="https://helpdesk.globemw.net">helpdesk.globemw.net </a></strong><br /><img src="https://helpdesk.globemw.net/images/header.jpg" style="height:50px; width:600px" /></p><span style="color:#00FF00">Be kind to the environment, save trees and help reduce carbon footprint; do not print unless you have to ! </span><hr/><div style="font-family:Gotham, Helvetica, Arial, sans-serif; font-size:11px; text-align:justify;">Disclaimer:<br/>This email and its attachments, if any, are meant for the intended recipient of the transmission,and may be a communication privileged by law. Globe Internet Limited assumes no responsibility or liability of any nature whatsoever for the interception or loss of personal information. If you received this email by mistake kindly notify the sender immediately and delete this email from your system. It is strictly prohibited to retransmit, use, disseminate or copy this email and its attachments. Thank you in advance for your co-operation.</div>');
    </script>
    <script>
        $(document).ready(function() {
            $("#div_bulk").hide();

            $("#bulk").click(function() {
                $("#div_bulk").show();
                $('#email_address');
                setEmail();
            });

            $("#single").click(function() {
                $("#div_bulk").hide();
                clearEmail();
            });

            $('#email_template').on('change', function() {
                let template_id = $('#email_template').val();
                $.ajax({
                    type: "POST",
                    url : "{{route('emails.get_email_template')}}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        template_id: template_id,
                    },
                    dataType: 'json',
                    success:function(data) {
                        $("#subject").val(data['subject']); // subject
                        CKEDITOR.instances['message'].setData(data['message']); // message
                    }
                });
            });

            function clearEmail() {
                $("#email_address").val('');
                $("#email_alert").html('');
                $("#email_alert").removeClass('text-danger');
                $("#email_alert").removeProp('readonly');
                $("#email_address").attr('readonly',false);
            }

            function setEmail() {
                $("#email_address").val('noc@globemw.net');
                $("#email_alert").addClass('text-danger');
                $("#email_address").attr('readonly',true);
                $("#email_alert").html('This includes all customers list in the background.');
            }
        });


    </script>
@endsection
