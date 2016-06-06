@extends('backend.backend')

@section('content')
{!! Form::open(array('route' => 'backend.baitais.regist')) !!}
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
          <td class="col-title"><label for="textMediaCode">媒体コード</label></td>
          <td>
            <input name="txtMediaCode" id="textMediaCode" type="text" class="form-control form-control--default">
          </td>
          <td class="col-title"><label for="textMediaName">媒体名</label></td>
          <td><input name="txtMediaName" id="textMediaName" type="text" class="form-control form-control--default"></td>
          <td class="col-title"><label for="ckNewOld">性別</label></td>
          <td>
            <input name="ckNew" id="ckNewOld" value="checkbox" type="checkbox"> 旧　　　
            <input name="ckOld" value="checkbox" type="checkbox"> 新
          </td>
        </tr>
        <tr>
          <td class="col-title"><label for="textPubYear">発行年</label></td>
          <td colspan="5">
            <select name="select" id="select" class="form-control form-control--small">
              <option>指定なし</option>
              </select>
              ～
              <select name="select2" id="select2" class="form-control form-control--small">
                <option>指定なし</option>
              </select>
           </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="row mar-bottom30">
    <div class="col-md-12 text-center">
      <input onclick="location.href='{{ route('backend.baitais.index') }}'" value="検索開始（OR検索）" type="button" class="btn btn-sm btn-primary form-control--mar-right">
      <input name="button5" id="button5" value="クリア（全消し）" type="reset" class="btn btn-sm btn-primary">
    </div>
  </div>
</div>
</form>
@endsection