@extends('layouts.guest')

@section('title','KYC Form')

@section('content')
    <!--Nav-->
    @include('layouts.partials.guest_navbar')
    <!--Hero-->

    <div class="pt-24">
        <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
            <!--Left Col-->
            <div class="flex flex-col w-full md:w-3/5 justify-center items-start text-center md:text-left">
                <h1 class="my-4 text-5xl font-bold leading-tight">
                    Globe Internet, KYC Form
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
                Please fill Online Know Your Customer Form
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
            <form action="{{route('guests.kyc_form_save')}}" method="POST" id="open_ticket_form"
                  onsubmit="return confirm('Do You Want to Submit this Details?')">
                @csrf
                <div class="bg-white p-3">
                    <div class="flex flex-wrap bg-gray-200 rounded-lg">
                        <div class="w-full sm:w-1/3 p-6">
                            <div class="flex-1">
                                <label class="text-gray-600 font-light">W-Account Number<span
                                        class="text-red-500">*</span></label>
                                <input type='text' name="w_account_no" required="" autofocus autocomplete="off"
                                       placeholder="Enter your w-account here" value="{{old('w_account_no')}}"
                                       class="w-full pr-10 pl-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-purple-500 @error('w_account_no') border-red-600 @enderror"/>
                                @error('w_account_no')
                                <span class='text-xs text-red-600'>
                                {{$message}}
                            </span>
                                @enderror
                            </div>
                            <div class="flex-1">
                                <br/>
                                <label class="text-gray-600 font-light">City<span
                                        class="text-red-500">*</span></label>
                                <input type='text' name="city" required=""
                                       placeholder="Enter your city here" value="{{old('city')}}" autocomplete="off"
                                       class="w-full pr-10 pl-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-purple-500 @error('city') border-red-600 @enderror"/>
                                @error('city')
                                <span class='text-xs text-red-600'>
                                {{$message}}
                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full sm:w-2/3 p-6">
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
                            <div class="flex-1">
                                <br/>
                                <label class="text-gray-600 font-light">Postal Address<span
                                        class="text-red-500">*</span></label>
                                <input type='text' required="" value="{{old('postal_address')}}" name="postal_address"
                                       placeholder="Enter your personal address here" autocomplete="off"
                                       class="w-full pr-10 pl-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-purple-500 @error('postal_address') border-red-600 @enderror"/>
                                @error('postal_address')
                                <span class='text-xs text-red-600'>
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap bg-gray-200 rounded-lg mt-3">
                        <div class="w-full sm:w-1/2 p-6">
                            <div class="flex-1">
                                <label class="text-gray-600 font-light">Email 1</label>
                                <input type='email' name="email_1"
                                       placeholder="Enter email 1 here" value="{{old('email_1')}}" autocomplete="off"
                                       class="w-full pr-10 pl-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-purple-500 @error('email_1') border-red-600 @enderror"/>
                                @error('email_1')
                                <span class='text-xs text-red-600'>
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                            <div class="flex-1">
                                <br/>
                                <label class="text-gray-600 font-light">Immediate Contact Phone<span
                                        class="text-red-500">*</span></label>
                                <input type='text' name="immediate_contact_phone" value="{{old('immediate_contact_phone')}}"
                                       placeholder="Enter your cell phone no here" required="" autocomplete="off"
                                       class="w-full pr-10 pl-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-purple-500 @error('immediate_contact_phone') border-red-600 @enderror"/>
                                @error('immediate_contact_phone')
                                <span class='text-xs text-red-600'>
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full sm:w-1/2 p-6">
                            <div class="flex-1">
                                <label class="text-gray-600 font-light">Email 2</label>
                                <input type='email' name="email_2" autocomplete="off"
                                       placeholder="Enter your email 2 here" value="{{old('email_2')}}"
                                       class="w-full pr-10 pl-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-purple-500 @error('email_2') border-red-600 @enderror"/>
                                @error('email_2')
                                <span class='text-xs text-red-600'>
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                            <div class="flex-1">
                                <br/>
                                <label class="text-gray-600 font-light">Other Phone</label>
                                <input type='text' name="other_phone" value="{{old('other_phone')}}"
                                       placeholder="Enter your other phone no here" autocomplete="off"
                                       class="w-full pr-10 pl-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-purple-500 @error('other_phone') border-red-600 @enderror"/>
                                @error('other_phone')
                                <span class='text-xs text-red-600'>
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap bg-gray-200 rounded-lg mt-3">
                        <div class="w-full sm:w-1/3 p-6">
                            <div class="flex-1">
                                <label class="text-gray-600 font-light">Contact Person</label>
                                <input type='text' name="contact_person" autocomplete="off"
                                       placeholder="Enter your contact person's name" value="{{old('contact_person')}}"
                                       class="w-full pr-10 pl-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-purple-500 @error('contact_person') border-red-600 @enderror"/>
                                @error('contact_person')
                                <span class='text-xs text-red-600'>
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full sm:w-1/3 p-6">
                            <div class="flex-1">
                                <label class="text-gray-600 font-light">Contact Person's Email</label>
                                <input type='text' name="contact_person_email" value="{{old('contact_person_email')}}"
                                       placeholder="Enter your contact person's email" autocomplete="off"
                                       class="w-full pr-10 pl-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-purple-500 @error('contact_person_email') border-red-600 @enderror"/>
                                @error('contact_person_email')
                                <span class='text-xs text-red-600'>
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full sm:w-1/3 p-6">
                            <div class="flex-1">
                                <label class="text-gray-600 font-light">Contact Person's Phone</label>
                                <input type='text' name="contact_person_phone" autocomplete="off"
                                       placeholder="Enter your contact person's Phone " value="{{old('contact_person_phone')}}"
                                       class="w-full pr-10 pl-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-purple-500 @error('contact_person_phone') border-red-600 @enderror"/>
                                @error('contact_person_phone')
                                <span class='text-xs text-red-600'>
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap bg-gray-200 rounded-lg mt-3">
                        <div class="w-full sm:w-1/2 p-6">
                            <div class="flex-1">
                                <label class="text-gray-600 font-light">Finance Director Name</label>
                                <input type='text' name="finance_director_name" autocomplete="off"
                                       placeholder="Enter finance director name here" value="{{old('finance_director_name')}}"
                                       class="w-full pr-10 pl-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-purple-500 @error('finance_director_name') border-red-600 @enderror"/>
                                @error('finance_director_name')
                                <span class='text-xs text-red-600'>
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full sm:w-1/2 p-6">
                            <div class="flex-1">
                                <label class="text-gray-600 font-light">GM/CEO/MD Name</label>
                                <input type='text' name="gm_ceo_md" autocomplete="off"
                                       placeholder="Enter GM/CEO/MD name" value="{{old('gm_ceo_md')}}"
                                       class="w-full pr-10 pl-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-purple-500 @error('gm_ceo_md') border-red-600 @enderror"/>
                                @error('gm_ceo_md')
                                <span class='text-xs text-red-600'>
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap bg-gray-200 rounded-lg mt-3">
                        <div class="w-full sm:w-1/2 p-6">
                            <div class="flex-1">
                                <label class="text-gray-600 font-light">Amount Pay</label>
                                <input type='text' name="amount_pay"
                                       placeholder="Enter Amount here" value="{{old('amount_pay')}}"
                                       class="w-full pr-10 pl-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-purple-500 @error('amount_pay') border-red-600 @enderror"/>
                                @error('amount_pay')
                                <span class='text-xs text-red-600'>
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full sm:w-1/2 p-6">
                            <div class="flex-1">
                                <label class="text-gray-600 font-light">Bandwidth Allocation</label>
                                <input type='text' name="bandwidth_allocation"
                                       placeholder="Enter bandwidth allocation here" value="{{old('bandwidth_allocation')}}"
                                       class="w-full pr-10 pl-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-purple-500 @error('bandwidth_allocation') border-red-600 @enderror"/>
                                @error('bandwidth_allocation')
                                <span class='text-xs text-red-600'>
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap bg-gray-200 rounded-lg mt-3">
                        <div class="w-full p-6 bg-white rounded-lg mx-5 my-5">
                            <div>
                                <legend class="text-base font-medium text-gray-900">Payment Cycle<span class="text-red-500">*</span></legend>
                            </div>
                            <div class="mt-4 space-y-4">
                                <div class="flex flex-wrap">
                                    <input id="payment_cycle" value="monthly" name="payment_cycle" type="radio"
                                           {{old('payment_cycle')=== 'monthly'?'checked':''}}
                                           class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" required="">
                                    <label for="payment_cycle" class="ml-3 block text-sm font-medium text-gray-700 mr-5">
                                        Monthly
                                    </label>
                                    <input id="payment_cycle" {{old('payment_cycle')=== 'quarterly'?'checked':''}} value="quarterly" name="payment_cycle" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                    <label for="payment_cycle" class="ml-3 block text-sm font-medium text-gray-700 mr-5">
                                        Quarterly
                                    </label>
                                    <input id="payment_cycle" {{old('payment_cycle')=== 'yearly'?'checked':''}} value="yearly" name="payment_cycle" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                    <label for="payment_cycle" class="ml-3 block text-sm font-medium text-gray-700 mr-5">
                                        Yearly
                                    </label>
                                    <input id="payment_cycle" {{old('payment_cycle')=== 'other'?'checked':''}} value="other" name="payment_cycle" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                    <label for="payment_cycle" class="ml-3 block text-sm font-medium text-gray-700">
                                        Other
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap bg-gray-200 rounded-lg mt-3">
                        <div class="w-full p-6 bg-white rounded-lg mx-5 my-5">
                            <div>
                                <legend class="text-base font-medium text-gray-900">Connection Type<span class="text-red-500">*</span></legend>
                            </div>
                            <div class="mt-4 space-y-4">
                                <div class="flex flex-wrap">
                                    <input id="connection_type" {{old('connection_type')=== 'wireless'?'checked':''}} value="wireless" name="connection_type" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" required="">
                                    <label for="connection_type" class="ml-3 block text-sm font-medium text-gray-700 mr-5">
                                        Wireless
                                    </label>
                                    <input id="connection_type" {{old('connection_type')=== 'corporatemax'?'checked':''}} value="corporatemax" name="connection_type" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                    <label for="connection_type" class="ml-3 block text-sm font-medium text-gray-700 mr-5">
                                        Corporate MAX
                                    </label>
                                    <input id="connection_type" {{old('connection_type')=== '4glte'?'checked':''}} value="4glte" name="connection_type" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                    <label for="connection_type" class="ml-3 block text-sm font-medium text-gray-700 mr-5">
                                        4G-LTE
                                    </label>
                                    <input id="connection_type" {{old('connection_type')=== 'wifi'?'checked':''}} value="wifi" name="connection_type" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                    <label for="connection_type" class="ml-3 block text-sm font-medium text-gray-700 mr-5">
                                        WIFI
                                    </label>
                                    <input id="connection_type" {{old('connection_type')=== 'fiber'?'checked':''}} value="fiber" name="connection_type" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                    <label for="connection_type" class="ml-3 block text-sm font-medium text-gray-700 mr-5">
                                        Fiber
                                    </label>
                                    <input id="connection_type" {{old('connection_type')=== 'gps'?'checked':''}} value="gps" name="connection_type" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                    <label for="connection_type" class="ml-3 block text-sm font-medium text-gray-700">
                                        GPS
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap bg-gray-200 rounded-lg mt-3">
                        <div class="w-full p-6 ">
                            <div class="flex-1">
                                <label class="text-gray-600 font-light">Human Verification [ 15 + five = ?]<span class="text-red-500">*</span></label>
                                <input type='text' name="human_verification" autocomplete="off"
                                       placeholder="Answer in digits" value="{{old('human_verification')}}"
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
<!--Footer-->

