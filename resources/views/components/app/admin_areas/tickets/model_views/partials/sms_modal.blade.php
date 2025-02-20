<!-- SMS Modal Start -->
<div class="modal tw-rounded-lg px-3" id="sms_modal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content tw-rounded-lg tw-bg-white">
            <div class="modal-header">
                <h5 class="modal-title tw-text-gray-800" id="exampleModalCenterTitle"><i
                        class="fa fa-hdd"></i>&nbsp;Enter SMS Content For Ticket
                    - <span id="sms_modal_tk_no"></span></h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <textarea class="form-control form-control-sm" id="sms_message" rows="10"
                            name="sms_message" placeholder="Enter Your Message Here..."></textarea>
                        </div>
                        <div class="form-group form-group-sm">
                            <input type="text" class="form-control form-control-sm"
                                   id="sms_mobile" readonly=""
                                   name="sms_mobile"
                                   value=""/>&nbsp;&nbsp;&nbsp;
                        </div>
                    </div>
                </div>
                <input type="hidden" id="sms_tk_id" name="sms_tk_id"/>
                <button type="button" role="button" id="btn_sms_submit"
                        onclick="send_sms_data()"
                        class="btn btn-sm tw-mt-3 tw-float-left tw-float-left tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">
                    <i class="fa fa-paper-plane"></i>&nbsp;Send SMS
                </button>
            </div>
        </div>
    </div>
</div>
<!-- SMS Modal End-->
