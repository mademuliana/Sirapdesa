@extends('layouts.app')
@section('css')
  <style media="screen">

    #imgparent{
      position: relative;
      top: 0;
      left: 0;
    }
    #gambar{
      -webkit-filter: blur(5px);
      -moz-filter: blur(5px);
      -o-filter: blur(5px);
      -ms-filter: blur(5px);
      filter: blur(5px);
      margin: 10px auto;
      width: 100%;
      height: 250px;
      z-index: 1;
      position: relative;
      top: 0;
      left: 0;
    }
    p{
      text-align: justify;
    }
    #imgparent #gambar1{
      position: absolute;
      margin: 0;
      height: 250px;
      z-index: 2;
      top: 50%;
      left: 50%;
      margin-right: -50%;
      transform: translate(-50%, -50%);
    }
    #files{
      float: right;
    }

    input[type="file"] {
      font-size: 1em;
      cursor: pointer !Important;
      padding: 10px;
      background: #FF4081;
      color: white;
    }
    input[type="file"]::-webkit-file-upload-button {
      background: #E91E63;
      border: 0;
      padding: 0.5em 1em;
      cursor: pointer;
      color: #fff;
    }
    input[type="file"]::-ms-browse {
      background: #E91E63;
      border: 0;
      padding: 0.5em 1em;
      cursor: pointer;
      color: #fff;
    }
    .mdl-button{
      float: right;
      margin: 10px;
      right: 10px;
    }
  </style>
@endsection

@section('content')
  <div class="mdl-cell mdl-cell--11-col mdl-cell--11-col-tablet mdl-cell--11-col-phone mdl-cell--11-col mdl-card mdl-shadow--3dp">
    <form action="/post" method="post" enctype="multipart/form-data">
      <div class="mdl-card__title">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input class="mdl-textfield__input" type="text" name="title">
          <label class="mdl-textfield__label" for="sample3">Title</label>
        </div>
      </div>
      <div id="imgparent">
        <img id="gambar" src="https://thumbs.dreamstime.com/z/surabaya-city-scape-vector-flat-style-depicting-statue-suramadu-bridge-east-java-indonesia-65095186.jpg">
        <img id="gambar1" src="https://thumbs.dreamstime.com/z/surabaya-city-scape-vector-flat-style-depicting-statue-suramadu-bridge-east-java-indonesia-65095186.jpg">
      </div>
      <div>
        <input type="file" id="files" name="image" class="inputfile" />
      </div>
      <div class="mdl-card__supporting-text">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-cell--12-col">
          <input class="mdl-textfield__input" type="text" name="resume">
          <label class="mdl-textfield__label">Resume</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-cell--12-col">
          <textarea class="mdl-textfield__input" type="text" rows= "20" name="post"></textarea>
          <label class="mdl-textfield__label">Content</label>
        </div>
      </div>
      <input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" name="submit" type="submit" value="Submit">
      {{ csrf_field() }}
    </form>
  </div>
@endsection

@section('javascript')
<script type="text/javascript">
  document.getElementById("files").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        document.getElementById("gambar").src = e.target.result;
        document.getElementById("gambar1").src = e.target.result;
    };
    reader.readAsDataURL(this.files[0]);
  };
</script>
@endsection
