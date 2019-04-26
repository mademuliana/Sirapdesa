@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <div class="mdl-grid">
    <div class="mdl-cell mdl-cell mdl-cell--6-col-desktop mdl-cell--8-col-tablet mdl-cell--4-col-phone">

      <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
        <div class="mdl-card__title">
          <h2 class="mdl-card__title-text">Identitas Pemilik</h2>
        </div>
        <div class="mdl-card__supporting-text">

            <div class="mdl-grid">

                <div class="mdl-cell mdl-cell--3-col special"><p> Kohir</p></div>
                <div class="mdl-cell mdl-cell--9-col"><p> {{$pemilik->kohir}}</p></div>

                <div class="mdl-cell mdl-cell--3-col special"><p> No. KTP</p></div>
                <div class="mdl-cell mdl-cell--9-col"><p> {{$pemilik->no_ktp}}</p></div>

                <div class="mdl-cell mdl-cell--3-col special"><p> Nama (Alias)</p></div>
                <div class="mdl-cell mdl-cell--9-col"><p> {{$pemilik->nama}} ({{$pemilik->nama_alias}})</p></div>

                <div class="mdl-cell mdl-cell--3-col special"><p> No. Telepon</p></div>
                <div class="mdl-cell mdl-cell--9-col"><p> {{$pemilik->no_hp}}</p></div>

                @php $lahir = date("d F Y", strtotime($pemilik->tanggal_lahir)); @endphp
                <div class="mdl-cell mdl-cell--3-col special"><p> Tanggal Lahir</p></div>
                <div class="mdl-cell mdl-cell--9-col"><p> {{$lahir}}</p></div>

                <div class="mdl-cell mdl-cell--3-col special"><p> Pekerjaan</p></div>
                <div class="mdl-cell mdl-cell--9-col"><p> {{$pemilik->pekerjaan}}</p></div>

                <div class="mdl-cell mdl-cell--3-col special"><p> Alamat</p></div>
                <div class="mdl-cell mdl-cell--9-col"><p> {{$pemilik->alamat}}</p></div>

            </div>
        </div>
        <div class="mdl-card__menu">
            <a href="/pemilik/{{$pemilik-> id}}/edit" title="Ubah Data Pemilik">
              <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                <i class="material-icons" style="color: white !important;">mode_edit</i>
              </button>
            </a>
        </div>
      </div>


      <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col" style="margin-top:10px;">
        <div class="mdl-card__title">
          <h2 class="mdl-card__title-text">Daftar Tanah</h2>
        </div>
        <div class="mdl-card__menu">
            <a href="/pemilik/{{$pemilik-> id}}/tambah_tanah" title="Tambah Tanah">
                <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                    <i class="material-icons" style="color: white !important;">playlist_add</i>
                </button>
            </a>
        </div>
        <div class="mdl-card__supporting-text">
          <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col" id="table-riwayat">
              <thead>
                  <tr>
                      <th class="text-center">No</th>
                      <th class="mdl-data-table__cell--non-numeric">No.Persil</th>
                      <th>Luas (m<sup>2</sup>)</th>
                      <th class="mdl-data-table__cell--non-numeric text-center">Validasi</th>
                      <th class="mdl-data-table__cell--non-numeric text-center">Sertifikasi</th>
                      <th></th>
                      <th></th>

                  </tr>
              </thead>
              <tbody>
                  @foreach ($tanahs as $hitung => $tanah)
                    @php $hitung++ @endphp
                    @if ($tanah->status_konflik)
                      <tr class="status-conflict">
                    @else
                      <tr class="">
                    @endif
                        <td class="text-center">{{$hitung}} </td>
                        <td class="mdl-data-table__cell--non-numeric">{{$tanah->persil}} </td>
                        <td class="text-center">{{$tanah->luas}}</td>
                        <td class="mdl-data-table__cell--non-numeric text-center">
                          @if ($tanah->validasi)
                            <i class="mdl-chip__contact material-icons">done</i>
                          @else
                            <i class="mdl-chip__contact material-icons">clear</i>
                          @endif
                        </td>
                        <td class="mdl-data-table__cell--non-numeric text-center">
                          @if ($tanah->status_sertifikasi == 'belum')
                            <i class="mdl-chip__contact material-icons">clear</i>
                          @elseif ($tanah->status_sertifikasi == 'proses')
                            <i class="mdl-chip__contact material-icons">autorenew</i>
                          @else
                            <i class="mdl-chip__contact material-icons">done</i>
                          @endif
                        </td>
                        <td class="text-center">
                           @if ($tanah->status_konflik)
                               <a style="cursor: not-allowed" title="Lakukan Transaksi">
                           @else
                               <a href="/tanah/{{$tanah->id}}/transaksi" style="color: grey;" title="Lakukan Transaksi">
                           @endif
                               <i class="material-icons" style="color: grey !important;">account_balance</i>
                           </a>
                           </a>
                        </td>
                        <td>
                            <a href="/tanah/{{$tanah->id}}">
                            <span class="mdl-chip mdl-chip--contact">
                              <i class="mdl-chip__contact material-icons">subject</i>
                              <span class="mdl-chip__text">Detail</span>
                            </span>
                            </a>
                        </td>
                    </tr>
                  @endforeach;
              </tbody>
          </table>
        </div>
      </div>

    </div>


    <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet mdl-cell--4-col-phone">
      <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
        <div class="mdl-card__title">
          <h2 class="mdl-card__title-text">Scan Later C</h2>
        </div>
        <div class="mdl-card__supporting-text">
          <center>
          <?php
          $c=1;
          $d=1;
          $i=0;
          $j=0;
          $json=Json_decode($pemilik->later_c_url);
          ?>
          @foreach($json as $jsons)
          <img src="/upload_later_c/<?php print_r($json[$i]); $i++; ?>" style="width:30%;" onclick="document.getElementById('modal<?php echo $c; $c++;?>').style.display='block'">
          @endforeach
          </center>

        </div>
      </div>
    </div>

  </div>
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

    .mdl-card__supporting-text p{
        font-size: 16px !important;
    }

    .special{
        color: #1e88e5 !important;

    }

    .special p{
        font-weight: bold !important;
    }

    @media only screen and (min-width: 1024px){
        .mdl-card{
            margin-bottom: 35px !important;
        }
    }
    img {
    cursor: zoom-in;
}

  </style>
  <link rel="stylesheet" href="/css/list_tanah.css">
  </div>
          <?php
            
          ?>
          @foreach($json as $jsons)
          <div id="modal<?php echo $d;?>" class="w3-modal" onclick="this.style.display='none'">
           <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
            <div class="w3-modal-content w3-animate-zoom">
              <img src="/upload_later_c/<?php print_r($json[$j]); $d++; $j++ ?>" style="width:100%">
              </div>
            </div>
            <?php 
            ?>
          @endforeach
   


@endsection

@section('javascript')

@endsection
