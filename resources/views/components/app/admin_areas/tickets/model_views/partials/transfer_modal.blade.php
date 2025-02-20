<!-- Transfer Ticket Modal Start -->
<div class="modal tw-rounded-lg px-3" id="transfer_ticket_modal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content tw-rounded-lg tw-bg-white">
            <div class="modal-header">
                <h5 class="modal-title tw-text-gray-800" id="exampleModalCenterTitle"><i class="fa fa-random"></i>&nbsp;Transfer
                    Ticket - <span id="transfer_tk_modal_ticket_no"></span></h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="tw-bg-gray-300 tw-text-black tw-rounded-md p-2 mb-3">
                            Current Branch is <span id="transfer_modal_current_branch"></span>
                        </div>
                    </div>
                    <br/>
                    <div class="col-sm-12">
                        <div class="form-group form-group-sm">
                            <select class="form-control form-control-sm" id="transfer_branch"
                                    name="transfer_branch">
                                <option selected="" disabled="" value="0">Select Branch</option>
                                @foreach(\App\Models\Branch::whereStatus(1)->get() as $branch)
                                   <option value="{{$branch->id}}">{{$branch->name.'('.$branch->code.')'}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group form-group-sm">
                                <textarea class="form-control form-control-sm" id="transfer_message"
                                          name="transfer_message" rows="10"></textarea>
                        </div>
                        <div class="form-group form-group-sm tw-float-left">
                            <input type="checkbox" class="i-check-flat-green"
                                   id="transfer_user_hidden" name="user_hidden"/>&nbsp;&nbsp;&nbsp;Don't
                            show this message to customer
                        </div>
                    </div>
                </div>
                <input type="hidden" name="transfer_tk_id" id="transfer_tk_id"/>
                <button type="button" role="button" onclick="submit_transfer_data()"
                        class="btn btn-sm tw-mt-3 tw-float-left tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">
                    <i class="fa fa-save"></i>&nbsp;Save
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Transfer Ticket Modal End-->
