@extends('layouts.app',[
    'parentSection' => 'Messages',
])

@section('title','Add Notice')

@section('content')
    <div class="container-fluid tw-px-10">
        <main class="tw-h-full tw-overflow-y-auto">
            <div class="tw-bg-white tw-p-6 tw-rounded-lg tw-shadow-lg">
                <div class="card tw-border-white tw-rounded">
                    <div class="card-header tw-bg-white">
                        <h2 class="tw-text-2xl tw-font-bold tw-mb-2 tw-text-gray-800 tw-float-left">Add Notice</h2>

                        <a href="{{route("notices.index")}}" role="button"
                           class="btn btn-sm tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400 hover:tw-from-blue-400 hover:tw-to-green-400 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">
                            <i class="fa fa-flag-checkered"></i>&nbsp;All Notices
                        </a>

                    </div>
                    <div class="card-body">
                        <form action="{{route('notices.store')}}" method="POST" id="form_create" class="form_create">
                            @csrf

                            <div class="card tw-mb-5 tw-border-white">
                                <div
                                    class="card-header tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 tw-h-10">
                                    <label class="card-title tw-text-white">Notice Details</label>
                                </div>
                                <div class="card-body">
                                    <div class="card tw-mb-5 tw-rounded-lg">
                                        <div class="card-body tw-bg-gray-200">
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                    <label>Title <i class="fa fa-asterisk tw-text-pink-700 tw-text-xs"></i></label>
                                                    <input type="text" autocomplete="off" class="form-control form-control-sm @error('title') tw-border-red-600 @enderror"
                                                           placeholder="Enter the Title" name="title" id="title" required="" value="{{old('title')}}">
                                                    <x-invalid_feedback field="title"/>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Expire Date<i class="fa fa-asterisk tw-text-pink-700 tw-text-xs"></i></label>
                                                    <input type="text" autocomplete="off" class="datepicker form-control form-control-sm @error('expire_date') tw-border-red-600 @enderror"
                                                           placeholder="Enter Expire Date" name="expire_date" id="expire_date" required="" value="{{old('expire_date')}}">
                                                    <x-invalid_feedback field="expire_date"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card tw-mb-5 tw-rounded-lg">
                                        <div class="card-body tw-bg-gray-200">
                                            <div class="card-title">Type of the Notice&nbsp;<i class="fa fa-asterisk tw-text-pink-700 tw-text-xs"></i></div>
                                            <div class="row" style="width:100%;">
                                                <div class="col-sm-3">
                                                    <div class="tw-mt-1">
                                                        <label class="tw-inline-flex tw-items-center">
                                                            <input type="radio" checked="" class="tw-form-radio tw-h-5 tw-w-5 tw-text-yellow-500" name="type" value="Message">
                                                            <span class="tw-ml-4 tw-text-medium">Message</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="tw-mt-1">
                                                        <label class="tw-inline-flex tw-items-center">
                                                            <input type="radio" class="tw-form-radio tw-h-5 tw-w-5" name="type" value="Info" >
                                                            <span class="tw-ml-4 tw-text-medium">Info</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="tw-mt-1">
                                                        <label class="tw-inline-flex tw-items-center">
                                                            <input type="radio" class="tw-form-radio tw-h-5 tw-w-5" name="type" value="Warning">
                                                            <span class="tw-ml-4 tw-text-medium">Warning</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="tw-mt-1">
                                                        <label class="tw-inline-flex tw-items-center ">
                                                            <input type="radio" class="tw-form-radio tw-h-5 tw-w-5 " name="type" value="Critical Warning" style="color: red;">
                                                            <span class="tw-ml-4 tw-text-medium">Critical Warning</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card tw-mb-5 tw-rounded-lg">
                                        <div class="card-body tw-bg-gray-200">
                                            <div class="card-title">Message&nbsp;<i class="fa fa-asterisk tw-text-pink-700 tw-text-xs"></i></div>
                                            <div class="form-group form-group-sm">
                                                    <textarea name="message" id="message" maxlength="160" class="form-control form-control-sm @error('message') tw-border-red-600 @enderror"
                                                              rows="10" required="" placeholder="Enter Message Here...">{{old('message')}}</textarea>

                                                <x-invalid_feedback field="message"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer tw-bg-white ">
                        <button type="submit" role="button" form="form_create"
                                class="btn btn-sm tw-mt-3 tw-float-left tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">
                            <i class="fa fa-save"></i>&nbsp;save
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>

@endsection

@section('scripts')

@endsection
