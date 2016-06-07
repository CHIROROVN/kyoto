@extends('backend.backend')

@section('content')
<div class="container">
  <div class="row content content--list">
    <div class="row fl-right mar-bottom">
      <div class="col-md-12">
        <input onclick="location.href='{{ route('backend.baitais.regist') }}'" value="媒体の新規登録" type="button" class="btn btn-sm btn-primary"/>
      </div>
    </div>
    <table class="table table-bordered table-striped clearfix">
      <tr>
        <td class="col-title" align="center">媒体コード</td>
        <td class="col-title" align="center">媒体名</td>
        <td class="col-title" align="center">新旧</td>
        <td class="col-title" align="center">発行年</td>
        <td class="col-title" align="center">編集</td>
        <td class="col-title" align="center">削除</td>
      </tr>
      @if (empty($baitais) || count($baitais) == 0)
      <tr>
        <td colspan="6"><h1 class="data-empty">Data empty...</h1></td>
      </tr>
      @else
        @foreach ($baitais as $baitai)
        <tr>
          <td>{{ $baitai->baitai_code }}</td>
          <td>{{ $baitai->baitai_name }}</td>
          <td><?php echo ($baitai->baitai_kind == 2) ? '新' : '旧'; ?></td>
          <td>{{ $baitai-> baitai_year }}</td>
          <td align="center"><input onclick="location.href='{{ route('backend.baitais.edit', $baitai->baitai_id) }}'" value="編集" type="button" class="btn btn-xs btn-primary"></td>
          <td align="center">
            <!-- <input onclick="location.href='{{ route('backend.baitais.delete', $baitai->baitai_id) }}'" value="削除" type="button" class="btn btn-xs btn-primary"> -->
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal-{{ $baitai->baitai_id }}">削除</button>
            <!-- popup -->
            <div class="modal fade bs-example-modal-sm" id="myModal-{{ $baitai->baitai_id }}" role="dialog">
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
                    <a href="{{ route('backend.baitais.delete', $baitai->baitai_id) }}" class="btn btn-xs btn-primary">削除</a>
                    <button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
                <!-- End Modal content-->
              </div>
            </div>
            <!-- end popup -->
          </td>
        </tr>
        @endforeach
      @endif
    </table>
  </div>
  <div class="row mar-bottom30">
    <div class="col-md-12 text-center">
      <!-- <input name="button3" value="前の20件を表示" disabled="disabled" type="submit" class="btn btn-sm btn-primary form-control--mar-right">
      <input name="button4" value="次の20件を表示" type="submit" class="btn btn-sm btn-primary"> -->
      @include('backend.pagination.custom', ['paginator' => $baitais])
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <input name="button7" value="再検索（条件を引き継ぐ）" type="submit" class="btn btn-sm btn-primary form-control--mar-right" onclick="location.href='{{ route('backend.baitais.search') }}'">
      <input name="button5" value="再検索（条件をクリアする）" type="reset" class="btn btn-sm btn-primary" onclick="location.href='{{ route('backend.baitais.search', array('where' => 'null')) }}'">
    </div>
  </div>
</div>
@endsection