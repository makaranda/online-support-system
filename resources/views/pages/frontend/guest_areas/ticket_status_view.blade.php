@extends('layouts.frontend')

@section('title','Ticket Status')

@section('content')

    <!--Hero-->
    <div class="pt-24">
        <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
            <!--Left Col-->
            <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
                <h1 class="my-4 text-5xl font-bold leading-tight">
                    Ticket Status
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
            <h3 class="w-full my-2 text-3xl font-bold leading-tight text-center text-gray-800">
                Your Ticket Status - Ticket No. {{$ticket->no}}
            </h3>
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

            <div class="bg-white rounded-lg shadow-lg py-6 mb-6">
                <div class="ml-5 mb-3">
                    <h3 class="text-gray-700 text-2xl font-bold font-medium">Ticket Details</h3>
                </div>
                <div class="block overflow-x-auto mx-6">
                    <table class="w-full text-left rounded-lg">
                        <tbody>
                            <tr class="w-full font-light text-gray-700 bg-white whitespace-no-wrap border border-b-0">
                                <th class="px-4 py-3">W Account Bumber</th>
                                <td class="px-4 py-4">{{$ticket->wacc}}</td>
                            </tr>
                            <tr class="w-full font-light text-gray-700 bg-gray-100 whitespace-no-wrap border border-b-0">
                                <th class="px-4 py-3">Customer Name</th>
                                <td class="px-4 py-4">{{$ticket->customer}}</td>
                            </tr>
                            <tr class="w-full font-light text-gray-700 bg-white whitespace-no-wrap border border-b-0">
                                <th class="px-4 py-3">Issue / Subject</th>
                                <td class="px-4 py-4 uppercase">{{$ticket->subject}}</td>
                            </tr>
                            <tr class="w-full font-light text-gray-700 bg-gray-100 whitespace-no-wrap border border-b-0">
                                <th class="px-4 py-3">Service Branch</th>
                                <td class="px-4 py-4">{{$ticket->serviceBranch->name}}</td>
                            </tr>
                            <tr class="w-full font-light text-gray-700 bg-white whitespace-no-wrap border ">
                                <th class="px-4 py-3">Priority</th>
                                <td class="px-4 py-4">
                                    {{$ticket->priority}}
                                </td>
                            </tr>
                            @if(\App\Models\Tickets::getCurrentStatus($ticket)->id != 4)
                                <tr class="w-full font-light text-gray-700 bg-gray-100 whitespace-no-wrap border border-b-0">
                                <th class="px-4 py-3">Reply to Ticket</th>
                                <td class="px-4 py-3">
                                    <div x-data="{ show: false }">
                                        <div class="flex float-left">
                                            <button @click={show=true} type="button" class="bg-indigo-500 text-white p-1 focus:no-underline hover:bg-blue-500 rounded-lg" style="cursor:pointer"> Replay to Ticket </Button>
                                        </div>
                                        <div x-show="show" tabindex="0" class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed">
                                            <div  @click.away="show = false" class="z-50 relative p-3 mx-auto my-0 max-w-full" style="width: 800px;">
                                                <div class="bg-white rounded shadow-lg border flex flex-col overflow-hidden">
                                                    <button @click={show=false} class="fill-current h-6 w-6 absolute right-0 top-0 m-6 font-3xl font-bold">&times;</button>
                                                    <div class="px-6 py-3 text-xl border-b font-bold">Reply To Ticket - {{$ticket->no}}</div>
                                                    <br/>
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
                                                                        <button type="button" @click="show = false" class=" text-green-700">
                                                                            <span class="text-2xl rounded-full ">&times;</span>
                                                                        </button>
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
                                                                        <button type="button" @click="show = false" class=" text-red-700">
                                                                            <span class="text-2xl  rounded-full">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <br/>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <form action="{{route('guests.save_reply_ticket_data')}}" method="POST" id="guest_ticket_reply_form" onsubmit="return confirm('Do you want to update ticket with this reply?')">
                                                        <div class="flex-grow pr-3" style="width: 750px;">
                                                                @csrf
                                                                <input type="hidden" value="{{$ticket->id}}" name="ticket_id" />

                                                                <div class="container">
                                                                    <div class="w-full ml-5 mr-5">
                                                                        <label class="text-gray-600 font-light mt-3">Reply Message<span class="text-red-500">*</span></label>
                                                                        <textarea required="" name="reply_message"
                                                                                  placeholder="Enter your message here"
                                                                                  class="w-full border inline-block pl-4 py-2 pr-8 mt-1 mr-3 border rounded-lg text-gray-700 focus:outline-none focus:border-purple-500 @error('reply_message') border-red-600 @enderror"
                                                                                  rows="5">{{old('reply_message')}}</textarea>
                                                                        @error('reply_message')
                                                                        <span class='text-xs text-red-600 mb-3'>
                                                                         {{$message}}
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="w-full ml-5 mr-5">
                                                                        <br/>
                                                                        <label class="text-gray-600 font-light">Ticket Status<span class="text-red-500">*</span></label>
                                                                        <select name="ticket_status" required=""
                                                                                class="bg-white text-gray-600 border inline-block pl-4 py-2 pr-8 rounded-lg leading-tight w-full focus:outline-none focus:border-purple-500 @error('ticket_status') border-red-600 @enderror">
                                                                            <option class="pt-6" selected="" disabled="" value="0">Select Ticket Status</option>
                                                                            <option class="pt-6" value="1" {{old('ticket_status')==1?'selected':''}}>Open</option>
                                                                            <option class="pt-6" value="4" {{old('ticket_status')==4?'selected':''}}>Close</option>
                                                                        </select>
                                                                        @error('ticket_status')
                                                                        <span class='text-xs text-red-600'>
                                                                            {{$message}}
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </form>
                                                    <br/>
                                                    <div class="px-6 py-3 border-t">
                                                        <div class="flex justify-end">
                                                            <button @click={show=false} type="button" class="bg-gray-700 text-gray-100 rounded px-4 py-2 mr-1">Close</Button>
                                                            <button type="submit" class="bg-indigo-600 text-white rounded px-4 py-2" form="guest_ticket_reply_form">Update Ticket</Button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-black opacity-50"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="bg-white rounded-lg shadow-lg py-6">
                <div class="ml-5 mb-3">
                    <h3 class="text-gray-700 font-bold text-2xl">Conversation History for the Ticket</h3>
                </div>

                <div class="block overflow-x-auto mx-6">
                    <table class="w-full text-left rounded-lg">
                        <thead>
                        <tr class="text-gray-800 border border-b-0">
                            <th class="px-4 py-3">Date</th>
                            <th class="px-4 py-3">User</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Message</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($ticket->ticketResponses as $ticketResponse)
                                @if($ticketResponse->hidden == 0)
                                    <tr class="w-full font-light text-gray-700 bg-gray-100 whitespace-no-wrap border border-b-0">
                                        <td class="px-4 py-4">{{$ticketResponse->date}}</td>
                                        <td class="px-4 py-4">{{$ticketResponse->added_user == null ? 'Online Support ':$ticketResponse->addedUser->username}}</td>
                                        <td class="px-4 py-4">
                                            @switch($ticketResponse->ticket_status_id)
                                                @case(1)
                                                <span class="text-sm bg-blue-500 text-white rounded-full px-2 py-1">Open</span>
                                                @break

                                                @case(2)
                                                <span class="text-sm bg-purple-600 text-white rounded-full px-2 py-1">Assigned</span>
                                                @break

                                                @case(3)
                                                <span class="text-sm bg-yellow-500 text-black rounded-full px-2 py-1">Transferred</span>
                                                @break

                                                @case(4)
                                                <span class="text-sm bg-green-500 text-white rounded-full px-2 py-1">Closed</span>
                                                @break

                                                @default
                                                <span class="text-sm bg-gray-500 text-white rounded-full px-2 py-1">Pending</span>
                                                @break

                                            @endswitch
                                        </td>
                                        <td class="text-center py-4" class="px-4 py-4"><p class="text-left">{{$ticketResponse->response}}</p></td>
                                    </tr>
                                @endif
                            @empty
                                <tr class="w-full font-light text-gray-700 bg-gray-100 whitespace-no-wrap border border-b-0">
                                    <td colspan="4" class="text-center px-3">No Conversation History Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
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
        <a href="#" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"
           style="text-decoration:none;cursor: pointer">
            <i class="fa fa-address-card"></i>&nbsp;Fill Survey Form
        </a>
    </section>
@endsection
<!--Footer-->

@push('css')
    <style>
        .gradient {
            background: linear-gradient(90deg, #00c3ff 0%, mediumpurple 50%);
        }
    </style>
@endpush

@push('js')
    <script>

    </script>
@endpush
