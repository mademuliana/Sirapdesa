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
      <h2 class="mdl-card__title-text">Keterangan</h2>
    </div>
    <div class="mdl-card__supporting-text">
      <form action="{{url(action('RiwayatController@store',['id'=>$id]))}}" method="post">
            <div class="mdl-textfield mdl-js-textfield mdl-cell--12-col">
              <textarea class="mdl-textfield__input" type="text" rows= "5" name="isiKeterangan"></textarea>
              <label class="mdl-textfield__label">Masukkan Keterangan</label>
            </div>
        <div class="mdl-dialog__actions">
          <input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" name="submit" type="submit" value="Selesai">
        </div>
        {{ csrf_field() }}
      </form>
    </div>
  </div>
@endsection

@section('javascript')

@endsection
