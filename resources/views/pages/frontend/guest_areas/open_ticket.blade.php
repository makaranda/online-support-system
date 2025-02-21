@extends('layouts.frontend')
@section('title','Open Tickets')
@section('content')

<div class="pt-24">
    <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
        <!--Left Col-->
        <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
            <h1 class="my-4 text-5xl font-bold leading-tight">
                Open New Ticket
            </h1>
        </div>
    </div>
</div>
<div class="relative -mt-12 lg:-mt-24">
    <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg"
         xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
                <path
                    d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                    opacity="0.100000001"></path>
                <path
                    d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                    opacity="0.100000001"
                ></path>
                <path
                    d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                    id="Path-4" opacity="0.200000003"></path>
            </g>
            <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
                <path
                    d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"
                ></path>
            </g>
        </g>
    </svg>
</div>

<section class="bg-white border-b py-8">
    <div class="container max-w-5xl mx-auto m-8">
        <h1 class="w-full my-2 text-3xl font-bold leading-tight text-center text-gray-800">
            Please fill form to open a new ticket.
        </h1>
        <div class="w-full mb-4">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <div class="flex flex-wrap bg-gray-100 rounded-lg">
            <div class="flex-1">
                @if (session()->has('success'))
                    <div x-data="{ show: true }" x-show="show"
                         class="flex justify-between items-center bg-green-200 relative text-green-600 py-3 px-3 rounded-lg">
                        <div>
                            <span class="font-semibold text-green-700">Success</span><br/>
                            {{ session()->get('success') }}
                        </div>
                        <div>
                            <i class="fa fa-times-circle text-green-700" style="cursor: pointer;" @click="show = false" role="button"></i>
                        </div>
                    </div>
                @endif

                @if (session()->has('error_string'))
                    <div x-data="{ show: true }" x-show="show"
                         class="flex justify-between items-center bg-red-200 relative text-red-600 py-3 px-3 rounded-lg">
                        <div>
                            <span class="font-semibold text-red-700">Error</span><br/>
                            {{ session()->get('error_string') }}
                        </div>
                        <div>
                            <i class="fa fa-times-circle text-red-700" style="cursor: pointer;" @click="show = false" role="button"></i>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <br/>
        <div class="bg-white p-3">
            <form action="{{route('guests.open_ticket_save')}}" method="POST" id="open_ticket_form">
                <div class="flex flex-wrap bg-gray-100 rounded-lg">
                    @csrf
                    <div class="w-full sm:w-1/2 p-6">
                        <div class="flex-1">
                            <br/>
                            <label class="text-gray-600 font-light">Web server Account Number</label>
                            {{--                            <div class="flex items-center mt-2 mb-6"></div>--}}
                            <input type='text' name="w_account_no"
                                   placeholder="Enter your web server account here" value="{{old('w_account_no')}}"
                                   class="w-full pr-10 pl-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-purple-500 @error('w_account_no') border-red-600 @enderror"/>
                            @error('w_account_no')
                            <br/>
                            <span class='text-xs text-red-600'>
                                        {{$message}}
                                    </span>
                            @enderror
                        </div>
                        <div class="flex-1">
                            <br/>
                            <label class="text-gray-600 font-light">Email Address <span
                                    class="text-red-500">*</span></label>
                            <input type='text' required="" value="{{old('email')}}" name="email"
                                   placeholder="Enter your email here"
                                   class="w-full pr-10 pl-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-purple-500 @error('email') border-red-600 @enderror"/>
                            @error('email')
                            <span class='text-xs text-red-600'>
                                    {{$message}}
                                </span>
                            @enderror

                        </div>
                        <div class="flex-1">
                            <br/>
                            <label class="text-gray-600 font-light">Telephone</label>
                            <input type='text' name="telephone_no" value="{{old('telephone_no')}}"
                                   placeholder="Enter your telephone here"
                                   class="w-full pr-10 pl-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-purple-500 @error('telephone_no') border-red-600 @enderror"/>
                            @error('telephone_no')
                            <span class='text-xs text-red-600'>
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                        <div class="flex-1">
                            <br/>
                            <label class="text-gray-600 font-light">Service Branch <span
                                    class="text-red-500">*</span></label>
                            <select required="" name="service_branch"
                                    class="bg-white text-gray-600 border inline-block pl-4 py-2 pr-8 rounded-lg leading-tight w-full focus:outline-none focus:border-purple-500 @error('service_branch') border-red-600 @enderror">
                                <option class="pt-6" selected="" disabled="" value="0">Select Service Branch</option>
                                @foreach($service_branches as $service_branch)
                                    @if(old('service_branch') == $service_branch->id)
                                        <option class="pt-6" selected="" disabled=""
                                                value="{{$service_branch->id}}">{{$service_branch->name}}</option>
                                    @else
                                        <option class="pt-6"
                                                value="{{$service_branch->id}}">{{$service_branch->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('service_branch')
                            <span class='text-xs text-red-600'>
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full sm:w-1/2 p-6">
                        <div class="flex-1">
                            <br/>
                            <label class="text-gray-600 font-light">Customer Name <span
                                    class="text-red-500">*</span></label>
                            <input type='text' name="customer_name" required=""
                                   placeholder="Enter your name here" value="{{old('customer_name')}}"
                                   class="w-full pr-10 pl-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-purple-500 @error('customer_name') border-red-600 @enderror"/>
                            @error('customer_name')
                            <span class='text-xs text-red-600'>
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                        <div class="flex-1">
                            <br/>
                            <label class="text-gray-600 font-light">Cell Phone<span
                                    class="text-red-500">*</span></label>
                            <input type='text' name="cell_phone_no" value="{{old('cell_phone_no')}}"
                                   placeholder="Enter your cell phone no here"
                                   class="w-full pr-10 pl-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-purple-500 @error('cell_phone_no') border-red-600 @enderror"/>
                            @error('cell_phone_no')
                            <span class='text-xs text-red-600'>
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                        <div class="flex-1">
                            <br/>
                            <label class="text-gray-600 font-light">Service Type</label>
                            <select name="service_type"
                                    class="bg-white text-gray-600 border inline-block pl-4 py-2 pr-8 rounded-lg leading-tight w-full focus:outline-none focus:border-purple-500 @error('service_type') border-red-600 @enderror">
                                <option class="pt-6" selected="" disabled="" value="0">Select Service Type</option>
                                @foreach($service_types as $service_type)
                                    @if(old('service_type') == $service_type->id)
                                        <option class="pt-6" selected=""
                                                value="{{$service_type->id}}">{{$service_type->name}}</option>
                                    @else
                                        <option class="pt-6"
                                                value="{{$service_type->id}}">{{$service_type->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('service_type')
                            <span class='text-xs text-red-600'>
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="flex-1">
                            <br/>
                            <label class="text-gray-600 font-light">Priority</label>
                            <select name="priority"
                                    class="bg-white text-gray-600 border inline-block pl-4 py-2 pr-8 rounded-lg leading-tight w-full focus:outline-none focus:border-purple-500 @error('priority') border-red-600 @enderror">
                                <option class="pt-6" selected="" disabled="" value="0">Select Priority</option>
                                @php
                                    $priorities = ['Low','Normal','High'];
                                @endphp

                                @foreach($priorities as $priority)
                                    @if(old('priority') == $priority)
                                        <option class="pt-6" selected="" value="{{$priority}}">{{$priority}}</option>
                                    @else
                                        <option class="pt-6" value="{{$priority}}">{{$priority}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('priority')
                            <span class='text-xs text-red-600'>
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full ml-5 mr-5">
                        <br/>
                        <label class="text-gray-600 font-light mt-3">Subject <span class="text-red-500">*</span></label>
                        <input required="" name="subject" type='text'
                               placeholder="Enter your subject here" value="{{old('subject')}}"
                               class="w-full border inline-block pl-4 py-2 pr-8 mt-1 border rounded-lg text-gray-700 focus:outline-none focus:border-purple-500 @error('subject') border-red-600 @enderror"/>
                        <br/>
                        @error('subject')
                        <span class='text-xs text-red-600 mb-3'>
                             {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="w-full ml-5 mr-5">
                        <br/>
                        <label class="text-gray-600 font-light mt-3">Message<span class="text-red-500">*</span></label>
                        <textarea required="" name="message"
                                  placeholder="Enter your message here"
                                  class="w-full border inline-block pl-4 py-2 pr-8 mt-1 border rounded-lg text-gray-700 focus:outline-none focus:border-purple-500 @error('message') border-red-600 @enderror"
                                  rows="5">{{old('message')}}</textarea>
                        @error('message')
                        <span class='text-xs text-red-600 mb-3'>
                             {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="w-full ml-5 mr-5">
                        <button type="submit" style="text-decoration: none;cursor: pointer;"
                                class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                            <i class="fa fa-save"></i>&nbsp;&nbsp;Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>


<!-- Change the colour #f8fafc to match the previous section colour -->
<svg class="wave-top" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg"
     xmlns:xlink="http://www.w3.org/1999/xlink">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g transform="translate(-1.000000, -14.000000)" fill-rule="nonzero">
            <g class="wave" fill="#f8fafc">
                <path
                    d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z"
                ></path>
            </g>
            <g transform="translate(1.000000, 15.000000)" fill="#FFFFFF">
                <g transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
                    <path
                        d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                        opacity="0.100000001"></path>
                    <path
                        d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                        opacity="0.100000001"
                    ></path>
                    <path
                        d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                        opacity="0.200000003"></path>
                </g>
            </g>
        </g>
    </g>
</svg>

<section class="container mx-auto text-center py-6 mb-12">
    <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-white">
        Fill Survey Form
    </h1>

    <h3 class="my-4 text-3xl leading-tight">
        Thank you for giving us the opportunity to serve you better. Please help us by taking a few minutes to tell
        us about the service that you have received so far. We appreciate your business and want to make sure we
        meet your expectations.
    </h3>
    <br/>
    <a href="{{route('guests.survey_form')}}" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"
       style="text-decoration:none;cursor: pointer">
        <i class="fa fa-address-card"></i>&nbsp;Fill Survey Form
    </a>
</section>

@endsection

@push('css')
    <style>
        .gradient {
            background: linear-gradient(90deg, #00c3ff 0%, mediumpurple 50%);
        }
    </style>
@endpush

@push('js')
    <script>
        $(document).ready(function () {
                $("#open_ticket_form").on("submit", function (event) {
                    event.preventDefault(); // Prevent immediate submission

                    Swal.fire({
                        title: "Are you sure?",
                        text: "Do you want to submit this ticket?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, submit it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $("#open_ticket_form")[0].submit(); // Submit form if confirmed
                        }
                    });
                });
            });
    </script>
@endpush
