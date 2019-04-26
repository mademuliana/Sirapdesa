@extends('layouts.app')
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
    {{--@if (session('status'))--}}
        {{--<div class="alert alert-success">--}}
            {{--<center><h5>{{ session('status') }}</h5></center>--}}
        {{--</div>--}}
    {{--@endif--}}

    <div class="mdl-grid">
        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect mdl-cell mdl-cell--10-col" style="margin: 0 auto;">
            <div class="mdl-tabs__tab-bar">
                @if($data=='pemilik')
                    <a href="#data-pemilik-panel" class="mdl-tabs__tab is-active">Data Pemilik</a>
                @elseif($data=='tanah')
                    <a href="#lokasi-tanah-panel" class="mdl-tabs__tab is-active">Lokasi Tanah</a>
                    <a href="#info-tanah-panel" class="mdl-tabs__tab">Info Tanah</a>
                @elseif($data=='batas')
                    <a href="#batas-wilayah-panel" class="mdl-tabs__tab">Batas Wilayah</a>
                @endif
            </div>


            @if($data=='pemilik')
            <form action="{{url(action('PemilikController@update',['id'=>$id]))}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mdl-tabs__panel is-active" id="data-pemilik-panel">
                    @include('form_data_pemilik')
                </div>
            @elseif($data=='tanah')
            <form action="{{url(action('TanahController@update',['id'=>$id]))}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mdl-tabs__panel is-active" id="lokasi-tanah-panel">
                    @include('form_lokasi_tanah')
                </div>

                <div class="mdl-tabs__panel" id="info-tanah-panel">
                    @include('form_info_tanah')
                </div>
            @elseif($data=='batas')
            <form action="{{url(action('TanahController@updateBatas',['id'=>$id]))}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mdl-tabs__panel is-active" id="batas-wilayah-panel">
                    @include('form_batas_wilayah_tanah')
                </div>
            @endif


                <input type="hidden" name="_method" value="PUT">
                <div class="mdl-grid">
                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored mdl-button--raised mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--4-col-phone " type="submit"id="btn-submit">
                        Simpan
                    </button>
                </div>
            </form>
            </form>
            </form>
        </div>
    </div>
@endsection
