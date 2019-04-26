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
            <script>
                alert("Data berhasil di update !");
            </script>
        </div>
    @endif
    <div class="mdl-grid">
        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect mdl-cell mdl-cell--10-col" style="margin: 0 auto;">
            <div class="mdl-tabs__tab-bar">
                <a href="#data-pemilik-panel" class="mdl-tabs__tab is-active">Form Identifikasi</a>
            </div>
            @if(!$identifikasi)
            <form class="mdl-grid" action="/form_identifikasi" method="post">
                {{ csrf_field() }}
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet">
                    <input class="mdl-textfield__input" type="text" id="nomor-surat-identifikasi" placeholder="" name="nomor_surat_identifikasi" value="" required>
                    <label class="mdl-textfield__label" for="nomor-surat-identitas">Nomor Surat</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet">
                    <input class="mdl-textfield__input" type="text" id="nomor-ipeda-identifikasi" placeholder="" name="nomor_ipeda_identifikasi" value="" required>
                    <label class="mdl-textfield__label" for="nomor-ipeda-identitas">Nomor Ipeda</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col">
                    <input class="mdl-textfield__input" type="text" id="nama-desa-identifikasi" placeholder="" name="nama_desa_identifikasi" value="" required>
                    <label class="mdl-textfield__label" for="nama-desa-identitas">Nama Desa</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col">
                    <input class="mdl-textfield__input" type="text" id="nama-kelurahan-identifikasi" placeholder="" name="nama_kelurahan_identifikasi" value="" required>
                    <label class="mdl-textfield__label" for="nama-kelurahan-identitas">Nama Kelurahan</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col">
                    <input class="mdl-textfield__input" type="text" id="nama-kecamatan-identifikasi" placeholder="" name="nama_kecamatan_identifikasi" value="" required>
                    <label class="mdl-textfield__label" for="nama-kecamatan-identitas">Nama Kecamatan</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col">
                    <input class="mdl-textfield__input" type="" id="nama-kabupaten-identitas" placeholder="" name="nama_kabupaten_identifikasi" value="" required>
                    <label class="mdl-textfield__label" for="nama-kabupaten-identitas">Nama Kabupaten</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col">
                    <input class="mdl-textfield__input" type="text" id="nama-provinsi-identifikasi" placeholder="" name="nama_provinsi_identifikasi" value="" required>
                    <label class="mdl-textfield__label" for="nama-provinsi-identitas">Nama Provinsi</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col">
                    <input class="mdl-textfield__input" type="text" id="jumlah-penduduk-identifikasi" placeholder="" name="jumlah_penduduk_identifikasi" value="" required>
                    <label class="mdl-textfield__label" for="jumlah-pendudukidentitas">Jumlah Penduduk</label>
                </div>

                @else
            <form class="mdl-grid" action="/form_identifikasi/edit" method="post">
                {{ csrf_field() }}
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet">
                    <input class="mdl-textfield__input" type="text" id="nomor-surat-identifikasi" placeholder="" name="nomor_surat_identifikasi" value="{{$identifikasi->nomor_surat}}" required>
                    <label class="mdl-textfield__label" for="nomor-surat-identitas">Nomor Surat</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet">
                    <input class="mdl-textfield__input" type="text" id="nomor-ipeda-identifikasi" placeholder="" name="nomor_ipeda_identifikasi" value="{{$identifikasi->nomor_ipeda_tanah}}" required>
                    <label class="mdl-textfield__label" for="nomor-ipeda-identitas">Nomor Ipeda</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col">
                    <input class="mdl-textfield__input" type="text" id="nama-desa-identifikasi" placeholder="" name="nama_desa_identifikasi" value="{{$identifikasi->nama_desa}}" required>
                    <label class="mdl-textfield__label" for="nama-desa-identitas">Nama Desa</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col">
                    <input class="mdl-textfield__input" type="text" id="nama-kelurahan-identifikasi" placeholder="" name="nama_kelurahan_identifikasi" value="{{$identifikasi->nama_kelurahan}}" required>
                    <label class="mdl-textfield__label" for="nama-kelurahan-identitas">Nama Kelurahan</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col">
                    <input class="mdl-textfield__input" type="text" id="nama-kecamatan-identifikasi" placeholder="" name="nama_kecamatan_identifikasi" value="{{$identifikasi->nama_kecamatan}}" required>
                    <label class="mdl-textfield__label" for="nama-kecamatan-identitas">Nama Kecamatan</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col">
                    <input class="mdl-textfield__input" type="" id="nama-kabupaten-identitas" placeholder="" name="nama_kabupaten_identifikasi" value="{{$identifikasi->nama_kabupaten}}" required>
                    <label class="mdl-textfield__label" for="nama-kabupaten-identitas">Nama Kabupaten</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col">
                    <input class="mdl-textfield__input" type="text" id="nama-provinsi-identifikasi" placeholder="" name="nama_provinsi_identifikasi" value="{{$identifikasi->nama_provinsi}}" required>
                    <label class="mdl-textfield__label" for="nama-provinsi-identitas">Nama Provinsi</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col">
                    <input class="mdl-textfield__input" type="text" id="jumlah-penduduk-identifikasi" placeholder="" name="jumlah_penduduk_identifikasi" value="{{$identifikasi->jumlah_penduduk}}" required>
                    <label class="mdl-textfield__label" for="jumlah-pendudukidentitas">Jumlah Penduduk</label>
                </div>

                @endif
                <button class=" mdl-cell mdl-cell--12-col mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored mdl-button--raised" type="submit" id="btn-submit">
                    Simpan
                </button>

            </form>
        </div>
    </div>
@endsection
