@extends('layouts.app')

@section('content')
  <div class="mdl-grid">
    <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell mdl-cell--6-col-desktop mdl-cell--8-col-tablet mdl-cell--4-col-phone">
      <div class="mdl-card__title">
        <h2 class="mdl-card__title-text">Identitas Tanah</h2>
      </div>
      <div class="mdl-card__supporting-text">

        <div class="mdl-grid">

          <div class="mdl-cell mdl-cell--3-col special"><p> Persil</p></div>
          <div class="mdl-cell mdl-cell--9-col"><p> {{$tanah->persil}}</p></div>

          <div class="mdl-cell mdl-cell--3-col special"><p> NIB</p></div>
          <div class="mdl-cell mdl-cell--9-col"><p> {{$tanah->nib}}</p></div>

          <div class="mdl-cell mdl-cell--3-col special"><p> Kelas Desa</p></div>
          <div class="mdl-cell mdl-cell--9-col"><p> {{$tanah->kelas_desa}}</p></div>

          <div class="mdl-cell mdl-cell--3-col special"><p> Luas / Ipeda</p></div>
          <div class="mdl-cell mdl-cell--9-col"><p> {{$tanah->luas}} / {{$tanah->ipeda}} ( R. {{$tanah->ipeda_r}}, S. {{$tanah->ipeda_s}})</p></div>

          <div class="mdl-cell mdl-cell--3-col special"><p> Kondisi</p></div>
          <div class="mdl-cell mdl-cell--9-col"><p> {{$tanah->kondisi}}</p></div>

          @php $arraypenggunaan =  unserialize($tanah->penggunaan_tanah); @endphp
          <div class="mdl-cell mdl-cell--3-col special"><p> Penggunaan Tanah</p></div>
          <div class="mdl-cell mdl-cell--9-col">
            <p>
              @if($arraypenggunaan != null)
                @foreach ($arraypenggunaan as $guna)
                  {{$guna}},
                @endforeach
              @endif
            </p>
          </div>

          <div class="mdl-cell mdl-cell--3-col special"><p> Lokasi</p></div>
          <div class="mdl-cell mdl-cell--9-col">
            <p>
              Jl.{{$tanah->jalan}},
              {{$tanah->blok}},
              {{$tanah->rt}}/{{$tanah->rw}} (RT/RW),
              {{$tanah->kampung}},
              {{$tanah->desa}},
              Kel. {{$tanah->kelurahan}},
              Kec. {{$tanah->kecamatan}},
              Kab. {{$tanah->kabupaten}},
              Prov. {{$tanah->provinsi}}
            </p>
          </div>

        </div>

        <table class="mdl-cell mdl-cell--12-col-desktop mdl-cell--8-col-tablet mdl-cell--4-col-phone">
          <tbody>
                @if ($tanah->status_sertifikasi == 'belum')
                  <span class="mdl-chip mdl-chip--contact">
                      <span class="mdl-chip__contact mdl-color--red mdl-color-text--white"><i class="mdl-chip__contact material-icons">clear</i></span>
                      <span class="mdl-chip__text">Belum Tersertipikasi</span>
                  </span>
                @elseif ($tanah->status_sertifikasi == 'proses')
                  <span class="mdl-chip mdl-chip--contact">
                      <span class="mdl-chip__contact mdl-color--orange mdl-color-text--white"><i class="mdl-chip__contact material-icons">autorenew</i></span>
                      <span class="mdl-chip__text">dalam proses sertifikasi</span>
                  </span>
                @else
                  <span class="mdl-chip mdl-chip--contact">
                      <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white"><i class="mdl-chip__contact material-icons">done</i></span>
                      <span class="mdl-chip__text">Sertipikasi Hak {{$tanah->status_sertifikasi}}</span>
                  </span>
                @endif
                @if ($tanah->validasi)
                  <span class="mdl-chip mdl-chip--contact">
                      <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white"><i class="mdl-chip__contact material-icons">done</i></span>
                      <span class="mdl-chip__text">Data Sudah Divalidasi</span>
                  </span>
                @else
                  <span class="mdl-chip mdl-chip--contact">
                      <span class="mdl-chip__contact mdl-color--red mdl-color-text--white"><i class="mdl-chip__contact material-icons">clear</i></span>
                      <span class="mdl-chip__text">Data Belum Divalidasi</span>
                  </span>
                @endif
                @if ($tanah->status_konflik)
                  <span class="mdl-chip mdl-chip--contact">
                      <span class="mdl-chip__contact mdl-color--red mdl-color-text--white"><i class="mdl-chip__contact material-icons">clear</i></span>
                      <span class="mdl-chip__text">Tanah dalam Konflik</span>
                  </span>
                @else
                  <span class="mdl-chip mdl-chip--contact">
                      <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white"><i class="mdl-chip__contact material-icons">done</i></span>
                      <span class="mdl-chip__text">Tanah Tidak dalam Konflik</span>
                  </span>
                @endif
          </tbody>
        </table>
      </div>
      <div class="mdl-card__menu">
        <a href="/tanah/{{$tanah->id}}/edit" style="text-decoration: none !important;"
          title="Edit Data">
        <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
          <i class="material-icons" style="color: white !important;">mode_edit</i>
        </button>
        </a>
        <a href="/tanah/{{$tanah->id}}/transaksi" style="text-decoration: none !important;"
           title="Lakukan Transaksi">
          <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
            <i class="material-icons" style="color: white !important;">account_balance</i>
          </button>
        </a>
      </div>
    </div>
    <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell mdl-cell--6-col-desktop mdl-cell--8-col-tablet mdl-cell--4-col-phone">
      <div class="mdl-card__title">
        <h2 class="mdl-card__title-text">Batas Tanah</h2>
      </div>
      <div class="mdl-card__supporting-text">
        @if($pemetakan=='Tidak Ada Data')
        @else
          <table class="mdl-cell mdl-cell--12-col" id="table-riwayat">
              <tbody>
                <tr>
                  <td><h5></h5></td>
                  <td><h5>
                    <center>
                      <strong>UTARA</strong><br>
                      Bidang : {{$pemetakan->bidang_utara}} <br/>
                      Tetangga : {{$pemetakan->tetangga_utara}}
                    </center>
                  </h5></td>
                  <td><h5></h5></td>
                </tr>
                <tr>
                  <td><h5>
                    <center>
                      <strong>BARAT</strong><br>
                      Bidang : {{$pemetakan->bidang_barat}} <br/>
                      Tetangga : {{$pemetakan->tetangga_barat}}
                    </center>
                  </h5></td>
                  <td><h5><br/><br/><br/><br/><br/><br/></h5></td>
                  <td><h5>
                    <center>
                      <strong>TIMUR</strong><br>
                      Bidang : {{$pemetakan->bidang_timur}} <br/>
                      Tetangga : {{$pemetakan->tetangga_timur}}
                    </center>
                  </h5></td>
                </tr>
                <tr>
                  <td><h5></h5></td>
                  <td><h5>
                    <center>
                      <strong>SELATAN</strong><br>
                      Bidang : {{$pemetakan->bidang_selatan}} <br/>
                      Tetangga : {{$pemetakan->tetangga_selatan}}
                    </center>
                  </h5></td>
                  <td><h5></h5></td>
                </tr>
              </tbody>
          </table>
        @endif
      </div>
      <div class="mdl-card__menu">
        <a href="/tanah/{{$tanah->id}}/batas/edit" style="color: white !important;">
        <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
          <i class="material-icons">mode_edit</i>
        </button>
        </a>
      </div>
    </div>
  </div>
  <div class="mdl-grid">
    <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell mdl-cell--6-col-desktop mdl-cell--8-col-tablet mdl-cell--4-col-phone">
      <div class="mdl-card__title">
        <h2 class="mdl-card__title-text">Riwayat Tanah</h2>
      </div>
      @if ($riwayats != 'Tidak Ada Data')
      <div class="mdl-card__supporting-text">
        @php $kondisi = true @endphp
        @foreach ($riwayats as $index => $riwayat)
          <button class="accordion">{{$riwayat->tanggal_riwayat}}</button>
          <div class="panel">
            <h6><strong>Atas Nama : {{$riwayat->nama_riwayat}}</strong></h6>
            @if ($kondisi)
              <h6><strong>Tercatat Pada Later C No : {{$riwayat->dasar_catatan_riwayat}}</strong></h6>
            @else
              <h6><strong>Dengan Dasar : {{$riwayat->dasar_catatan_riwayat}}</strong></h6>
            @endif
            <table class="mdl-shadow--2dp mdl-cell mdl-cell--12-col table-keterangan">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($keterangans[$index] as $no => $keterangan)
                  <tr>
                    @php $no++ @endphp
                    <td>{{$no}}</td>
                    <td>{{$keterangan->keterangan}}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            @php $kondisi = false @endphp
          </div>
        @endforeach
      </div>
      <div class="mdl-card__menu">
        <a href="/tambah_keterangan/{{$riwayats->last()->id}}">
          <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" style="color: white">
            <i class="material-icons">add</i>
          </button>
        </a>
      </div>
      @else
      <div class="mdl-card__menu">
        <a href="/tanah/{{$tanah->id}}/tambahriwayat" style="color: white !important;">
          <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
            <i class="material-icons">access_time</i>
          </button>
        </a>
      </div>
      @endif
    </div>
    <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell mdl-cell--6-col-desktop mdl-cell--8-col-tablet mdl-cell--4-col-phone">
      <div class="mdl-card__title">
        <h2 class="mdl-card__title-text">Konflik</h2>
      </div>
      <div class="mdl-card__supporting-text">
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Keterangan</th>
              <th>Status</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @php $x=0 @endphp
            @foreach ($konfliks as $key => $konflik)
              @if ($konflik->status_konflik)
              <tr>
                <td><h5>{{++$x}}</h5></td>
                <td><h5>{{$konflik->keterangan}}</h5></td>
                <td>
                  @if ($konflik->status_konfirmasi)
                    <span class="mdl-chip mdl-chip--contact">
                        <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white"><i class="mdl-chip__contact material-icons">done</i></span>
                        <span class="mdl-chip__text">Mengetahui</span>
                    </span>
                  @else
                    <span class="mdl-chip mdl-chip--contact">
                        <span class="mdl-chip__contact mdl-color--red mdl-color-text--white"><i class="mdl-chip__contact material-icons">clear</i></span>
                        <span class="mdl-chip__text">Belum Mengetahui</span>
                    </span>
                  @endif
                </td>
                <td><a href="/konflik/{{$konflik->id}}/edit"><span class="mdl-chip__contact mdl-color--blue mdl-color-text--white"><i class="mdl-chip__contact material-icons">mode_edit</i></span></a></td>
              </tr>
            @endif
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="mdl-card__menu">
        <a href="/tanah/{{$tanah->id}}/lapor_konflik" style="color: #fff">
          <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
            <i class="material-icons">add</i>
          </button>
        </a>
      </div>
    </div>
  </div>
  <div class="mdl-grid">
    <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell mdl-cell--6-col-desktop mdl-cell--8-col-tablet mdl-cell--4-col-phone">
      <div class="mdl-card__title">
        <h2 class="mdl-card__title-text">Olah Berkas dan Data</h2>
      </div>
      @if (session('status'))
          <div class="alert alert-danger mdl-cell mdl-cell--12-col">
              <center><h5>{{ session('status') }}</h5></center>
          </div>
      @endif
      <div class="mdl-card__supporting-text">
        <!-- <div class="mdl-grid">
          <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-1">
            <input type="checkbox" id="checkbox-1" class="mdl-checkbox__input" name="">
            <span class="mdl-checkbox__label">SURAT PERNYATAAN PENGUASAAN FISIK BIDANG TANAH (SPORADIK)</span>
          </label>
          <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-2">
            <input type="checkbox" id="checkbox-2" class="mdl-checkbox__input">
            <span class="mdl-checkbox__label">SURAT PERNYATAAN PENGUASAAN FISIK BIDANG TANAH (SPORADIK)</span>
          </label>
        </div>
        <hr> -->
        <div class="mdl-grid">
          <a href="/print_penguasaan_fisik/{{$tanah->id}}" target="_blank" class="mdl-cell--6-col mdl-cell--4-tablet mdl-cell--4-phone">
            <div class="mdl-grid">
              <button class="print mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-cell mdl-cell--12-col">
                Penguasaan Fisik (SPORADIK)
              </button>
            </div>
          </a>
          <a href="/print_penguasaan_fisik/{{$tanah->id}}" target="_blank" class="mdl-cell--6-col mdl-cell--4-tablet mdl-cell--4-phone">
            <div class="mdl-grid">
              <button class="print mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-cell mdl-cell--12-col">
                Keterangan Riwayat Tanah
              </button>
            </div>
          </a>
          <a href="/print_penguasaan_fisik/{{$tanah->id}}" target="_blank" class="mdl-cell--6-col mdl-cell--4-tablet mdl-cell--4-phone">
            <div class="mdl-grid">
              <button class="print mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-cell mdl-cell--12-col">
                Pernyataan Beda Luas
              </button>
            </div>
          </a>
          <a href="/print_penguasaan_fisik/{{$tanah->id}}" target="_blank" class="mdl-cell--6-col mdl-cell--4-tablet mdl-cell--4-phone">
            <div class="mdl-grid">
              <button class="print mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-cell mdl-cell--12-col">
                Pernyataan Kelebihan Tanah
              </button>
            </div>
          </a>
          <a href="/print_penguasaan_fisik/{{$tanah->id}}" target="_blank" class="mdl-cell--6-col mdl-cell--4-tablet mdl-cell--4-phone">
            <div class="mdl-grid">
              <button class="print mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-cell mdl-cell--12-col">
                Pemasangan Penetapan
              </button>
            </div>
          </a>
          <a href="/print_penguasaan_fisik/{{$tanah->id}}" target="_blank" class="mdl-cell--6-col mdl-cell--4-tablet mdl-cell--4-phone">
            <div class="mdl-grid">
              <button class="print mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-cell mdl-cell--12-col">
                Pernyataan Waris
              </button>
            </div>
          </a>
          <a href="/print_penguasaan_fisik/{{$tanah->id}}" target="_blank" class="mdl-cell--6-col mdl-cell--4-tablet mdl-cell--4-phone">
            <div class="mdl-grid">
              <button class="print mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-cell mdl-cell--12-col">
                Keterangan Kepala Desa
              </button>
            </div>
          </a>
          <a href="/print_penguasaan_fisik/{{$tanah->id}}" target="_blank" class="mdl-cell--6-col mdl-cell--4-tablet mdl-cell--4-phone">
            <div class="mdl-grid">
              <button class="print mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-cell mdl-cell--12-col">
                Permohonan
              </button>
            </div>
          </a>
          <a href="/print_penguasaan_fisik/{{$tanah->id}}" target="_blank" class="mdl-cell--6-col mdl-cell--4-tablet mdl-cell--4-phone">
            <div class="mdl-grid">
              <button class="print mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-cell mdl-cell--12-col">
                Risalah Penelitian
              </button>
            </div>
          </a>
        </div>
      </div>
    </div>
      <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell mdl-cell--6-col-desktop mdl-cell--8-col-tablet mdl-cell--4-col-phone">
        <div class="mdl-card__title">
          <h2 class="mdl-card__title-text">Daftar Pengajuan Berkas</h2>
        </div>
        <div class="mdl-card__supporting-text">
          <dl class="daftarberkas">
            <dt>Pengajuan Pengukuran</dt>
            <dd>
              <ol>
                <li>Surat Pengajuan</li>
                <li>Pemasangan Penetapan</li>
              </ol>
            </dd>
            <dt>Pengajuan Pengukuran</dt>
            <dd>
              <ol>
                <li>Surat Pengajuan</li>
                <li>Pemasangan Penetapan</li>
              </ol>
            </dd>
          </dl>
        </div>
      </div>
    </div>
  <center>
    <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
      <div class="mdl-card__title">
        <h2 class="mdl-card__title-text">Map</h2>
      </div>
      <div class="mdl-card__supporting-text">
          <div id="map" style="width: 100%; height: 500px; margin: 0 auto;"></div>
      </div>
    </div>
  </center>
@endsection

@section('css')
  <link rel="stylesheet" href="/css/dialog.css">
  <style>
  .daftarberkas{
    text-align: left;
  }
    h5{
      margin: 1% 0;
    }
    .mdl-card__title{
      color: #fff;
      background-color: #2196F3;
    }
    .demo-card-wide > .mdl-card__menu {
      color: #fff;
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

    table.table-keterangan{
      margin: 5px;
    }

    span.mdl-chip{
      margin: 5px;
    }

    .print{
      margin: 5px;
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

  .alert{
      padding: 10px;
  }
  .alert-danger{
      color: #FFFFFF;
      background-color: #E91E63;
  }
  </style>
  <link rel="stylesheet" href="/css/list_tanah.css">
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
    (function() {
        'use strict';
        var dialogButton = document.querySelector('.dialog-button');
        var dialog = document.querySelector('#dialog');
        if (! dialog.showModal) {
          dialogPolyfill.registerDialog(dialog);
        }
        dialogButton.addEventListener('click', function() {
           dialog.showModal();
        });
        dialog.querySelector('button:not([disabled])')
        .addEventListener('click', function() {
          dialog.close();
        });
      }());
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQIzatEo0kn2BooFwYFusR7xfkmW0x760&libraries=places&callback=initMap"
      async defer></script>
  <script type="text/javascript">

  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      @if($maps!=null)
        zoom: 25,
        center: {lat: {{$maps->lat}}, lng: {{$maps->lon}}}
      @else
        zoom: 4,
        center: {lat: -2.1967272417616583, lng: 119.794921875}
      @endif
    });

    @if($maps != null)
      var url = window.location.href;
      var arr = url.split("/");
      var result = arr[0] + "//" + arr[2];
      console.log(result);
      map.data.loadGeoJson( result+'/api/satu_tanah/'+{{$id}});

      map.data.setStyle(function(feature) {
        color = feature.getProperty('color');
        return({
          fillColor: color,
          strokeColor: color,
          strokeWeight: 0
        });
      });
    @endif

  }
  </script>
@endsection
