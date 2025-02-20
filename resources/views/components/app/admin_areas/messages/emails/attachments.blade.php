<div class="tw-w-4 tw-mr-2 tw-transform hover:tw-text-purple-500 hover:tw-scale-110">
    <button type="button" class="btn btn-sm" data-id="{{$email_log->id}}"
            role="button" data-toggle="modal" title="View Email Attachments"
            data-target="#attachment_modal{{$email_log->id}}">
        <i class="fa fa-paperclip tw-text-indigo-600 tw-font-bold fa-lg"></i>
    </button>
</div>


<!-- Start Model -->

<div class="modal fade tw-rounded-xl" id="attachment_modal{{$email_log->id}}" role="dialog">
    <div class="modal-dialog modal-lg tw-rounded-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header tw-bg-gradient-to-r tw-from-green-400 tw-to-blue-500 tw-text-white">
                <h4 class="modal-title text-white"><span class="fa fw fa-lg fa-envelope-open"></span>
                    View Email Attachments
                </h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>

            <div class="modal-body">
                <div class="row tw-mb-5">
                    <div class="container">
                        <div class="card tw-mb-3 tw-rounded-lg">
                            <div class="card-header text-left">
                                <label class="tw-font-bold tw-text-indigo-600">Attached Images</label>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @if($email_log->attachments !== null)
                                        @forelse(json_decode($email_log->attachments) as $key => $value)
                                            <?php
                                            $img_mimes = ['png', 'jpg', 'jpeg', 'gif', 'svg', 'bmp', 'tiff'];
                                            $extension = explode('.', $value->file_name)[1];
                                            $image_name = explode('/', $value->file_name)[1];
                                            if(in_array($extension, $img_mimes)){
                                            if(file_exists($value->file_name)){?>
                                            <div class="col-sm-4 tw-mb-4">
                                                <a href="{{asset($value->file_name)}}" target="_blank">
                                                    <img src="{{asset($value->file_name)}}"
                                                         class="img-fluid img-thumbnail mb-1"
                                                         style="height: 100%;width: 100%"
                                                         title="{{$image_name.'.'.$extension}}"/></a>
                                                <span class="tw-text-center">{{$image_name.'.'.$extension}}</span>
                                            </div>
                                            <?php
                                            }
                                            }
                                            ?>
                                        @empty
                                            <span class="tw-text-center tw-text-pink-600">No Images Found within Attachments!!!</span>
                                        @endforelse
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="card tw-mb-3 tw-rounded-lg">
                            <div class="card-header text-left">
                                <label class="tw-font-bold tw-text-indigo-600">Attached Non-Image Files</label>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @if($email_log->attachments !== null)
                                            @forelse(json_decode($email_log->attachments) as $key => $value)
                                                @php
                                                    $file_mimes = ['pdf','txt','xls','doc','docx','xml','csv','dbf','ppt','pptx','pptx','zip','html'];
                                                    $file_extension = explode('.',$value->file_name)[1];
                                                    $file_name = explode('/',$value->file_name)[1];
                                                @endphp
                                                @if(in_array($file_extension,$file_mimes))
                                                    <ul>
                                                        @if(file_exists($value->file_name))
                                                            <li class="tw-bg-indigo-100 tw-text-indigo-600 tw-rounded-lg tw-text-left tw-pl-3 tw-pr-0">
                                                                <a href="{{asset($value->file_name)}}" target="_blank"
                                                                   class="tw-text-indigo-600"
                                                                   style="text-decoration: none">{{$file_name.'.'.$file_extension}}</a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                @else
                                                <!-- Do Nothing -->
                                                @endif
                                            @empty
                                                <span class="tw-text-center tw-text-pink-600">No Images Found within Attachments!!!</span>
                                            @endforelse
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card tw-mb-3 tw-rounded-lg tw-bg-pink-100">
                            <div class="card-header text-left">
                                <label class="tw-font-bold tw-text-pink-600">Un-Supported / Un-Readable
                                    Attachments</label>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @if($email_log->attachments !== null)
                                            @forelse(json_decode($email_log->attachments) as $key => $value)
                                                @php
                                                    $img_mimes = ['png','jpg','jpeg','gif','svg','bmp','tiff'];
                                                    $file_mimes = ['pdf','txt','xls','doc','docx','xml','csv','dbf','ppt','pptx','pptx','zip','html'];
                                                    $extension = explode('.',$value->file_name)[1];
                                                    $image_name = explode('/',$value->file_name)[1];
                                                @endphp
                                                @if(!in_array($extension,$file_mimes) && !in_array($extension,$img_mimes))
                                                    <ul>
                                                        @if(file_exists($value->file_namev))
                                                            <li class="tw-bg-indigo-100 tw-text-indigo-600 tw-rounded-lg tw-text-left tw-pl-3 tw-pr-0">
                                                                <a href="{{asset($value->file_name)}}" target="_blank"
                                                                   class="tw-text-indigo-600"
                                                                   style="text-decoration: none">{{$image_name.'.'.$extension}}</a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                @else
                                                <!-- Do Nothing -->
                                                @endif
                                            @empty
                                                <span class="tw-text-center tw-text-pink-600">No Images Found within Attachments!!!</span>
                                            @endforelse
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">

            </div>

        </div>

    </div>
</div>
