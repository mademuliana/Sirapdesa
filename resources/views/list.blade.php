@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="/css/list_tanah.css">
@endsection
@section('content')
        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
            <div class="mdl-tabs__tab-bar mdl-grid">
                <a href="#pemilik-panel" class="mdl-tabs__tab is-active mdl-cell mdl-cell--1-col mdl-cell--2-col-phone mdl-cell--4-col-tablet">Pemilik</a>
                <a href="#tanah-panel" class="mdl-tabs__tab mdl-cell mdl-cell--1-col mdl-cell--2-col-phone mdl-cell--4-col-tablet">Tanah</a>
                <div class="mdl-cell mdl-cell--10-col mdl-cell--0-col-phone mdl-cell--0-col-tablet"></div>
            </div>
            <div class="mdl-tabs__panel is-active" id="pemilik-panel" >
                <div class="mdl-grid">
                    <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col-desktop mdl-cell--8-col-tablet mdl-cell--4-col-phone table-container">
                        <div class="mdl-card__title">
                            <h2 class="mdl-card__title-text">Daftar Pemilik</h2>
                        </div>
                        <div class="mdl-card__menu">
                            <a class="" href="/pemilik/tambah" style="text-decoration: none;">
                                <button class="mdl-button mdl-button--icon ">
                                    <i class="material-icons" style="color: #f5f5f5;">person_add</i>
                                </button>
                                <label style="color: #f5f5f5; cursor: pointer !important;">
                                    Tambah Pemilik
                                </label>
                            </a>
                        </div>
                        <div class="mdl-card__supporting-text">
                            @include('list_pemilik')
                        </div>
                    </div>
                </div>
            </div>
            <div class="mdl-tabs__panel" id="tanah-panel">
                <div class="mdl-grid">
                    <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col-desktop mdl-cell--8-col-tablet mdl-cell--4-col-phone table-container">
                        <div class="mdl-card__title">
                            <h2 class="mdl-card__title-text">Daftar Tanah</h2>
                        </div>
                        <div class="mdl-card__supporting-text">
                            @include('list_tanah')
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection