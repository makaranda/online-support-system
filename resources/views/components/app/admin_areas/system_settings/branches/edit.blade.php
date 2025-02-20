<div class="tw-w-4 tw-mr-2 tw-transform hover:tw-text-purple-500 hover:tw-scale-110">
    <button type="button" class="btn btn-sm" data-id="{{$branch->id}}"
            role="button" data-toggle="modal" title="Edit Branch"
            data-target="#edit_modal{{$branch->id}}" >
        <i class="fa fa-pen tw-text-yellow-900 tw-font-bold"></i>
    </button>
</div>

@section('styles')

@endsection
<!-- Start Model -->

<div class="modal fade tw-rounded-lg" id="edit_modal{{$branch->id}}" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header tw-bg-gradient-to-r tw-from-green-400 tw-to-blue-500 tw-text-white">
                <h4 class="modal-title text-white"><span class="fa fa-sitemap tw-text-white"></span>&nbsp;
                    Edit Branch
                </h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>

            <div class="modal-body">
                <form class="form_edit" id="branch_form{{$branch->id}}" action="{{route('branches.update',$branch)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-sm-12">
                        <div class="form-group form-group-sm">
                            <label class="tw-float-left">Branch Code</label>
                            <input type="text" value="{{$branch->code}}" name="code" required="" class="form-control form-control-sm" placeholder="Enter Branch Code"/>
                        </div>
                        <div class="form-group form-group-sm">
                            <label class="tw-float-left">Branch Name</label>
                            <input type="text" value="{{$branch->name}}" required="" name="branch" class="form-control form-control-sm" placeholder="Enter Branch Name"/>
                        </div>
                        <div class="form-group form-group-sm">
                            <label class="tw-float-left">Branch Email</label>
                            <input type="text" name="email" value="{{$branch->email}}" required="" class="form-control form-control-sm" placeholder="Enter Branch Email"/>
                        </div>
                        <div class="form-group">
                            @if($branch->status == 0)
                                <div class="card tw-border-white tw-bg-white">
                                    <div class="card-header tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 tw-h-10 tw-rounded-full">
                                        <label class="card-title tw-text-white">Branch Status</label>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group form-group-sm tw-ml-3">
                                                    <input type="checkbox" class="i-check-flat-green" name="status" {{$branch->status == 1?'checked':''}}/>&nbsp;&nbsp;&nbsp;Active
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="row" style="width:100%;">
                            <div class="col-sm-12">
                                <div class="form-group p-2 tw-bg-yellow-200 tw-text-yellow-700 tw-rounded-lg">
                                    <span class="tw-text-yellow-800 tw-font-bold"><i class="fa fa-exclamation-triangle"></i>&nbsp;Warning!</span>
                                    &nbsp;Enter valid Email Addresses coma (,) separately, Invalid Email Addresses will be removed when save details!!!
                                </div>
                                <div class="form-group form-group-sm tw-ml-3">
                                    <label for="email_cc">Email CC Addresses</label>
                                    <textarea class="form-control" name="email_cc" id="email_cc">{{$branch->email_cc_users}}</textarea>
                                    <x-invalid_feedback field="email_cc"/>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="card-footer">
                <button type="submit" role="button" form="branch_form{{$branch->id}}"
                        class="btn btn-sm tw-mt-3 tw-float-left tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">
                    <i class="fa fa-save"></i>&nbsp;Save
                </button>
            </div>

        </div>

    </div>
</div>

@section('scripts')

@endsection
