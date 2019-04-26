@php
    $nomor_persil = $nib = $luas_tanah = $kelas_desa = $ipeda = $ipeda_r = $ipeda_s = $basah = $kering = "";
    $Wakaf = $Pengelolaan = $Pakai = $Guna_Bangunan = $Guna_Usaha = $Milik = $proses = $belum = "";
    $Sawah = $Ladang = $Kebun = $Kolam_Ikan = $Perumahan = $Industri = $Perkebunan = $Dikelola_Pengembang = $Lapangan_Umum = $Pengembalaan_Ternak = $Dibiarkan = "";
    if ($tanah!=null){
        if($tanah->kondisi=="Basah"){$basah = 'checked';} else{$kering = 'checked';}
        if($tanah->status_sertifikasi == "belum"){$belum = 'checked';}
        elseif($tanah->status_sertifikasi == "proses"){$proses = 'checked';}
        elseif($tanah->status_sertifikasi == "Milik"){$Milik = 'checked';}
        elseif($tanah->status_sertifikasi == "Guna Usaha"){$Guna_Usaha = 'checked';}
        elseif($tanah->status_sertifikasi == "Guna Bangunan"){$Guna_Bangunan = 'checked';}
        elseif($tanah->status_sertifikasi == "Pakai"){$Pakai = 'checked';}
        elseif($tanah->status_sertifikasi == "Pengelolaan"){$Pengelolaan = 'checked';}
        elseif($tanah->status_sertifikasi == "Wakaf"){$Wakaf = 'checked';}
        if(unserialize($tanah->penggunaan_tanah)!=null){
        $arraypenggunaan =  unserialize($tanah->penggunaan_tanah);
          foreach($arraypenggunaan as $value){
              if($value == "Sawah"){$Sawah = "checked";}
              elseif($value == "Ladang"){$Ladang = "checked";}
              elseif($value == "Kebun"){$Kebun = "checked";}
              elseif($value == "Kolam Ikan"){$Kolam_Ikan = "checked";}
              elseif($value == "Perumahan"){$Perumahan = "checked";}
              elseif($value == "Industri"){$Industri = "checked";}
              elseif($value == "Perkebunan"){$Perkebunan = "checked";}
              elseif($value == "Dikelola Pengembang"){$Dikelola_Pengembang = "checked";}
              elseif($value == "Lapangan Umum"){$Lapangan_Umum = "checked";}
              elseif($value == "Pengembalaan Ternak"){$Pengembalaan_Ternak = "checked";}
              elseif($value == "Dibiarkan"){$Dibiarkan = "checked";}
          }
        }
        $nomor_persil = $tanah->persil;
        $nib = $tanah->nib;
        $luas_tanah = $tanah->luas;
        $kelas_desa = $tanah->kelas_desa;
        $ipeda = $tanah->ipeda;
        $ipeda_r = $tanah->ipeda_r;
        $ipeda_s = $tanah->ipeda_s;
    }
@endphp
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<h6 style="margin: 0px;">Tipe Tanah</h6>
<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--2-col mdl-cell--2-col-phone mdl-cell--4-col-tablet">
        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="sawah-tipe-tanah">
            <input type="radio" id="sawah-tipe-tanah" class="mdl-radio__button" name="tipe_tanah" value="Sawah" checked {{$basah}}>
            <span class="mdl-radio__label">Sawah</span>
        </label>
    </div>
    <div class="mdl-cell mdl-cell--2-col mdl-cell--2-col-phone mdl-cell--4-col-tablet">
        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="kering-tipe-tanah">
            <input type="radio" id="kering-tipe-tanah" class="mdl-radio__button" name="tipe_tanah" value="Kering" {{$kering}}>
            <span class="mdl-radio__label">Kering</span>
        </label>
    </div>
</div>
<div class="mdl-grid">
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="number" id="nomor-persil-tanah" placeholder="" name="nomor_persil_tanah" value="{{$nomor_persil}}" required>
        
        <label class="mdl-textfield__label" for="nomor-persil-tanah">Nomor Persil</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="number" id="nomor-identifikasi-tanah" placeholder="" name="nomor_identifikasi_tanah" value="{{$nib}}">
        <label class="mdl-textfield__label" for="nomor-identifikasi-tanah">Nomor Identifikasi Bidang (NIB)</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="number"  id="luas-tanah" placeholder="" style="text-align: right; padding-right: 50px;" name="luas_tanah" value="{{$luas_tanah}}" required>
        
        <label class="mdl-textfield__label" for="luas-tanah">Luas Tanah </label>

        {{--SATUAN LUAS--}}
        <p style="font-size:16px; position: absolute; right: 25px;top : 22px; ">m<sup>2</sup></p>
    </div>
</div>
<div class="mdl-grid">
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="text" id="kelas-desa-tanah" placeholder="" name="kelas_desa_tanah" value="{{$kelas_desa}}" required>
        <label class="mdl-textfield__label" for="kelas-desa-tanah">Kelas Desa</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="number" id="nomor-ipeda-tanah" placeholder="" name="nomor_ipeda_tanah" value="{{$ipeda}}" required>
        <label class="mdl-textfield__label" for="nomor-ipeda-tanah">Ipeda</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="number" id="nomor-ipeda-r-tanah" placeholder="" name="nomor_ipeda_r_tanah" value="{{$ipeda_r}}">
        <label class="mdl-textfield__label" for="nomor-ipeda-tanah">Ipeda R</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="number" id="nomor-ipeda-s-tanah" placeholder="" name="nomor_ipeda_s_tanah" value="{{$ipeda_s}}">
        <label class="mdl-textfield__label" for="nomor-ipeda-tanah">Ipeda S</label>
    </div>
</div>
<h6 style="margin: 0px;">Penggunaan Tanah</h6>
<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="cb-1-penggunaan-tanah">
            <input type="checkbox" id="cb-1-penggunaan-tanah" class="mdl-checkbox__input" name="penggunaan_tanah[]" value="Sawah" {{$Sawah}}>
            <span class="mdl-checkbox__label">Sawah</span>
        </label>
    </div>
    <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="cb-2-penggunaan-tanah">
            <input type="checkbox" id="cb-2-penggunaan-tanah" class="mdl-checkbox__input" name="penggunaan_tanah[]" value="Ladang" {{$Ladang}}>
            <span class="mdl-checkbox__label">Ladang</span>
        </label>
    </div>
    <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="cb-3-penggunaan-tanah">
            <input type="checkbox" id="cb-3-penggunaan-tanah" class="mdl-checkbox__input" name="penggunaan_tanah[]" value="Kebun" {{$Kebun}}>
            <span class="mdl-checkbox__label">Kebun</span>
        </label>
    </div>
    <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="cb-4-penggunaan-tanah">
            <input type="checkbox" id="cb-4-penggunaan-tanah" class="mdl-checkbox__input" name="penggunaan_tanah[]" value="Kolam Ikan" {{$Kolam_Ikan}}>
            <span class="mdl-checkbox__label">Kolam Ikan</span>
        </label>
    </div>
    <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="cb-5-penggunaan-tanah">
            <input type="checkbox" id="cb-5-penggunaan-tanah" class="mdl-checkbox__input" name="penggunaan_tanah[]" value="Perumahan" {{$Perumahan}}>
            <span class="mdl-checkbox__label">Perumahan</span>
        </label>
    </div>
    <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="cb-6-penggunaan-tanah">
            <input type="checkbox" id="cb-6-penggunaan-tanah" class="mdl-checkbox__input" name="penggunaan_tanah[]" value="Industri" {{$Industri}}>
            <span class="mdl-checkbox__label">Industri</span>
        </label>
    </div>
    <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="cb-7-penggunaan-tanah">
            <input type="checkbox" id="cb-7-penggunaan-tanah" class="mdl-checkbox__input" name="penggunaan_tanah[]" value="Perkebunan" {{$Perkebunan}}>
            <span class="mdl-checkbox__label">Perkebunan</span>
        </label>
    </div>
    <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="cb-8-penggunaan-tanah">
            <input type="checkbox" id="cb-8-penggunaan-tanah" class="mdl-checkbox__input" name="penggunaan_tanah[]" value="Dikelola Pengembang" {{$Dikelola_Pengembang}}>
            <span class="mdl-checkbox__label">Dikelola Pengembang</span>
        </label>
    </div>
    <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="cb-9-penggunaan-tanah">
            <input type="checkbox" id="cb-9-penggunaan-tanah" class="mdl-checkbox__input" name="penggunaan_tanah[]" value="Lapangan Umum" {{$Lapangan_Umum}}>
            <span class="mdl-checkbox__label">Lapangan Umum</span>
        </label>
    </div>
    <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="cb-10-penggunaan-tanah">
            <input type="checkbox" id="cb-10-penggunaan-tanah" class="mdl-checkbox__input" name="penggunaan_tanah[]" value="Pengembalaan Ternak" {{$Pengembalaan_Ternak}}>
            <span class="mdl-checkbox__label">Pengembalaan Ternak</span>
        </label>
    </div>
    <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="cb-11-penggunaan-tanah">
            <input type="checkbox" id="cb-11-penggunaan-tanah" class="mdl-checkbox__input" name="penggunaan_tanah[]" value="Dibiarkan" {{$Dibiarkan}}>
            <span class="mdl-checkbox__label">Dibiarkan</span>
        </label>
    </div>
</div>

<h6 style="margin: 0px;">Status Sertipikasi</h6>
<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="belum-sertifikasi-tanah">
            <input type="radio" id="belum-sertifikasi-tanah" class="mdl-radio__button" name="status_sertifikasi" value="belum" checked {{$belum}}>
            <span class="mdl-radio__label">Belum</span>
        </label>
    </div>
    <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="proses-sertifikasi-tanah">
            <input type="radio" id="proses-sertifikasi-tanah" class="mdl-radio__button" name="status_sertifikasi" value="proses" {{$proses}}>
            <span class="mdl-radio__label">Proses</span>
        </label>
    </div>


    <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-phone mdl-cell--4-col-tablet">
        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="milik-sertifikasi-tanah">
            <input type="radio" id="milik-sertifikasi-tanah" class="mdl-radio__button" name="status_sertifikasi" value="Milik" {{$Milik}}>
            <span class="mdl-radio__label">Hak Milik</span>
        </label>
    </div>
    <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-phone mdl-cell--4-col-tablet">
        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="guna-usaha-sertifikasi-tanah">
            <input type="radio" id="guna-usaha-sertifikasi-tanah" class="mdl-radio__button" name="status_sertifikasi" value="Guna Usaha" {{$Guna_Usaha}}>
            <span class="mdl-radio__label">Hak Guna Usaha</span>
        </label>
    </div>
    <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-phone mdl-cell--4-col-tablet">
        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="guna-bangunan-sertifikasi-tanah">
            <input type="radio" id="guna-bangunan-sertifikasi-tanah" class="mdl-radio__button" name="status_sertifikasi" value="Guna Bangunan" {{$Guna_Bangunan}}>
            <span class="mdl-radio__label">Hak Guna Bangunan</span>
        </label>
    </div>
    <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-phone mdl-cell--4-col-tablet">
        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="pakai-sertifikasi-tanah">
            <input type="radio" id="pakai-sertifikasi-tanah" class="mdl-radio__button" name="status_sertifikasi" value="Pakai" {{$Pakai}}>
            <span class="mdl-radio__label">Hak Pakai</span>
        </label>
    </div>
    <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-phone mdl-cell--4-col-tablet">
        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="pengelolaan-sertifikasi-tanah">
            <input type="radio" id="pengelolaan-sertifikasi-tanah" class="mdl-radio__button" name="status_sertifikasi" value="Pengelolaan" {{$Pengelolaan}}>
            <span class="mdl-radio__label">Hak Pengelolaan</span>
        </label>
    </div>
    <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-phone mdl-cell--4-col-tablet">
        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="wakaf-sertifikasi-tanah">
            <input type="radio" id="wakaf-sertifikasi-tanah" class="mdl-radio__button" name="status_sertifikasi" value="Wakaf" {{$Wakaf}}>
            <span class="mdl-radio__label">Hak Wakaf</span>
        </label>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
(function (exports) {
        function valOrFunction(val, ctx, args) {
            if (typeof val == "function") {
                return val.apply(ctx, args);
            } else {
                return val;
            }
        }

        function InvalidInputHelper(input, options) {
            input.setCustomValidity(valOrFunction(options.defaultText, window, [input]));

            function changeOrInput() {
                if (input.value == "") {
                    input.setCustomValidity(valOrFunction(options.emptyText, window, [input]));
                } else {
                    input.setCustomValidity("");
                }
            }

            function invalid() {
                if (input.value == "") {
                    input.setCustomValidity(valOrFunction(options.emptyText, window, [input]));
                } else {
                input.setCustomValidity(valOrFunction(options.invalidText, window, [input]));
                }
            }

            input.addEventListener("change", changeOrInput);
            input.addEventListener("input", changeOrInput);
            input.addEventListener("invalid", invalid);
        }
        exports.InvalidInputHelper = InvalidInputHelper;
    })(window);
    
    $ ("#nama-pemilik").focus(function(){
        InvalidInputHelper(document.getElementById("nama-pemilik"), {
        defaultText: "mohon diisi",

        emptyText: "mohon diisi",

        invalidText: function (input) {
            return 'mohon diisi';
        }
        });        
    });

    $ ("#nomor-persil-tanah").focus(function(){
        InvalidInputHelper(document.getElementById("nomor-persil-tanah"), {
        defaultText: "mohon diisi",

        emptyText: "mohon diisi",

        invalidText: function (input) {
            return 'mohon diisi';
        }
        });        
    });

    $ ("#luas-tanah").focus(function(){
        InvalidInputHelper(document.getElementById("luas-tanah"), {
        defaultText: "mohon diisi",

        emptyText: "mohon diisi",

        invalidText: function (input) {
            return 'mohon diisi';
        }
        });        
    });

    $ ("#kelas-desa-tanah").focus(function(){
        InvalidInputHelper(document.getElementById("kelas-desa-tanah"), {
        defaultText: "mohon diisi",

        emptyFile: "mohon diisi",

        invalidText: function (input) {
            return 'mohon diisi';
        }
        });        
    });

    $ ("#nomor-ipeda-tanah").focus(function(){
        InvalidInputHelper(document.getElementById("nomor-ipeda-tanah"), {
        defaultText: "mohon diisi",

        emptyFile: "mohon diisi",

        invalidText: function (input) {
            return 'mohon diisi';
        }
        });        
    });


    
});
</script>