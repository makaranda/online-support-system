@extends('layouts.app',[
    'parentSection' => 'Information',
])

@section('title','Add New Package Info')

@section('content')
    <div class="container-fluid tw-px-10">
        <main class="tw-h-full tw-overflow-y-auto">
            <div class="tw-bg-white tw-p-6 tw-rounded-lg tw-shadow-lg">
                <div class="card tw-border-white tw-rounded">
                    <div class="card-header tw-bg-white">
                        <h2 class="tw-text-2xl tw-font-bold tw-mb-2 tw-text-gray-800 tw-float-left">Add New Package Info</h2>

                        <a href="{{route("package_infos.index")}}" role="button"
                           class="btn btn-sm tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400 hover:tw-from-blue-400 hover:tw-to-green-400 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">
                            <i class="fa fa-list"></i>&nbsp;ALL Package Infos
                        </a>

                    </div>
                    <div class="card-body">
                        <form action="{{route('package_infos.store')}}" method="POST" id="form_create" class="form_create">
                            @csrf

                            <div class="card tw-mb-5 tw-border-white">
                                <div
                                    class="card-header tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 tw-h-10">
                                    <label class="card-title tw-text-white">Package Details</label>
                                </div>
                                <div class="card-body text-dark">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-sm">
                                            <label class="tw-float-left">Service</label>
                                            <select class="form-control form-control-sm @error('service') tw-border-red-600 @enderror" name="service">
                                                <option value="0" selected="" disabled="">--Select Service--</option>
                                                @foreach($services as $service)
                                                    @if(old('service') == $service->id)
                                                        <option selected="" value="{{$service->id}}">{{$service->name}}</option>
                                                    @else
                                                        <option value="{{$service->id}}">{{$service->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <x-invalid_feedback field="service"/>
                                        </div>

                                        <div class="form-group form-group-sm">
                                            <label>Information</label>
                                            <textarea name="information" rows="5" required id="create_message" class="form-control form-control-sm @error('information') tw-border-red-600 @enderror">{{old('information')}}</textarea>
                                            <x-invalid_feedback field="information"/>
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
    <script type="text/javascript" src="{{asset('vendors/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
        CKEDITOR.replace( 'create_message', { height:'300px'},{allowedContent: true} );
    </script>
@endsection
