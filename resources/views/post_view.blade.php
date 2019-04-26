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
    .mdl-card__title h4{
      margin: 0;
    }
  </style>
@endsection

@section('content')
  <div class="mdl-cell mdl-cell--11-col mdl-cell--11-col-tablet mdl-cell--11-col-phone mdl-cell--11-col mdl-card mdl-shadow--3dp">
    <div class="mdl-card__title">
      <h4>{{$post->title}}</h4>
    </div>
    <div id="imgparent">
      <img id="gambar" src="/{{$post->img_url}}">
      <img id="gambar1" src="/{{$post->img_url}}">
    </div>
    <div class="mdl-card__supporting-text">
      <p>{{$post->post}}</p>
    </div>
  </div>
@endsection

@section('javascript')

@endsection
