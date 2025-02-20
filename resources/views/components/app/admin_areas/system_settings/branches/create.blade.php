

<!-- Start Model -->

<div class="modal fade tw-rounded-lg" id="create_modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header tw-bg-gradient-to-r tw-from-green-400 tw-to-blue-500 tw-text-white">
                <h4 class="modal-title text-white"><span class="fa fa-sitemap tw-text-white"></span>&nbsp;
                    Add New Branch
                </h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>

            <div class="modal-body">
                <form class="form_create" id="branch_form" action="{{route('branches.store')}}" method="POST">
                    @csrf
                    <div class="col-sm-12">
                        <div class="form-group form-group-sm">
                            <label class="tw-float-left">Branch Code</label>
                            <input type="text" name="code" required="" class="form-control form-control-sm" placeholder="Enter Branch Code"/>
                        </div>
                        <div class="form-group form-group-sm">
                            <label class="tw-float-left">Branch Name</label>
                            <input type="text" name="branch" required="" class="form-control form-control-sm" placeholder="Enter Branch Name"/>
                        </div>
                        <div class="form-group form-group-sm">
                            <label class="tw-float-left">Branch Email</label>
                            <input type="email" name="email" required="" class="form-control form-control-sm" placeholder="Enter Branch Email"/>
                        </div>
                        <div class="row" style="width:100%;">
                            <div class="col-sm-12">
                                <div class="form-group p-2 tw-bg-yellow-200 tw-text-yellow-700 tw-rounded-lg">
                                    <span class="tw-text-yellow-800 tw-font-bold"><i class="fa fa-exclamation-triangle"></i>&nbsp;Warning!</span>
                                    &nbsp;Enter valid Email Addresses coma (,) separately, Invalid Email Addresses will be removed when save details!!!
                                </div>
                                <div class="form-group form-group-sm tw-ml-3">
                                    <label for="email_cc">Email CC Addresses </label>
                                    <textarea class="form-control" name="email_cc" id="email_cc">{{$branch->email_cc_users}}</textarea>
                                    <x-invalid_feedback field="email_cc"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button type="submit" role="button" form="branch_form"
                        class="btn btn-sm tw-mt-3 tw-float-left tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">
                    <i class="fa fa-save"></i>&nbsp;Save
                </button>
            </div>

        </div>

    </div>
</div>

@section('scripts')
    <script>
        $("#email_cc_addresses").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        })
    </script>
@endsection
