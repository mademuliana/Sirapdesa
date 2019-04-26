@extends('layouts.master')

@section('title', 'index')

@section('content')
  <!-- <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http://stackoverflow.com/questions/2091465/how-do-i-pass-data-between-activities-on-android&choe=UTF-8" title="Link to Google.com" /> -->
  <div class="container-fluid" id="firstPage">
    <div class="row">
      <h1>HELLO</h1>
    </div>
  </div>
  <div class="android-more-section">
    <div class="android-card-container mdl-grid">
      <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
        <div class="mdl-card__media">
          <img src="http://img.gemscool.com/lostsaga/lostsaga_ver_20121203/hero/char/GatotKaca.jpg" title="Link to Google.com" />
        </div>
        <div class="mdl-card__title">
           <h4 class="mdl-card__title-text">Get going on Android</h4>
        </div>
        <div class="mdl-card__supporting-text">
          <span class="mdl-typography--font-light mdl-typography--subhead">Four tips to make your switch to Android quick and easy</span>
        </div>
        <div class="mdl-card__actions">
           <a class="android-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="">
             Make the switch
             <i class="material-icons">chevron_right</i>
           </a>
        </div>
      </div>

      <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
        <div class="mdl-card__media">
          <img src="http://img.gemscool.com/lostsaga/lostsaga_ver_20121203/hero/char/GatotKaca.jpg" title="Link to Google.com" />
        </div>
        <div class="mdl-card__title">
           <h4 class="mdl-card__title-text">Create your own Android character</h4>
        </div>
        <div class="mdl-card__supporting-text">
          <span class="mdl-typography--font-light mdl-typography--subhead">Turn the little green Android mascot into you, your friends, anyone!</span>
        </div>
        <div class="mdl-card__actions">
           <a class="android-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="">
             androidify.com
             <i class="material-icons">chevron_right</i>
           </a>
        </div>
      </div>

      <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
        <div class="mdl-card__media">
          <img src="http://img.gemscool.com/lostsaga/lostsaga_ver_20121203/hero/char/GatotKaca.jpg" title="Link to Google.com" />
        </div>
        <div class="mdl-card__title">
           <h4 class="mdl-card__title-text">Get a clean customisable home screen</h4>
        </div>
        <div class="mdl-card__supporting-text">
          <span class="mdl-typography--font-light mdl-typography--subhead">A clean, simple, customisable home screen that comes with the power of Google Now: Traffic alerts, weather and much more, just a swipe away.</span>
        </div>
        <div class="mdl-card__actions">
           <a class="android-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="">
             Download now
             <i class="material-icons">chevron_right</i>
           </a>
        </div>
      </div>

      <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
        <div class="mdl-card__media">
          <img src="http://img.gemscool.com/lostsaga/lostsaga_ver_20121203/hero/char/GatotKaca.jpg" title="Link to Google.com" />
        </div>
        <div class="mdl-card__title">
           <h4 class="mdl-card__title-text">Millions to choose from</h4>
        </div>
        <div class="mdl-card__supporting-text">
          <span class="mdl-typography--font-light mdl-typography--subhead">Hail a taxi, find a recipe, run through a temple – Google Play has all the apps and games that let you make your Android device uniquely yours.</span>
        </div>
        <div class="mdl-card__actions">
           <a class="android-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="">
             Find apps
             <i class="material-icons">chevron_right</i>
           </a>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('css')
  <link rel="stylesheet" href="css/home.css" crossorigin="anonymous">
@endsection
