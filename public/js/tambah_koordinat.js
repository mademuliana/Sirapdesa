var counter = 0;
var persegi = "2";

function tambahkoordinat() {
    var table = document.getElementById("table-koordinat");
    var row = document.createElement("tr");
    var tdlat = document.createElement("td");
    var tdlon = document.createElement("td");
    var inputlat = document.createElement("input");
    var inputlon = document.createElement("input");

    inputlat.value = document.getElementById("_lat").value;
    document.getElementById("_lat").value = "";
    inputlat.setAttribute("class", "table-data mdl-cell mdl-cell--12-col");
    inputlat.setAttribute("type", "text");
    inputlat.setAttribute("style", "border: none;");
    inputlat.setAttribute("name", "koordinat["+counter+"][lat]");
    tdlat.appendChild(inputlat);

    inputlon.value = document.getElementById("_lon").value;
    document.getElementById("_lon").value = "";
    inputlon.setAttribute("class", "table-data mdl-cell mdl-cell--12-col");
    inputlon.setAttribute("type", "text");
    inputlon.setAttribute("style", "border: none;");
    inputlon.setAttribute("name", "koordinat["+counter+"][lon]");
    tdlon.appendChild(inputlon);

    row.appendChild(tdlat);
    row.appendChild(tdlon);

    table.children[0].appendChild(row);
    counter++;
}
