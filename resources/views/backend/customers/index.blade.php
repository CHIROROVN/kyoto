@extends('backend.backend')

@section('content')
<!-- content customer list -->
    <section id="page">
      <div class="container">
        <div class="row content content--list">
 
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
  

          <p>全123件中、99件が該当しました。うち、1～20件を表示しています。</p>
          <div class="row fl-right mar-bottom">
            <div class="col-md-12">
              <input onclick="location.href='{{route('backend.customers.regist')}}'" value="顧客の新規登録" type="button" class="btn btn-sm btn-primary"/>
            </div>
          </div>
          <table class="table table-bordered table-striped clearfix">
            <tr>
              <td class="col-title" align="center">学校コード</td>
              <td class="col-title" align="center">学校名</td>
              <td class="col-title" align="center">旧学校名</td>
              <td class="col-title" align="center">詳細</td>
              <td class="col-title" align="center">編集</td>
              <td class="col-title" align="center">削除</td>
            </tr>

            @if(count($customers) > 0)
            @foreach($customers as $customer)
              <tr>
                <td align="right">{{$customer->cus_code}}</td>
                <td>{{$customer->cus_name}}</td>
                <td>{{$customer->cus_old_name}}</td>
                <td align="center"><input onclick="location.href='{{route('backend.customers.detail', $customer->cus_id)}}'" value="詳細" type="button" class="btn btn-xs btn-primary"></td>
                <td align="center"><input onclick="location.href='{{route('backend.customers.edit', $customer->cus_id)}}'" value="編集" type="button" class="btn btn-xs btn-primary"></td>
                <td align="center"><input onclick="location.href='{{route('backend.customers.delete', $customer->cus_id)}}'" value="削除" type="button" class="btn btn-xs btn-primary"></td>
              </tr>
            @endforeach

            @else
              <tr><td colspan="6" style="text-align: center;">該当データなし。</td></tr>
            @endif
           <!--  <tr>
              <td align="right">12345</td>
              <td>岡山理科大学</td>
              <td></td>
              <td align="center"><input onclick="location.href='customer_detail.html'" value="詳細" type="button" class="btn btn-xs btn-primary"></td>
              <td align="center"><input onclick="location.href='customer_edit.html'" value="編集" type="button" class="btn btn-xs btn-primary"></td>
              <td align="center"><input onclick="location.href='customer_delete_cnf.html'" value="削除" type="button" class="btn btn-xs btn-primary"></td>
            </tr>
            <tr>
              <td align="right">12346</td>
              <td>東京大学</td>
              <td></td>
              <td align="center"><input onclick="location.href='customer_detail.html'" value="詳細" type="button" class="btn btn-xs btn-primary"></td>
              <td align="center"><input onclick="location.href='customer_edit.html'" value="編集" type="button" class="btn btn-xs btn-primary"></td>
              <td align="center"><input onclick="location.href='customer_delete_cnf.html'" value="削除" type="button" class="btn btn-xs btn-primary"></td>
            </tr>
            <tr>
              <td align="right">13456</td>
              <td>京都大学</td>
              <td></td>
              <td align="center"><input onclick="location.href='customer_detail.html'" value="詳細" type="button" class="btn btn-xs btn-primary"></td>
              <td align="center"><input onclick="location.href='customer_edit.html'" value="編集" type="button" class="btn btn-xs btn-primary"></td>
              <td align="center"><input onclick="location.href='customer_delete_cnf.html'" value="削除" type="button" class="btn btn-xs btn-primary"></td>
            </tr>
            <tr>
              <td align="right">15678</td>
              <td>専門学校スギモトスクール</td>
              <td></td>
              <td align="center"><input onclick="location.href='customer_detail.html'" value="詳細" type="button" class="btn btn-xs btn-primary"></td>
              <td align="center"><input onclick="location.href='customer_edit.html'" value="編集" type="button" class="btn btn-xs btn-primary"></td>
              <td align="center"><input onclick="location.href='customer_delete_cnf.html'" value="削除" type="button" class="btn btn-xs btn-primary"></td>
            </tr> -->
          </table>
        </div>
        <div class="row mar-bottom30">
          <div class="col-md-12 text-center">
            <input name="button3" value="前の20件を表示" disabled="disabled" type="submit" class="btn btn-sm btn-primary form-control--mar-right">
            <input name="button4" value="次の20件を表示" type="submit" class="btn btn-sm btn-primary">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <input name="button7" id="button7" value="再検索（条件を引き継ぐ）" type="submit" class="btn btn-sm btn-primary form-control--mar-right">
            <input name="button5" id="button5" value="再検索（条件をクリアする）" type="reset" class="btn btn-sm btn-primary">
          </div>
        </div>
      </div>
    </section>
    <!-- End content customer list -->
@endsection