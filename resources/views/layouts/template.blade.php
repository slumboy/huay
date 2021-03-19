<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Fap Dev">
    <meta name="generator" content="Fap Dev v.1">
    <title>klomdicklotto</title>
    <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/assets/fontawesome/css/all.css') }}">
    <link href="/css/styles.css" rel="stylesheet">
    @yield('style')
</head>
<body>
    <div class="loadding"><ul><li></li><li></li><li></li><li></li><li></li><li></li></ul></div>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/">Lottery</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav px-3 desktop">

            <li class="nav-item">
                <a class="nav-link" href="/profile/{{ Auth::user()->id }}"><i class="far fa-id-badge"></i> {{ Auth::user()->name }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> {{ __('ออกจากระบบ') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>
            </li>
        </ul>
    </header>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-guay sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link @yield('home')" aria-current="page" href="/"><i class="fas fa-home"></i> หน้าแรก</a>
                        </li>  
                        <li class="nav-item">
                            <a class="nav-link @yield('shop')" href="/shop"><i class="fas fa-store"></i> จัดการร้านค้า</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('lottery')" href="/lotto/create"><i class="far fa-plus-square"></i> เพิ่มรายการลอตเตอรี่</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('lottery-list')" href="/lotto/list"><i class="fas fa-list-ol"></i> รายการลอตเตอรี่</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('compareLottery')" href="/compareMain"><i class="fas fa-greater-than-equal"></i> ผลการรวมลอตเตอรี่</a>
                        </li>
                        <li class="nav-item mobile">
                            <a class="nav-link" href="/profile/{{ Auth::user()->id }}"><i class="far fa-id-badge"></i> {{ Auth::user()->name }}</a>
                        </li>
                        <li class="nav-item mobile">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> {{ __('ออกจากระบบ') }}
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link @yield('deleteLottery') text-danger" href="/remove"> <i class="fas fa-trash-alt"></i>  ลบข้อมูลลอตเตอรี่ ทั้งหมด</a></li>
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