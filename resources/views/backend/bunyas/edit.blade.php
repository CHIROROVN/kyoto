@extends('backend.backend')

@section('content')
{!! Form::open(array('route' => array('backend.bunyas.edit', $bunya->bunya_id))) !!}
<div class="container">
  <div class="row content">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td class="col-title"><label for="bunya_code">分野コード</label></td>
          <td>
            <input name="bunya_code" id="bunya_code" type="text" class="form-control form-control--small" value="{{ $bunya->bunya_code }}">
            @if ($errors->first('bunya_code'))<span class="error-input">{!! $errors->first('bunya_code') !!}</span>@endif
          </td>
          <td class="col-title"><label for="bunya_name">分野名</label></td>
          <td>
            <input name="bunya_name" id="bunya_name" type="text" class="form-control form-control--default" value="{{ $bunya->bunya_name }}">
            @if ($errors->first('bunya_name'))<span class="error-input">{!! $errors->first('bunya_name') !!}</span>@endif
          </td>
          <td class="col-title"><label for="rdType">種類</label></td>
          <td>
            <input name="bunya_kind" id="rdType" value="1" type="radio" @if($bunya->bunya_kind == 1) {{'checked'}} @endif> 職業　　　
            <input name="bunya_kind" value="2" type="radio" @if($bunya->bunya_kind) == 2) {{'checked'}} @endif> 学問
            @if ($errors->first('bunya_kind'))<span class="error-input">{!! $errors->first('bunya_kind') !!}</span>@endif
          </td>
        </tr>
        <tr>
          <td class="col-title"><label for="rdClassification">区分</label></td>
          <td colspan="5">
            <input name="bunya_class" id="rdClassification" value="1" type="radio" @if($bunya->bunya_class == 1) {{'checked'}} @endif> メイン　　　
            <input name="bunya_class" value="2" type="radio" @if($bunya->bunya_class == 2) {{'checked'}} @endif> サブ
            @if ($errors->first('bunya_class'))<span class="error-input">{!! $errors->first('bunya_class') !!}</span>@endif
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="row mar-bottom30">
    <div class="col-md-12 text-center">
      <input name="button4" id="button4" value="登録する" type="submit" class="btn btn-sm btn-primary">
      <!-- delete -->
      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal-{{ $bunya->bunya_id }}">削除</button>
      <!-- popup -->
      <div class="modal fade bs-example-modal-sm" id="myModal-{{ $bunya->bunya_id }}" role="dialog">
        <div class="modal-dialog modal-sm">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Delete</h4>
            </div>
            <div class="modal-body">
              <p>Are you want to delete?</p>
            </div>
            <div class="modal-footer">
              <a href="{{ route('backend.bunyas.delete', $bunya->bunya_id) }}" class="btn btn-xs btn-primary">削除</a>
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
      <input onclick="location.href='{{ route('backend.bunyas.index') }}'" value="前の画面に戻る" type="button" class="btn btn-sm btn-primary">
    </div>
  </div>
</div>
</form>
@endsection