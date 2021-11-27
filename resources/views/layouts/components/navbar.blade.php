
<nav class="navbar bg-nav navbar-expand-md navbar-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        @auth
            @if (\App\Models\Notification::countNotification()!==0)
                <span class="count-notification">{{\App\Models\Notification::countNotification()}}</span>

            @endif
            <a class="notificaion-icon " href="#"
                onclick="event.preventDefault();sendRequestReadNotfications(5);show(this);"  target="app-notification-page">
                <i class="fas fa-bell"></i>
            </a>
            <a class="messages-icon " href="{{ route('chat.index') }}">
                <i class="fas fa-envelope"></i>
            </a>
        @endauth


        <div class="collapse navbar-collapse text-right" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('services.index') }}">{{ __('خدمات') }}</a>
                </li>
                @auth
                    <li class="nav-item" id="favMenuItem">
                        <a class="nav-link" href="{{ route('services-favorit.index') }}">{{ __('المفضلة') }}</a>
                    </li>
                @endauth

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
                    @can('controll')
                    <li class="nav-item">
                            <a class="nav-link" href="{{ route('dash-board.index') }}">
                                {{ __('لوحة التحكم') }}
                            </a>
                    </li>
                    @endcan
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
{{--
                            <a class="dropdown-item" href="{{ route('profile.index') }}">
                                {{ __('الملف الشخصى') }}
                            </a> --}}
                            <a class="dropdown-item" href="{{ route('chat.index') }}">
                                الرسائل
                            </a>
                            <a class="dropdown-item" href="#"
                            onclick="event.preventDefault();show(this);"  target="app-notification-page">
                                الأشعارات
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
