@extends('layouts.app')

@section('title', 'Upload File')

@section('content')
  <!-- <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <div class="file-upload">
    <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add File</button>

    <div class="excel-upload-wrap">
      <input class="file-upload-input" type='file' name="import_file" onchange="readURL(this);" accept="excel/*" />
      <div class="drag-text">
        <h3>Drag and drop a file</h3>
      </div>
    </div>
    <div class="file-upload-content">
      <img class="file-upload-excel" src="#" alt="your excel" />
      <div class="excel-title-wrap">
        <button type="button" onclick="removeUpload()" class="remove-excel">Remove <span class="excel-title">Uploaded excel</span></button>
        <button type="button" onclick="upload()" class="upload-excel">Upload <span class="excel-title">Uploaded excel</span></button>
      </div>
    </div>
  </div> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Import - Export in Excel and CSV Laravel 5</a>
      </div>
    </div>
  </nav>
  <div class="container">
    <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <input type="file" name="import_file" />
      <button class="btn btn-primary">Import File</button>
    </form>
  </div>
@endsection

@section('css')
  <style media="screen">
    body {
      font-family: sans-serif;
      background-color: #eeeeee;
      }

      .file-upload {
      background-color: #ffffff;
      width: 600px;
      margin: 0 auto;
      padding: 40px;
      margin-top: 50px;
      }

      .file-upload-btn {
      width: 100%;
      margin: 0;
      color: #fff;
      background: #1FB264;
      border: none;
      padding: 10px;
      border-radius: 4px;
      border-bottom: 4px solid #15824B;
      transition: all .2s ease;
      outline: none;
      text-transform: uppercase;
      font-weight: 700;
      }

      .file-upload-btn:hover {
      background: #1AA059;
      color: #ffffff;
      transition: all .2s ease;
      cursor: pointer;
      }

      .file-upload-btn:active {
      border: 0;
      transition: all .2s ease;
      }

      .file-upload-content {
      display: none;
      text-align: center;
      }

      .file-upload-input {
      position: absolute;
      margin: 0;
      padding: 0;
      width: 100%;
      height: 100%;
      outline: none;
      opacity: 0;
      cursor: pointer;
      }

      .excel-upload-wrap {
      margin-top: 20px;
      border: 4px dashed #1FB264;
      position: relative;
      }

      .excel-dropping,
      .excel-upload-wrap:hover {
      background-color: #1FB264;
      border: 4px dashed #ffffff;
      }

      .excel-title-wrap {
      padding: 0 15px 15px 15px;
      color: #222;
      }

      .drag-text {
      text-align: center;
      }

      .drag-text h3 {
      font-weight: 100;
      text-transform: uppercase;
      color: #15824B;
      padding: 60px 0;
      }

      .file-upload-excel {
      max-height: 200px;
      max-width: 200px;
      margin: auto;
      padding: 20px;
      }

      .remove-excel {
      width: 200px;
      margin: 0;
      color: #fff;
      background: #cd4535;
      border: none;
      padding: 10px;
      border-radius: 4px;
      border-bottom: 4px solid #b02818;
      transition: all .2s ease;
      outline: none;
      text-transform: uppercase;
      font-weight: 700;
      }

      .remove-excel:hover {
      background: #c13b2a;
      color: #ffffff;
      transition: all .2s ease;
      cursor: pointer;
      }

      .remove-excel:active {
      border: 0;
      transition: all .2s ease;
      }

      .upload-excel {
      width: 200px;
      margin: 0;
      color: #fff;
      background: #009688;
      border: none;
      padding: 10px;
      border-radius: 4px;
      border-bottom: 4px solid #004D40;
      transition: all .2s ease;
      outline: none;
      text-transform: uppercase;
      font-weight: 700;
      }

      .upload-excel:hover {
      background: #00796B;
      color: #ffffff;
      transition: all .2s ease;
      cursor: pointer;
      }

      .upload-excel:active {
      border: 0;
      transition: all .2s ease;
      }
  </style>
@endsection

@section('javascript')
  <script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function(e) {
          $('.excel-upload-wrap').hide();

          $('.file-upload-excel').attr('src', e.target.result);
          $('.file-upload-content').show();

          $('.excel-title').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);

      } else {
        removeUpload();
      }
      }

      function removeUpload() {
      $('.file-upload-input').replaceWith($('.file-upload-input').clone());
      $('.file-upload-content').hide();
      $('.excel-upload-wrap').show();
      }
      $('.excel-upload-wrap').bind('dragover', function () {
        $('.excel-upload-wrap').addClass('excel-dropping');
      });
      $('.excel-upload-wrap').bind('dragleave', function () {
        $('.excel-upload-wrap').removeClass('excel-dropping');
      });

      function upload() {

      }

  </script>
@endsection
