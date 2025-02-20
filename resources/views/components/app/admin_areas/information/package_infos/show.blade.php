<div class="tw-w-4 tw-mr-2 tw-transform hover:tw-text-purple-500 hover:tw-scale-110">
    <button type="button" class="btn btn-sm" data-id="{{$package_info->id}}"
            role="button" data-toggle="modal" title="Edit Template"
            data-target="#show_modal{{$package_info->id}}" >
        <i class="fa fa-eye tw-text-blue-500 tw-font-bold"></i>
    </button>
</div>


<!-- Start Model -->

<div class="modal fade rounded" id="show_modal{{$package_info->id}}" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header tw-bg-gradient-to-r tw-from-green-400 tw-to-blue-500 tw-text-white">
                <h4 class="modal-title text-white"><span class="fa fw fa-lg fa-gift"></span>
                    View Package Information
                </h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>

            <div class="modal-body">
                <table class="table table-borderless table-striped">
                    <tr>
                        <th class="text-left">Service</th>
                        <td class="text-muted">{{($package_info->service)?$package_info->service->name:""}}</td>
                    </tr>
                    <tr>
                        <th class="text-left">Information</th>
                        <td class="text-muted"><div class="container tw-border-2 tw-border-gray-500 tw-p-2 tw-rounded-lg">{!!$package_info->information!!}</div></td>
                    </tr>
                    <tr>
                        <th class="text-left">Status</th>
                        <td>
                            <span
                                class="{{($package_info->status == 1)?'tw-bg-green-200 tw-text-green-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs ':'tw-bg-red-200 tw-text-red-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs'}}">
                                    {{$package_info->get_status($package_info->status)}}</span>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="card-footer">

            </div>

        </div>

    </div>
</div>
