@extends('layouts.app')
@section('javascript')
    <script defer src="/js/tambah_koordinat.js"></script>
@endsection
@section('css')
    <link rel="stylesheet" href="/css/list_tanah.css">
    <link rel="stylesheet" href="/css/form.css">
    <style>
        @media only screen and (max-width: 841px){
            .mdl-tabs__tab{
                font-size: small !important;
                padding: 0 5px;
            }
            .mdl-tabs__panel{
                padding-top: 10px !important;
                padding-bottom: 10px !important;
            }
        }
        .mdl-tabs__panel{
            padding-top: 20px !important;
            padding-bottom: 20px !important;
        }
        .alert{
            padding: 10px;
        }
        .alert-success{
            color: #FFFFFF;
            background-color: #009688;
        }
    </style>
@endsection
@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            <center><h5>{{ session('status') }}</h5></center>
        </div>
    @endif
    <div class="mdl-grid">
        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect mdl-cell mdl-cell--10-col" style="margin: 0 auto;">
            <div class="mdl-tabs__tab-bar">
                <a href="#data-pemilik-panel" class="mdl-tabs__tab is-active">Data Pemilik</a>
                <a href="#lokasi-tanah-panel" class="mdl-tabs__tab">Lokasi Tanah</a>
                <a href="#info-tanah-panel" class="mdl-tabs__tab">Info Tanah</a>
                <a href="#batas-wilayah-panel" class="mdl-tabs__tab">Batas Wilayah</a>
                <a href="#lat-lon-panel" class="mdl-tabs__tab">Koor</a>
            </div>


            <form action="/validasi_lapangan/{{$tanah->id}}/edit" method="post">
                {{ csrf_field() }}
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--10-col mdl-cell--0-col-phone mdl-cell--6-col-tablet">
                    </div>
                    <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect mdl-cell--2-col mdl-cell--3-col-phone" for="switch-1">
                        <span class="mdl-switch__label">Sudah Divalidasi</span>
                        <input type="checkbox" id="switch-1" class="mdl-switch__input" name="status_validasi">
                    </label>
                </div>
                <div class="mdl-tabs__panel is-active" id="data-pemilik-panel">
                    @include('form_data_pemilik')
                </div>

                <div class="mdl-tabs__panel" id="lokasi-tanah-panel">
                    @include('form_lokasi_tanah')
                </div>

                <div class="mdl-tabs__panel" id="info-tanah-panel">
                    @include('form_info_tanah')
                </div>

                <div class="mdl-tabs__panel" id="batas-wilayah-panel">
                    @include('form_batas_wilayah_tanah')
                </div>

                <div class="mdl-tabs__panel" id="lat-lon-panel">
                    <div class="mdl-grid">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
                            <input class="mdl-textfield__input" type="text"  id="_lat" placeholder="">
                            <label class="mdl-textfield__label" for="_lat" id="lat">Lat</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
                            <input class="mdl-textfield__input" type="text"  id="_lon" placeholder="">
                            <label class="mdl-textfield__label" for="_lon" id="lon">Lon</label>
                        </div>
                        <div class="mdl-cell mdl-cell--1-col" style="padding-top: 18px; ">
                            <button class="mdl-button mdl-js-button mdl-button--primary mdl-button--raised mdl-js-ripple-effect" onclick="tambahkoordinat()" type="button">
                                <i class="material-icons">add</i>
                            </button>
                        </div>
                    </div>
                    <div class="mdl-grid">
                        <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--11-col" id="table-koordinat">
                            <thead>
                            <tr>
                                <th style="text-align: center;">Lat</th>
                                <th style="text-align: center;">Lon</th>
                            </tr>
                            </thead>

                        </table>
                    </div>
                </div>

                <input type="hidden" name="_method" value="PUT">
                <div class="mdl-grid">
                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored mdl-button--raised mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--4-col-phone " type="submit">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
