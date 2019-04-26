@extends('layouts.app')

@section('content')
  <div class="container-fluid" id="fullpage">
    <h1>HALLO</h1>
  </div>
  <div class="container">
    <!--Table and divs that hold the pie charts-->
    <table class="columns">
      <tr>
        <td><div id="donutchart" style="width: 565px; height: 300px;"></div></td>
        <td><div id="donutchart2" style="width: 565px; height: 300px;"></div></td>
      </tr>
    </table>
    <!-- <div id="donutchart" style="width: 565px; height: 300px;"></div> -->
  </div>
  <div class="container">
    <div class="android-card-container mdl-grid">
            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
              <div class="mdl-card__media">
                <img src="https://thumbs.dreamstime.com/z/surabaya-city-scape-vector-flat-style-depicting-statue-suramadu-bridge-east-java-indonesia-65095186.jpg">
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
                <img src="https://thumbs.dreamstime.com/z/surabaya-city-scape-vector-flat-style-depicting-statue-suramadu-bridge-east-java-indonesia-65095186.jpg">
              </div>
              <div class="mdl-card__title">
                 <h4 class="mdl-card__title-text">Create your own Android character</h4>
              </div>
              <div class="mdl-card__supporting-text">
                <span class="mdl-typography--font-light mdl-typography--subhead">Turn the little green Android mascot into you, your friends, anyone!</span>
                <span class="mdl-typography--font-light mdl-typography--subhead">Turn the little green Android mascot into you, your friends, anyone!</span>
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
                <img src="https://thumbs.dreamstime.com/z/surabaya-city-scape-vector-flat-style-depicting-statue-suramadu-bridge-east-java-indonesia-65095186.jpg">
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
                <img src="https://thumbs.dreamstime.com/z/surabaya-city-scape-vector-flat-style-depicting-statue-suramadu-bridge-east-java-indonesia-65095186.jpg">
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
  </div>
@endsection

@section('css')
  <link rel="stylesheet" href="css/home.css">
@endsection

@section('javascript')
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
     google.charts.load("current", {packages:["corechart"]});
     google.charts.setOnLoadCallback(drawChart);
     google.charts.setOnLoadCallback(drawChart2);
     function drawChart() {
       var data = google.visualization.arrayToDataTable([
         ['Effort', 'Amount given'],
         ['Bersertifikat',     100],
         ['Proses',     200],
         ['Belum bersertivikat',     200],
       ]);

       var options = {
         title: 'Data Tanah Setivikasi',
         pieHole: 0.6,
       };

       var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
       chart.draw(data, options);
     }
     function drawChart2() {
       var data = google.visualization.arrayToDataTable([
         ['Effort', 'Amount given'],
         ['Bersertifikat',     100],
         ['Proses',     200],
         ['Belum bersertivikat',     200],
       ]);

       var options = {
         title: 'Data Tanah Setivikasi',
         pieHole: 0.6,
       };

       var chart = new google.visualization.PieChart(document.getElementById('donutchart2'));
       chart.draw(data, options);
     }
   </script>
@endsection
