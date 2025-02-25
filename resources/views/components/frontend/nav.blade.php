<nav id="header" class="fixed w-full z-30 top-0 text-white">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
        <div class="pl-4 flex items-center">
            <a href="{{route('home')}}" class="toggleColour text-black no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#" id="fixedMainText">
                <img src="{{asset('public/assets/images/cpanel_logo.png')}}" alt="main logo" class="main-logo"/> Online Support System
{{--                <i class="fa fa-globe-africa fa-lg"></i>&nbsp; Help Desk--}}
            </a>
        </div>
        <div class="block lg:hidden pr-4">
            <button id="nav-toggle" class="flex items-center p-1 text-white hover:text-blue-400 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                </svg>
            </button>
        </div>
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20" id="nav-content">
            <ul class="list-reset lg:flex justify-end flex-1 items-center">
                <li class="mr-3">
                    <a class="inline-block py-2 px-4 text-black font-bold no-underline" href="{{route('home')}}">Home</a>
                </li>
                <li class="mr-3">
                    <a class="inline-block py-2 px-4 text-black no-underline" href="#contact_info">Contact Us</a>
                </li>
                <li >
                    <a href="{{ route('login') }}" class="inline-block py-2 px-4 text-black no-underline" >Login</a>
                </li>
            </ul>

        </div>
    </div>
    <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
</nav>
