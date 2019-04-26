<script>
window.onload=function() {
    window.print();
}
</script>
<img style="position:absolute; right: 0px; top: 0px;" src="https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl={{$tanah->id}}" title="Link to Google.com" />
<div id=SuratPernyataanPenguasaanFisik>
	<p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
	text-align:center'><span style='font-family:Bodoni MT Black,serif'>SURAT PERNYATAAN
	PENGUASAAN FISIK</span></p>

	<p class=MsoNormal align=center style='text-align:center'><span
	style='font-family:Bodoni MT Black,serif'>BIDANG TANAH (SPORADIK)</span></p>

	<p class=MsoNormal style='text-align:justify'><span style='font-family:Times New Roman,serif'>Yang
	bertanda tangan dibawah ini :</span></p>

	<p class=MsoNormal style='text-align:justify;line-height:normal'><span
	style='font-family:Times New Roman,serif'>Nama               : <strong>{{$pemilik->nama}}</strong></span></p>

	<!-- @php $umur = date("Y-m-d") - date("Y-m-d", strtotime($pemilik->tanggal_lahir)); @endphp -->
	@php
		$from = new DateTime($pemilik->tanggal_lahir);
		$to   = new DateTime('today');
		$umur = $from->diff($to)->y;
	@endphp
	<p class=MsoNormal style='text-align:justify;line-height:normal'><span
	style='font-family:Times New Roman,serif'>Umur               : <strong>{{$umur}}</strong></span></p>

	<p class=MsoNormal style='text-align:justify;line-height:normal'><span
	style='font-family:Times New Roman,serif'>Pekerjaan         : <strong>{{$pemilik->pekerjaan}}</strong>
	</span></p>

	<p class=MsoNormal style='text-align:justify;line-height:normal'><span
	style='font-family:Times New Roman,serif'>Nomor KTP     : <strong>{{$pemilik->id}}</strong></span></p>

	<p class=MsoNormal style='text-align:justify;line-height:normal'><span
	style='font-family:Times New Roman,serif'>Alamat             : <strong>{{$pemilik->alamat}}</strong>
	</span></p>

	<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
	justify'><span style='font-family:Times New Roman,serif'>&nbsp;</span></p>

	<p class=MsoNormal style='text-align:justify'><span style='font-family:Times New Roman,serif'>Dengan
	ini menyatakan bahwa saya dengan itikad baik telah menguasai sebidang tanah
	yang terletak di :</span></p>

	<p class=MsoNormal style='text-align:justify'><span style='font-family:Times New Roman,serif'>Jalan / Blok /RT/RW                           : <strong>{{$tanah->jalan}} / {{$tanah->blok}} / {{$tanah->rt}} / {{$tanah->rw}}</strong>
	</span></p>

	<p class=MsoNormal style='text-align:justify'><span style='font-family:Times New Roman,serif'>Desa/Kelurahan                       : <strong>{{$tanah->desa}} / {{$tanah->kelurahan}}</strong>
	</span></p>

	<p class=MsoNormal style='text-align:justify'><span style='font-family:Times New Roman,serif'>Kabupaten/Kotamadya            : <strong>{{$tanah->kabupaten}}</strong>
	</span></p>

	<!-- <p class=MsoNormal style='text-align:justify'><span style='font-family:Times New Roman,serif'>No.
	SPPT PBB             : </span></p> -->

	<p class=MsoNormal style='text-align:justify'><span style='font-family:Times New Roman,serif'>Dengan
	batas-batas tanah :</span></p>

	@php
	$batas_u;
	$batas_s;
	$batas_t;
	$batas_b;


	if(!$pemetakan){
		$batas_u = "";
		$batas_b = "";
		$batas_s = "";
		$batas_t = "";
	}
	else{
		$batas_u = $pemetakan->bidang_utara;
		$batas_s = $pemetakan->bidang_utara;
		$batas_t = $pemetakan->bidang_utara;
		$batas_b = $pemetakan->bidang_utara;
	}
	@endphp

	<p class=MsoNormal style='text-align:justify'><span style='font-family:Times New Roman,serif'>Sebelah
	Utara              : <strong>{{$batas_u}}</strong></span></p>

	<p class=MsoNormal style='text-align:justify'><span style='font-family:Times New Roman,serif'>Sebelah
	Timur             : <strong>{{$batas_t}}</strong></span></p>

	<p class=MsoNormal style='text-align:justify'><span style='font-family:Times New Roman,serif'>Sebelah
	Selatan           : <strong>{{$batas_s}}</strong></span></p>

	<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:	justify'><span style='font-family:Times New Roman,serif'>
	Sebelah Barat              : <strong>{{$batas_b}}</strong>
	</span></p>

	<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
	justify'><span style='font-family:Times New Roman,serif'>&nbsp;</span></p>

	@php
	if(!$riwayat){
		$date = "........";
		$nama = ".............................";
	}
	else{
		$nama = $riwayat->nama_riwayat;
		$date = date("Y", strtotime($riwayat->tanggal_riwayat));
	}
	@endphp

	<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
	justify'><span style='font-family:Times New Roman,serif'>Tanah tersebut saya
	peroleh dari <strong>{{$nama}}</strong> sejak tahun <strong>{{$date}}</strong> 
	yang saat ini saya kuasai secara terus menerus, tidak dijadikan/menjadi jaminan
	sesuatu hutang dan tidak dalam sengketa.</span></p>

	<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
	justify'><span style='font-family:Times New Roman,serif'>Pernyataan ini saya
	buat dengan sebenarnya dan penuh tanggung jawab serta saya bersedia untuk
	diangkat sumpah bila diperlukan, apabila pernyataan ini tidak benar dikemudian
	hari ada pihak yang dirugikan, maka saya bersedia dituntut sesuai hukum yang
	berlaku.</span></p>

	<p class=MsoNormal style='text-align:justify'><span style='font-family:Times New Roman,serif'>Disaksikan
	oleh :</span></p>

	<p class=MsoNormal style='text-align:justify;line-height:normal'><span
	style='font-family:Times New Roman,serif'>Nama               :
	</span></p>

	<p class=MsoNormal style='text-align:justify;line-height:normal'><span
	style='font-family:Times New Roman,serif'>Umur               : </span></p>

	<p class=MsoNormal style='text-align:justify;line-height:normal'><span
	style='font-family:Times New Roman,serif'>Pekerjaan         :
	</span></p>

	<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
	justify;line-height:normal'><span style='font-family:Times New Roman,serif'>Alamat             :
	</span></p>

	<p class=MsoNormal style='text-align:justify;line-height:normal'><span
	style='font-family:Times New Roman,serif'>&nbsp;</span></p>

	<p class=MsoNormal style='text-align:justify;line-height:normal'><span
	style='font-family:Times New Roman,serif'>Nama               :
	</span></p>

	<p class=MsoNormal style='text-align:justify;line-height:normal'><span
	style='font-family:Times New Roman,serif'>Umur               :
	</span></p>

	<p class=MsoNormal style='text-align:justify;line-height:normal'><span
	style='font-family:Times New Roman,serif'>Pekerjaan         :
	</span></p>

	<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
	justify;line-height:normal'><span style='font-family:Times New Roman,serif'>Alamat             :
	</span></p>

	<p class=MsoNormal style='text-align:justify'><span style='font-family:Times New Roman,serif'>&nbsp;</span></p>

	<p class=MsoNormal style='text-align:justify'><span style='font-family:Times New Roman,serif'>Saksi
	:                                                                                      {{$tanah->kabupaten}}, {{date("d F Y")}}</span></p>

	<p class=MsoNormal style='text-align:justify'><span style='font-family:Times New Roman,serif'>
	(..........................)                                         Yang
	membuat pernyataan</span></p>

	<p class=MsoNormal style='text-align:justify'><span style='font-family:Times New Roman,serif'>
	(.........................)      </span></p>

	<p class=MsoNormal style='text-align:justify'><span style='font-family:Times New Roman,serif'>                                                                                                            ........................................</span></p>

	<p class=MsoNormal style='text-align:justify'><span style='font-family:Times New Roman,serif'>            :
	</span></p>
</div>
