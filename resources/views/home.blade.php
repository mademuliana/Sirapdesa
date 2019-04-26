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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
                    <a class="mdl-navigation__link" style="text-decoration:none" href="/">Home</a>
                    <a class="mdl-navigation__link" style="text-decoration:none" href="{{ url('/post/make') }}">Tambah Artikel</a>
                    <a class="mdl-navigation__link" style="text-decoration:none" href="{{ url('/qna') }}">QnA</a>
                    <a class="mdl-navigation__link" style="text-decoration:none" href="{{ url('/list') }}">Daftar</a>
                    <a class="mdl-navigation__link" style="text-decoration:none" href="{{ url('/form') }}">Formulir</a>
                    <a class="mdl-navigation__link" style="text-decoration:none" href="{{ url('/logout') }}"
                       onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                        Logout</a>
                @else
                    <a class="mdl-navigation__link" style="text-decoration:none" href="{{ url('/qna') }}">QnA</a>
                    <a class="mdl-navigation__link" style="text-decoration:none" href="/">Home</a>
                      <button onclick="document.getElementById('authentication').style.display='block'" class="w3-button w3-blue w3-hover-blue" >login</button>

                @endif
            </nav>
        </div>
    </header>

    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Siap Desa</span>
        <nav class="mdl-navigation">
            @if(Auth::check())
                <a class="mdl-navigation__link" style="text-decoration:none" href="/">Home</a>
                <a class="mdl-navigation__link" style="text-decoration:none" href="{{ url('/post/make') }}">Tambah Artikel</a>                
                <a class="mdl-navigation__link" style="text-decoration:none" href="{{ url('/qna') }}">QnA</a>
                <a class="mdl-navigation__link" style="text-decoration:none" href="{{ url('/list') }}">Daftar</a>
                <a class="mdl-navigation__link" style="text-decoration:none" href="{{ url('/form') }}">Formulir</a>
                <a class="mdl-navigation__link" style="text-decoration:none" href="{{ url('/logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                    Logout</a>
            @else
                <a class="mdl-navigation__link" style="text-decoration:none" href="{{ url('/qna') }}">QnA</a>
                <a class="mdl-navigation__link" style="text-decoration:none" href="/">Home</a>
                <a class="mdl-navigation__link" style="text-decoration:none" href="{{ url('/login') }}">Login</a>

            @endif
        </nav>
    </div>
    <main class="mdl-layout__content">
        <div class="page-content">
        @if(Auth::check())
        
          <div class="content-grid mdl-grid center" style="padding-left :20%; padding-top :10%; padding-bottom :20%;">
          <!-- home -->        
          
            <a style="text-decoration:none" class="mdl-card mdl-card--horizontal mdl-cell mdl-cell--3-col mdl-cell---col-tablet mdl-shadow--2dp android-link mdl-button mdl-js-button" href="/">
            <div class="mdl-card__title" style="justify-content: center;">
            <h1  class="mdl-card__title-text">home</h1>
            </div>        
            
              <p style="padding-top:9%;padding-right:8%;padding-left:8%">klik disini untuk menuju halaman awal</p>
            
            </a>
          <!-- list -->
          <a style="text-decoration:none" class="mdl-card mdl-card--horizontal mdl-cell mdl-cell--3-col mdl-cell--3-col-tablet mdl-shadow--2dp android-link mdl-button mdl-js-button" href="/list">
            <div class="mdl-card__title" style="justify-content: center;">
            <h1  class="mdl-card__title-text">list</h1>
            </div>  
              <p style="padding-top:8%;padding-right:8%;padding-left:8%">klik disini untuk menuju daftar dari pemilik tanah</p>

            </a>
            
          <!-- form -->
          <a style="text-decoration:none" class="mdl-card mdl-card--horizontal mdl-cell mdl-cell--3-col mdl-cell--3-col-tablet mdl-shadow--2dp android-link mdl-button mdl-js-button" href="/form">
            <div class="mdl-card__title" style="justify-content: center;">
            <h1 class="mdl-card__title-text ">form</h1>
            </div>        
              <p style="padding-top:8%;padding-right:8%;padding-left:8%">klik disini untuk menuju formulir pemilik tanah</p>

            </a>
             
          </div>
          @else
          <center>
        <div class="mdl-layout__header" id="fullpage">
          <div class="mdl-layout__header-row mdl-typography--display-1" id="heading">
            <h1>SIRAP DESA <br/><span>inovasi dan motivasi untuk</span></h1>
          </div>
        </div>
        

          <div class="content-grid mdl-grid">
          @foreach ($posts as $post)
          <div class="mdl-card mdl-cell mdl-cell--3-col mdl-cell--1-col-tablet mdl-shadow--2dp">
            <figure class="mdl-card__media">
              <img src="{{$post->img_url}}" alt="" />
            </figure>
            
            <div class="mdl-card__title">
              <h1 class="mdl-card__title-text">{{$post->title}}</h1>
            </div>
            
            <div class="mdl-card__supporting-text">
              <p>{{$post->resume}}</p>
            </div>
            
            <div class="mdl-card__actions mdl-card--border">
              <a class="android-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="/post/{{$post->id}}">Baca lebih lanjut</a>
            
            </div>
          </div>
          @endforeach
        </div>
        </div>
        
          @endif
          
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


<div id="authentication" class="w3-modal">
        

        <div class="w3-modal-content w3-card-8 w3-animate-zoom"
            style="max-width: 600px">
            
           
            <div class="col-md-12 w3-card-8 w3-blue" onclick="openForm('Login')">
            <h3>Masuk </h3>
            </div>
            <span onclick="document.getElementById('authentication').style.display='none'"
            class=" w3-blue mdl-button mdl-js-button mdl-button--icon w3-display-topright">
            <i class="material-icons">highlight_off</i>
            </span>

            <div style="margin-top: 25px !important;">
                <div id="Login" class="w3-container form">
                    <div class="w3-container ">
                        <div class="w3-section">
                            <br> <br>@if (count($errors->login) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->login->all() as $error)
                                    <P>{{ $error }}</p>
                                    @endforeach
                                </ul>
                            </div>
                            @endif 
                            @if (Session::has('message'))
                            <div class="alert alert-warning">{{ Session::get('message') }}</div>
                            @endif
                            <form role="form" method="post" action="/login">
                                {{ csrf_field() }}
                                    <label><b>Username</b></label>
                                <input id="username" name="username" class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Masukan Username" required> 
                                    <label><b>Password</b></label>
                                <input class="w3-input w3-border w3-margin-bottom" id="password" name="password" type="password" placeholder="Masukan Password" required> 
                                <input type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent w3-green" value="masuk"> <input class="w3-check w3-margin-top" type="checkbox" checked="checked"> ingat saya
                            </form>
                        </div>
                    </div>
                    <div class="w3-container w3-border-top w3-padding-16 ">
                        <span class="w3-right w3-padding w3-hide-small"><a href="{{ url('/password/reset') }}">lupa password?</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fluid-container"></div>
    <script>    
        openForm("Login");
        function openForm(formName) {
            
            var x = document.getElementsByClassName("form");
            for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
            }
            document.getElementById(formName).style.display = "block";  
        }
            </script>
            @if (Session::has('message'))
                <script>  $('#auth').click(); </script>
                @endif @if($errors->login->any())
                <script>  $('#auth').click();</script>
                @endif @if($errors->register->any())
                <script>  $('#auth').click(); 
                openForm('Register');</script>
                @endif

            </body>
            </html>

            <script type="text/javascript">
                var modal = document.getElementById('authentication');
            //if you click on anything except the modal itself or the "open modal" link, close the modal
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            } 
            </script>




  </div>
</center>
  <link rel="stylesheet" href="css/home.css">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Thambi" rel="stylesheet">
