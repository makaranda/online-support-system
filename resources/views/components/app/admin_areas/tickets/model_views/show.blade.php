<!-- Ticket Modal Start Here -->
<div class="modal tw-rounded-lg" id="view_modal" role="dialog" data-backdrop="static"
     data-keyboard="false" style="font-size: 11px;">
    <div class="modal-dialog modal-dialog-top modal-xl  table-responsive " style="height: 70%;">
        <!-- Modal content-->
        <div class="modal-content tw-rounded-lg" style="height: 100%;">
            <div class="modal-header tw-bg-gradient-to-r tw-from-green-400 tw-to-blue-500 tw-text-white">
                <h4 class="modal-title text-white"><span class="fa fa-check-double tw-text-white"></span>
                    Ticket Status ( Ticket No - <span id="modal_span_ticket_no"> </span>)
                </h4>
                <div class="btn-group-sm btn-group-toggle">
                    <button type="button" onclick="closeAndReloadPage();" class="btn btn-sm btn-light hover:tw-bg-green-600 hover:tw-text-white" title="Close and Reload whole page"><i class="fa fa-lg fa-undo-alt"></i>&nbsp;Reload</button>
                    <button type="button" onclick="closeModal();" class="btn btn-sm btn-light hover:tw-bg-red-600 hover:tw-text-white" title="Close the Ticket Detail View"><i class="fa fa-lg fa-times-circle"></i>&nbsp;Close</button>
                </div>

{{--                <i class="fa fa-lg fa-times-circle tw-text-white hover:tw-text-black" type="button" class="close"--}}
{{--                   data-dismiss="modal" onclick="closeModal();"></i>--}}
            </div>

            <div class="modal-body tw-bg-gray-200" style="max-height: calc(100% - 120px);overflow-y: scroll;">
                <!-- Big section cards -->
                <h4 class="tw-mb-4 tw-text-lg tw-font-semibold tw-text-gray-600 dark:tw-text-gray-300 text-center">
                    Ticket Details
                </h4>

                <div
                    class="tw-px-4 tw-py-3 tw-mb-8 tw-bg-white tw-rounded-lg tw-shadow-md dark:tw-bg-gray-800 table-responsive">
                    <table class="table table-borderless table-striped" id="modal_tbl_ticket">
                        <tr>
                            <th class="tw-text-left">Branch</th>
                            <td class="tw-text-left"><span id="modal_tbl_tk_branch"></span></td>
                            <th class="tw-text-left">Service Type</th>
                            <td class="tw-text-left"
                                colspan="2"><span id="modal_tbl_tk_type"></span></td>
                        </tr>
                        <tr>
                            <th class="tw-text-left">Customer Name</th>
                            <td class="tw-text-left"><span id="modal_tbl_tk_customer"></span> </td>
                            <th class="tw-text-left">Customer Type</th>
                            <td class="tw-text-left"><span id="modal_tbl_tk_customer_type"></span> </td>
                        </tr>
                        <tr>
                            <th class="tw-text-left">Contact Details</th>
                            <td class="tw-text-left" colspan="3">
                                <span id="modal_tbl_tk_contact_email"></span>
                                <span id="modal_tbl_tk_contact_tel"></span>
                                <span id="modal_tbl_tk_contact_cel"></span>
                                <span id="modal_tbl_tk_send_sms"></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="tw-text-left">Issue Subject</th>
                            <td class="tw-text-left"><span id="modal_tbl_tk_subject"></span></td>
                            <th class="tw-text-left">Priority</th>
                            <td class="tw-text-left">
                                <div id="modal_tbl_tk_priority"></div>
                            </td>
                        </tr>
                        <tr>
                            <th class="tw-text-left">Ticket</th>
                            <td class="tw-text-left" colspan="3">
                                <span id="modal_tbl_tk_assign"></span>
                            </td>
                        </tr>
                    </table>
                    <br/>
                    <h4 class="tw-mb-4 tw-text-lg tw-font-semibold tw-text-gray-600 dark:tw-text-gray-300 text-center">
                        Ticket Response History Details
                    </h4>
                    <div
                        class="tw-px-4 tw-py-3 tw-mb-8 tw-bg-white tw-rounded-lg tw-shadow-md dark:tw-bg-gray-800 table-responsive">
                        <table class="table table-borderless table-striped">
                            <thead>
                            <tr>
                                <th class="tw-text-left">Date</th>
                                <th class="tw-text-left">By</th>
                                <th class="tw-text-left">Status</th>
                                <th class="tw-text-left">Message</th>
                                <th class="tw-text-left">Call Info</th>
                                <th class="tw-text-left">Attachments</th>
                            </tr>
                            </thead>
                            <tbody id="tbl_ticket_response_history_tbl_body"></tbody>
                        </table>
                    </div>
                    <div class="btn-group btn-group-justified tw-w-full tw-bg-white tw-text-black tw-rounded-lg"
                         id="ticket_assign_transfer_reply_section">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <span class="tw-pb-3"></span>
            </div>
        </div>
    </div>
</div>

{{-- @include('app.admin_areas.tickets.model_views.partials.assign_modal')
@include('app.admin_areas.tickets.model_views.partials.transfer_modal')
@include('app.admin_areas.tickets.model_views.partials.reply_modal')
@include('app.admin_areas.tickets.model_views.partials.reopen_modal')
@include('app.admin_areas.tickets.model_views.partials.call_info')
@include('app.admin_areas.tickets.model_views.partials.sms_modal') --}}
