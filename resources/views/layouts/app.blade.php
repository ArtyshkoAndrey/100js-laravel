<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="copyright" content="Hugant Mirron">
    <meta name="author" content="Hugant Mirron" lang="ru">
    <meta name="description" conent="@yield('meta_description')">
    <meta name="keywords" conent="@yield('meta_keywords')">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="icon" href="{{ asset('images/icon.ico') }}" type="image/x-icon">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ asset('css/bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('style')
  </head>
<body>
    <div id="app">
        @if(Request::path() == '/')
        <div class="jumbotron jumbotron-fullheight bg-growth bg-dark text-white mb-0 pt-3 radius-0">
        @else

        @endif
            <nav class="navbar navbar-expand-lg navbar-dark {{ Request::path() == '/' ? ' ' : 'bg-dark'  }} ">
                @if(!isset($tDay))
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand ml-lg-5" href="/">
                <h5 class="d-none d-sm-block mb-0">100 Days of JavaScript</h5>
                <h6 class="d-block d-sm-none mb-0">100 Days of JavaScript</h6></a>
                @else
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand ml-lg-5" href="/">
                  <span class="d-sm-none">100 Days of JS </span>
                  <span class="d-none d-sm-inline mr-3">100 Days of JavaScript</span>
                  <span class="d-none d-sm-inline d-lg-none mr-3">-</span>
                  <span class="d-none d-sm-inline d-lg-none">{{ $tDay->title }}</span>
                </a>
                <div class="navbar-brand w-100 d-none d-lg-flex d-lg-flex align-items-center justify-content-center">{{ $tDay->title }}</div>
                @endif
                <div class="collapse navbar-collapse" id="navbarToggler">
                    <ul class="navbar-nav ml-auto mr-5">
                        @foreach(App\Models\menu_item::all() as $menu)
                        <li class="nav-item ml-lg-3 {{ Request::path() == $menu->link ? 'active' : ''  }} "><a class="nav-link" href="{{ url($menu->link) }}">{{ $menu->name }}</a></li>
                        @endforeach
                        @guest
                                       
                        @else
                        <li class="nav-item ml-lg-3">
                            <div class="btn-group" style="margin-top: 1px;">
                                <a class="btn text-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                                <div class="dropdown-menu" x-placement="bottom-start">
                                    <a class="dropdown-item" href="{{ url('admin/edit-account-info') }}">Профиль</a>
                                    <a class="dropdown-item" href="{{ backpack_url('logout') }}">Выйти</a>
                                </div>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>
            @yield('content')
            @yield('footer')
        @if(Request::path() == '/')
        </div>
        @else

        @endif
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script><!-- Yandex.Metrika counter -->
    <script>
      (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                    try {
                            w.yaCounter49471468 = new Ya.Metrika2({
                                    id:49471468,
                                    clickmap:true,
                                    trackLinks:true,
                                    accurateTrackBounce:true,
                                    webvisor:true
                            });
                    } catch(e) { }
            });
      
            var n = d.getElementsByTagName("script")[0],
                    s = d.createElement("script"),
                    f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/tag.js";
      
            if (w.opera == "[object Opera]") {
                    d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
      })(document, window, "yandex_metrika_callbacks2");
    </script>
    @yield('script')
</body>
</html>
