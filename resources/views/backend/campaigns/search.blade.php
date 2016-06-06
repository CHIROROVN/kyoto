@extends('backend.backend')

@section('content')
{!! Form::open(array('route' => 'backend.bunyas.regist')) !!}
<div class="container">
        <div class="row content">
          <div class="row fl-right mar-bottom">
            <div class="col-md-12">
              <input onclick="location.href='{{ route('backend.bunyas.regist') }}'" value="分野の新規登録" type="button" class="btn btn-sm btn-primary">
            </div>
          </div>
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td class="col-title"><label for="textFieldCode">分野コード</label></td>
                <td>
                  <input name="txtFieldCode" id="textFieldCode" type="text" class="form-control form-control--small">
                </td>
                <td class="col-title"><label for="textFieldName">分野名</label></td>
                <td><input name="txtFieldName" id="textFieldName" type="text" class="form-control form-control--small"></td>
                <td class="col-title"><label for="ckType">分野種別</label></td>
                <td>
                  <input name="ckType" id="ckType" value="" type="checkbox"> 職業　　　
                  <input name="ckType" value="" type="checkbox"> 学問
                </td>
              </tr>
              <tr>
                <td class="col-title"><label for="ckClassification">分野区分</label></td>
                <td colspan="5">
                  <input name="ckClassification" id="ckClassification" value="" type="checkbox"> メイン　　　
                  <input name="ckClassification" value="" type="checkbox"> サブ
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="row mar-bottom30">
          <div class="col-md-12 text-center">
            <input onclick="location.href='{{ route('backend.bunyas.index') }}'" value="検索開始（OR検索）" type="button" class="btn btn-sm btn-primary form-control--mar-right">
            <input name="button5" value="クリア（全消し）" type="reset" class="btn btn-sm btn-primary">
          </div>
        </div>
      </div>
</form>
@endsection