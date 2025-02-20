

<!-- Start Model -->

<div class="modal fade twtw-rounded-lg" id="create_modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header tw-bg-gradient-to-r tw-from-green-400 tw-to-blue-500 tw-text-white">
                <h4 class="modal-title text-white"><span class="fa fa-tv"></span>&nbsp;
                    Add New Monitor Link
                </h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>

            <div class="modal-body">
                <form class="form_create" id="user_type_form" action="{{route('monitoring_links.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group form-group-sm">
                                <label class="tw-float-left">Parent Item Name</label>
                                <input type="text" value="" required="" name="parent_item_name"
                                       class="form-control form-control-sm" placeholder="Enter Parent Item Name"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-sm">
                                <label class="tw-float-left">Parent Item Icon</label>
                                <input type="text" value="" required="" name="parent_item_icon"
                                       class="form-control form-control-sm" placeholder="Enter Parent Item Icon"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group form-group-sm">
                                <label class="tw-float-left">Child Item Name</label>
                                <input type="text" value="" required="" name="child_item_name"
                                       class="form-control form-control-sm" placeholder="Enter Child Item Name"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-sm">
                                <label class="tw-float-left">Child Item Icon</label>
                                <input type="text" value="" required="" name="child_item_icon"
                                       class="form-control form-control-sm" placeholder="Enter Child Item Icon"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-sm">
                                <label class="tw-float-left">Monitoring Link</label>
                                <input type="text" value="" required="" name="monitoring_link"
                                       class="form-control form-control-sm" placeholder="Enter the Link / URL" />
                            </div>
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
