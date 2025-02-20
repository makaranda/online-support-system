<script>
    function loadModal(ticket_id) {
        $('#preloader').show();
        $.ajax({
            type: 'POST',
            url: "{{route('tickets.get_ticket_data')}}",
            data: {
                "_token": "{{ csrf_token() }}",
                ticket_id: ticket_id,
            },
            dataType: 'json',
            success: function (data) {


                if (data.message === 'success') {
                    // Add Ticket No in modal Title
                    $('#modal_span_ticket_no').text(data.no);

                    // Set Service Branch
                    $('#modal_tbl_tk_branch').text(data.service_branch);

                    // Set Service Type
                    $('#modal_tbl_tk_type').text(data.service_type);

                    // Set Customer Name
                    $('#modal_tbl_tk_customer').text(data.customer_name);

                    // Set Customer Type

                    switch (data.customer_type) {
                        case 1:
                            let individual = "<span class='tw-bg-gray-300 tw-text-dark tw-py-1 tw-px-2 tw-rounded-lg tw-text-xs tw-font-bold'>Individual / Private</span>";
                            $('#modal_tbl_tk_customer_type').html(individual);
                            break;
                        case 2:
                            let enterprise = "<span class='tw-bg-yellow-200 tw-text-yellow-800 tw-py-1 tw-px-2 tw-rounded-lg tw-text-xs tw-font-bold'>Small Medium Enterprise</span>";
                            $('#modal_tbl_tk_customer_type').html(enterprise);
                            break;
                        case 3:
                            let corporate = "<span class='tw-bg-blue-200 tw-text-blue-800 tw-py-1 tw-px-2 tw-rounded-lg tw-text-xs tw-font-bold'>Corporate</span>";
                            $('#modal_tbl_tk_customer_type').html(corporate);
                            break;
                        case 4:
                            let vip = "<span class='tw-bg-indigo-200 tw-text-indigo-700 tw-py-1 tw-px-2 tw-rounded-full tw-text-xs tw-font-bold'>V I P <i class='fa fa-check-circle tw-text-indigo-700'></i></span>";
                            $('#modal_tbl_tk_customer_type').html(vip);
                            break;
                        case 5:
                            let vvip = "<span class='tw-bg-green-200 tw-text-green-700 tw-py-1 tw-px-2 tw-rounded-full tw-text-xs tw-font-bold'>V V I P <i class='fa fa-check-circle tw-text-green-700'></i></span>";
                            $('#modal_tbl_tk_customer_type').html(vvip);
                            break;
                        default:
                            let non_specified = "<span class='tw-bg-pink-200 tw-text-pink-700 tw-py-1 tw-px-2 tw-rounded-lg tw-text-xs'>Non Specified</span>";
                            $('#modal_tbl_tk_customer_type').html(non_specified);
                    }


                    // Set Customer Email
                    $('#modal_tbl_tk_contact_email').text(data.email);

                    // Add Telephone no
                    if (data.tel) $('#modal_tbl_tk_contact_tel').text(' | Tel : ' + data.tel);

                    // Add SMS Number and button for SMS modal load
                    if (data.cell !== '') {
                        $('#modal_tbl_tk_contact_cel').text(' | Cell : ' + data.cell);
                        let btn_sms_modal = "<button data-toggle='modal' data-target='#sms_modal' class='btn btn-sm tw-bg-blue-500 tw-text-white tw-rounded-full' title='Enter SMS Content'><i class='fa fa-lg fa-sms tw-text-white'></i></button>"
                        $('#modal_tbl_tk_send_sms').html(btn_sms_modal);
                    }

                    // Set Subject
                    $('#modal_tbl_tk_subject').text(data.subject);

                    // Apply Ticket Priority
                    switch (data.priority) {
                        case 'Low':
                            let badge_low = "<span class='tw-bg-green-200 tw-text-green-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs'>" + data.priority + "</span>";
                            $('#modal_tbl_tk_priority').html(badge_low);
                            break;
                        case 'Normal':
                            let badge_normal = "<span class='tw-bg-blue-200 tw-text-blue-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs'>" + data.priority + "</span>";
                            $('#modal_tbl_tk_priority').html(badge_normal);
                            break;
                        case 'High':
                            let badge_high = "<span class='tw-bg-pink-200 tw-text-pink-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs'>" + data.priority + "</span>";
                            $('#modal_tbl_tk_priority').html(badge_high);
                            break;
                        default:
                            $('#modal_tbl_tk_priority').text(data.priority);
                    }

                    // Set Ticket Detail in first table ticket section
                    if (data.assigned_to != null)
                        $('#modal_tbl_tk_assign').html("Assigned To <span class='tw-text-indigo-600 tw-font-bold'>" + data.assigned_to.username + "</span> By <span class='tw-text-green-600 tw-font-bold'>" + data.assigned_by.username + "</span>");
                    else
                        $('#modal_tbl_tk_assign').html("<span class='tw-bg-pink-100 tw-text-pink-500 tw-py-2 tw-px-2 tw-rounded-full'>Ticket Not Assigned to User Yet</span>");

                    //clear Ticket Response Table Body
                    $('#tbl_ticket_response_history_tbl_body').empty();

                    // Fill Ticket Response Table Body
                    $.each(data.ticket_responses, function (index, value) {
                        let tr = '<tr>';
                        tr += '<td>' + value['date'] + '</td>';
                        tr += '<td>' + value['added_user'] + '</td>';
                        tr += '<td>' + value['status'] + '</td>';
                        tr += '<td class="tw-text-left">' + value['response'] + '</td>';

                        // Alpply Ticket Call Record Infor modal and call record play option
                        if(value['asteriskid']){

                            //$('#modal_call_info_tk_no'+value['id']).text(value['ticket_no']);
                            let play_audio_url = 'tickets/play_call_record/'+value['asteriskid'];
                            let modal_link = "<a class='btn btn-light btn-sm' title='Other Call Information' data-toggle='modal' data-target='#call_info_modal'><i class='fa fa-info-circle'></i></a>";
                            // let play_audio_onclick_event = window.open(this.href,'targetWindow','toolbar=no,location=center,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=200'); return false;
                            let play_audio_link = "<a class='btn btn-light btn-sm' href='"+play_audio_url+"' title='Listen the Call Record' target='_blank' ><i class='fa fa-play-circle'></i></a>";

                            //Set values in call_record info modal
                            generateModalDiv(value);

                            // Add <td> to <tr>
                            tr += '<td class="tw-text-left">' + modal_link + play_audio_link +'</td>';

                        }else{
                            tr +='<td>&nbsp;</td>';
                        }

                        tr += '<td class="tw-text-left">';

                            $.each(value['attachments'], function (key, attachment) {
                                let title = attachment['file_name'];
                                title = title.substring(title.lastIndexOf("/") + 1);
                                title = title.substring(title.indexOf('_') + 1);
                                tr += '<a class="btn btn-default btn-block tw-bg-gray-300 btn-sm hover:tw-bg-yellow-500 mb-2" title="'+title+'" href="tickets/download_attachment/'+attachment['id']+'"><i class="fa fa-md fa-file-download"></i></a>'
                            });

                        tr += '</td></tr>';

                        $('#tbl_ticket_response_history_tbl_body').append(tr);
                    });

                    // Add Assign,Transfer and reply Buttons
                    if (data.last_ticket_response.ticket_status_id < 4
                        || data.last_ticket_response.ticket_status_id === 6
                        || data.last_ticket_response.ticket_status_id === 7
                    ){
                        let assign_ticket_modal_link ="<a class='btn btn-lg tw-bg-gradient-to-r hover:tw-from-blue-400 hover:tw-to-green-500' data-toggle='modal' data-target='#assign_ticket_modal' onclick='loadAssignTicketModal();'><span class='fa fa-hdd'></span>&nbsp;Assign</a>";
                        let transfer_ticket_modal_link ="<a class='btn btn-lg tw-bg-gradient-to-r hover:tw-from-blue-400 hover:tw-to-green-500' data-toggle='modal' data-target='#transfer_ticket_modal' onclick='loadTransferTicketModal();'><span class='fa fa-random'></span>&nbsp;Transfer</a>";
                        let reply_ticket_modal_link ="<a class='btn btn-lg tw-bg-gradient-to-r hover:tw-from-blue-400 hover:tw-to-green-500' data-toggle='modal' data-target='#reply_ticket_modal' onclick='loadReplyTicketModal();'><span class='fa fa-reply'></span>&nbsp;Reply</a>";
                        $('#ticket_assign_transfer_reply_section').html(assign_ticket_modal_link+transfer_ticket_modal_link+reply_ticket_modal_link);
                    }

                    // Added Re-Open Button if Ticket has Closed
                    if(data.is_closed === 1 && data.last_ticket_response.ticket_status_id === 4){
                        let reopen_ticket_modal_link ="<a class='btn btn-lg tw-bg-gradient-to-r hover:tw-from-blue-400 hover:tw-to-green-500' data-toggle='modal' data-target='#reopen_ticket_modal' onclick='loadReopenTicketModal();'><span class='fa fa-retweet'></span>&nbsp;Re Open</a>";
                        $('#ticket_assign_transfer_reply_section').html(reopen_ticket_modal_link);
                    }

                    //Set Default Values for all sub modals
                    $('#assign_tk_modal_ticket_no').text(data.no);
                    $('#reopen_tk_modal_ticket_no').text(data.no);
                    $('#reply_tk_modal_ticket_no').text(data.no);
                    $('#transfer_tk_modal_ticket_no').text(data.no);
                    $('#modal_call_info_tk_no').text(data.no);
                    $('#sms_modal_tk_no').text(data.no);

                    $('#assign_tk_id').val(data.id);
                    $('#reopen_tk_id').val(data.id);
                    $('#reply_tk_id').val(data.id);
                    $('#transfer_tk_id').val(data.id);
                    $('#sms_tk_id').val(data.id);
                    $('#sms_mobile').val(data.cell);

                    $('#transfer_modal_current_branch').text(data.service_branch);

                    //Open Main Modal
                    $('#view_modal').show();

                    setTimeout(function() {
                        $('#preloader').hide();
                    }, 3000);

                    //console.log(data);
                } else {
                    let message = 'Ticket Data Loading Error!!!';
                    $.notify("Error:" + message, "error");
                    $('#preloader').hide();
                }
            },
            error: function (xhr) {
                // console.log(xhr.responseText);
                let message = 'Ticket Data Loading Error!!!';
                $.notify("Error:" + message, "error");
                $('#preloader').hide();
            }
        });
    }

    //Open Assign Ticket Modal
    function loadAssignTicketModal(){
        $('#assign_ticket_modal').show();
    }

    //Open Re-Open Ticket Modal
    function loadReopenTicketModal(){
        $('#reopen_ticket_modal').show();
    }

    //Open Reply Ticket Modal
    function loadReplyTicketModal(){
        $('#reply_ticket_modal').show();
    }

    //Open Transfer Ticket Modal
    function loadTransferTicketModal(){
        $('#transfer_ticket_modal').show();
    }

    // close the ticket detail modal
    function closeModal() {
        $('#modal_span_ticket_no').empty();
        $('#modal_tbl_tk_branch').empty();
        $('#modal_tbl_tk_type').empty();
        $('#modal_tbl_tk_customer').empty();
        $('#modal_tbl_tk_customer_type').empty();
        $('#modal_tbl_tk_contact_email').empty();
        $('#modal_tbl_tk_contact_tel').empty();
        $('#modal_tbl_tk_contact_cel').empty();
        $('#modal_tbl_tk_send_sms').empty();
        $('#modal_tbl_tk_subject').empty();
        $('#modal_tbl_tk_priority').empty();
        $('#modal_tbl_tk_assign').empty();
        $('#tbl_ticket_response_history_tbl_body').empty();

        $('#assign_tk_modal_ticket_no').empty();
        $('#reopen_tk_modal_ticket_no').empty();
        $('#reply_tk_modal_ticket_no').empty();
        $('#transfer_tk_modal_ticket_no').empty();

        $('#assign_tk_id').val('');
        $('#reopen_tk_id').val('');
        $('#reply_tk_id').val('');
        $('#transfer_tk_id').val('');

        $('#transfer_modal_current_branch').text('')

        $('#modal_call_info_tk_no').text('');
        $('#modal_call_info_call').empty()
        $('#modal_call_info_inquiry_type').empty();
        $('#modal_call_info_call_type').empty();
        $('#modal_call_info_line').empty()
        $('#modal_call_info_call_duration').empty();
        $('#modal_call_info_call_time').empty();

        $('#view_modal').hide();
    }

    // Submit Ticket Assign Modal Data
    function submit_assign_data() {
        $.confirm({
            type: 'green',
            typeAnimated: true,
            theme: 'modern',
            title: 'Confirm!',
            closeIcon: true,
            closeIconClass: 'fa fa-times',
            content: 'Do You want to Assign This User with this Ticket ?',
            buttons: {
                confirm: function () {
                    $.ajax({
                        type: 'POST',
                        url: "{{route('tickets.assign_ticket_users')}}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            ticket: $('#assign_tk_id').val(),
                            assigned_user: $('#assigned_user').val(),
                            message: $('#message').val(),
                            user_hidden: $('#user_hidden').val(),
                            priority: $("#priority").val(),

                        },
                        dataType: 'json',
                        success: function (data) {
                            if (data.success != null) {
                                $.notify(data.success, "success");
                                let modal_id = "#assign_ticket_modal" ;
                                $(modal_id).modal('hide');
                                $('#assign_ticket_modal').hide();
                                loadTicketResponseHistoryTableBody(data.ticket,$('#tbl_ticket_response_history_tbl_body'));

                                //Clear Input Field
                                //$('#assigned_user').val(0);
                                $('#message').val('');
                                $('#user_hidden').removeAttr('checked');
                                $('#priority').val(0);

                                //Update Ticket field in Ticket Details Table

                                $('tkt_assigned_user').html(data.assigned_by);
                                $('tkt_assigned_by').html(data.assigned_to);
                            }
                        },
                        error: function (xhr) {
                            let message = 'Ticket Assign Data Submission Failed!!!';
                            $.notify("Error:" + message, "error");
                            // $.notify(xhr.responseText);
                            //console.log(xhr.responseText);
                        }
                    });
                },
                cancel: function () {
                    //Do Nothing
                },
            }
        });
    }

    // Load Ticket Response Table when add new response to the ticket
    function loadTicketResponseHistoryTableBody(ticket_id, table_body) {
        $.ajax({
            type: 'GET',
            url: "{{route('tickets.load_ticket_response_table')}}",
            data: {
                ticket: ticket_id,
            },
            dataType: 'json',
            success: function (data) {
                table_body.empty();
                $.each(data.ticket_response_data, function (index, value) {
                    let tr = '<tr>';
                    tr += '<td>' + value['date'] + '</td>';
                    tr += '<td>' + value['added_user'] + '</td>';
                    tr += '<td>' + value['status'] + '</td>';
                    tr += '<td class="tw-text-left">' + value['message'] + '</td>';
                    tr += '<td>&nbsp;</td>';

                    tr += '<td class="tw-text-center">';

                    $.each(value['attachments'], function (key, attachment) {
                        let title = attachment['file_name'];
                        title = title.substring(title.lastIndexOf("/") + 1);
                        title = title.substring(title.indexOf('_') + 1);
                        tr += '<a class="btn btn-default btn-block tw-bg-gray-300 btn-sm hover:tw-bg-yellow-500 mb-2" title="'+title+'" href="tickets/download_attachment/'+attachment['id']+'"><i class="fa fa-md fa-file-download"></i></a>'
                    });

                    tr += '</td></tr>';

                    table_body.append(tr);
                });
            },
            error: function (xhr) {
                let message = 'Ticket Response History Data Loading Error!!!';
                $.notify("Error:" + message, "error");
            }
        });
    }

    // Submit Ticket Reply modal Data
    function submitTicketReplyFormData(form) {
        let formData = new FormData(form);
        let reply_message = $('#reply_message').val();
        let status = $('#ticket_status').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if (reply_message !== '' && status !== null) {
            $.confirm({
                type: 'green',
                typeAnimated: true,
                theme: 'modern',
                title: 'Confirm!',
                closeIcon: true,
                closeIconClass: 'fa fa-times',
                content: 'Do You want to Reply for Ticket ?',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            type: 'POST',
                            url: "tickets/reply_ticket_form_data",
                            data: formData,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: (data) => {
                                if (data.success != null) {
                                    if(data.reply_type == 4){
                                        //locate to all_closed_tickets with ticket_id
                                        let path = '/closed_tickets?ticket_no='+data.ticket_no;
                                        window.location.assign(path);
                                        $.notify(data.success, "success");
                                    }else if(data.reply_type == 6) {
                                        //locate to all_opened_tickets with ticket_id
                                        window.location.reload()
                                        $.notify(data.success, "success");
                                    }else{
                                        $.notify(data.success, "success");
                                        loadTicketResponseHistoryTableBody(data.ticket, $('#tbl_ticket_response_history_tbl_body'));
                                        let modal_id = "#reply_ticket_modal";
                                        $(modal_id).modal('hide');

                                        //Clear the form inputs
                                        //$('#reply_tk_id').val('');
                                        $('#reply_message').val('');
                                        $('#ticket_status').val(0);
                                        $('#reply_user_hidden').removeAttr('checked');
                                        setTimeout(function() {
                                            $('#preloader').hide();
                                        }, 3000);
                                    }
                                }

                                if (data.error != null) {
                                    //console.log(data.error);
                                    let message = 'Ticket Reply Data Submission Failed. Try Again!!!';
                                    $.notify("Error:" + message, "error");
                                    $('#preloader').hide();
                                }
                            },
                            error: function (xhr) {
                                // console.log(xhr.responseText);
                                let message = 'Ticket Reply Data Submission Failed. Try Again!!!';
                                 $.notify("Error:" + message, "error");
                                //$.notify("Error:" + xhr.responseText, "error");
                            }
                        });

                    },
                    cancel: function () {
                        //Do Nothing
                    },
                }
            });
        } else {
            $.notify("Error:" + 'Reply Message and Ticket Status fields are required!!!', "error");
        }

    }

    // Apply Ticket Transfer Action
    function submit_transfer_data() {
        $.confirm({
            type: 'green',
            typeAnimated: true,
            theme: 'modern',
            title: 'Confirm!',
            closeIcon: true,
            closeIconClass: 'fa fa-times',
            content: 'Do You want to Transfer this Ticket with selected Branch ?',
            buttons: {
                confirm: function () {
                    $.ajax({
                        type: 'POST',
                        url: "{{route('tickets.transfer_ticket_branch')}}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            ticket: $('#transfer_tk_id').val(),
                            transfer_branch: $('#transfer_branch').val(),
                            transfer_message: $('#transfer_message').val(),
                            transfer_user_hidden: $('#transfer_user_hidden').val(),
                        },
                        dataType: 'json',
                        success: function (data) {
                            //console.log(JSON.stringify(data));
                            if (data.success != null) {
                                $.notify(data.success, "success");
                                loadTicketResponseHistoryTableBody(data.ticket, $('#tbl_ticket_response_history_tbl_body'));
                                let modal_id = "#transfer_ticket_modal";
                                $(modal_id).modal('hide');

                                //Clear the form inputs
                                //$('#transfer_tk_id').val('');
                                $('#transfer_branch').val(0);
                                $('#transfer_message').val('');
                                $('#transfer_user_hidden').removeAttr('checked');
                            }

                            if (data.error != null) {
                                $.notify("Error:" + data.error, "error");
                            }

                        },
                        error: function (xhr) {
                            let message = 'Ticket Transfer Data Submission Failed!!!';
                            $.notify("Error:" + message, "error");
                            //console.log(xhr.responseText);
                        }
                    });
                },
                cancel: function () {
                    //Do Nothing
                },
            }
        });
    }

    // Submit Ticket Re-Open Data
    function submitTicketReOpenFormData(form) {

        let reopen_message = $('#reopen_message').val();//re-open message
        let reopen_tk_id = $('#reopen_tk_id').val();//ticket_id
        let reopen_user_hidden = $("input[name='reopen_user_hidden']:checked").val();//on
        let formData = new FormData(form);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if (reopen_message !== '') {
            $.confirm({
                type: 'green',
                typeAnimated: true,
                theme: 'modern',
                title: 'Confirm!',
                closeIcon: true,
                closeIconClass: 'fa fa-times',
                content: 'Do You want to Re-Open this Ticket ?',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            type: 'POST',
                            url: "tickets/reopen_ticket_data_submission",
                            data: formData,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: (data) => {

                                if (data.success != null) {
                                    $.notify(data.success, "success");

                                    //locate to all_opened_tickets with ticket_id
                                    let path = '/opened_tickets?ticket_no='+data.ticket_no;
                                    window.location.assign(path);
                                }

                                if (data.error != null) {
                                    //console.log(data.error);
                                    $.notify("Error:" + data.error, "error");
                                }
                            },
                            error: function (xhr) {
                                // console.log(xhr.responseText);
                                let message = 'Ticket Re-Open Data Submission Error!!!';
                                $.notify("Error:" + message, "error");
                            }
                        });
                    },
                    cancel: function () {
                        //Do Nothing
                    },
                }
            });
        } else {
            $.notify("Error:" + 'Re-Open Message is required!!!', "error");
        }

    }

    // Generate Call Info Modal
    function generateModalDiv(value){

        // clear data in call_info modal
        $('#modal_call_info_call').empty()
        $('#modal_call_info_inquiry_type').empty();
        $('#modal_call_info_call_type').empty();
        $('#modal_call_info_line').empty()
        $('#modal_call_info_call_duration').empty();
        $('#modal_call_info_call_time').empty();

        $.ajax({
            type: 'POST',
            url: "{{route('tickets.get_play_call_record_info')}}",
            data: {
                "_token": "{{ csrf_token() }}",
                ticket_id: value['ticket_id'],
            },
            dataType: 'json',
            success: function (data) {
                if (data.success == 'success') {
                    //Apply Data to bellow areas in call info modal
                    $('#modal_call_info_call').text(data.data.call);
                    $('#modal_call_info_inquiry_type').text(data.data.inquiry_type);
                    $('#modal_call_info_call_type').text(data.data.call_type);
                    $('#modal_call_info_line').text(data.data.line);
                    $('#modal_call_info_call_duration').text(data.data.call_duration);
                    $('#modal_call_info_call_time').text(data.data.call_time);
                }
            },
            error: function (xhr) {
                let message = 'Ticket Call Info Data Loading Error!!!';
                $.notify("Error:" + message, "error");
                console.log(xhr.responseText);
            }
        });


    }

    // Submit SMS Modal Data
    function send_sms_data() {
        let sms_msg = $('#sms_message').val();

        if (sms_msg !== '') {
            $.confirm({
                type: 'green',
                typeAnimated: true,
                theme: 'modern',
                title: 'Confirm!',
                closeIcon: true,
                closeIconClass: 'fa fa-times',
                content: 'Do You want to Send ?',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            type: 'POST',
                            url: "{{route('tickets.send_ticket_sms')}}",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                ticket: $('#sms_tk_id').val(),
                                message: $('#sms_message').val(),
                                mobile: $('#sms_mobile').val(),
                            },
                            dataType: 'json',
                            success: function (data) {

                                //console.log(JSON.stringify(data));

                                if (data.success != null) {
                                    $.notify(data.success, "success");
                                    //Clear Input Field
                                    $('#sms_message').val('');
                                    let modal_id = "#sms_modal";
                                    $(modal_id).modal('hide');
                                }

                                if (data.error != null) {
                                    $.notify(data.error, 'error');
                                }
                            },
                            error: function (xhr) {
                                let message = 'SMS Sending Failed!!!';
                                $.notify("Error:" + message, "error");
                                // console.log(xhr.responseText);
                            }
                        });
                    },
                    cancel: function () {
                        //Do Nothing
                    },
                }
            });
        } else {
            $.notify('Message Field is Required', 'error');
        }
    }

    //Close All modals and re-load page
    function closeAndReloadPage(){
        closeModal();
        window.location.reload();
    }

</script>
