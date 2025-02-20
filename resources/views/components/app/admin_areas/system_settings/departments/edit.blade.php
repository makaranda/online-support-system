<div class="tw-w-4 tw-mr-2 tw-transform hover:tw-text-purple-500 hover:tw-scale-110">
    <button type="button" class="btn btn-sm" data-id="{{$department->id}}"
            role="button" data-toggle="modal" title="Edit Department"
            data-target="#edit_modal{{$department->id}}" >
        <i class="fa fa-pen tw-text-yellow-900 tw-font-bold"></i>
    </button>
</div>


<!-- Start Model -->

<div class="modal fade tw-rounded-lg" id="edit_modal{{$department->id}}" role="dialog">
    <div class="modal-dialog modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header tw-bg-gradient-to-r tw-from-green-400 tw-to-blue-500 tw-text-white">
                <h4 class="modal-title text-white"><span class="fa fa-code-branch tw-text-white"></span>&nbsp;
                    Edit Department
                </h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>

            <div class="modal-body">
                <form class="form_edit" id="department_form{{$department->id}}" action="{{route('departments.update',$department)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-sm-12">
                        <div class="form-group form-group-sm">
                            <label class="tw-float-left">Department Code</label>
                            <input type="text" value="{{$department->code}}" name="code" required="" class="form-control form-control-sm" placeholder="Enter Department Code"/>
                        </div>
                        <div class="form-group form-group-sm">
                            <label class="tw-float-left">Department Name</label>
                            <input type="text" value="{{$department->name}}" required="" name="department" class="form-control form-control-sm" placeholder="Enter Department Name"/>
                        </div>
                        <div class="form-group">
                            @if($department->status == 0)
                                <div class="card tw-border-white tw-bg-white">
                                    <div class="card-header tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 tw-h-10 tw-rounded-full">
                                        <label class="card-title tw-text-white">Department Status</label>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group form-group-sm tw-ml-3">
                                                    <input type="checkbox" class="i-check-flat-green" name="status" {{$department->status == 1?'checked':''}}/>&nbsp;&nbsp;&nbsp;Active
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
                <button type="submit" role="button" form="department_form{{$department->id}}"
                        class="btn btn-sm tw-mt-3 tw-float-left tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">
                    <i class="fa fa-save"></i>&nbsp;Save
                </button>
            </div>

        </div>

    </div>
</div>
