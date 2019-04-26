@extends('layouts.app')
@section('css')
  <style media="screen">
    .mdl-card__title{
      margin: 0;
      padding: 50px 50px 0px 50px;
    }
    .mdl-card__supporting-text{
      margin: 0;
      padding: 0;
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
    <form class="" action="" method="post">
      <div class="mdl-card__title">
        <h6>Pertanyaan</h6>
      </div>
      <div class="mdl-card__supporting-text">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-cell--12-col">
          <textarea class="mdl-textfield__input" type="text" rows= "10" id="sample5" ></textarea>
          <label class="mdl-textfield__label" for="sample5">Jawaban</label>
        </div>
      </div>
      <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
        Submit
      </button>
    </form>
  </div>
@endsection

@section('javascript')

@endsection
