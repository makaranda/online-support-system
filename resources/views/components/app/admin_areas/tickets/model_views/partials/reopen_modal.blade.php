<!-- Reply Ticket Modal Start -->
<div class="modal tw-rounded-lg px-3" id="reopen_ticket_modal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content tw-rounded-lg tw-bg-white">
            <div class="modal-header">
                <h5 class="modal-title tw-text-gray-800" id="exampleModalCenterTitle"><i class="fa fa-reply"></i>&nbsp;
                    Re-Open Ticket - <span id="reopen_tk_modal_ticket_no"></span></h5>
            </div>
            <div class="modal-body">
                <form method="POST" id="ticket_reopen_form"
                      action="javascript:void(0)" onsubmit="submitTicketReOpenFormData(this)">
                    @csrf
                    <div class="form-group form-group-sm">
                            <textarea class="form-control form-control-sm" id="reopen_message"
                                      name="reopen_message" rows="10"
                                      form="ticket_reopen_form"
                                      placeholder="Enter Ticket Re-Open Message (Required)"></textarea>
                    </div>
                    <div class="form-group form-group-sm tw-float-left">
                        <input type="checkbox" class="i-check-flat-green" id="reopen_user_hidden"
                               form="ticket_reopen_form"
                               name="reopen_user_hidden"/>&nbsp;&nbsp;&nbsp;Don't show this message to
                        customer
                    </div>
                    <input type="hidden" name="reopen_tk_id" id="reopen_tk_id" form="ticket_reopen_form"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" role="button" form="ticket_reopen_form"
                        class="btn btn-sm float-left tw-mt-3 tw-float-left tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">
                    <i class="fa fa-save"></i>&nbsp;Save
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Reply Ticket Modal End-->
