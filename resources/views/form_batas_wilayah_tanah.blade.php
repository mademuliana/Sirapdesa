@php
    $bu = $bs = $bt = $bb = $tu = $ts = $tb = $tt ="";
    if ($pemetakan!="Tidak Ada Data" && $pemetakan!=null){
      $bu = $pemetakan->bidang_utara;
      $bs = $pemetakan->bidang_selatan;
      $bt = $pemetakan->bidang_timur;
      $bb = $pemetakan->bidang_barat;
      $tu = $pemetakan->tetangga_utara;
      $ts = $pemetakan->tetangga_selatan;
      $tb = $pemetakan->tetangga_barat;
      $tt = $pemetakan->tetangga_timur;
    }
@endphp

<h6 style="margin: 0px;">Tetangga </h6>
<div class="mdl-grid">
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="text"  id="tetangga-utara-batas" placeholder="" name="tetangga_utara_batas" value="{{$tu}}">
        <label class="mdl-textfield__label" for="tetangga-utara-batas">Utara</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="text" id="tetangga-timur-batas" placeholder="" name="tetangga_timur_batas" value="{{$tt}}">
        <label class="mdl-textfield__label" for="tetangga-timur-batas">Timur</label>
    </div>
</div>
<div class="mdl-grid">
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="text"  id="tetangga-selatan-batas" placeholder="" name="tetangga_selatan_batas" value="{{$ts}}">
        <label class="mdl-textfield__label" for="tetangga-selatan-batas">Selatan</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="text" id="tetangga-barat-batas" placeholder="" name="tetangga_barat_batas" value="{{$tb}}">
        <label class="mdl-textfield__label" for="tetangga-barat-batas">Barat</label>
    </div>
</div>

<h6 style="margin: 0px;">Bidang </h6>
<div class="mdl-grid">
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="text"  id="bidang-utara-batas" placeholder="" name="bidang_utara_batas" value="{{$bu}}">
        <label class="mdl-textfield__label" for="bidang-utara-batas">Utara</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="text" id="bidang-timur-batas" placeholder="" name="bidang_timur_batas" value="{{$bt}}">
        <label class="mdl-textfield__label" for="bidang-timur-batas">Timur</label>
    </div>
</div>
<div class="mdl-grid">
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="text"  id="bidang-selatan-batas" placeholder="" name="bidang_selatan_batas" value="{{$bs}}">
        <label class="mdl-textfield__label" for="bidang-selatan-batas">Selatan</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="text" id="bidang-barat-batas" placeholder="" name="bidang_barat_batas" value="{{$bb}}">
        <label class="mdl-textfield__label" for="bidang-barat-batas">Barat</label>
    </div>
</div>
