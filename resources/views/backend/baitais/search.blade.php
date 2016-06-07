@extends('backend.backend')

@section('content')
{!! Form::open(array('route' => 'backend.baitais.index', 'method' => 'get')) !!}
<div class="container">
  <div class="row content">
    <div class="row fl-right mar-bottom">
      <div class="col-md-12">
        <input onclick="location.href='{{ route('backend.baitais.regist') }}'" value="媒体の新規登録" type="button" class="btn btn-sm btn-primary">
      </div>
    </div>
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td class="col-title"><label for="baitai_code">媒体コード</label></td>
          <td>
            <input name="baitai_code" id="baitai_code" type="text" class="form-control form-control--default" value="<?php echo isset(Session::get('where')['baitai_code']) ? Session::get('where')['baitai_code'] : ''; ?>">
          </td>
          <td class="col-title"><label for="baitai_name">媒体名</label></td>
          <td><input name="baitai_name" id="baitai_name" type="text" class="form-control form-control--default" value="<?php echo isset(Session::get('where')['baitai_name']) ? Session::get('where')['baitai_name'] : ''; ?>"></td>
          <td class="col-title"><label for="baitai_kind">新旧</label></td>
          <td>
            <input name="baitai_kind_old" id="baitai_kind" class="baitai_kind" value="1" type="checkbox" @if(isset(Session::get('where')['baitai_kind_old'])) {{'checked'}} @endif> 旧　　　
            <input name="baitai_kind_new" class="baitai_kind" value="2" type="checkbox" @if(isset(Session::get('where')['baitai_kind_new'])) {{'checked'}} @endif> 新
          </td>
        </tr>
        <tr>
          <td class="col-title"><label for="baitai_year_begin">発行年</label></td>
          <td colspan="5">
              <?php
              $year_current = date('Y');
              $year_next = date('Y') + 1;
              $year_prev = date('Y') - 1;
              ?>
              <select name="baitai_year_begin" id="baitai_year_begin" class="form-control form-control--small">
                <option value="" @if(Session::get('where')['baitai_year_begin'] == '') {{'selected'}} @endif>指定なし</option>
                <option value="{{ $year_prev }}" @if(Session::get('where')['baitai_year_begin'] == $year_prev) {{'selected'}} @endif>{{ $year_prev }}</option>
                <option value="{{ $year_current }}" @if(Session::get('where')['baitai_year_begin'] == $year_current) {{'selected'}} @endif>{{ $year_current }}</option>
                <option value="{{ $year_next }}" @if(Session::get('where')['baitai_year_begin'] == $year_next) {{'selected'}} @endif>{{ $year_next }}</option>
              </select>
              ～
              <select name="baitai_year_end" id="baitai_year_end" class="form-control form-control--small">
                <option value="" @if(Session::get('where')['baitai_year_end'] == '') {{'selected'}} @endif>指定なし</option>
                <option value="{{ $year_prev }}" @if(Session::get('where')['baitai_year_end'] == $year_prev) {{'selected'}} @endif>{{ $year_prev }}</option>
                <option value="{{ $year_current }}" @if(Session::get('where')['baitai_year_end'] == $year_current) {{'selected'}} @endif>{{ $year_current }}</option>
                <option value="{{ $year_next }}" @if(Session::get('where')['baitai_year_end'] == $year_next) {{'selected'}} @endif>{{ $year_next }}</option>
              </select>
           </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="row mar-bottom30">
    <div class="col-md-12 text-center">
      <input type="hidden" name="where" value="1">
      <input value="検索開始（AND検索）" type="submit" class="btn btn-sm btn-primary form-control--mar-right">
      <input name="button5" id="reset" value="クリア（全消し）" type="reset" class="btn btn-sm btn-primary" onclick="location.href='{{ route('backend.baitais.search', array('where' => 'null')) }}'">
    </div>
  </div>
</div>
</form>

@endsection