@extends('backend.backend')

@section('content')
	<!-- content customer detail -->
    <section id="page">
      <div class="container">
        <div class="row content content--regist">
          <table class="table table-bordered">
            <tr>
              <td class="col-title">学校コード</td>
              <td>12345</td>
              <td class="col-title">学校名</td>
              <td>岡山理科大学</td>
              <td class="col-title">見出し</td>
              <td>岡山理科大学</td>
            </tr>
            <tr>
              <td class="col-title">旧学校名</td>
              <td></td>
              <td class="col-title">親法人</td>
              <td>学校法人加計学園</td>
              <td rowspan="3" class="col-title">注意文言</td>
              <td rowspan="3"></td>
            </tr>
            <tr>
              <td class="col-title">有料・無料</td>
              <td>有料</td>
              <td class="col-title">女子専用</td>
              <td>いいえ</td>
            </tr>
            <tr>
              <td class="col-title">学校区分</td>
              <td>大学</td>
              <td class="col-title">運営区分</td>
              <td>私立</td>
            </tr>
          </table>
          <table class="table table-bordered">
            <tr>
              <td rowspan="2" class="col-title">担当者①</td>
              <td class="col-title">所属</td>
              <td>入試広報部</td>
              <td class="col-title">名前</td>
              <td>山田　花子</td>
              <td class="col-title">名前かな</td>
              <td></td>
            </tr>
           <tr>
              <td class="col-title">TEL</td>
              <td>086-256-9999</td>
              <td class="col-title">FAX</td>
              <td>086-256-9999</td>
              <td class="col-title">メール</td>
              <td>hoge@hoge.com</td>
            </tr>
            <tr>
              <td rowspan="2" class="col-title">担当者②</td>
              <td class="col-title">所属</td>
              <td></td>
              <td class="col-title">名前</td>
              <td></td>
              <td class="col-title">名前かな</td>
              <td>やまだ　はなこ</td>
            </tr>
           <tr>
              <td class="col-title">TEL</td>
              <td></td>
              <td class="col-title">FAX</td>
              <td></td>
              <td class="col-title">メール</td>
              <td></td>
            </tr>
            <tr>
              <td rowspan="2" class="col-title">担当者③</td>
              <td class="col-title">所属</td>
              <td></td>
              <td class="col-title">名前</td>
              <td></td>
              <td class="col-title">名前かな</td>
              <td></td>
            </tr>
           <tr>
              <td class="col-title">TEL</td>
              <td></td>
              <td class="col-title">FAX</td>
              <td></td>
              <td class="col-title">メール</td>
              <td></td>
            </tr>
          </table>
          <table class="table table-bordered">
            <tr>
              <td class="col-title">ログインID</td>
              <td>ous</td>
              <td class="col-title">パスワード</td>
              <td>12345678</td>
              <td class="col-title">メール送信</td>
              <td>しない</td>
            </tr>
           <tr>
              <td class="col-title">メール送信間隔</td>
              <td></td>
              <td class="col-title">ZIPパスワード</td>
              <td></td>
              <td class="col-title">ファイル形式</td>
              <td></td>
            </tr>
          </table>
        </div>
        <div class="row mar-bottom30">
          <div class="col-md-12 text-center">
            <input onclick="location.href='customer_edit.html'" value="編集する" type="button" class="btn btn-sm btn-primary btn-mar-right">
            <input onclick="location.href='customer_delete_cnf.html'" value="削除する" type="button" class="btn btn-sm btn-primary">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <input onclick="location.href='{{route('backend.customers.index')}}'" value="一覧に戻る" type="button" class="btn btn-sm btn-primary">
          </div>
        </div>
      </div>
    </section>
    <!-- End content customer detail -->
@endsection