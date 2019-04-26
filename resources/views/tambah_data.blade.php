 @extends('layouts.app')
        @section('css')
            <link rel="stylesheet" href="/css/form.css">
        @endsection
        @section('javascript')
            <script defer src="/js/finalisasi.js"></script>
            <script defer src="/js/tambah_riwayat.js"></script>
            <script defer src="/js/stepper_nav.js"></script>
        @endsection
        @section('content')

            <section class="stepper-section stepper-section--demo" id="form-tambah-tanah">
                <div class="mdl-grid">
                    <!-- EDITABLE STEPS -->
                    <div class="mdl-cell mdl-cell--12-col" id="stepper-editable-steps">
                        <div class="stepper-snippet" id="snippet-stepper-step-editable">
                            @if($data=='pemilik')
                                <form action="{{url(action('PemilikController@store'))}}" method="post" enctype="multipart/form-data">
                            @elseif($data=='tanah')
                                <form action="{{url(action('TanahController@store',['id'=>$id]))}}" method="post" enctype="multipart/form-data">
                            @elseif($data=='riwayat')
                               <form action="{{route('tambah-riwayat', ['id' => $id])}}" method="post" >
                            @endif
                                    {{ csrf_field() }}
                                <ul class="mdl-stepper mdl-stepper--linear mdl-stepper--horizontal" id="demo-stepper-step-editable">

                                    @if($data=='pemilik')
                                    {{--DATA PEMILIK--}}
                                    <li class="mdl-step mdl-step--editable">
                                        <span class="mdl-step__label">
                                            <span class="mdl-step__title">
                                                <span class="mdl-step__title-text">Data Pemilik</span>
                                            </span>
                                        </span>
                                        <div class="mdl-step__content">
                                            @include('form_data_pemilik')
                                        </div>
                                        <div class="mdl-step__actions">
                                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect" data-stepper-back>
                                                Kembali
                                            </button>
                                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored mdl-button--raised" type="submit" id="btn-submit">
                                                Simpan
                                            </button>
                                        </div>
                                    </li>

                                    @elseif($data=='tanah')
                                    {{--LOKASI TANAH --}}
                                    <li class="mdl-step mdl-step--editable" >
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
                                    <li class="mdl-step mdl-step--editable mdl-step--optional">
                                    <span class="mdl-step__label">
                                        <span class="mdl-step__title">
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
                                    <li class="mdl-step mdl-step--editable">
                                    <span class="mdl-step__label">
                                        <span class="mdl-step__title">
                                            <span class="mdl-step__title-text">Riwayat Tanah</span>
                                        </span>
                                    </span>
                                        <div class="mdl-step__content">
                                            @include('form_riwayat_tanah')
                                        </div>

                                        <div class="mdl-step__actions">
                                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect" data-stepper-back>
                                                Kembali
                                            </button>
                                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored mdl-button--raised" type="submit" id="btn-submit">
                                                Simpan
                                            </button>
                                        </div>
                                    </li>
                                    @elseif($data=='riwayat')
                                    {{--RIWAYAT--}}
                                    <li class="mdl-step mdl-step--editable"v3>
                                    <span class="mdl-step__label">
                                        <span class="mdl-step__title">
                                            <span class="mdl-step__title-text">Riwayat Tanah</span>
                                        </span>
                                    </span>
                                            <div class="mdl-step__content">
                                                @include('form_riwayat_tanah')
                                            </div>

                                            <div class="mdl-step__actions">
                                                <button class="mdl-button mdl-js-button mdl-js-ripple-effect" data-stepper-back>
                                                    Kembali
                                                </button>
                                                <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored mdl-button--raised" type="submit" id="btn-submit">
                                                    Simpan
                                                </button>
                                            </div>
                                        </li>
                                    @endif
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>

            </section>

@endsection
