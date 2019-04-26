@extends('layouts.app')

@section('title', 'table')

@section('content')
<div id="map"></div>
<!-- <div class="form-group">
  <input type="text" name="lat" value="" class="controls" id="lat">
  <input type="text" name="lng" value="" class="controls" id="lng">
</div> -->
@endsection

@section('javascript')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQIzatEo0kn2BooFwYFusR7xfkmW0x760&libraries=places&callback=initMap"
    async defer></script>
<script type="text/javascript">

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 24,
    center: {lat: -6.871178437437862, lng: 107.5484973311093}
  });

  // NOTE: This uses cross-domain XHR, and may not work on older browsers.
  var url = window.location.href;
  var arr = url.split("/");
  var result = arr[0] + "//" + arr[2];
  console.log(result);
  map.data.loadGeoJson( result+'/api/satu_tanah/1');

  map.data.setStyle(function(feature) {
    color = feature.getProperty('color');
    return({
      fillColor: color,
      strokeColor: color,
      strokeWeight: 0
    });
  });

}
</script>
@endsection

@section('css')
<style>
  /* Always set the map height explicitly to define the size of the div
   * element that contains the map. */
  #map {
    height: 500px;
  }
  /* Optional: Makes the sample page fill the window. */
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }
  .form-group{
    position: absolute;
    bottom: 52px;
    left: 60px;
  }
  .controls {
    background-color: #fff;
    border-radius: 2px;
    border: 1px solid transparent;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    box-sizing: border-box;
    font-family: Roboto;
    font-size: 15px;
    font-weight: 100;
    height: 29px;
    margin-left: 17px;
    margin-top: 10px;
    outline: none;
    padding: 0 11px 0 13px;
    text-overflow: ellipsis;
    width: 400px;
  }

  .controls:focus {
    border-color: #4d90fe;
  }

</style>
@endsection
