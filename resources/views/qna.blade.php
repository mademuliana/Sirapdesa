@extends('layouts.app1')
@section('css')
  <style media="screen">
    .mdl-card__title h4{
      margin-left: 5%;
    }
    .mdl-card__title {
      padding: 0;
    }
    .mdl-card__supporting-text{
      padding: 0;
    }
    .mdl-card__supporting-text h6{
      text-align: justify;
      margin: 0;
    }
    .pengajuan{
      position: fixed;
      bottom: 20px;
      right: 30px;
      z-index: 1;
    }
  </style>
  <link rel="stylesheet" href="/css/dialog.css">
@endsection

@section('content')
  @foreach ($qnas as $qna)
    <div class="mdl-cell mdl-cell--11-col mdl-cell--11-col-tablet mdl-cell--11-col-phone mdl-cell--11-col mdl-card mdl-shadow--3dp">
      <div class="mdl-card__title">
        <h4>{{$qna->question}}</h4>
      </div>
      <div class="mdl-card__supporting-text">
        <h6>{{$qna->answer}}</h6>
      </div>
    </div>
  @endforeach;

    <div class="pengajuan">
      <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored dialog-button">
        <i class="material-icons">add</i>
      </button>
    </div>

  <dialog id="dialog" class="mdl-dialog">
  <h5 class="mdl-dialog__title">Silahkan masukkan pertanyaan anda</h5>
  <form action="/qna" method="post">
    <div class="mdl-dialog__content">
        <div class="mdl-textfield mdl-js-textfield mdl-cell--12-col">
          <textarea class="mdl-textfield__input" type="text" rows= "5" name="question"></textarea>
          <label class="mdl-textfield__label">Tuliskan di sini pertenyaan anda</label>
        </div>
    </div>
    <div class="mdl-dialog__actions">
      <button type="button" class="mdl-button">Tutup</button>
      <input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" name="submit" type="submit" value="Ajukan">
    </div>
    {{ csrf_field() }}
  </form>
</dialog>

@endsection

@section('javascript')
<script type="text/javascript">
(function() {
    'use strict';
    var dialogButton = document.querySelector('.dialog-button');
    var dialog = document.querySelector('#dialog');
    if (! dialog.showModal) {
      dialogPolyfill.registerDialog(dialog);
    }
    dialogButton.addEventListener('click', function() {
       dialog.showModal();
    });
    dialog.querySelector('button:not([disabled])')
    .addEventListener('click', function() {
      dialog.close();
    });
  }());
</script>
@endsection
