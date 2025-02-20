<div class="tw-w-4 tw-mr-2 tw-transform hover:tw-text-purple-500 hover:tw-scale-110">
    <button type="button" class="btn btn-sm" data-id="{{$email_log->id}}"
            role="button" data-toggle="modal" title="View Email Message"
            data-target="#show_modal{{$email_log->id}}" >
        <i class="fa fa-envelope-open tw-text-indigo-600 tw-font-bold fa-lg"></i>
    </button>
</div>


<!-- Start Model -->

<div class="modal fade tw-rounded-xl" id="show_modal{{$email_log->id}}" role="dialog">
    <div class="modal-dialog modal-xl tw-rounded-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header tw-bg-gradient-to-r tw-from-green-400 tw-to-blue-500 tw-text-white">
                <h4 class="modal-title text-white"><span class="fa fw fa-lg fa-envelope-open"></span>
                    View Email Message
                </h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>

            <div class="modal-body">
                {!! $email_log->msg !!}
            </div>
            <div class="card-footer">

            </div>

        </div>

    </div>
</div>
