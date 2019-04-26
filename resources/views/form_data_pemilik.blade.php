@php
    $later_c = $nama =$alias = $tanggal_lahir = $nomor_ktp = $nomor_kohir = $nomor_kohir_induk = $pekerjaan = $alamat = $nomor_telpon = "";
    if ($pemilik!=null){
        $nama = $pemilik->nama;
        $alias = $pemilik->nama_alias;
        $tanggal_lahir = $pemilik->tanggal_lahir;
        $nomor_ktp = $pemilik->no_ktp;
        $nomor_kohir = $pemilik->kohir;
        $nomor_kohir_induk = $pemilik->kohir_induk;
        $pekerjaan = $pemilik->pekerjaan;
        $alamat = $pemilik->alamat;
        $nomor_telpon = $pemilik->no_hp;
        $later_c = $pemilik->later_c_url;
    }else{
        $tanggal_lahir = "1990-01-01";
    }
@endphp
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="mdl-grid">
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--5-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="text" id="nama-pemilik" placeholder="" name="nama_pemilik" value="{{$nama}}" required >
        <label class="mdl-textfield__label" for="nama-pemilik">  Nama Pemilik</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="text" id="nama-alias-pemilik" placeholder="" name="alias_pemilik" value="{{$alias}}">

        <label class="mdl-textfield__label" for="nama-alias-pemilik">  Alias</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="date" id="tgl-lahir-pemilik" placeholder="" name="tgl_lahir_pemilik" value="{{$tanggal_lahir}}" required>
        <label class="mdl-textfield__label" for="tgl-lahir-pemilik">Tanggal Lahir</label>
    </div>


    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="number" id="nomor-identitas-pemilik" placeholder="" name="nomor_identitas_pemilik" value="{{$nomor_ktp}}" required>
        <label class="mdl-textfield__label" for="nomor-identitas-pemilik">Nomor KTP</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="number" id="nomor-kohir-pemilik" placeholder="" name="nomor_kohir_pemilik" value="{{$nomor_kohir}}" required>
        <label class="mdl-textfield__label" for="nomor-kohir-pemilik">Nomor Kohir</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="number" id="nomor-kohir-induk-pemilik" placeholder="" name="nomor_kohir_induk_pemilik" value="{{$nomor_kohir_induk}}">
        <label class="mdl-textfield__label" for="nomor-kohir-induk-pemilik">Nomor Kohir Induk</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="text" id="pekerjaan-pemilik" placeholder="" name="pekerjaan_pemilik" value="{{$pekerjaan}}">
        <label class="mdl-textfield__label" for="pekerjaan-pemilik">  Pekerjaan</label>
    </div>


    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="text" id="alamat-pemilik" placeholder="" name="alamat_pemilik" value="{{$alamat}}">
        <label class="mdl-textfield__label" for="alamat-pemilik">  Alamat</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="number" id="nomor-telepon-pemilik" placeholder="" name="nomor_telepon_pemilik" value="{{$nomor_telpon}}">
        <label class="mdl-textfield__label" for="nomor-telepon-pemilik">  Nomor Telepon</label>
    </div>
    @if($later_c == "")
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="file" id="scan-letter-c-tanah" placeholder="" name="images[]" required multiple>
        <label class="mdl-textfield__label" for="scan-letter-c-tanah">Upload Scan Letter C</label>
    </div>
    @endif
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

    $ ("#nomor-identitas-pemilik").focus(function(){
        InvalidInputHelper(document.getElementById("nomor-identitas-pemilik"), {
        defaultText: "mohon diisi",

        emptyText: "mohon diisi",

        invalidText: function (input) {
            return 'mohon diisi';
        }
        });
    });

    $("#nomor-kohir-pemilik").focus(function(){
        InvalidInputHelper(document.getElementById("nomor-kohir-pemilik"), {
        defaultText: "mohon diisi",

        emptyText: "mohon diisi",

        invalidText: function (input) {
            return 'mohon diisi';
        }
        });
    });
    $("#scan-later-c-tanah").focus(function(){
        InvalidInputHelper(document.getElementById("scan-later-c-tanah"), {
        defaultText: "mohon diisi",

        emptyText: "mohon diisi",

        invalidText: function (input) {
            return 'mohon diisi';
        }
        });       
    });
});

</script>