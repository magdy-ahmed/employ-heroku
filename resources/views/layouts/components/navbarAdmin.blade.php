<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse text-right" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('الدخول') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('حساب جديد') }}</a>
                        </li>
                    @endif
                @else
                    @role('admin')
                     <li class="nav-item dropdown">
                        <a id="navbarDropdownAdmin" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ __('أدارة الموقع') }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownAdmin">
                            <a class="dropdown-item" href="{{ route('dash-board.index') }}">
                                {{ __('الرئيسية') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('users.index') }}">
                                {{ __('المستخدمين') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('categories.index') }}">
                                {{ __('الوظائف') }}
                            </a>
                        </div>
                    </li>
                    @endrole
                    @can("sell")
                     <li class="nav-item dropdown">
                        <a id="navbarDropdownAdmin" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ __('أدارة الخدمات') }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownAdmin">
                            <a class="dropdown-item" href="{{ route('seller-place.index') }}">
                                {{ __('المنشأت') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('seller-place.create') }}">
                                {{ __('أضافة منشئة') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('seller-service.index') }}">
                                {{ __('الخدمات') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('seller-service.create') }}">
                                {{ __('أضافة خدمة') }}
                            </a>
                        </div>
                    </li>
                    @endcan
                    @can("market")
                     <li class="nav-item dropdown">
                        <a id="navbarDropdownAdmin" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ __('أدارة التسويق') }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownAdmin">
                            <a class="dropdown-item" href="{{ route('marketing-affiliate.index') }}">
                                {{ __('روابطى') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('marketing-affiliate.create') }}">
                                {{ __('أنشاء رابط') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('marketing-affiliate.about') }}">
                                {{ __('شرح نظام التسويق') }}
                            </a>
                        </div>
                    </li>
                    @endcan
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ route('profile.index') }}">
                                {{ __('الملف الشخصى') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('تسجيل الخروج') }}
                            </a>



                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
