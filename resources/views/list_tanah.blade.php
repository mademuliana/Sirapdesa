{{--Validasi >> icon >> done , clear--}}
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
    <input class="mdl-textfield__input" type="text" id="sample1" >
    <label class="mdl-textfield__label" for="sample1">Cari</label>
</div>
<table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col" id="table-data-tanah">
    <thead>
    @php $posisi=Request::path(); @endphp
    <tr>
        <th class="text-center">No</th>
        <th class="mdl-data-table__cell--non-numeric">No.Persil</th>
        <th class="mdl-data-table__cell--non-numeric">Nama Pemilik</th>
        <th>Luas (m<sup>2</sup>)</th>
        @if($posisi !== 'kades')
        <th class="mdl-data-table__cell--non-numeric text-center">Validasi</th>
        <th class="mdl-data-table__cell--non-numeric text-center">Sertifikasi</th>
        <th></th>
        @endif
        <th></th>
    </tr>
    </thead>
    <tbody>
    @php
        $nomor =0;
    @endphp
    @foreach ($tanah_alls as $hitung => $tanah_all)
        @if(($posisi === 'kades')&&(!($tanah_all->status_konflik)))
            @php

            @endphp
        @else

        @php
            $nomor = $nomor + 1;
        @endphp
        @if ($tanah_all->status_konflik)
            <tr class="status-conflict">
        @else
            <tr class="">
                @endif
                <td class="text-center">{{$nomor}} </td>
                <td class="mdl-data-table__cell--non-numeric">{{$tanah_all->persil}} </td>
                <td class="mdl-data-table__cell--non-numeric">{{$pemilik_tanahs[$hitung]->nama}}</td>
                <td class="">{{$tanah_all->luas}}</td>

                @if($posisi !== 'kades')
                <td class="text-center">
                    @if ($tanah_all->validasi)
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
                <td class="text-center">
                    @if ($tanah_all->status_sertifikasi == 'belum')
                        <span class="mdl-chip mdl-chip--contact">
                            <span class="mdl-chip__contact mdl-color--red mdl-color-text--white"><i class="mdl-chip__contact material-icons">clear</i></span>
                            <span class="mdl-chip__text">Belum Tersertipikasi</span>
                        </span>
                    @elseif ($tanah_all->status_sertifikasi == 'proses')
                        <span class="mdl-chip mdl-chip--contact">
                            <span class="mdl-chip__contact mdl-color--orange mdl-color-text--white"><i class="mdl-chip__contact material-icons">autorenew</i></span>
                            <span class="mdl-chip__text">dalam proses sertifikasi</span>
                        </span>
                    @else
                        <span class="mdl-chip mdl-chip--contact">
                            <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white"><i class="mdl-chip__contact material-icons">done</i></span>
                            <span class="mdl-chip__text">Sertipikasi Hak {{$tanah_all->status_sertifikasi}}</span>
                        </span>
                    @endif
                </td>
                <td class="text-center">
                    @if ($tanah_all->status_konflik)
                    <a style="cursor: not-allowed">
                    @else
                    <a href="/tanah/{{$tanah_all->id}}/transaksi">
                    @endif
                        <span class="mdl-chip mdl-chip--contact">
                            <i class="mdl-chip__contact material-icons">account_balance</i>
                            <span class="mdl-chip__text">Lakukan Transaksi</span>
                        </span>
                    </a>
                    </a>
                </td>
                @endif


                <td class="">
                    <a href="/tanah/{{$tanah_all->id}}">
                        <span class="mdl-chip mdl-chip--contact">
                            <i class="mdl-chip__contact material-icons">subject</i>
                            <span class="mdl-chip__text">Detail</span>
                        </span>
                    </a>
                </td>
            </tr>
            @endif
            @endforeach
    </tbody>
</table>