<div class="tw-w-4 tw-mr-2 tw-transform hover:tw-text-purple-500 hover:tw-scale-110">
    <button type="button" class="btn btn-light btn-sm" data-id="{{$notice->id}}"
            role="button" data-toggle="modal" title="Show Message"
            data-target="#show_modal{{$notice->id}}" >
        <i class="fa fa-comment-dots tw-text-indigo-600 tw-font-bold"></i>
    </button>
</div>


<!-- Start Model -->

<div class="modal fade rounded" id="show_modal{{$notice->id}}" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header tw-bg-gradient-to-r tw-from-green-400 tw-to-blue-500 tw-text-white">
                <h4 class="modal-title text-white"><span class="fa fw fa-lg fa-comment-dots"></span>
                    The Notice - {{$notice->title}}
                </h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>

            <div class="modal-body">
                <div class="row table-responsive">
                    <div class="col-sm-12">
                        {{$notice->msg}}
                    </div>
                </div>
            </div>
            <div class="card-footer">

            </div>

        </div>

    </div>
</div>
