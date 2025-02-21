@extends('layouts.guest')

@section('title','Survey Form')

@section('content')
    <!--Nav-->
    @include('layouts.partials.guest_navbar')
    <!--Hero-->

    <div class="pt-24">
        <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
            <!--Left Col-->
            <div class="flex flex-col w-full md:w-3/5 justify-center items-start text-center md:text-left">
                <h1 class="my-4 text-5xl font-bold leading-tight">
                    Globe Internet, Survey Form
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
                Please Fill Our Survey Form
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
            <form action="{{route('guests.survey_form_save')}}" method="POST" id="open_ticket_form"
                  onsubmit="return confirm('Do You Want to Submit this Details?')">
                @csrf
                <div class="bg-white p-3">
                    <div class="flex flex-wrap bg-gray-200 rounded-lg">

                        <div class="w-full p-6 bg-white rounded-lg mx-5 my-5">
                            <div>
                                <legend class="text-base font-medium text-gray-900">Select Branch<span
                                        class="text-red-500">*</span></legend>
                            </div>
                            <div class="mt-4 space-y-4">
                                <div class="flex flex-wrap">
                                    <div class="flex items-center mb-2 mr-4">
                                        <input id="branch1" value="BT" name="branch" type="radio"
                                               {{old('branch')=== 'BT'?'checked':''}}
                                               class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                               required="">
                                        <label for="branch1"
                                               class="ml-3 block text-sm font-medium text-gray-700 mr-5 text-xs">
                                            Blantyre (BT)
                                        </label>
                                    </div>
                                    <div class="flex items-center mb-2 mr-4">
                                        <input id="branch2" {{old('branch')=== 'LLW'?'checked':''}} value="LLW"
                                               name="branch"
                                               type="radio"
                                               class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                        <label for="branch2"
                                               class="ml-3 block text-sm font-medium text-gray-700 mr-5 text-xs">
                                            Lilongwe (LLW)
                                        </label>
                                    </div>
                                    <div class="flex items-center mb-2 mr-4">
                                        <input id="branch3" {{old('branch')=== 'ZA'?'checked':''}} value="ZA"
                                               name="branch"
                                               type="radio"
                                               class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                        <label for="branch3"
                                               class="ml-3 block text-sm font-medium text-gray-700 mr-5 text-xs">
                                            Zomba (ZA)
                                        </label>
                                    </div>
                                    <div class="flex items-center mb-2 mr-4">
                                        <input id="branch4" {{old('branch')=== 'MZ'?'checked':''}} value="MZ"
                                               name="branch"
                                               type="radio"
                                               class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                        <label for="branch4"
                                               class="ml-3 block text-sm font-medium text-gray-700 text-xs">
                                            Mzuzu (MZ)
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full sm:w-1/2 px-6 mb-4">
                            <div class="flex-1">
                                <label class="text-gray-600 font-light">Customer Name<span
                                        class="text-red-500">*</span></label>
                                <input type='text' required="" value="{{old('customer_name')}}" name="customer_name"
                                       placeholder="Enter your name here" autocomplete="off"
                                       class="w-full pr-10 pl-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-purple-500 @error('customer_name') border-red-600 @enderror"/>
                                @error('customer_name')
                                <span class='text-xs text-red-600'>
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full sm:w-1/2 px-6 mb-4">
                            <div class="flex-1">
                                <label class="text-gray-600 font-light">W-Account Number</label>
                                <input type='text' value="{{old('w_account')}}" name="w_account"
                                       placeholder="Enter your w-account no here" autocomplete="off"
                                       class="w-full pr-10 pl-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-purple-500 @error('w_account') border-red-600 @enderror"/>
                                @error('w_account')
                                <span class='text-xs text-red-600'>
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full sm:w-1/2 px-6 mb-4">
                            <div class="flex-1">
                                <label class="text-gray-600 font-light">Contact Number</label>
                                <input type='text' value="{{old('contact_number')}}" name="contact_number"
                                       placeholder="Enter your contact number here" autocomplete="off"
                                       class="w-full pr-10 pl-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-purple-500 @error('contact_number') border-red-600 @enderror"/>
                                @error('contact_number')
                                <span class='text-xs text-red-600'>
                                    {{$message}}
                                </span>
                                @enderror
                                <br/>
                            </div>
                        </div>
                        <div class="w-full sm:w-1/2 px-6 mb-4">
                            <div class="flex-1">
                                <label class="text-gray-600 font-light">Contact Email</label>
                                <input type='text' value="{{old('contact_email')}}" name="contact_email"
                                       placeholder="Enter your contact email here" autocomplete="off"
                                       class="w-full pr-10 pl-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-purple-500 @error('contact_email') border-red-600 @enderror"/>
                                @error('contact_email')
                                <span class='text-xs text-red-600'>
                                    {{$message}}
                                </span>
                                @enderror
                                <br/>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap bg-gray-200 rounded-lg mt-3">

                        <div class="w-full p-6 bg-white rounded-lg mx-5 my-5">
                            <div>
                                <legend class="text-base font-medium text-indigo-600 font-bold">1. Overall, how do you
                                    rate your experience with Globe Internet Limited as your Internet service
                                    provider?<span class="text-red-500">*</span></legend>
                            </div>
                            <div class="mt-4 space-y-4">
                                <div class="flex flex-wrap">
                                    <div class="flex items-center mb-2 mr-4">
                                        <input type="radio" required="" id="radio-example-1" name="experience" value="Excellent"
                                               class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                            {{old('experience')=== 'Excellent'?'checked':''}}>
                                        <label for="radio-example-1" class="text-gray-600 ">Excellent</label>
                                    </div>
                                    <div class="flex items-center mb-2 mr-4">
                                        <input type="radio" id="radio-example-2" name="experience" value="Good"
                                               class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                            {{old('experience')=== 'Good'?'checked':''}}>
                                        <label for="radio-example-2" class="text-gray-600 ">Good</label>
                                    </div>
                                    <div class="flex items-center mb-2 mr-4">
                                        <input type="radio" id="radio-example-3" name="experience" value="Fair"
                                               class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                            {{old('experience')=== 'Fair'?'checked':''}}>
                                        <label for="radio-example-3" class="text-gray-600 ">Fair</label>
                                    </div>
                                    <div class="flex items-center mb-2 mr-4">
                                        <input type="radio" id="radio-example-4" name="experience" value="Poor"
                                               class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                            {{old('experience')=== 'Poor'?'checked':''}}>
                                        <label for="radio-example-4" class="text-gray-600 ">Poor</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap bg-gray-200 rounded-lg mt-3">

                        <div class="w-full p-6 bg-white rounded-lg mx-5 my-5">
                            <div>
                                <legend class="text-base font-medium text-indigo-600 font-bold">2. Which type of
                                    Internet/Service do you use?<span class="text-red-500">*</span></legend>
                            </div>

                            <div class="block">
                                @foreach($internet_types as $key =>$internet_type)
                                    <div class="w-full px-6 mb-4 mt-3">
                                        <label class="text-gray-400 font-bold"><i
                                                class="fa fa-clone bg-indigo-500 text-white rounded-full p-2 "></i>&nbsp;{{ucfirst($key)}}
                                        </label>
                                        <div class="block mt-3 bg-gray-100 rounded-lg p-2">
                                            @foreach($internet_type as $index => $value)
                                                <div class="flex-1 items-center">
                                                    <input type="checkbox" id="{{$value}}" value="{{$value}}"
                                                           name="types[{{$key}}][]"
                                                           class="h-4 w-4 text-gray-700 border rounded mr-2">
                                                    <label for="{{$value}}"
                                                           class=" text-black text-sm">{{$value}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <br/>
                                @endforeach

                            </div>

                        </div>
                    </div>

                    <div class="flex flex-wrap bg-gray-200 rounded-lg mt-3">
                        <div class="w-full p-6 bg-white rounded-lg mx-5 my-5">
                            <div>
                                <legend class="text-base font-medium text-indigo-600 font-bold">3. Rate the following
                                    aspects of your internet connection?<span class="text-red-500">*</span></legend>
                            </div>
                            <div class="w-full px-6 mb-4">
                                <div class="mt-4 space-y-4">
                                    <label class="text-gray-400 font-bold"><i
                                            class="fa fa-tachometer-alt bg-indigo-500 text-white rounded-full p-2"></i>&nbsp;Internet
                                        Speed</label>
                                    <div class="mt-4 space-y-4">
                                        <div class="flex flex-wrap">
                                            <div class="flex items-center mb-2 mr-4">
                                                <input type="radio" id="speed-1" required="" name="speed"
                                                       value="Excellent"
                                                       class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                                    {{old('speed')=== 'Excellent'?'checked':''}}>
                                                <label for="speed-1" class="text-gray-600 ">Excellent</label>
                                            </div>
                                            <div class="flex items-center mb-2 mr-4">
                                                <input type="radio" id="speed-2" name="speed" value="Good"
                                                       class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                                    {{old('speed')=== 'Good'?'checked':''}}>
                                                <label for="speed-2" class="text-gray-600 ">Good</label>
                                            </div>
                                            <div class="flex items-center mb-2 mr-4">
                                                <input type="radio" id="speed-3" name="speed" value="Fair"
                                                       class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                                    {{old('speed')=== 'Fair'?'checked':''}}>
                                                <label for="speed-3" class="text-gray-600 ">Fair</label>
                                            </div>
                                            <div class="flex items-center mb-2 mr-4">
                                                <input type="radio" id="speed-4" name="speed" value="Poor"
                                                       class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                                    {{old('speed')=== 'Poor'?'checked':''}}>
                                                <label for="speed-4" class="text-gray-600 ">Poor</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full px-6 mb-4">
                                <div class="mt-4 space-y-4">
                                    <label class="text-gray-400 font-bold"><i
                                            class="fa fa-chart-line bg-indigo-500 text-white rounded-full p-2"></i>&nbsp;
                                        Internet Reliability</label>
                                    <div class="mt-4 space-y-4">
                                        <div class="flex flex-wrap">
                                            <div class="flex items-center mb-2 mr-4">
                                                <input type="radio" required="" id="internet-1" name="reliability"
                                                       value="Excellent"
                                                       class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                                    {{old('reliability')=== 'Excellent'?'checked':''}}>
                                                <label for="internet-1" class="text-gray-600 ">Excellent</label>
                                            </div>
                                            <div class="flex items-center mb-2 mr-4">
                                                <input type="radio" id="internet-2" name="reliability" value="Good"
                                                       class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                                    {{old('reliability')=== 'Good'?'checked':''}}>
                                                <label for="internet-2" class="text-gray-600 ">Good</label>
                                            </div>
                                            <div class="flex items-center mb-2 mr-4">
                                                <input type="radio" id="internet-3" name="reliability" value="Fair"
                                                       class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                                    {{old('reliability')=== 'Fair'?'checked':''}}>
                                                <label for="internet-3" class="text-gray-600 ">Fair</label>
                                            </div>
                                            <div class="flex items-center mb-2 mr-4">
                                                <input type="radio" id="internet-4" name="reliability" value="Poor"
                                                       class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                                    {{old('reliability')=== 'Poor'?'checked':''}}>
                                                <label for="internet-4" class="text-gray-600 ">Poor</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap bg-gray-200 rounded-lg mt-3">
                        <div class="w-full p-6 bg-white rounded-lg mx-5 my-5">
                            <div>
                                <legend class="text-base font-medium text-indigo-600 font-bold">4. In speaking with call
                                    centre representative how do you rate the following?<span
                                        class="text-red-500">*</span></legend>
                            </div>
                            <div class="w-full px-6 mb-4">
                                <div class="mt-4 space-y-4">
                                    <label class="text-gray-400 font-bold"><i
                                            class="fa fa-reply bg-indigo-500 text-white rounded-full p-2"></i>&nbsp;Responsiveness
                                        </label>
                                    <div class="mt-4 space-y-4">
                                        <div class="flex flex-wrap">
                                            <div class="flex items-center mb-2 mr-4">
                                                <input type="radio" id="responsiveness-1" required="" name="responsiveness"
                                                       value="Excellent"
                                                       class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                                    {{old('responsiveness')=== 'Excellent'?'checked':''}}>
                                                <label for="responsiveness-1" class="text-gray-600 ">Excellent</label>
                                            </div>
                                            <div class="flex items-center mb-2 mr-4">
                                                <input type="radio" id="responsiveness-2" name="responsiveness" value="Good"
                                                       class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                                    {{old('responsiveness')=== 'Good'?'checked':''}}>
                                                <label for="responsiveness-2" class="text-gray-600 ">Good</label>
                                            </div>
                                            <div class="flex items-center mb-2 mr-4">
                                                <input type="radio" id="responsiveness-3" name="responsiveness" value="Fair"
                                                       class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                                    {{old('responsiveness')=== 'Fair'?'checked':''}}>
                                                <label for="responsiveness-3" class="text-gray-600 ">Fair</label>
                                            </div>
                                            <div class="flex items-center mb-2 mr-4">
                                                <input type="radio" id="responsiveness-4" name="responsiveness" value="Poor"
                                                       class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                                    {{old('responsiveness')=== 'Poor'?'checked':''}}>
                                                <label for="responsiveness-4" class="text-gray-600 ">Poor</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full px-6 mb-4">
                                <div class="mt-4 space-y-4">
                                    <label class="text-gray-400 font-bold"><i
                                            class="fa fa-user-tie bg-indigo-500 text-white rounded-full p-2"></i>&nbsp;
                                        Professionalism</label>
                                    <div class="mt-4 space-y-4">
                                        <div class="flex flex-wrap">
                                            <div class="flex items-center mb-2 mr-4">
                                                <input type="radio" id="professionalism-1" required="" name="professionalism"
                                                       value="Excellent"
                                                       class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                                    {{old('professionalism')=== 'Excellent'?'checked':''}}>
                                                <label for="professionalism-1" class="text-gray-600 ">Excellent</label>
                                            </div>
                                            <div class="flex items-center mb-2 mr-4">
                                                <input type="radio" id="professionalism-2" name="professionalism" value="Good"
                                                       class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                                    {{old('professionalism')=== 'Good'?'checked':''}}>
                                                <label for="professionalism-2" class="text-gray-600 ">Good</label>
                                            </div>
                                            <div class="flex items-center mb-2 mr-4">
                                                <input type="radio" id="professionalism-3" name="professionalism" value="Fair"
                                                       class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                                    {{old('professionalism')=== 'Fair'?'checked':''}}>
                                                <label for="professionalism-3" class="text-gray-600 ">Fair</label>
                                            </div>
                                            <div class="flex items-center mb-2 mr-4">
                                                <input type="radio" id="professionalism-4" name="professionalism" value="Poor"
                                                       class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                                    {{old('professionalism')=== 'Poor'?'checked':''}}>
                                                <label for="professionalism-4" class="text-gray-600 ">Poor</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full px-6 mb-4">
                                <div class="mt-4 space-y-4">
                                    <label class="text-gray-400 font-bold"><i
                                            class="fa fa-file-invoice bg-indigo-500 text-white rounded-full p-2"></i>&nbsp;
                                        When attending your problem, how would you rate the information
                                        provided?</label>
                                    <div class="mt-4 space-y-4">
                                        <div class="flex flex-wrap">
                                            <div class="flex items-center mb-2 mr-4">
                                                <input type="radio" id="information-1" required="" name="information"
                                                       value="Excellent"
                                                       class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                                    {{old('information')=== 'Excellent'?'checked':''}}>
                                                <label for="information-1" class="text-gray-600 ">Excellent</label>
                                            </div>
                                            <div class="flex items-center mb-2 mr-4">
                                                <input type="radio" id="information-2" name="information" value="Good"
                                                       class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                                    {{old('information')=== 'Good'?'checked':''}}>
                                                <label for="information-2" class="text-gray-600 ">Good</label>
                                            </div>
                                            <div class="flex items-center mb-2 mr-4">
                                                <input type="radio" id="information-3" name="information" value="Fair"
                                                       class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                                    {{old('information')=== 'Fair'?'checked':''}}>
                                                <label for="information-3" class="text-gray-600 ">Fair</label>
                                            </div>
                                            <div class="flex items-center mb-2 mr-4">
                                                <input type="radio" id="information-4" name="information" value="Poor"
                                                       class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                                    {{old('information')=== 'Poor'?'checked':''}}>
                                                <label for="information-4" class="text-gray-600 ">Poor</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full px-6 mb-4">
                                <div class="mt-4 space-y-4">
                                    <label class="text-gray-400 font-bold"><i
                                            class="fa fa-check-circle bg-green-500 text-white rounded-full p-2"></i>&nbsp;
                                        Understanding of the problem</label>
                                    <div class="mt-4 space-y-4">
                                        <div class="flex flex-wrap">
                                            <div class="flex items-center mb-2 mr-4">
                                                <input type="radio" id="problem-1" required="" name="problem"
                                                       value="Excellent"
                                                       class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                                    {{old('problem')=== 'Excellent'?'checked':''}}>
                                                <label for="problem-1" class="text-gray-600 ">Excellent</label>
                                            </div>
                                            <div class="flex items-center mb-2 mr-4">
                                                <input type="radio" id="problem-2" name="problem" value="Good"
                                                       class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                                    {{old('problem')=== 'Good'?'checked':''}}>
                                                <label for="problem-2" class="text-gray-600 ">Good</label>
                                            </div>
                                            <div class="flex items-center mb-2 mr-4">
                                                <input type="radio" id="problem-3" name="problem" value="Fair"
                                                       class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                                    {{old('problem')=== 'Fair'?'checked':''}}>
                                                <label for="problem-3" class="text-gray-600 ">Fair</label>
                                            </div>
                                            <div class="flex items-center mb-2 mr-4">
                                                <input type="radio" id="problem-4" name="problem" value="Poor"
                                                       class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                                    {{old('problem')=== 'Poor'?'checked':''}}>
                                                <label for="problem-4" class="text-gray-600 ">Poor</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap bg-gray-200 rounded-lg mt-3">
                        <div class="w-full p-6 bg-white rounded-lg mx-5 my-5">
                            <div>
                                <legend class="text-base font-medium text-indigo-600 font-bold">5. How do you rate our
                                    billing in terms of receiving invoices or notification reminders for the expiring of
                                    the internet plans?<span class="text-red-500">*</span></legend>
                            </div>
                            <div class="w-full sm:w-1/2 px-6 mb-4">
                                <div class="mt-4 space-y-4">
                                    <div class="mt-4 space-y-4">
                                        <div class="flex flex-wrap">
                                            <div class="flex items-center mb-2 mr-4">
                                                <input type="radio" id="billing-1" required="" name="billing"
                                                       value="Excellent"
                                                       class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                                    {{old('billing')=== 'Excellent'?'checked':''}}>
                                                <label for="billing-1" class="text-gray-600 ">Excellent</label>
                                            </div>
                                            <div class="flex items-center mb-2 mr-4">
                                                <input type="radio" id="billing-2" name="billing" value="Good"
                                                       class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                                    {{old('billing')=== 'Good'?'checked':''}}>
                                                <label for="billing-2" class="text-gray-600 ">Good</label>
                                            </div>
                                            <div class="flex items-center mb-2 mr-4">
                                                <input type="radio" id="billing-3" name="billing" value="Fair"
                                                       class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                                    {{old('billing')=== 'Fair'?'checked':''}}>
                                                <label for="billing-3" class="text-gray-600 ">Fair</label>
                                            </div>
                                            <div class="flex items-center mb-2 mr-4">
                                                <input type="radio" id="billing-4" name="billing" value="Poor"
                                                       class="h-4 w-4 text-gray-700 px-3 py-3 border rounded mr-2"
                                                    {{old('billing')=== 'Poor'?'checked':''}}>
                                                <label for="billing-4" class="text-gray-600 ">Poor</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap bg-green-200 rounded-lg mt-3 mb-3 border-gray-700">
                        <div class="w-full p-6 ">
                            <div class="flex-1">
                                <p class="text-center text-green-700">Thank you for completing the survey. If you require further assistance, please send an e-mail to info@globemw.net. <br/>We can also be reached on 01 841 044.</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap bg-gray-200 rounded-lg mt-3 mb-3 ">
                        <div class="w-full p-6">
                            <div class="flex-1">
                                <label class="text-gray-600 font-light">Comments & Suggetions<span
                                        class="text-red-500">*</span></label>
                                <textarea name="comments" autocomplete="off"
                                       placeholder="Add your comment here"
                                       class="w-full pr-10 pl-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-purple-500 @error('comments') border-red-600 @enderror" rows="5">{{old('comments')}}</textarea>
                                @error('comments')
                                <span class='text-xs text-red-600'>
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap bg-gray-200 rounded-lg mt-3">
                        <div class="w-full p-6 ">
                            <div class="flex-1">
                                <label class="text-gray-600 font-light">Human Verification [ 15 + five = ?]<span
                                        class="text-red-500">*</span></label>
                                <input type='text' name="human_verification" autocomplete="off" required=""
                                       placeholder="Answer in digits"
                                       class="w-full pr-10 pl-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-purple-500 @error('human_verification') border-red-600 @enderror"/>
                                @error('human_verification')
                                <span class='text-xs text-red-600'>
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap bg-gray-200 rounded-lg mt-3">
                        <div class="w-full ml-5 mr-5">
                            <button type="submit" style="text-decoration: none;cursor: pointer;"
                                    class="w-full mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                <i class="fa fa-save"></i>&nbsp;&nbsp;Submit
                            </button>
                        </div>
                    </div>
                </div>
            </form>
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
            Thank You For Filling Our Survey Form
        </h1>

        <h3 class="my-4 text-3xl leading-tight">
            Thank you for giving us the opportunity to serve you better. Please help us by taking a few minutes to tell
            us about the service that you have received so far. We appreciate your business and want to make sure we
            meet your expectations.
        </h3>
        <br/>
    </section>

@endsection
<!--Footer-->

