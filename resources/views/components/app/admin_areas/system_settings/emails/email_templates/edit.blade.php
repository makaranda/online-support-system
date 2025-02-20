@extends('layouts.system_settings',[
    'parentSection' => 'System Settings',
    'childSection' => 'Email Templates',
])
@section('styles')

@endsection

@section("title") Edit Email Template @endsection

@section('content')

    <div class="container">
        <div class="tw-bg-white tw-p-6 tw-rounded-lg tw-shadow-lg">
            <div class="card tw-border-white tw-rounded ">
                <div class="card-header tw-bg-white">
                    <h2 class="tw-text-2xl tw-font-bold tw-mb-2 tw-text-blue-600 tw-float-left">Edit Email Template</h2>
                    <a href="{{route("email_templates.index")}}" role="button"
                       class="btn btn-sm tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-purple-400 focus:tw-to-pink-500 focus:tw-text-white">
                        <i class="fa fa-list"></i>&nbsp;All Email Template
                    </a>
                </div>
                <div class="card-body text-dark">
                    <form action="{{route('email_templates.update',$email_template)}}" method="POST" id="form_edit" class="form_edit">
                        @csrf
                        @method('PUT')

                        <div class="card tw-mb-5 tw-border-white">
                            <div class="card-header tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400 tw-h-10">
                                <label class="card-title">Template Details</label>
                            </div>
                            <div class="card-body">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-sm">
                                        <label class="tw-float-left">Topic</label>
                                        <input type="text" class="form-control form-control-sm @error('topic') tw-border-red-600 @enderror"
                                               name="topic" placeholder="Enter Email Topic" value="{{$email_template->topic}}"/>
                                        <x-invalid_feedback field="topic"/>
                                    </div>
                                    <div class="form-group form-group-sm">
                                        <label class="tw-float-left">Subject</label>
                                        <input type="text" class="form-control form-control-sm @error('subject') tw-border-red-600 @enderror"
                                               name="subject" placeholder="Enter Email Subject" value="{{$email_template->subject}}"/>
                                        <x-invalid_feedback field="subject"/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-group-sm">
                                        <label>Message</label>
                                        <textarea name="message" required="" id="edit_message" class="form-control form-control-sm @error('message')'is-invalid'@enderror">{{$email_template->message}}</textarea>
                                        <x-invalid_feedback field="message"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($email_template->status == 0)
                            <div class="card tw-border-white tw-bg-white">
                                <div class="card-header tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 tw-h-10 tw-rounded-full">
                                    <label class="card-title tw-text-white">Email Template Status</label>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group form-group-sm tw-ml-3">
                                                <input type="checkbox" class="i-check-flat-green " name="status" {{$email_template->status == 1?'checked':''}}/>&nbsp;&nbsp;&nbsp;Active
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </form>
                </div>
                <div class="card-footer tw-bg-white ">
                    <button type="submit" role="button" form="form_edit"
                            class="btn btn-sm tw-mt-3 tw-float-left tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">
                        <i class="fa fa-save"></i>&nbsp;Update
                    </button>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('vendors/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
        CKEDITOR.replace( 'edit_message', { height:'300px'},{allowedContent: true} );
    </script>
@endsection
