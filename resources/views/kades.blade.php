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
        button.accordion {
            background-color: #eee;
            color: #444;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
        }

        button.accordion.active, button.accordion:hover {
            background-color: #ddd;
        }

        div.panel {
            padding: 0 18px;
            background-color: white;
            max-height: 0;
            overflow: hidden;
            text-align: left;
            transition: max-height 0.2s ease-out;
        }

        .panel h6{
            margin: 6px;
        }

        .special{
            color: #1e88e5 !important;
            font-weight: bold !important;
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
        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect mdl-cell mdl-cell--12-col" style="margin: 0 auto;">
            <div class="mdl-tabs__tab-bar">
                <a href="#konflik-panel" class="mdl-tabs__tab is-active">Konflik</a>
                <a href="#transaksi-panel" class="mdl-tabs__tab">Transaksi</a>
            </div>

            <div class="mdl-tabs__panel is-active" id="konflik-panel">
                <form action="/kades" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="type" value="konflik">
                {{--<input type="hidden" name="_method" value="PUT">--}}
                <div class="mdl-grid">
                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored mdl-button--raised mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--4-col-phone " type="submit">
                        Simpan
                    </button>
                </div>
                @foreach ($konfliks as $konflik)
                    <button class="accordion" type="button">
                        <div class="mdl-grid">
                            <div class="mdl-cell mdl-cell--3-col mdl-cell--1-col-phone mdl-cell--2-col-tablet">
                                {{$konflik->tanah->persil}}
                            </div>
                            <div class="mdl-cell mdl-cell--9-col mdl-cell--4-col-phone mdl-cell--6-col-tablet">
                                {{$konflik->tanah->pemilik->nama}}
                            </div>
                        </div>
                    </button>
                    <div class="panel">
                        <div class="mdl-grid">
                            <div class="mdl-cell mdl-cell--10-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
                                <div class="mdl-grid" style="margin-bottom: 10px;">
                                    <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-cell--8-col-tablet special">
                                        Luas
                                    </div>
                                    <div class="mdl-cell mdl-cell--9-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
                                        {{$konflik->tanah->luas}} m<sup>2</sup>
                                    </div>
                                </div>

                                <div class="mdl-grid" style="margin-bottom: 10px;">
                                    <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-cell--8-col-tablet special">
                                        Lokasi Tanah
                                    </div>
                                    <div class="mdl-cell mdl-cell--9-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
                                        Jl.{{$konflik->tanah->jalan}},
                                        {{$konflik->tanah->blok}},
                                        {{$konflik->tanah->rt}}/{{$konflik->tanah->rw}} (RT/RW),
                                        {{$konflik->tanah->kampung}},
                                        {{$konflik->tanah->desa}},
                                        Kel. {{$konflik->tanah->kelurahan}},
                                        Kec. {{$konflik->tanah->kecamatan}},
                                        Kab. {{$konflik->tanah->kabupaten}},
                                        Prov. {{$konflik->tanah->provinsi}}
                                    </div>
                                </div>

                                <div class="mdl-grid" style="margin-bottom: 10px;">
                                    <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-cell--8-col-tablet special">
                                        Keterangan
                                    </div>
                                    <div class="mdl-cell mdl-cell--9-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
                                        {{$konflik->keterangan}}
                                    </div>
                                </div>
                            </div>
                            <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
                                <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect mdl-cell mdl-cell--12-col " for="status_konfirmasi[{{$konflik->id}}]">
                                    <span class="mdl-switch__label">Sudah Dikonfirmasi</span>
                                    <input type="checkbox" id="status_konfirmasi[{{$konflik->id}}]" class="mdl-switch__input" name="status_konfirmasi[{{ $konflik->id }}]" {{ $konflik->status_konfirmasi?"checked":"" }}>
                                </label>
                                <div class="mdl-grid">
                                @if ($konflik->status_konflik)
                                    <span class="mdl-chip mdl-chip--contact mdl-cell--12-col">
                                            <span class="mdl-chip__contact mdl-color--red mdl-color-text--white"><i class="mdl-chip__contact material-icons">clear</i></span>
                                            <span class="mdl-chip__text">Tanah dalam Konflik</span>
                                        </span>
                                @else
                                    <span class="mdl-chip mdl-chip--contact mdl-cell--12-col">
                                            <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white"><i class="mdl-chip__contact material-icons">done</i></span>
                                            <span class="mdl-chip__text">Tanah Tidak dalam Konflik</span>
                                        </span>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                </form>
            </div>

            <div class="mdl-tabs__panel" id="transaksi-panel">
                <form action="/kades" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="type" value="transaksi">
                {{--<input type="hidden" name="_method" value="PUT">--}}
                <div class="mdl-grid">
                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored mdl-button--raised mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--4-col-phone " type="submit">
                        Simpan
                    </button>
                </div>
                @foreach ($transaksis as $transaksi)
                    <button class="accordion" type="button">
                        <div class="mdl-grid">
                            <div class="mdl-cell mdl-cell--4-col" style="text-align: right">
                                {{ $transaksi->penjual->nama }}
                            </div>
                            <div class="mdl-cell mdl-cell--4-col">
                                <hr>
                            </div>
                            <div class="mdl-cell mdl-cell--4-col">
                                {{ $transaksi->pembeli->nama }}
                            </div>
                        </div>
                    </button>
                    <div class="panel">
                        <div class="mdl-grid">
                            <div class="mdl-cell mdl-cell--10-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
                                <div class="mdl-grid" style="margin-bottom: 10px;">
                                    <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-cell--8-col-tablet special">
                                        No Persil
                                    </div>
                                    <div class="mdl-cell mdl-cell--9-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
                                        {{ $transaksi->tanah->persil }}
                                    </div>
                                </div>

                                <div class="mdl-grid" style="margin-bottom: 10px;">
                                    <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-cell--8-col-tablet special">
                                        Lokasi
                                    </div>
                                    <div class="mdl-cell mdl-cell--9-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
                                        Jl.{{$transaksi->tanah->jalan}},
                                        {{$transaksi->tanah->blok}},
                                        {{$transaksi->tanah->rt}}/{{$transaksi->tanah->rw}} (RT/RW),
                                        {{$transaksi->tanah->kampung}},
                                        {{$transaksi->tanah->desa}},
                                        Kel. {{$transaksi->tanah->kelurahan}},
                                        Kec. {{$transaksi->tanah->kecamatan}},
                                        Kab. {{$transaksi->tanah->kabupaten}},
                                        Prov. {{$transaksi->tanah->provinsi}}
                                    </div>
                                </div>

                                <div class="mdl-grid" style="margin-bottom: 10px;">
                                    <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-cell--8-col-tablet special">
                                        Luas
                                    </div>
                                    <div class="mdl-cell mdl-cell--9-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
                                        {{$transaksi->tanah->luas}} m<sup>2</sup>
                                    </div>
                                </div>
                            </div>
                            <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
                                <div class="mdl-grid">
                                    <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect mdl-cell mdl-cell--12-col" for="status_konfirmasi[{{$transaksi->id}}]">
                                        <span class="mdl-switch__label">Sudah Dikonfirmasi</span>
                                        <input type="checkbox" id="status_konfirmasi[{{$transaksi->id}}]" class="mdl-switch__input" name="status_konfirmasi[{{$transaksi->id}}]" {{$transaksi->status_konfirmasi?"checked":""}}>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </form>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].onclick = function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight){
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + 'px';
                }
            }
        }
//        (function() {
//            'use strict';
//            var dialogButton = document.querySelector('.dialog-button');
//            var dialog = document.querySelector('#dialog');
//            if (! dialog.showModal) {
//                dialogPolyfill.registerDialog(dialog);
//            }
//            dialogButton.addEventListener('click', function() {
//                dialog.showModal();
//            });
//            dialog.querySelector('button:not([disabled])')
//                    .addEventListener('click', function() {
//                        dialog.close();
//                    });
//        }());
    </script>
@endsection
