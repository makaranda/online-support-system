<!-- Reply Ticket Modal Start -->
<div class="modal tw-rounded-lg px-3" id="reply_ticket_modal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content tw-rounded-lg tw-bg-white">
            <div class="modal-header">
                <h5 class="modal-title tw-text-gray-800" id="exampleModalCenterTitle"><i class="fa fa-reply"></i>&nbsp;
                    Reply to Ticket - <span id="reply_tk_modal_ticket_no"></span></h5>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" id="ticket_reply_form"
                      action="javascript:void(0)" onsubmit="submitTicketReplyFormData(this)">
                    @csrf
                    <div class="form-group form-group-sm">
                            <textarea class="form-control form-control-sm" id="reply_message"
                                      name="reply_message" rows="10"
                                      form="ticket_reply_form"
                                      placeholder="Enter Ticket Reply Message (Required)"></textarea>
                    </div>
                    <div class="form-group form-group-sm tw-float-left">
                        <input type="checkbox" class="i-check-flat-green" id="reply_user_hidden"
                               form="ticket_reply_form"
                               name="reply_user_hidden"/>&nbsp;&nbsp;&nbsp;Don't show this message to
                        customer
                    </div>
                    <div class="form-group form-group-sm">
                        <select class="form-control form-control-sm" id="ticket_status"
                                name="ticket_status" form="ticket_reply_form">
                            <option selected="" disabled="" value="0">Select Status</option>
                            @foreach(App\Models\TicketStatus::whereStatus(1)->get() as $ticket_status)
                                @if(in_array($ticket_status->id,[1,4,6]))
                                    <option value="{{$ticket_status->id}}">{{$ticket_status->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group form-group-sm">
                        <input type="file" name="attachments[]" multiple=""
                               form="ticket_reply_form"
                               id="attachments" class="form-control-file py-1" accept='image/*'/>
                    </div>
                    <input type="hidden" name="reply_tk_id" id="reply_tk_id" form="ticket_reply_form"/>
                    <button type="submit" role="button" form="ticket_reply_form"
                            class="btn btn-sm tw-mt-3 tw-float-left tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">
                        <i class="fa fa-save"></i>&nbsp;Save
                    </button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<!-- Reply Ticket Modal End-->
