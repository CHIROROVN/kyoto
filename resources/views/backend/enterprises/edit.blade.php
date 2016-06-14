@extends('backend.backend')

@section('content')
{!! Form::open(array('route' => array('backend.baitais.edit', $baitai->baitai_id), 'enctype'=>'multipart/form-data')) !!}
<div class="container">
  <div class="row content">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td class="col-title"><label for="baitai_code">媒体コード</label></td>
          <td>
            <input name="baitai_code" id="baitai_code" type="text" class="form-control form-control--default" value="{{ $baitai->baitai_code }}">
            @if ($errors->first('baitai_code'))<span class="error-input">{!! $errors->first('baitai_code') !!}</span>@endif
          </td>
          <td class="col-title"><label for="baitai_name">媒体名</label></td>
          <td>
            <input name="baitai_name" id="baitai_name" type="text" class="form-control form-control--default" value="{{ $baitai->baitai_name }}">
            @if ($errors->first('baitai_name'))<span class="error-input">{!! $errors->first('baitai_name') !!}</span>@endif
          </td>
          <td class="col-title"><label for="rdNewOld">性別</label></td>
          <td>
            <input name="baitai_kind" id="rdNewOld" value="2" type="radio" @if($baitai->baitai_kind == 2) {{'checked'}} @endif> 新　　　
            <input name="baitai_kind" value="1" type="radio" @if($baitai->baitai_kind == 1) {{'checked'}} @endif> 旧
            @if ($errors->first('baitai_kind'))<span class="error-input">{!! $errors->first('baitai_kind') !!}</span>@endif
          </td>
        </tr>
        <tr>
          <td class="col-title"><label for="baitai_year">発行年</label></td>
          <td colspan="5">
            <input name="baitai_year" id="baitai_year" type="text" class="form-control form-control--small" value="{{ $baitai->baitai_year }}" maxlength="4">  年
            @if ($errors->first('baitai_year'))<span class="error-input">{!! $errors->first('baitai_year') !!}</span>@endif
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="row mar-bottom30">
    <div class="col-md-12 text-center">
      <input name="button4" id="button4" value="登録する" type="submit" class="btn btn-sm btn-primary">
      <!-- delete -->
      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal-{{ $baitai->baitai_id }}">削除</button>
      <!-- popup -->
      <div class="modal fade bs-example-modal-sm" id="myModal-{{ $baitai->baitai_id }}" role="dialog">
        <div class="modal-dialog modal-sm">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">{{ TITLE_DELETE }}</h4>
            </div>
            <div class="modal-body">
              <p>{{ CONTENT_DELETE }}</p>
            </div>
            <div class="modal-footer">
              <a href="{{ route('backend.baitais.delete', $baitai->baitai_id) }}" class="btn btn-xs btn-primary">削除</a>
              <button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- End Modal content-->
        </div>
      </div>
      <!-- end popup -->
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <input onclick="location.href='{{ route('backend.baitais.index') }}'" value="前の画面に戻る" type="button" class="btn btn-sm btn-primary">
    </div>
  </div>
</div>
</form>
@endsection