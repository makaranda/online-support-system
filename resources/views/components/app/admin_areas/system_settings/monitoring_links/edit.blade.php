<div class="tw-w-4 tw-mr-2 tw-transform hover:tw-text-purple-500 hover:tw-scale-110">
    <button type="button" class="btn btn-sm" data-id="{{$monitoring_link->id}}"
            role="button" data-toggle="modal" title="Edit Monitoring Link"
            data-target="#edit_modal{{$monitoring_link->id}}" >
        <i class="fa fa-pen tw-text-yellow-900 tw-font-bold"></i>
    </button>
</div>


<!-- Start Model -->

<div class="modal fade tw-rounded-lg" id="edit_modal{{$monitoring_link->id}}" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header tw-bg-gradient-to-r tw-from-green-400 tw-to-blue-500 tw-text-white">
                <h4 class="modal-title text-white"><span class="fa fa-tv"></span>&nbsp;
                    Edit Monitoring Link
                </h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>

            <div class="modal-body">
                <form class="form_edit" id="monitoring_link_form{{$monitoring_link->id}}" action="{{route('monitoring_links.update',$monitoring_link)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                       <div class="col-sm-6">
                           <div class="form-group form-group-sm">
                               <label class="tw-float-left">Parent Item Name</label>
                               <input type="text" value="{{$monitoring_link->parent_item_name}}" required=""
                                      name="parent_item_name" class="form-control form-control-sm" placeholder="Enter Parent Item Name"/>
                           </div>
                       </div>
                       <div class="col-sm-6">
                           <div class="form-group form-group-sm">
                               <label class="tw-float-left">Parent Item Icon</label>
                               <input type="text" value="{{$monitoring_link->parent_item_icon}}" required=""
                                      name="parent_item_icon" class="form-control form-control-sm" placeholder="Enter Parent Item Icon"/>
                           </div>
                       </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group form-group-sm">
                                <label class="tw-float-left">Child Item Name</label>
                                <input type="text" value="{{$monitoring_link->child_item_name}}" required=""
                                       name="child_item_name" class="form-control form-control-sm" placeholder="Enter Child Item Name"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-sm">
                                <label class="tw-float-left">Child Item Icon</label>
                                <input type="text" value="{{$monitoring_link->child_item_icon}}" required=""
                                       name="child_item_icon" class="form-control form-control-sm" placeholder="Enter Child Item Icon"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-sm">
                                <label class="tw-float-left">Monitoring Link</label>
                                <input type="text" value="{{$monitoring_link->link}}" required="" name="monitoring_link"
                                       class="form-control form-control-sm" placeholder="Enter the Link / URL"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button type="submit" role="button" form="monitoring_link_form{{$monitoring_link->id}}"
                        class="btn btn-sm tw-mt-3 tw-float-left tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">
                    <i class="fa fa-save"></i>&nbsp;Save
                </button>
            </div>

        </div>

    </div>
</div>
