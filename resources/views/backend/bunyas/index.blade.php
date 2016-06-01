@extends('backend.backend')

@section('content')
<div class="container">
  <div class="row content content--list">
    <div class="row fl-right mar-bottom">
      <div class="col-md-12">
        <input onclick="location.href='{{ route('backend.bunyas.regist') }}'" value="分野の新規登録" type="button" class="btn btn-sm btn-primary"/>
      </div>
    </div>
    <table class="table table-bordered table-striped clearfix">
      <tr>
        <td class="col-title" align="center">媒体コード</td>
        <td class="col-title" align="center">分野名</td>
        <td class="col-title" align="center">種類</td>
        <td class="col-title" align="center">区分</td>
        <td class="col-title" align="center">編集</td>
        <td class="col-title" align="center">削除</td>
      </tr>
      @if (empty($bunyas) || count($bunyas) == 0)
      <tr>
        <td colspan="6"><h1 class="data-empty">Data empty...</h1></td>
      </tr>
      @else
        @foreach ($bunyas as $bunya)
        <tr>
          <td>{{ $bunya->bunya_code }}</td>
          <td>{{ $bunya->bunya_name }}</td>
          <td>{{ $bunya->bunya_kind }}</td>
          <td>{{ $bunya-> bunya_class }}</td>
          <td align="center"><input onclick="location.href='{{ route('backend.bunyas.edit', $bunya->bunya_id) }}'" value="編集" type="button" class="btn btn-xs btn-primary"></td>
          <td align="center">
            <!-- <input onclick="location.href='{{ route('backend.bunyas.delete', $bunya->bunya_id) }}'" value="削除" type="button" class="btn btn-xs btn-primary"> -->
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal-{{ $bunya->bunya_id }}">削除</button>
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
      @include('backend.pagination.custom', ['paginator' => $bunyas])
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <input name="button7" value="再検索（条件を引き継ぐ）" type="submit" class="btn btn-sm btn-primary form-control--mar-right" onclick="location.href='{{ route('backend.bunyas.search') }}'">
      <input name="button5" value="再検索（条件をクリアする）" type="reset" class="btn btn-sm btn-primary">
    </div>
  </div>
</div>
@endsection