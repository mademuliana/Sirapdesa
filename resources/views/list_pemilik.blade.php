{{--Validasi >> icon >> done , clear--}}
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
    <input class="mdl-textfield__input" type="text" id="sample1" >
    <label class="mdl-textfield__label" for="sample1">Cari</label>
</div>
<table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col" id="table-data-pemilik">
    <thead>
    @php
        $posisi = Request::path();
    @endphp
    <tr>
        <th class="text-center">No</th>
        <th class="mdl-data-table__cell--non-numeric">Nama</th>
        <th>No. Identitas</th>
        <th>No. Kohir</th>
        <th>Luas (m<sup>2</sup>)</th>
        @if ($posisi === 'list')
            <th class="mdl-data-table__cell--non-numeric text-center">Validasi</th>
            <th></th>
            <th></th>
        @else
            <th></th>
        @endif
    </tr>
    </thead>
    <tbody>
    @foreach ($pemiliks as $hitung => $pemilik)
        @php
            $nomor = $hitung + 1;
            $total_luas =0;
            $status_pemilik_konflik = false;
            $status_pemilik_validasi = true;
        @endphp
        @foreach ($tanahs[$hitung] as  $tanah)
            @php
                $total_luas += $tanah-> luas;
                $status_pemilik_konflik |= $tanah-> status_konflik ;
                $status_pemilik_validasi &= $tanah-> validasi ;
            @endphp
        @endforeach
        @if ($status_pemilik_konflik)
            <tr class="status-conflict">
        @else
            <tr class="">
        @endif
                <td class="text-center">{{$nomor}} </td>
                <td class="mdl-data-table__cell--non-numeric" id="pembeli">{{$pemilik->nama}} </td>
                <td class="">{{$pemilik->no_ktp}}</td>
                <td class="">{{$pemilik->kohir}}</td>
                <td class="">{{$total_luas}}</td>

                @if ($posisi === 'list')
                    <td class="text-center">
                        @if ($status_pemilik_validasi)
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
                    </td>
                    <td class="">
                        <a href="/pemilik/{{$pemilik->id}}/tambah_tanah">
                        <span class="mdl-chip mdl-chip--contact">
                            <i class="mdl-chip__contact material-icons">playlist_add</i>
                            <span class="mdl-chip__text">Tambah Tanah</span>
                        </span>
                        </a>
                    </td>
                    <td class="">
                        <a href="/pemilik/{{$pemilik->id}}">
                        <span class="mdl-chip mdl-chip--contact">
                            <i class="mdl-chip__contact material-icons">subject</i>
                            <span class="mdl-chip__text">Detail</span>
                        </span>
                        </a>
                    </td>

                @else
                    <td class="text-center">
                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect">
                            <input type="radio" class="mdl-radio__button" name="pembeli_tanah_id" value="{{$pemilik->id}}">
                        </label>
                    </td>

                @endif
            </tr>
            @endforeach
    </tbody>
</table>
