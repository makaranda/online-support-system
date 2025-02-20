

<!-- Start Model -->

<div class="modal fade tw-rounded-lg" id="create_modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header tw-bg-gradient-to-r tw-from-green-400 tw-to-blue-500 tw-text-white">
                <h4 class="modal-title text-white"><span class="fa fa-sms fa-lg fw text-text"></span>
                    Add New SMS Template
                </h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>

            <div class="modal-body">
                <form class="form_create" id="user_type_form" action="{{route('sms_templates.store')}}" method="POST">
                    @csrf
                    <div class="col-sm-12">
                        <div class="form-group form-group-sm">
                            <label class="tw-float-left">Topic</label>
                            <input type="text" name="topic" required="" class="form-control form-control-sm" placeholder="Enter Topic"/>
                        </div>

                        <div class="form-group form-group-sm">
                            <label class="tw-float-left">Message</label>
                            <textarea name="message" required="" class="form-control form-control-sm" placeholder="Enter Message" rows="10"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button type="submit" role="button" form="user_type_form"
                        class="btn btn-sm tw-mt-3 tw-float-left tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">
                    <i class="fa fa-save"></i>&nbsp;Save
                </button>
            </div>

        </div>

    </div>
</div>
