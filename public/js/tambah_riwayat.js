var counter = 0;
var persegi = "2";

function tambahriwayat() {
    document.getElementById("label-diperoleh-dari").innerHTML = "Beralih pada";
    document.getElementById("label-sejak").innerHTML = "Pada Tanggal";
    document.getElementById("label-dasar").innerHTML = "Dengan Dasar";

    var table = document.getElementById("table-riwayat");
    var row = document.createElement("tr");
    var tdnama = document.createElement("td");
    var tdsejak = document.createElement("td");
    var tddasar = document.createElement("td");
    var tdketerangan = document.createElement("td");
    var inputnama = document.createElement("input");
    var inputsejak = document.createElement("input");
    var inputdasar = document.createElement("input");
    var inputketerangan = document.createElement("input");

    inputnama.value = document.getElementById("diperoleh-dari-riwayat").value;
    document.getElementById("diperoleh-dari-riwayat").value = "";
    inputnama.setAttribute("class", "table-data mdl-cell mdl-cell--12-col");
    inputnama.setAttribute("type", "text");
    inputnama.setAttribute("style", "border: none;");
    inputnama.setAttribute("name", "riwayat["+counter+"][nama]");
    tdnama.appendChild(inputnama);

    inputsejak.value = document.getElementById("sejak-riwayat").value;
    document.getElementById("sejak-riwayat").value = "";
    inputsejak.setAttribute("class", "mdl-cell mdl-cell--12-col");
    inputsejak.setAttribute("type", "date");
    inputsejak.setAttribute("style", "border: none;");
    inputsejak.setAttribute("name", "riwayat["+counter+"][sejak]");
    tdsejak.appendChild(inputsejak);

    inputdasar.value = document.getElementById("dasar-riwayat").value;
    document.getElementById("dasar-riwayat").value = "";
    inputdasar.setAttribute("class", "mdl-cell mdl-cell--12-col");
    inputdasar.setAttribute("type", "text");
    inputdasar.setAttribute("style", "border: none;");
    inputdasar.setAttribute("name", "riwayat["+counter+"][dasar]");
    tddasar.appendChild(inputdasar);

    inputketerangan.value = document.getElementById("keterangan-riwayat").value;
    document.getElementById("keterangan-riwayat").value = "";
    inputketerangan.setAttribute("class", "mdl-cell mdl-cell--12-col");
    inputketerangan.setAttribute("type", "text");
    inputketerangan.setAttribute("style", "border: none;");
    inputketerangan.setAttribute("name", "riwayat["+counter+"][keterangan]");
    tdketerangan.appendChild(inputketerangan);

    row.appendChild(tdnama);
    row.appendChild(tdsejak);
    row.appendChild(tddasar);
    row.appendChild(tdketerangan);

    table.children[0].appendChild(row);
    counter++;
}