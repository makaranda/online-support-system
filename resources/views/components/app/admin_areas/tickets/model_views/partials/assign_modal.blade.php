<!-- Assign Ticket Modal Start -->
<div class="modal tw-rounded-lg px-3" id="assign_ticket_modal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content tw-rounded-lg tw-bg-white">
            <div class="modal-header">
                <h5 class="modal-title tw-text-gray-800" id="exampleModalCenterTitle"><i class="fa fa-hdd"></i>&nbsp;Assign
                    Ticket - <span id="assign_tk_modal_ticket_no"></span></h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <select class="form-control form-control-sm " style="width: 100%;"
                                    name="assigned_user" id="assigned_user">
                                <option class="tw-text-left" selected="" disabled="" value="0">Select User to
                                    Assign
                                </option>
                                @foreach(\App\Models\User::whereStatus(1)->get() as $user)
{{--                                    @if($ticket->assigned_to !== $user->id)--}}
{{--                                        <option class="tw-text-left"--}}
{{--                                                value="{{$user->id}}">{{$user->username.' | '.$user->email}}</option>--}}
{{--                                    @endif--}}
                                        <option class="tw-text-left" value="{{$user->id}}">{{$user->username.' | '.$user->email}}</option>


                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                                <textarea class="form-control form-control-sm" name="message"
                                          id="message" rows="10"
                                          placeholder="Enter Ticket Reply Message"></textarea>
                        </div>
                        <div class="form-group form-group-sm tw-float-left">
                            <input type="checkbox" class="i-check-flat-green" id="user_hidden"
                                   name="user_hidden"/>&nbsp;&nbsp;&nbsp;Don't show this message to
                            customer
                        </div>
                        <div class="form-group form-group-sm ">
                            <label class="tw-float-left">Priority</label>
                            <select class="form-control form-control-sm" id="priority" name="priority">
                                <option disabled="" value="0">Select Priority</option>
                                <option class="tw-bg-green-200 tw-text-green-700" value="Low">Low</option>
                                <option class="tw-bg-blue-200 tw-text-blue-700" value="Normal">Normal</option>
                                <option class="tw-bg-pink-200 tw-text-pink-700" value="High">High</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="assign_tk_id" id="assign_tk_id"/>
                </div>

                <button type="button" role="button" id="btn_assign_ticket"
                        onclick="submit_assign_data()"
                        class="btn btn-sm tw-mt-3 tw-float-left tw-float-left tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">
                    <i class="fa fa-save"></i>&nbsp;Save
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Assign Ticket Modal End-->
