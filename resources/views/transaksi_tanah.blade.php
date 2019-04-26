@extends('layouts.app')
@section('content')
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
            <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col" style="margin-top:10px;">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Info Tanah</h2>
                </div>
                <div class="mdl-card__supporting-text" style="font-size: 20px !important;">
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--3-col special"><p> No. Persil</p></div>
                        <div class="mdl-cell mdl-cell--9-col"><p> {{$tanah_transaksi->persil}}</p></div>

                        <div class="mdl-cell mdl-cell--3-col special"><p> NIB</p></div>
                        <div class="mdl-cell mdl-cell--9-col"><p> {{$tanah_transaksi->nib}}</p></div>

                        <div class="mdl-cell mdl-cell--3-col special"><p> Luas Tanah</p></div>
                        <div class="mdl-cell mdl-cell--9-col"><p> {{$tanah_transaksi->luas}} m<sup>2</sup></p></div>

                        <div class="mdl-cell mdl-cell--3-col special"><p> Lokasi</p></div>
                        <div class="mdl-cell mdl-cell--9-col">
                            <p>
                                Jl.{{$tanah_transaksi->jalan}},
                                {{$tanah_transaksi->blok}},
                                {{$tanah_transaksi->rt}}/{{$tanah_transaksi->rw}} (RT/RW),
                                {{$tanah_transaksi->kampung}},
                                {{$tanah_transaksi->desa}},
                                Kel. {{$tanah_transaksi->kelurahan}},
                                Kec. {{$tanah_transaksi->kecamatan}},
                                Kab. {{$tanah_transaksi->kabupaten}},
                                Prov. {{$tanah_transaksi->provinsi}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col" style="margin-top:10px;">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Info Pemilik</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--3-col special"><p> No. KTP</p></div>
                        <div class="mdl-cell mdl-cell--9-col"><p> {{$pemilik_tanah->no_ktp}}</p></div>

                        <div class="mdl-cell mdl-cell--3-col special"><p> Nama</p></div>
                        <div class="mdl-cell mdl-cell--9-col"><p> {{$pemilik_tanah->nama}} ({{$pemilik_tanah->nama_alias}})</p></div>

                        <div class="mdl-cell mdl-cell--3-col special"><p> Pekerjaan</p></div>
                        <div class="mdl-cell mdl-cell--9-col"><p> {{$pemilik_tanah->pekerjaan}}</p></div>

                        <div class="mdl-cell mdl-cell--3-col special"><p> No. Telpon</p></div>
                        <div class="mdl-cell mdl-cell--9-col"><p> {{$pemilik_tanah->no_hp}}</p></div>

                        <div class="mdl-cell mdl-cell--3-col special"><p> Alamat</p></div>
                        <div class="mdl-cell mdl-cell--9-col"><p> {{$pemilik_tanah->alamat}}</p></div>

                    </div>
                </div>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
            <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col" style="margin-top:10px;">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Data Transaksi</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--12-col">

                            <form action="{{url(action('TransaksiController@store',['id'=>$id]))}}" method="post">
                                {{ csrf_field() }}
                            <h6>Pilih Pembeli</h6>
                            <hr/>
                            @include('list_pemilik')
                            <hr/>
                            @php
                                $pemilik_tanah_id = $pemilik_tanah->id;
                            @endphp

                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
                                    <input class="mdl-textfield__input" type="text" id="luas-tanah" placeholder="" name="luas_tanah">
                                    <label class="mdl-textfield__label" for="nama-pemilik">  Luas Tanah yang dijualbelikan</label>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
                                    <textarea class="mdl-textfield__input" type="text" rows= "3" id="keterangan-transaksi" name="keterangan" placeholder=""></textarea>
                                    <label class="mdl-textfield__label" for="nama-pemilik">  Keterangan</label>
                                </div>

                                <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored mdl-button--raised mdl-cell mdl-cell--12-col" type="submit">
                                    Simpan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--@if(Request::url()=='http://localhost:8000/transaksi_tanah')--}}
        {{--<h4>YEY</h4>--}}
    {{--@else--}}
        {{--<h4>YOY</h4>--}}
    {{--@endif--}}
@endsection

@section('css')
    <style>
        h4{
            margin: 1% 0;
        }
        .mdl-card__title{
            color: #fff;
            background-color: #2196F3;
        }
        .demo-card-wide > .mdl-card__menu {
            color: #fff;
        }

        @media only screen and (min-width: 1024px){
            .mdl-card{
                margin-bottom: 35px !important;
            }
        }

        .mdl-card__supporting-text p{
            font-size: 16px !important;
        }

        .special{
            color: #1e88e5 !important;

        }

        .special p{
            font-weight: bold !important;
        }

        input[type=text], textarea[type=text]{
            background-color: #f3f3f3 !important;
            padding: 5px !important;
        }
    </style>
    <link rel="stylesheet" href="/css/list_tanah.css">
@endsection

@section('javascript')

@endsection
