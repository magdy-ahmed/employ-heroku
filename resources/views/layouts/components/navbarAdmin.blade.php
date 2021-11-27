<nav class="navbar bg-nav navbar-expand-md navbar-light  shadow-sm">
    <div class="container ">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        @auth
            @if (\App\Models\Notification::countNotification()!==0)
                <span class="count-notification">{{\App\Models\Notification::countNotification()}}</span>

            @endif
            <a class="notificaion-icon" href="#"
                onclick="event.preventDefault();sendRequestReadNotfications(5);show(this);"  target="app-notification-page">
                <i class="fas fa-bell"></i>
            </a>
        @endauth


        @can("sell")
            <a class="messages-icon " href="{{ route('chat.seller.index') }}">
                <i class="fas fa-envelope"></i>
            </a>
        @endcan
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse   text-right" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->






            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav  ml-auto">
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
                            <a class="dropdown-item" href="{{ route('admin.notification.index') }}">
                                {{ __('مركز الأشعارات') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('admin.setting.index') }}">
                                {{ __('أعدات الموقع') }}
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
                            <a class="dropdown-item" href="{{ route('marketing-affiliate.sellers') }}">
                                {{ __('فريقى التسويقى') }}
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

                            <a class="dropdown-item" href="#"
                            onclick="event.preventDefault();show(this);"  target="app-notification-page">
                                الأشعارات
                            </a>
                            <a class="dropdown-item" href="{{ route('financial.index') }}">
                                {{ __('المعاملات المالية') }}
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


