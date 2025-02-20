<div class="tw-w-4 tw-mr-2 tw-transform hover:tw-text-purple-500 hover:tw-scale-110">
    <button type="button" class="btn btn-sm" data-id="{{$usertype->id}}"
            role="button" data-toggle="modal" title="Edit UserType"
            data-target="#edit_modal{{$usertype->id}}" >
        <i class="fa fa-pen tw-text-yellow-900 tw-font-bold"></i>
    </button>
</div>


<!-- Start Model -->

<div class="modal fade tw-rounded-lg" id="edit_modal{{$usertype->id}}" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header tw-bg-gradient-to-r tw-from-green-400 tw-to-blue-500 tw-text-white">
                <h4 class="modal-title text-white"><span class="fa fa-user-shield text-text"></span>&nbsp;
                    Edit User Type
                </h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>

            <div class="modal-body">
                <form class="form_edit" id="user_type_form{{$usertype->id}}" action="{{route('user_types.update',$usertype)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-sm-12">
                        <div class="form-group form-group-sm">
                            <label class="tw-float-left">User Type</label>
                            <input type="text" value="{{$usertype->name}}" required="" name="user_type" class="form-control form-control-sm"/>
                        </div>
                        <div class="form-group">
                            @if($usertype->status == 0)
                                <div class="card tw-border-white tw-bg-white">
                                    <div class="card-header tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 tw-h-10 tw-rounded-full">
                                        <label class="card-title tw-text-white">User Type Status</label>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group form-group-sm tw-ml-3">
                                                    <input type="checkbox" class="i-check-flat-green" name="status" {{$usertype->status == 1?'checked':''}}/>&nbsp;&nbsp;&nbsp;Active
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
                <button type="submit" role="button" form="user_type_form{{$usertype->id}}"
                        class="btn btn-sm tw-mt-3 tw-float-left tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">
                    <i class="fa fa-save"></i>&nbsp;Save
                </button>
            </div>

        </div>

    </div>
</div>
