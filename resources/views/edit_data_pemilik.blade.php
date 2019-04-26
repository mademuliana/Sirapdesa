@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="/css/list_tanah.css">
    <link rel="stylesheet" href="/css/form.css">
@endsection
@section('content')
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--10-col mdl-cell--4-col-phone mdl-cell--8-col-tablet"
            style="margin: 0 auto; padding-top: 20px;!important; padding-bottom: 20px;!important;">
            <form action="#">
                @if($pemanggil=='data_pemilik')
                    @include('form_data_pemilik')
                @elseif($pemanggil=='data_tanah')
                    @include('form_lokasi_tanah')
                @endif
                <div class="mdl-grid">
                    <button id="submit_btn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored mdl-button--raised mdl-cell mdl-cell--2-col mdl-cell mdl-cell--2-col-tablet mdl-cell mdl-cell--12-col-phone " type="submit" id="btn-submit">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
