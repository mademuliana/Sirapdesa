@php
    $provinsi_tanah = $kabupaten_tanah = $kelurahan_tanah = $kecamatan_tanah = $desa_tanah =
    $kampung_tanah = $rt_tanah = $rw_tanah = $jalan_tanah = $blok_tanah="";
    if ($tanah!=null){
        $provinsi_tanah = $tanah->provinsi;
		$kabupaten_tanah = $tanah->kabupaten;
		$kelurahan_tanah = $tanah->kelurahan;
		$kecamatan_tanah = $tanah->kecamatan;
		$desa_tanah = $tanah->desa;
		$kampung_tanah = $tanah->kampung;
		$rt_tanah = $tanah->rt;
		$rw_tanah = $tanah->rw;
		$jalan_tanah = $tanah->jalan;
		$blok_tanah = $tanah->blok;
    }
@endphp
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="mdl-grid">
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="text" id="provinsi-tanah" placeholder="" name="provinsi_tanah" value="{{$provinsi_tanah}}" required>
        <label class="mdl-textfield__label" for="provinsi-tanah"> Provinsi</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="text"  id="kabupaten-tanah" placeholder="" name="kabupaten_tanah" value="{{$kabupaten_tanah}}" required>
        <label class="mdl-textfield__label" for="kabupaten-tanah"> Kabupaten</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="text" id="kelurahan-tanah" placeholder="" name="kelurahan_tanah" value="{{$kelurahan_tanah}}" required>
        <label class="mdl-textfield__label" for="kelurahan-tanah">  Kelurahan</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="text" id="kecamatan-tanah" placeholder="" name="kecamatan_tanah" value="{{$kecamatan_tanah}}">
        <label class="mdl-textfield__label" for="kecamatan-tanah">  Kecamatan</label>
    </div>


    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--5-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="text" id="desa-tanah" placeholder="" name="desa_tanah" value="{{$desa_tanah}}" required>
        <label class="mdl-textfield__label" for="desa-tanah"> Desa</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--5-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="text"  id="kampung-tanah" placeholder="" name="kampung_tanah" value="{{$kampung_tanah}}">
        <label class="mdl-textfield__label" for="kampung-tanah"> Kampung</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--1-col mdl-cell--2-col-phone mdl-cell--4-col-tablet">
        <input class="mdl-textfield__input" type="text" id="rt-tanah" placeholder="" name="rt_tanah" value="{{$rt_tanah}}" required>
        <label class="mdl-textfield__label" for="rt-tanah">  RT</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--1-col mdl-cell--2-col-phone mdl-cell--4-col-tablet">
        <input class="mdl-textfield__input" type="text" id="rw-tanah" placeholder="" name="rw_tanah" value="{{$rw_tanah}}" required>
        <label class="mdl-textfield__label" for="rw-tanah">  RW</label>
    </div>


    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--8-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="text"  id="jalan-tanah" placeholder="" name="jalan_tanah" value="{{$jalan_tanah}}">
        <label class="mdl-textfield__label" for="jalan-tanah">Jalan</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col mdl-cell--4-col-phone mdl-cell--8-col-tablet">
        <input class="mdl-textfield__input" type="text" id="blok-tanah" placeholder="" name="blok_tanah" value="{{$blok_tanah}}">
        <label class="mdl-textfield__label" for="blok-tanah">Blok</label>
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
    $ ("#provinsi-tanah").focus(function(){
         InvalidInputHelper(document.getElementById("provinsi-tanah"), {
    defaultText: "mohon diisi",

    emptyText: "mohon diisi",

    invalidText: function (input) {
        return 'mohon diisi';
    }
    });
    });

    $ ("#kabupaten-tanah").focus(function(){
        InvalidInputHelper(document.getElementById("kabupaten-tanah"), {
        defaultText: "mohon diisi",

        emptyText: "mohon diisi",

        invalidText: function (input) {
            return 'mohon diisi';
        }
        }); 
    });
    
    $ ("#kelurahan-tanah").focus(function(){
        InvalidInputHelper(document.getElementById("kelurahan-tanah"), {
        defaultText: "mohon diisi",

        emptyText: "mohon diisi",

        invalidText: function (input) {
            return 'mohon diisi';
        }
        });
    });

    $ ("#desa-tanah").focus(function(){
        InvalidInputHelper(document.getElementById("desa-tanah"), {
        defaultText: "mohon diisi",

        emptyFile: "mohon diisi",

        invalidText: function (input) {
            return 'mohon diisi';
        }
        });
    });

    $ ("#rt-tanah").focus(function(){
    InvalidInputHelper(document.getElementById("rt-tanah"), {
    defaultText: "mohon diisi",

    emptyFile: "mohon diisi",

    invalidText: function (input) {
        return 'mohon diisi';
    }
    });        
    });

    $ ("#rw-tanah").focus(function(){
        InvalidInputHelper(document.getElementById("rw-tanah"), {
        defaultText: "mohon diisi",

        emptyFile: "mohon diisi",

        invalidText: function (input) {
            return 'mohon diisi';
        }
        });          
    });

    

    



  
});
</script>