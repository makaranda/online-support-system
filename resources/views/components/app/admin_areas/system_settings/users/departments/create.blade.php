<div class="tw-w-4 tw-mr-2 tw-transform hover:tw-text-purple-500 hover:tw-scale-110">
    <button type="button" class="btn btn-sm" data-id="{{$user->id}}"
            role="button" data-toggle="modal" title="Assign User to Department/s"
            data-target="#edit_modal{{$user->id}}" >
        <i class="fa fa-code-branch tw-text-purple-700 tw-font-bold"></i>
    </button>
</div>


<!-- Start Model -->

<div class="modal fade tw-rounded-lg" id="edit_modal{{$user->id}}" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header tw-bg-gradient-to-r tw-from-green-400 tw-to-blue-500 tw-text-white">
                <h4 class="modal-title text-white"><span class="fa fa-code-branch text-text"></span>&nbsp;
                    &nbsp;Assign Department/s to {{$user->username}}</h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>

            <div class="modal-body">
                <form class="form_edit" id="user_department_form{{$user->id}}" action="{{route('user_departments.update',$user)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-sm-12">
                        <div class="form-group form-group-sm">
                            <label class="tw-float-left">Select Department/s</label>
                            <select class="select2-multiple form-control form-control-sm " multiple="" name="departments[]" style="width: 100%;">
                                @foreach($departments as $department)
                                    @if($user->departments->contains($department->id))
                                        <option value="{{$department->id}}" selected="" class="tw-bg-gradient-to-r tw-from-green-400 tw-to-blue-500">{{$department->name}}</option>
                                    @else
                                        <option value="{{$department->id}}" class="tw-bg-gradient-to-r tw-from-green-400 tw-to-blue-500">{{$department->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                </form>
            </div>
            <div class="card-footer">
                <button type="submit" role="button" form="user_department_form{{$user->id}}"
                        class="btn btn-sm tw-mt-3 tw-float-left tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">
                    <i class="fa fa-save"></i>&nbsp;Save
                </button>
            </div>

        </div>

    </div>
</div>
