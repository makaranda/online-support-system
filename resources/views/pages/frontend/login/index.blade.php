@extends('layouts.login')
@section('title','Login')
@section('content')

<header class="max-w-lg mx-auto">
    <img src="{{asset('public/assets/images/cpanel_logo.png')}}" alt="main logo" class="main-logo-login"/>
    <a href="#">
        {{-- <h1 class="text-4xl font-bold text-white text-center">Sign In</h1> --}}
    </a>
</header>
<main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
    @if (session()->has('success'))
        <div x-data="{ show: true }" x-show="show"
             class="flex justify-between items-center bg-green-200 relative text-green-600 py-3 px-3 rounded-lg mb-3">
            <div>
                <span class="font-semibold text-green-700">Success !!!</span>
                <ul style="margin-bottom: 10px">
                    <li class="text-green-600 text-center text-sm"
                        style="text-decoration: none;">{{ session()->get('success') }}</li>
                </ul>
            </div>
            <div>
                <button type="button" @click="show = false" class=" text-green-700">
                    <span class="text-2xl rounded-full">&times;</span>
                </button>
            </div>
        </div>
    @endif
    @if ($errors->any())
        <div x-data="{ show: true }" x-show="show"
             class="flex justify-between items-center bg-red-200 relative text-red-600 py-3 px-3 rounded-lg mb-3">
            <div>
                <span class="font-semibold text-red-700">Login Failed !!!</span>
                <ul style="margin-bottom: 10px">
                    @foreach ($errors->all() as $error)
                        <li class="text-red-600 text-center text-sm"
                            style="text-decoration: none;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <div>
                <button type="button" @click="show = false" class=" text-red-700">
                    <span class="text-2xl rounded-full">&times;</span>
                </button>
            </div>
        </div>
    @endif

    <section>
        <h3 class="font-bold text-2xl text-center">Welcome to Online Support System</h3>
        <p class="text-gray-600 pt-2 text-center">Sign in to your account.</p>
    </section>

    <section class="mt-10">

        <form method="POST" id="frm_login">
            @csrf
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Email</label>
                <input type="email" autocomplete="off" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                       class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-green-600 transition duration-500 px-3 pb-3 @error('email') border-red-600 @enderror">
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="password">Password</label>
                <input type="password" id="password" name="password" autocomplete="off"
                       class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-green-600 transition duration-500 px-3 pb-3 @error('password') border-red-600 @enderror" required/>
            </div>
            <div class="flex justify-end">
                @if (Route::has('password.request'))
                    <a href="{{route('password.request')}}"
                       class="text-sm text-green-600 hover:text-blue-700 hover:text-black mb-6">Forgot your
                        password?</a>
                @endif
            </div>
            <button
                class="bg-gradient-to-r from-green-400 via-blue-500 to-green-400 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200 "
                style="width: 100%;" type="submit">Sign In
            </button>

        </form>
        <br/>
        <a href="{{route('home')}}" class="text-green-500 underline mt-2">Go Back</a>
    </section>
</main>

@endsection

@push('css')
    <style>
        .main-logo-login {
            width: 120px !important;
            text-align: center;
            justify-self: center;
            box-shadow: 0px 0px 5px 3px #00000054;
            background-color: azure;
            padding: 5px;
        }
        body {
            padding-top: 3rem !important;
        }
    </style>
@endpush

@push('js')
    <script>
    $(document).ready(function(){
        $('#frm_login').parsley();

        $('#frm_login').on('submit', function(event) {
            event.preventDefault();
            $('#overlay').show();

            var password = $("#frm_login #password").val();
            var email = $("#frm_login #email").val();

            let url = '{{ route('login.submit') }}'; // Adjusting route handling
            console.log('URL: ' + url);

            $.ajax({
                url: url,
                cache: false,
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'), // Using meta tag for CSRF token
                    email: email,
                    password: password
                },
                success: function(response) {
                    $('#frm_login').trigger("reset");

                    if (response.messageType === 'success') {
                        $('#frm_login').parsley().reset();
                        $('#frm_login')[0].reset();

                        window.location.href = "{{ route('home') }}";
                    }

                    Swal.fire({
                        position: "bottom-end",
                        icon: response.messageType === 'success' ? "success" : "error",
                        title: response.message,
                        showConfirmButton: false,
                        timer: response.messageType === 'success' ? 4000 : 2500
                    });
                    $('#overlay').hide();
                },
                error: function(xhr, status, error) {
                    console.log("Error during login submission! \n", xhr, status, error);
                    $('#overlay').hide();
                }
            });
        });
    });

    </script>
@endpush
