@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="/css/form.css">
@endsection
@section('content')

<section class="stepper-section stepper-section--demo" id="form-tambah-semua">
    <div class="mdl-grid">
        <!-- EDITABLE STEPS -->
        <div class="mdl-cell mdl-cell--12-col" id="stepper-editable-steps">
            <div class="stepper-snippet" id="snippet-stepper-step-editable">
              <form action="{{url(action('FormController@store'))}}"method="post" name="iniformulir" enctype="multipart/form-data" onsubmit="return simp()">
              {{ csrf_field() }}
                <ul class="mdl-stepper mdl-stepper--linear mdl-stepper--horizontal" id="demo-stepper-step-editable" >
                    {{--DATA PEMILIK--}}
                    <li class="mdl-step mdl-step--editable" >
                        <span class="mdl-step__label">
                            <span class="mdl-step__title" >
                                <span  class="mdl-step__title-text" style="padding-top:2%;">Data Pemilik</span>
                            </span>
                        </span>
                        <div class="mdl-step__content">
                            @include('form_data_pemilik')
                        </div>
                        <div class="mdl-step__actions">
                            @include('ccactionbtn')
                        </div>
                    </li>
                    {{--LOKASI TANAH --}}
                    <li class="mdl-step mdl-step--editable">
                        <span class="mdl-step__label">
                            <span class="mdl-step__title">
                                <span class="mdl-step__title-text">Lokasi Tanah</span>
                            </span>
                        </span>
                        <div class="mdl-step__content">
                            @include('form_lokasi_tanah')
                        </div>
                        <div class="mdl-step__actions">
                            @include('ccactionbtn')
                        </div>
                    </li>
                    {{--INFO TANAH--}}
                    <li class="mdl-step mdl-step--editable">
                        <span class="mdl-step__label">
                            <span class="mdl-step__title">
                                <span class="mdl-step__title-text">Info Tanah</span>
                            </span>
                        </span>
                        <div class="mdl-step__content">
                            @include('form_info_tanah')
                        </div>
                        <div class="mdl-step__actions">
                            @include('ccactionbtn')
                        </div>
                    </li>
                    {{--BATAS--}}
                    <li class="mdl-step mdl-step--editable mdl-step--optional" >
                                    <span class="mdl-step__label">
                                        <span class="mdl-step__title" >
                                            <span class="mdl-step__title-text">Batas Wilayah</span>
                                            <span class="mdl-step__title-message">Opsional</span>
                                        </span>
                                    </span>
                        <div class="mdl-step__content">
                            @include('form_batas_wilayah_tanah')
                        </div>
                        <div class="mdl-step__actions">
                            @include('ccactionbtn')
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect" data-stepper-skip>
                                Lewati
                            </button>
                        </div>
                    </li>
                    {{--RIWAYAT--}}
                    <li class="mdl-step mdl-step--editable" >
                                    <span class="mdl-step__label">
                                        <span class="mdl-step__title">
                                            <span class="mdl-step__title-text">Riwayat Tanah</span>
                                        </span>
                                    </span>
                        <div class="mdl-step__content">
                            @include('form_riwayat_tanah')
                        </div>
                        <div class="mdl-step__actions">
                            
                        @include('ccactionbtn')
                        
                        </div>
                    </li>
                    {{--finalisasi--}}
                    <li class="mdl-step mdl-step--editable">
                        <span class="mdl-step__label">
                            <span class="mdl-step__title">
                                <span class="mdl-step__title-text">Finalisasi</span>
                            </span>
                        </span>
                        <div class="mdl-step__content" class="konten-finalisasi">
                            <div class="mdl-grid" style="margin-bottom: 24px; border-bottom: 2px solid #eaeaea; padding-bottom: 12px;">
                                <div class="mdl-cell mdl-cell--6-col">
                                    {{--DATA PEMILIK--}}
                                    <h6 style="margin: 0px;">Data Pemilik</h6>
                                    <div class="mdl-grid">
                                        <div class="mdl-cell mdl-cell--3-col">
                                            <p>Nama</p >
                                        </div>
                                        <div class="mdl-cell mdl-cell--9-col">
                                            <p id="clone-nama-pemilik">teks</p >
                                        </div>
                                        <div class="mdl-cell mdl-cell--3-col">
                                            <p >Tanggal Lahir</p >
                                        </div>
                                        <div class="mdl-cell mdl-cell--9-col">
                                            <p id="clone-tgl-lahir-pemilik">teks</p >
                                        </div>
                                        <div class="mdl-cell mdl-cell--3-col">
                                            <p>Nomor KTP</p >
                                        </div>
                                        <div class="mdl-cell mdl-cell--9-col">
                                            <p id="clone-nomor-identitas-pemilik">awaw</p >
                                        </div>
                                        <div class="mdl-cell mdl-cell--3-col">
                                            <p>Nomor Kohir</p >
                                        </div>
                                        <div class="mdl-cell mdl-cell--9-col">
                                            <p id="clone-nomor-kohir-pemilik">teks</p >
                                        </div>
                                        <div class="mdl-cell mdl-cell--3-col">
                                            <p>Nomor Kohir Induk</p >
                                        </div>
                                        <div class="mdl-cell mdl-cell--9-col">
                                            <p id="clone-nomor-kohir-induk-pemilik">teks</p >
                                        </div>
                                        <div class="mdl-cell mdl-cell--3-col">
                                            <p>Pekerjaan</p >
                                        </div>
                                        <div class="mdl-cell mdl-cell--9-col">
                                            <p id="clone-pekerjaan-pemilik">teks</p >
                                        </div>
                                        <div class="mdl-cell mdl-cell--3-col">
                                            <p>Alamat</p >
                                        </div>
                                        <div class="mdl-cell mdl-cell--9-col">
                                            <p id="clone-alamat-pemilik">teks</p >
                                        </div>
                                    </div>
                                </div>
                                <div class="mdl-cell mdl-cell--6-col">
                                    {{--INFO TANAH--}}
                                    <h6 style="margin: 0px;">Info Tanah</h6>
                                    <div class="mdl-grid">
                                        <div class="mdl-cell mdl-cell--3-col">
                                            <p>Lokasi</p>
                                        </div>
                                        <div class="mdl-cell mdl-cell--9-col">
                                            <p id="clone-lokasi-tanah">teks</p>
                                        </div>
                                        <div class="mdl-cell mdl-cell--3-col">
                                            <p>Tipe</p>
                                        </div>
                                        <div class="mdl-cell mdl-cell--9-col">
                                            <p id="clone-tipe-tanah">teks</p>
                                        </div>
                                        <div class="mdl-cell mdl-cell--3-col">
                                            <p>Nomor Persil</p>
                                        </div>
                                        <div class="mdl-cell mdl-cell--9-col">
                                            <p id="clone-nomor-persil-tanah">teks</p>
                                        </div>
                                        <div class="mdl-cell mdl-cell--3-col">
                                            <p>Nomor Identifikasi</p>
                                        </div>
                                        <div class="mdl-cell mdl-cell--9-col">
                                            <p id="clone-nomor-identifikasi-tanah">teks</p>
                                        </div>
                                        <div class="mdl-cell mdl-cell--3-col">
                                            <p>Luas</p>
                                        </div>
                                        <div class="mdl-cell mdl-cell--9-col">
                                            <p id="clone-luas-tanah">teks</p>
                                        </div>
                                        <div class="mdl-cell mdl-cell--3-col">
                                            <p>Kelas Desa</p>
                                        </div>
                                        <div class="mdl-cell mdl-cell--9-col">
                                            <p id="clone-kelas-desa-tanah">teks</p>
                                        </div>
                                        <div class="mdl-cell mdl-cell--3-col">
                                            <p>Nomor Ipeda</p>
                                        </div>
                                        <div class="mdl-cell mdl-cell--9-col">
                                            <p id="clone-nomor-ipeda-tanah">teks</p >
                                        </div>
                                        <div class="mdl-cell mdl-cell--3-col">
                                            <p>Penggunaan Tanah</p>
                                        </div>
                                        <div class="mdl-cell mdl-cell--9-col">
                                            <p id="clone-penggunaan-tanah[]">teks</p >
                                        </div>
                                        <div class="mdl-cell mdl-cell--3-col">
                                            <p>Status Sertipikasi</p>
                                        </div>
                                        <div class="mdl-cell mdl-cell--9-col">
                                            <p id="clone-sertipikasi-tanah">teks</p >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mdl-grid" style="margin-bottom: 24px; border-bottom: 2px solid #eaeaea; padding-bottom: 12px;">
                                <div class="mdl-cell mdl-cell--12-col">
                                    <h6 style="margin: 0px;">Batas Wilayah</h6>
                                    <div class="mdl-grid">
                                        <div class="mdl-cell mdl-cell--6-col">
                                            <p style="color: #1e88e5;">Tetangga</p>
                                            <div class="mdl-grid">

                                               <div class="mdl-cell mdl-cell--3-col">
                                                   <p>Utara</p>
                                               </div>
                                               <div class="mdl-cell mdl-cell--9-col">
                                                   <p id="clone-tetangga-utara-batas">teks</p>
                                               </div>
                                               <div class="mdl-cell mdl-cell--3-col">
                                                   <p>Timur</p>
                                               </div>
                                               <div class="mdl-cell mdl-cell--9-col">
                                                   <p id="clone-tetangga-timur-batas">teks</p>
                                               </div>
                                               <div class="mdl-cell mdl-cell--3-col">
                                                   <p>Selatan</p>
                                               </div>
                                               <div class="mdl-cell mdl-cell--9-col">
                                                   <p id="clone-tetangga-selatan-batas">teks</p>
                                               </div>
                                               <div class="mdl-cell mdl-cell--3-col">
                                                   <p>Barat</p>
                                               </div>
                                               <div class="mdl-cell mdl-cell--9-col">
                                                   <p id="clone-tetangga-barat-batas">teks</p>
                                               </div>
                                            </div>
                                        </div>

                                        <div class="mdl-cell mdl-cell--6-col">
                                            <p style="color: #1e88e5;"> Bidang</p>
                                            <div class="mdl-grid">
                                                <div class="mdl-cell mdl-cell--3-col">
                                                    <p>Utara</p>
                                                </div>
                                                <div class="mdl-cell mdl-cell--9-col">
                                                    <p id="clone-bidang-utara-batas">teks</p>
                                                </div>
                                                <div class="mdl-cell mdl-cell--3-col">
                                                    <p>Timur</p>
                                                </div>
                                                <div class="mdl-cell mdl-cell--9-col">
                                                    <p id="clone-bidang-timur-batas">teks</p>
                                                </div>
                                                <div class="mdl-cell mdl-cell--3-col">Q
});

</script>
    <script defer src="/js/finalisasi.js"></script>
    <script defer src="/js/tambah_riwayat.js"></script>
    <script defer src="/js/stepper_nav.js"></script>
@endsection
@endsection
