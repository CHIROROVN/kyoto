@extends('backend.backend')

@section('content')
  <!-- content users list -->
    <section id="page">
      <div class="container">
        <div class="row content content--list">
          <div class="msg-alert-action">
              @if ($message = Session::get('success'))
              <div class="alert alert-success  alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <ul><strong><li> {{ $message }}</li></strong></ul>
              </div>
            @elseif($message = Session::get('danger'))
              <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <ul><strong><li> {{ $message }}</li></strong></ul>
              </div>
            @endif
          </div>

          <div class="row fl-right mar-bottom">
            <div class="col-md-12">
              <input onclick="location.href='{{URL::route('backend.users.regist')}}'" value="ユーザーの新規登録" type="button" class="btn btn-sm btn-primary"/>
            </div>
          </div>
          <table class="table table-bordered table-striped clearfix">
            <tr>
              <td class="col-title" align="center">名前</td>
              <td class="col-title" align="center">所属</td>
              <td class="col-title" align="center">ユーザーID</td>
              <td class="col-title" align="center">権限</td>
              <td class="col-title" align="center">編集</td>
              <td class="col-title" align="center">削除</td>
            </tr>
            <?php $powers = array('000' => 'Ｓ管理者', '010' => '管理', '020' => '営業', '030' => '印刷', '040' => '中国'); ?>
            @if(count($users) > 0)
              @foreach($users as $user)
                <tr>
                  <td>{{$user->u_name}}</td>
                  <td>キッズ</td>
                  <td>{{$user->u_login}}</td>
                  <td>{{@$powers[$user->u_power]}}</td>
                  <td align="center"><input onclick="location.href='{{URL::route('backend.users.update', $user->u_id)}}'" value="編集" type="button" class="btn btn-xs btn-primary"></td>
                  <td align="center"><input onclick="location.href='{{URL::route('backend.users.delete', $user->u_id)}}'" value="削除" type="button" class="btn btn-xs btn-primary"></td>
                </tr>
              @endforeach
            @else
              <tr><td colspan="6" style="text-align: center;">該当データなし。</td></tr>
            @endif
          </table>
        </div>
        <div class="row mar-bottom30">
          <div class="col-md-12 text-center">
            <!-- <input name="button3" value="前の20件を表示" disabled="disabled" type="submit" class="btn btn-sm btn-primary form-control--mar-right">
            <input name="button4" value="次の20件を表示" type="submit" class="btn btn-sm btn-primary"> -->
             @include('backend.pagination.custom', ['paginator' => $users])
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <input name="button7" value="再検索（条件を引き継ぐ）" type="submit" class="btn btn-sm btn-primary form-control--mar-right">
            <input name="button5" value="再検索（条件をクリアする）" type="reset" class="btn btn-sm btn-primary">
          </div>
        </div>
      </div>
    </section>
  <!-- End content users list -->
@endsection