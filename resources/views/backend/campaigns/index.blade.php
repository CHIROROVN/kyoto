@extends('backend.backend')

@section('content')
<div class="container">
  <div class="row content content--list">
    <div class="row fl-right mar-bottom">
      <div class="col-md-12">
        <input onclick="location.href='{{ route('backend.campaigns.regist') }}'" value="キャンペーンの新規登録" type="button" class="btn btn-sm btn-primary"/>
      </div>
    </div>
    <table class="table table-bordered table-striped clearfix">
      <tr>
        <td class="col-title" align="center">キャンペーン名</td>
        <td class="col-title" align="center">プレゼント名</td>
        <td class="col-title" align="center">媒体名</td>
        <td class="col-title" align="center">編集</td>
        <td class="col-title" align="center">削除</td>
      </tr>
      @if (empty($campaigns) || count($campaigns) == 0)
      <tr>
        <td colspan="5"><h1 class="data-empty">Data empty...</h1></td>
      </tr>
      @else
        @foreach ($campaigns as $campaign)
        <tr>
          <td>{{ $campaign->campaign_name }}</td>
          <td>{{ $campaign->present_name }}</td>
          <td>{{ $campaign->baitai_name }}</td>
          <td align="center"><input onclick="location.href='{{ route('backend.campaigns.edit', $campaign->campaign_id) }}'" value="編集" type="button" class="btn btn-xs btn-primary"></td>
          <td align="center">
            <!-- <input onclick="location.href='{{ route('backend.campaigns.delete', $campaign->campaign_id) }}'" value="削除" type="button" class="btn btn-xs btn-primary"> -->
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal-{{ $campaign->campaign_id }}">削除</button>
            <!-- popup -->
            <div class="modal fade bs-example-modal-sm" id="myModal-{{ $campaign->campaign_id }}" role="dialog">
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
                    <a href="{{ route('backend.campaigns.delete', $campaign->campaign_id) }}" class="btn btn-xs btn-primary">削除</a>
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
      @include('backend.pagination.custom', ['paginator' => $campaigns])
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <input name="button7" value="再検索（条件を引き継ぐ）" type="submit" class="btn btn-sm btn-primary form-control--mar-right" onclick="location.href='{{ route('backend.campaigns.search') }}'">
      <input name="button5" value="再検索（条件をクリアする）" type="reset" class="btn btn-sm btn-primary">
    </div>
  </div>
</div>
@endsection