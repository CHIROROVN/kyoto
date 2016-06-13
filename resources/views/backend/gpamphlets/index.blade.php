@extends('backend.backend')

@section('content')
<div class="container">

  <div class="row content content--list">
    <p>全{{ $count_all }}件中、{{ $total_count }}件が該当しました。うち、{{ $record_from }}～{{ $record_to + $gpamphlets->count() }}件を表示しています。</p>

    <div class="row fl-right mar-bottom">
      <div class="col-md-12">
        <input onclick="location.href='{{ route('backend.gpamphlets.regist') }}'" value="媒体の新規登録" type="button" class="btn btn-sm btn-primary"/>
      </div>
    </div>
    
    <table class="table table-bordered table-striped clearfix">
      <tr>
        <td class="col-title" align="center">一括資料請求番号</td>
        <td class="col-title" align="center">資料請求番号</td>
        <td class="col-title" align="center">編集</td>
        <td class="col-title" align="center">削除</td>
      </tr>
      @if (empty($gpamphlets) || count($gpamphlets) == 0)
      <tr>
        <td colspan="4"><h1 class="data-empty">Data empty...</h1></td>
      </tr>
      @else
        @foreach ($gpamphlets as $gpamphlet)
        <tr>
          <td>{{ $gpamphlet->gpamph_number }}</td>
          <td>
            @foreach ( $gpamphlets_distinct as $item )
              @if ( $item->gpamph_number == $gpamphlet->gpamph_number )
              {{ $item->pamph_number }} <br>
              @endif
            @endforeach
          </td>
          <td align="center">
            @foreach ( $gpamphlets_distinct as $item )
              @if ( $item->gpamph_number == $gpamphlet->gpamph_number )
              <input style="margin-top: 5px;" onclick="location.href='{{ route('backend.gpamphlets.edit', array($item->gpamph_id, 
                's_gpamph_number'         => $s_gpamph_number,
                's_pamph_name'            => $s_pamph_name,
                's_pamph_id'              => $s_pamph_id,
                'page'                    => $gpamphlets->currentPage()
              )) }}'" value="編集" type="button" class="btn btn-xs btn-primary"> <br>
              @endif
            @endforeach
          </td>
          <td align="center">
            @foreach ( $gpamphlets_distinct as $item )
              @if ( $item->gpamph_number == $gpamphlet->gpamph_number )
              <button style="margin-top: 5px;" type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal-{{ $item->gpamph_id }}">削除</button>
              <!-- popup -->
              <div class="modal fade bs-example-modal-sm" id="myModal-{{ $item->gpamph_id }}" role="dialog">
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
                      <a href="{{ route('backend.gpamphlets.delete', array($item->gpamph_id, 
                        's_gpamph_number'         => $s_gpamph_number,
                        's_pamph_name'            => $s_pamph_name,
                        's_pamph_id'              => $s_pamph_id,
                        'page'                    => $gpamphlets->currentPage()
                      )) }}" class="btn btn-xs btn-primary">削除</a>
                      <button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  <!-- End Modal content-->
                </div>
              </div>
              <!-- end popup --> <br>
              @endif
            @endforeach

            
          </td>
        </tr>
        @endforeach
      @endif
    </table>
  </div>
  <div class="row mar-bottom30">
    <div class="col-md-12 text-center">
      {!! $gpamphlets->appends(['s_gpamph_number'         => $s_gpamph_number,
                                's_pamph_name'            => $s_pamph_name,
                                's_pamph_id'              => $s_pamph_id,
                              ])->render(new App\Pagination\SimplePagination($gpamphlets))  !!}
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <input name="button7" value="再検索（条件を引き継ぐ）" type="submit" class="btn btn-sm btn-primary form-control--mar-right" onclick="location.href='{{ route('backend.gpamphlets.search', array(
        's_gpamph_number'         => $s_gpamph_number,
        's_pamph_name'            => $s_pamph_name,
        's_pamph_id'              => $s_pamph_id,
      )) }}'">
      <input name="button5" value="再検索（条件をクリアする）" type="reset" class="btn btn-sm btn-primary" onclick="location.href='{{ route('backend.gpamphlets.search') }}'">
    </div>
  </div>
</div>
@endsection