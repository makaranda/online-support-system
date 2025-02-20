@extends('layouts.app',[
    'parentSection' => 'Tickets',
])

@section('title','Home')

@section('styles')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('content')
    <div class="container-fluid tw-px-10">
        <main class="tw-h-full tw-overflow-y-auto">
            <div class="tw-bg-white tw-p-6 tw-rounded-lg tw-shadow-lg">
                <div class="card tw-border-white tw-rounded">
                    <div class="card-header tw-bg-white">
                        <h2 class="tw-text-2xl tw-font-bold tw-mb-2 tw-text-gray-800 tw-float-left">Please fill in the
                            form below to open a new ticket for selected call.</h2>
                        <a href="{{route("call_logs.index")}}" role="button"
                           class="btn btn-sm tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400 hover:tw-from-blue-400 hover:tw-to-green-400 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">
                            <i class="fa fa-phone-square-alt"></i>&nbsp;Call Logs
                        </a>
                    </div>
                    <div class="card-body">

                        <form action="{{route('call_open_tickets.store')}}" method="POST" id="form_create"
                              class="form_create">
                            @csrf

                            <div class="card tw-mb-5 tw-border-white">
                                <div
                                    class="card-header tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 tw-h-10">
                                    <label class="card-title tw-text-white">Call Log Details</label>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group tw-ml-3">
                                                <label>Call</label>
                                                <input type="text" class="form-control form-control-sm"
                                                       value="{{$crm_cdr_data['call']}}"
                                                       name="call" readonly="">
                                            </div>
                                            <div class="form-group tw-ml-3">
                                                <label>Duration</label>
                                                <input type="text" class="form-control form-control-sm"
                                                       value="{{$crm_cdr_data['duration']}}"
                                                       name="duration" readonly="">
                                            </div>
                                            <div class="form-group tw-ml-3">
                                                <label>Call Type <i
                                                        class="fa fa-asterisk tw-text-pink-700 tw-text-xs"></i></label>
                                                <select class="form-control form-control-sm @error('call_type') tw-border-red-600 @enderror"
                                                        name="call_type" id="call_type" required="">
                                                    <option value="" selected="" disabled="">- Select Call Type -</option>
                                                    <option value="IN" {{$crm_cdr_data['call_direction'] == 'in'?'selected':''}}>IN</option>
                                                    <option value="OUT" {{$crm_cdr_data['call_direction'] == 'out'?'selected':''}}>OUT</option>
                                                </select>
                                                <x-invalid_feedback field="call_type"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group tw-ml-3">
                                                <label>Line</label>
                                                <input type="text" class="form-control form-control-sm"
                                                       value="{{$crm_cdr_data['line']}}" name="line"
                                                       readonly="">
                                            </div>
                                            <div class="form-group tw-ml-3">
                                                <label>Call Date / Time</label>
                                                <input type="text" class="form-control form-control-sm"
                                                       value="{{$crm_cdr_data['calldate']}}"
                                                       name="calldate" readonly="">
                                            </div>
                                            <div class="form-group tw-ml-3">
                                                <label>Inquiry Type <i
                                                        class="fa fa-asterisk tw-text-pink-700 tw-text-xs"></i></label>
                                                <select class="form-control form-control-sm @error('inquiry_type') tw-border-red-600 @enderror"
                                                        name="inquiry_type" id="inquiry_type" required="">
                                                    <option value="" selected="" disabled="">- Select
                                                        Inquiry Type -
                                                    </option>
                                                    <option value="Billing">Billing</option>
                                                    <option value="Fault">Fault</option>
                                                    <option value="General">General</option>
                                                    <option value="Inquiry">Inquiry</option>
                                                    <option value="Other">Other</option>
                                                    <option value="Sales">Sales</option>
                                                </select>
                                                <x-invalid_feedback field="inquiry_type"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card tw-mb-5 tw-border-white">
                                <div
                                    class="card-header tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 tw-h-10">
                                    <label class="card-title tw-text-white">Ticket Details</label>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                                <div class="form-group form-group-sm tw-ml-3">
                                                    <label>W-Account Number</label>
                                                    <input type="text" autocomplete="off"
                                                           class="form-control form-control-sm @error('w_account_no') tw-border-red-600 @enderror"
                                                           name="w_account_no" id="w_account_no"
                                                           placeholder="Enter W-Account Number"
                                                           value="{{old('w_account_no')}}"/>
                                                    <x-invalid_feedback field="w_account_no"/>
                                                </div>
                                                <div class="form-group form-group-sm tw-ml-3">
                                                    <label>Email Address</label>
                                                    <input type="email" autocomplete="off"
                                                           class="form-control form-control-sm @error('email') tw-border-red-600 @enderror"
                                                           name="email" id="email" placeholder="Enter Email Address"
                                                           value="{{old('email')}}"/>
                                                    <x-invalid_feedback field="email"/>
                                                </div>
                                                <div class="form-group form-group-sm tw-ml-3">
                                                    <label>Cell Phone No </label>
                                                    <input type="text" autocomplete="off"
                                                           class="form-control form-control-sm @error('cell_phone_no') tw-border-red-600 @enderror"
                                                           name="cell_phone_no"
                                                           placeholder="Enter Cell Phone No"
                                                           value="{{old('cell_phone_no')}}"/>
                                                    <x-invalid_feedback field="cell_phone_no"/>
                                                </div>
                                                <div class="form-group form-group-sm tw-ml-3">
                                                    <label>Service Branch <i
                                                            class="fa fa-asterisk tw-text-pink-700 tw-text-xs"></i></label>
                                                    <select required=""
                                                            class="form-control form-control-sm @error('service_branch') tw-border-red-600 @enderror"
                                                            name="service_branch" id="service_branch">
                                                        <option selected="" disabled="">--Select Service Branch--</option>
                                                        @foreach($service_branches as $branch)
                                                            @if(old('service_branch') == $branch->id)
                                                                <option selected=""
                                                                        value="{{$branch->id}}">{{$branch->name.' ('.$branch->code.')'}}</option>
                                                            @else
                                                                <option
                                                                    value="{{$branch->id}}">{{$branch->name.' ('.$branch->code.')'}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <x-invalid_feedback field="service_branch"/>
                                                </div>
                                            </div>
                                        <div class="col-sm-6">
                                                <div class="form-group form-group-sm tw-ml-3">
                                                    <label>Customer Name <i
                                                            class="fa fa-asterisk tw-text-pink-700 tw-text-xs"></i></label>
                                                    <input type="text" required="" autocomplete="off"
                                                           class="form-control form-control-sm @error('customer_name') tw-border-red-600 @enderror"
                                                           name="customer_name" id="customer_name"
                                                           placeholder="Enter Customer Name"
                                                           value="{{old('customer_name')}}"/>
                                                    <x-invalid_feedback field="customer_name"/>
                                                </div>
                                                <div class="form-group form-group-sm tw-ml-3">
                                                    <label>Telephone No</label>
                                                    <input type="text" autocomplete="off"
                                                           class="form-control form-control-sm @error('telephone_no') tw-border-red-600 @enderror"
                                                           name="telephone_no"
                                                           placeholder="Enter Telephone No"
                                                           value="{{old('telephone_no')?old('telephone_no'):$crm_cdr_data['tel']}}"/>
                                                    <x-invalid_feedback field="telephone_no"/>
                                                </div>
                                                <div class="form-group form-group-sm tw-ml-3">
                                                    <label>Priority <i
                                                            class="fa fa-asterisk tw-text-pink-700 tw-text-xs"></i></label>
                                                    <select required=""
                                                            class="form-control form-control-sm @error('priority') tw-border-red-600 @enderror"
                                                            name="priority">
                                                        <option selected="" disabled="">Select Priority
                                                        </option>
                                                        @foreach($priorities as $key => $priority)
                                                            @if(old('priority') === $priority[0])
                                                                <option selected=""
                                                                        value="{{$priority[0]}}" selected=""
                                                                        class="{{$priority[1]}}">{{$priority[0]}}</option>
                                                            @else
                                                                <option
                                                                    value="{{$priority[0]}}"
                                                                    class="{{$priority[1]}}">{{$priority[0]}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <x-invalid_feedback field="priority"/>
                                                </div>
                                                <div class="form-group form-group-sm tw-ml-3">
                                                    <label>Service Type <i
                                                            class="fa fa-asterisk tw-text-pink-700 tw-text-xs"></i></label>
                                                    <select required=""
                                                            class="form-control form-control-sm @error('service_type') tw-border-red-600 @enderror "
                                                            style="width: 100%;" id="service_type"
                                                            name="service_type">
                                                        <option selected="" disabled="">--Select Service
                                                            Type--
                                                        </option>
                                                        @foreach($service_types as $service_type)
                                                            @if(old('service_type') == $service_type->id)
                                                                <option selected=""
                                                                        value="{{$service_type->id}}">{{$service_type->name.' ('.$service_type->code.')'}}</option>
                                                            @else
                                                                <option
                                                                    value="{{$service_type->id}}">{{$service_type->name.' ('.$service_type->code.')'}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <x-invalid_feedback field="service_type"/>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card tw-border-white tw-bg-white tw-border-rounded">
                                <div
                                    class="card-header tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 tw-h-10">
                                    <label class="card-title tw-text-white">Ticket Message</label>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-sm tw-ml-3">
                                                <label>Ticket Subject (Header) <i
                                                        class="fa fa-asterisk tw-text-pink-700 tw-text-xs"></i></label>
                                                <input type="text" autocomplete="off"
                                                       class="form-control form-control-sm @error('subject') tw-border-red-600 @enderror"
                                                       name="subject" placeholder="Enter Subject of the Ticket"
                                                       required=""
                                                       value="{{old('subject')}}"/>
                                                <x-invalid_feedback field="subject"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-sm tw-ml-3">
                                                <label>Ticket Message (Body) <i
                                                        class="fa fa-asterisk tw-text-pink-700 tw-text-xs"></i></label>
                                                <textarea name="message" id="message"
                                                          class="form-control form-control-sm @error('message') tw-border-red-600 @enderror"
                                                          rows="10" required="">{{old('message')}}</textarea>
                                                <x-invalid_feedback field="message"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card tw-border-white tw-bg-white tw-border-rounded">
                                <div
                                    class="card-header tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 tw-h-10">
                                    <label class="card-title tw-text-white">Select user to Assign this Ticket</label>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-sm tw-ml-3">
                                                <label>Assign User</label>
                                                <select
                                                    class="form-control form-control-sm @error('assign_user') tw-border-red-600 @enderror "
                                                    style="width: 100%;"
                                                    name="assign_user" id="assign_user">
                                                    <option selected="" disabled="">Select User to Assign</option>
                                                </select>
                                                <x-invalid_feedback field="assign_user"/>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="card-footer tw-bg-white ">
                        <input type="hidden" value="{{$crm_cdr_data['asteriskid']}}" name="asteriskid" form="form_create">
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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        // CSRF Token
        let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){

            $( "#w_account_no" ).autocomplete({
                source: function( request, response ) {

                    // Fetch data
                    $.ajax({
                        url:"{{route('tickets.get_data_by_wacc')}}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            wacc: request.term
                        },
                        success: function( data ) {
                            console.log(JSON.stringify(data));
                            response( data );
                        },
                        error : function (xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                },
                select: function (event, ui) {
                    $('#w_account_no').val(ui.item.value);
                    $('#customer_name').val(ui.item.customer);
                    $('#email').val(ui.item.email);
                    $('#service_branch').val(ui.item.branch);
                    $('#service_type').val(ui.item.service);
                    loadBranchUsers(ui.item.branch);
                    return false;
                }
            });

            $( "#customer_name" ).autocomplete({
                source: function( request, response ) {

                    // Fetch data
                    $.ajax({
                        url:"{{route('tickets.get_data_by_customer_name')}}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            wacc: request.term
                        },
                        success: function( data ) {
                            console.log(JSON.stringify(data));
                            response( data );
                        },
                        error : function (xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                },
                select: function (event, ui) {
                    $('#customer_name').val(ui.item.value);
                    $('#w_account_no').val(ui.item.wacc);
                    $('#email').val(ui.item.email);
                    $('#service_branch').val(ui.item.branch);
                    $('#service_type').val(ui.item.service);
                    loadBranchUsers(ui.item.branch);
                    return false;
                }
            });

            //Load Branch Users According to selection of Service Branch select box
            $('#service_branch').change(function (e) {

                e.preventDefault();
                let branch_id = $('#service_branch').val();
                loadBranchUsers(branch_id);
            });

        });


        function loadBranchUsers(branch_id){
            $.ajax({
                type: 'POST',
                url: "{{route('tickets.load_branch_users')}}",
                data: {"_token": "{{ csrf_token() }}", branch_id: branch_id},
                dataType: 'json',
                success: function (data) {
                    $('#assign_user').empty();
                    // console.log(JSON.stringify(data));
                    $('#assign_user').append('<option value="' + 0 + '" selected="" disabled="">Select Assign User</option>');
                    $.each(data, function(i, d) {
                        $('#assign_user').append('<option value="' + d.id + '">' +d.username+' | '+ d.email + ' ('+ d.user_type.name +') </option>');
                    });
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                    $.alert({
                        title: 'Alert!',
                        type: 'red',
                        content: 'Branch Users Loading Error!',
                    });
                }
            });
        }

    </script>
@endsection
