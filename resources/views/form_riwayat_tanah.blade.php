<div class="mdl-grid">
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--3-col">
        <input class="mdl-textfield__input" type="text"  id="diperoleh-dari-riwayat" placeholder="">
        <label class="mdl-textfield__label" for="diperoleh-dari-riwayat" id="label-diperoleh-dari">Diperoleh dari</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col">
        <input class="mdl-textfield__input" type="date"  id="sejak-riwayat" placeholder="" value="2000-01-01">
        <label class="mdl-textfield__label" for="sejak-riwayat" id="label-sejak">Sejak</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--3-col">
        <input class="mdl-textfield__input" type="text"  id="dasar-riwayat" placeholder="">
        <label class="mdl-textfield__label" for="dasar-riwayat" id="label-dasar">Tercatat dalam Letter C Nomor</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--3-col">
        <input class="mdl-textfield__input" type="text"  id="keterangan-riwayat" placeholder="">
        <label class="mdl-textfield__label" for="keterangan-riwayat" id="keterangan-dasar">Keterangan</label>
    </div>
    <div class="mdl-cell mdl-cell--1-col" style="padding-top: 18px; ">
        <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--primary mdl-button--raised mdl-js-ripple-effect" onclick="tambahriwayat()" type="button">
            <i class="material-icons">add</i>
        </button>
    </div>
</div>
<div class="mdl-grid">
    <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--11-col" id="table-riwayat">
        <thead>
        <tr>
            <th class="mdl-data-table__cell--non-numeric">Nama</th>
            <th style="text-align: center;">Tanggal</th>
            <th class="mdl-data-table__cell--non-numeric">Dasar Pencatatan</th>
            <th class="mdl-data-table__cell--non-numeric">Keterangan</th>
        </tr>
        </thead>

    </table>
</div>