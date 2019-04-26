 <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="The stepper polyfill will help you to implement this material design component today.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Siap Desa</title>
    <link rel="stylesheet" href="/css/vendor/stepper.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue-orange.min.css" />
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    @yield('css')
    {{--<link rel="stylesheet" href="/css/demo.css">--}}

    <style>
        .mdl-card__actions {
        display: flex;
        box-sizing:border-box;
        align-items: center;
        }
        .mdl-card__actions > .mdl-button--icon {
        margin-right: 3px;
        margin-left: 3px;
        }
        .mdl-card__media > img {
        max-width: 100%;
        }
        .page-content{
            min-height: calc(100vh - 64px) !important;
        }

        @media only screen and (max-width: 841px){
            .page-content{
                min-height: calc(100vh - 56px) !important;
            }
        }
    </style>
</head>
<body>
<div id="view_offline" class="" style="display: none; background-color: #E91E63; padding: 10px; width: 15%; position: fixed; bottom: 0; color: white; text-align: center; z-index: 2;">
    <b>Koneksi Bermasalah</b>
</div>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    @if(Auth::check())
    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    @endif
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title">{{ Config::get('app.name') }}</span>
            <div class="mdl-layout-spacer"></div>
            <nav class="mdl-navigation mdl-layout--large-screen-only">
                @if(Auth::check())
                    <a class="mdl-navigation__link" style="text-decoration:none;" href="/">Home</a>
                    <a class="mdl-navigation__link" style="text-decoration:none;" href="{{ url('/post/make') }}">Tambah Artikel</a>
                    <a class="mdl-navigation__link" style="text-decoration:none;" href="{{ url('/qna') }}">QnA</a>
                    <a class="mdl-navigation__link" style="text-decoration:none;" href="{{ url('/list') }}">Daftar</a>
                    <a class="mdl-navigation__link" style="text-decoration:none;" href="{{ url('/form') }}">Formulir</a>
                    <a class="mdl-navigation__link" style="text-decoration:none;" href="{{ url('/logout') }}"
                       onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                        Logout</a>
                @else
                    <a class="mdl-navigation__link" style="text-decoration:none;" href="{{ url('/qna') }}">QnA</a>
                    <a class="mdl-navigation__link" style="text-decoration:none;" href="/">Home</a>
                      <button onclick="document.getElementById('authentication').style.display='block'" class="w3-button w3-blue w3-hover-blue" >login</button>

                @endif
            </nav>
        </div>
    </header>

    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Siap Desa</span>
        <nav class="mdl-navigation">
            @if(Auth::check())
                <a class="mdl-navigation__link" style="text-decoration:none;" href="/">Home</a>
                <a class="mdl-navigation__link" style="text-decoration:none;" href="{{ url('/post/make') }}">Tambah Artikel</a>                
                <a class="mdl-navigation__link" style="text-decoration:none;" href="{{ url('/qna') }}">QnA</a>
                <a class="mdl-navigation__link" style="text-decoration:none;" href="{{ url('/list') }}">Daftar</a>
                <a class="mdl-navigation__link" style="text-decoration:none;" href="{{ url('/form') }}">Formulir</a>
                <a class="mdl-navigation__link" style="text-decoration:none;" href="{{ url('/logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                    Logout</a>
            @else
                <a class="mdl-navigation__link" style="text-decoration:none;" href="{{ url('/qna') }}">QnA</a>
                <a class="mdl-navigation__link" style="text-decoration:none;" href="/">Home</a>
                <a class="mdl-navigation__link" style="text-decoration:none;" href="{{ url('/login') }}">Login</a>

            @endif
        </nav>
    </div>
    <main class="mdl-layout__content">
        <div class="page-content">
              @yield('content')
        </div>
        <footer class="mdl-mega-footer">
          <div class="mdl-mega-footer--middle-section">
            <div class="mdl-mega-footer--drop-down-section">
              <h1 class="mdl-mega-footer--heading">Siap Desa</h1>
              <ul class="mdl-mega-footer--link-list">
                <li ><i class="small material-icons">location_on</i><a href="#"> Alamat</a></li>
                <li><i class="small material-icons">call</i><a href="#"> No Telp Desa</a></li>
                <li><i class="small material-icons">call</i><a href="#"> No Telp Admin</a></li>
              </ul>
            </div>
        <!-- <footer class="mdl-mini-footer" id="footer">
            <div class="mdl-mini-footer__left-section">
                <div class="mdl-logo">Siap Desa</div>
                <ul class="mdl-mini-footer__link-list">
                    <li><a href="/">Tentang</a></li>
                    <li><a href="/">jlxxxxxxxxxx</a></li>
                    <li><a href="/">08xxxxxxxxxx</a></li>
                    <li><a href="/">08xxxxxxxxxx</a></li>
                </ul>
            </div> -->
            <div class="mdl-mini-footer__right-section footer-credits">
                {{--<div class="mdl-logo">Made with <span style="color: hotpink;">❤</span> by Siap Desa</div>--}}
            </div>
        </footer>
    </main>
</div>
<script defer src="/js/vendor/material.min.js"></script>
<script defer src="/js/vendor/stepper.min.js"></script>
<script defer src="/js/offlinecheck.js"></script>
@yield('javascript')
            </body>
            </html>