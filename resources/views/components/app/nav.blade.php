<nav class="navbar navbar-expand-md navbar-light tw-bg-gradient-to-r tw-from-green-400 tw-via-blue-500 tw-to-green-400 tw-text-white tw-shadow-sm">
    {{--<nav class="navbar navbar-expand-md navbar-light tw-bg-gradient-to-r tw-from-purple-400 tw-via-blue-500 tw-to-purple-400 tw-text-white tw-shadow-sm">--}}

        <div class="container">
            <a class="navbar-brand text-white" href="{{ url('home') }}">
    {{--            <li class="fa fa-globe-africa fa-lg text-white"></li>--}}
                            <img src="{{asset('images/globe internet3.png')}}" width="458" height="125" alt="" class="img-fluid">
    {{--            {{ config('app.name', 'HelpDesk') }}--}}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">


                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="{{($parentSection == 'Home')?'nav-link text-dark font-weight-bold tw-text-sm':'nav-link text-white tw-text-sm'}}" href="{{ url('home') }}">Home</a>
                    </li>
                    {{-- @foreach(\App\Models\Module::getParentModules() as $key => $module)
                        <?php

                        // $current_module = \App\Models\Module::whereParentModule($module)->first();
                        ?>
                            @if(\Illuminate\Support\Facades\Auth::user()->hasAccessToThisModule($module) > 0)
                            <li class="nav-item dropdown ml-3">
                                <a class="{{($parentSection == $module)?'nav-link dropdown-toggle text-dark font-weight-bold tw-text-sm':'nav-link dropdown-toggle text-white tw-text-sm'}}" href="#" id="{{$module}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="{{$current_module->parent_module_icon}}"></i>&nbsp;{{$module}}
                                </a>

                                <div class="dropdown-menu " aria-labelledby="{{$module}}">
                                    @foreach(\App\Models\Module::getOnlySidebarRequiredModules($module) as $sub_module)
                                        @if(\Illuminate\Support\Facades\Auth::user()->hasAccess($sub_module->id))
                                            <a class="dropdown-item" href="{{route($sub_module->route_name)}}">
                                                <i class="{{$sub_module->parent_module_icon}}"></i>&nbsp;{{$sub_module->sub_module}}</a>
                                        @endif
                                    @endforeach
                                </div>

                            </li>
                            <hr class="sidebar-divider">
                            @endif

                    @endforeach --}}
                    <li class="nav-item dropdown text-white ml-3 tw-text-sm" >
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-tv"></i>&nbsp;Monitoring
                        </a>

                        <div class="dropdown-menu dropdown-menu-right tw-bg-white" aria-labelledby="navbarDropdown">
                            {{-- @foreach(\App\Models\MonitorLink::whereIsNavbarElement(1)->get() as $monitorLink)
                                <a class="dropdown-item " href="" target="_blank"><i class=""></i>&nbsp;&nbsp;</a>
                            @endforeach --}}
                        </div>
                    </li>
                    <li class="nav-item dropdown text-white ml-3 tw-text-sm" >
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user-circle"></i>&nbsp;{{ \Illuminate\Support\Facades\Auth::user()->username }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right tw-bg-white" aria-labelledby="navbarDropdown">
                            {{-- {{route('admin_dashboards.index')}} --}}
                            @if(Auth::user()->is_super_admin() | Auth::user()->is_admin())
                                <a class="dropdown-item " href=""><i class="fa fa-cogs"></i>&nbsp;System Settings</a>
                                <div class="dropdown-divider"></div>
                            @endif

                            @if(auth()->check())
                            {{-- {{route('login_user_profiles.index')}} --}}
                                <a class="dropdown-item" href="">
                                    <i class="fa fa-user-circle fa-medium"></i>&nbsp;&nbsp;Profile
                                </a>
                                <div class="dropdown-divider"></div>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i>&nbsp;&nbsp;{{ __('Logout') }}
                            </a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
