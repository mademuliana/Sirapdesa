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
    <div class="mdl-grid">
        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect mdl-cell mdl-cell--10-col" style="margin: 0 auto;">
            <div class="mdl-tabs__tab-bar">
                <a href="#data-pemilik-panel" class="mdl-tabs__tab is-active">Data Pemilik</a>
                <a href="#lokasi-tanah-panel" class="mdl-tabs__tab">Lokasi Tanah</a>
                <a href="#info-tanah-panel" class="mdl-tabs__tab">Info Tanah</a>
                <a href="#batas-wilayah-panel" class="mdl-tabs__tab">Batas Wilayah</a>
            </div>


            <form action="/validasi_lapangan/{{$tanah->id}}/edit" method="post">
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--10-col mdl-cell--0-col-phone mdl-cell--6-col-tablet">
                    </div>
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
            </form>
        </div>
    </div>
@endsection
