function finalisasi() {
    document.getElementById("clone-nama-pemilik").innerHTML = document.getElementById("nama-pemilik").value;
    document.getElementById("clone-tgl-lahir-pemilik").innerHTML = document.getElementById("tgl-lahir-pemilik").value;
    document.getElementById("clone-nomor-identitas-pemilik").innerHTML = document.getElementById("nomor-identitas-pemilik").value;
    document.getElementById("clone-nomor-kohir-pemilik").innerHTML = document.getElementById("nomor-kohir-pemilik").value;
    document.getElementById("clone-nomor-kohir-induk-pemilik").innerHTML = document.getElementById("nomor-kohir-induk-pemilik").value;
    document.getElementById("clone-pekerjaan-pemilik").innerHTML = document.getElementById("pekerjaan-pemilik").value;
    document.getElementById("clone-alamat-pemilik").innerHTML = document.getElementById("alamat-pemilik").value;

    document.getElementById("clone-lokasi-tanah").innerHTML =
        "Jalan " + document.getElementById("jalan-tanah").value + ", Blok " + document.getElementById("blok-tanah").value +
        ", RT/RW " + document.getElementById("rt-tanah").value + "/" + document.getElementById("rw-tanah").value +
        ", Kampung " + document.getElementById("kampung-tanah").value + ", Desa " + document.getElementById("desa-tanah").value +
        ", Kecamatan " + document.getElementById("kecamatan-tanah").value + ", Kabupaten " + document.getElementById("kabupaten-tanah").value +
        ", Provinsi " + document.getElementById("provinsi-tanah").value;

    document.getElementById("clone-tipe-tanah").innerHTML = document.querySelector('input[name="tipe_tanah"]:checked').value;
    document.getElementById("clone-nomor-persil-tanah").innerHTML = document.getElementById("nomor-persil-tanah").value;
    document.getElementById("clone-nomor-identifikasi-tanah").innerHTML = document.getElementById("nomor-identifikasi-tanah").value;
    document.getElementById("clone-nomor-ipeda-tanah").innerHTML = document.getElementById("nomor-ipeda-tanah").value;
    document.getElementById("clone-kelas-desa-tanah").innerHTML = document.getElementById("kelas-desa-tanah").value;
    document.getElementById("clone-luas-tanah").innerHTML = document.getElementById("luas-tanah").value +" m" + persegi.sup() ;

    var penggunaan_tanah ="";
    var cb_counter = 1;
    var doc;
    while(cb_counter < 12){
        doc = document.getElementById("cb-" + cb_counter + "-penggunaan-tanah");
        var penggunaan = "";
        if(cb_counter==1)penggunaan ="Sawah, ";
        else if(cb_counter==2)penggunaan ="Ladang, ";
        else if(cb_counter==3)penggunaan ="Kebun, ";
        else if(cb_counter==4)penggunaan ="Kolam Ikan, ";
        else if(cb_counter==5)penggunaan ="Perumahan, ";
        else if(cb_counter==6)penggunaan ="Industri, ";
        else if(cb_counter==7)penggunaan ="Perkebunan, ";
        else if(cb_counter==8)penggunaan ="Dikelola pengembang, ";
        else if(cb_counter==9)penggunaan ="Lapangan Umum, ";
        else if(cb_counter==10)penggunaan ="Pengembalaan Ternak, ";
        else if(cb_counter==11)penggunaan ="Dibiarkan, ";

        if( doc.checked == true)
        {
            penggunaan_tanah += penggunaan;
        }
        cb_counter++;
    }

    document.getElementById("clone-penggunaan-tanah[]").innerHTML = penggunaan_tanah;
    document.getElementById("clone-sertipikasi-tanah").innerHTML = document.querySelector('input[name="status_sertifikasi"]:checked').value;

    document.getElementById("clone-tetangga-utara-batas").innerHTML = document.getElementById("tetangga-utara-batas").value;
    document.getElementById("clone-tetangga-timur-batas").innerHTML = document.getElementById("tetangga-timur-batas").value;
    document.getElementById("clone-tetangga-selatan-batas").innerHTML = document.getElementById("tetangga-selatan-batas").value;
    document.getElementById("clone-tetangga-barat-batas").innerHTML = document.getElementById("tetangga-barat-batas").value;
    document.getElementById("clone-bidang-utara-batas").innerHTML = document.getElementById("bidang-utara-batas").value;
    document.getElementById("clone-bidang-timur-batas").innerHTML = document.getElementById("bidang-timur-batas").value;
    document.getElementById("clone-bidang-selatan-batas").innerHTML = document.getElementById("bidang-selatan-batas").value;
    document.getElementById("clone-bidang-barat-batas").innerHTML = document.getElementById("bidang-barat-batas").value;

    var source = document.getElementById('table-riwayat');
    var destination = document.getElementById('clone-table-riwayat');
    var copy = source.cloneNode(true);
    copy.setAttribute('id', 'clone-table-riwayat');
    destination.parentNode.replaceChild(copy, destination);
}