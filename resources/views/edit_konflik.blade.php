@extends('layouts.app')
@section('css')
<style media="screen">
  .mdl-card__title{
    color: #fff;
    background-color: #2196F3;
  }
</style>
@endsection

@section('content')
  <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
    <div class="mdl-card__title">
      <h2 class="mdl-card__title-text">Konflik</h2>
    </div>
    <div class="mdl-card__supporting-text">
      <form action="/konflik/{{$konflik->id}}/edit" method="post">
        <div class="">
          <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect mdl-cell--2-col mdl-cell--3-col-phone" for="switch-1">
              <span class="mdl-switch__label">Masih Dalam Konflik</span>
              <input type="checkbox" id="switch-1" class="mdl-switch__input" name="status_konflik" checked>
          </label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-cell--12-col">
          <textarea class="mdl-textfield__input" type="text" rows= "5" name="isikonflik">{{$konflik->keterangan}}</textarea>
          <label class="mdl-textfield__label">Masukkan Deskripsi Konflik</label>
        </div>
        <div class="mdl-dialog__actions">
          <input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" name="submit" type="submit" value="Selesai" id="btn-submit">
        </div>
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
      </form>
    </div>
  </div>
@endsection

@section('javascript')

@endsection
