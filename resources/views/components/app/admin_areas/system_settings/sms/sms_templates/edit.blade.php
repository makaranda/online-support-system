<div class="tw-w-4 tw-mr-2 tw-transform hover:tw-text-purple-500 hover:tw-scale-110">
    <button type="button" class="btn btn-sm" data-id="{{$template->id}}"
            role="button" data-toggle="modal" title="Edit Template"
            data-target="#edit_modal{{$template->id}}" >
        <i class="fa fa-pen tw-text-yellow-900 tw-font-bold"></i>
    </button>
</div>


<!-- Start Model -->

<div class="modal fade tw-rounded-lg" id="edit_modal{{$template->id}}" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header tw-bg-gradient-to-r tw-from-green-400 tw-to-blue-500 tw-text-white">
                <h4 class="modal-title text-white"><span class="fa fa-fw fa-lg fa-sms"></span>
                    Edit Template
                </h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>

            <div class="modal-body">
                <form class="form_edit" id="sms_template_form{{$template->id}}" action="{{route('sms_templates.update',$template)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-sm-12">
                        <div class="form-group form-group-sm">
                            <label class="tw-float-left">Topic</label>
                            <input type="text" value="{{$template->topic}}" required="" name="topic" class="form-control form-control-sm"/>
                        </div>
                        <div class="form-group form-group-sm">
                            <label class="tw-float-left">Message</label>
                            <textarea  required="" name="message" class="form-control form-control-sm" rows="10">{{$template->message}}</textarea>
                        </div>
                        <div class="form-group">
                            @if($template->status == 0)
                                <div class="card tw-border-white ">
                                    <div class="card-header tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 tw-h-10 tw-rounded-full">
                                        <label class="card-title tw-text-white">SMS Template Status</label>
                                    </div>
                                    <div class="card-body tw-bg-gradient-to-r tw-from-blue-100 tw-to-green-100 ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group form-group-sm tw-ml-3">
                                                    <input type="checkbox" class="i-check-flat-green" name="status" {{$template->status == 1?'checked':''}}/>&nbsp;&nbsp;&nbsp;Active
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                </form>
            </div>
            <div class="card-footer">
                <button type="submit" role="button" form="sms_template_form{{$template->id}}"
                        class="btn btn-sm tw-mt-3 tw-float-left tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">
                    <i class="fa fa-save"></i>&nbsp;Save
                </button>
            </div>

        </div>

    </div>
</div>
