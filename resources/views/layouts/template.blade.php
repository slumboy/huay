<<<<<<< HEAD
<!DOCTYPE html>
=======
<!doctype html>
>>>>>>> 5a1684512858a348a206f310b82b5f81e17c9ff8
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Fap Dev">
    <meta name="generator" content="Fap Dev v.1">
    <title>Lottery v1</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/assets/fontawesome/css/all.css') }}">
    <link href="/css/styles.css" rel="stylesheet">
</head>

<body>
    <div class="loadding"><ul><li></li><li></li><li></li><li></li><li></li><li></li></ul></div>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/">Lottery</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav px-3 mobile">
            <li class="nav-item">
                <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('ออกจากระบบ') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>
            </li>
        </ul>
    </header>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link @yield('home')" aria-current="page" href="/"><span data-feather="home"></span>หน้ารแรก</a>
<<<<<<< HEAD
=======
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('profile')" href="/profile/1"><span data-feather="file"></span>แก้ไข Profile</a>
>>>>>>> 5a1684512858a348a206f310b82b5f81e17c9ff8
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('shop')" href="/shop"><span data-feather="file"></span>จัดการร้านค้า</a>
                        </li>
                        <li class="nav-item">
<<<<<<< HEAD
                            <a class="nav-link @yield('lottery')" href="/lotto/create"><span data-feather="shopping-cart"></span>เพิ่มรายการลอตเตอรี่</a>
=======
                            <a class="nav-link @yield('lottery')" href="/lotto/create"><span data-feather="lottery-create"></span>เพิ่มรายการลอตเตอรี่</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('lottery-list')" href="/lotto/list"><span data-feather="lottery-list"></span>รายการลอตเตอรี่</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('compareLottery')" href="/compareMain"><span data-feather="shopping-cart"></span>compareLottery</a>
>>>>>>> 5a1684512858a348a206f310b82b5f81e17c9ff8
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 p-3">

         @yield('content')

    </main>

    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/script.js"></script>
    @yield('script')

</body>

</html>
