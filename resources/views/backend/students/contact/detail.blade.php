@extends('backend.backend')
@section('content')
	<!-- content content student contact detail -->
    <section id="page">
      <div class="container">
        <div class="row content content--list">
          <h3><a style="text-decoration:none;" href="{{route('backend.students.contact.index', $stu_id)}}">お問い合わせ管理</a>　＞　登録済みお問い合わせ情報の詳細</h3>
          <table class="table table-bordered">
            <tr>
              <td class="col-title">日付</td>
              <td>西暦 2016 年 4 月 15 日</td>
              <td class="col-title">応対者</td>
              <td>山田花子</td>
            </tr>
            <tr>
              <td class="col-title">タイトル</td>
              <td colspan="3">資料請求番号の変更について</td>
            </tr>
            <tr>
              <td class="col-title">内容</td>
              <td colspan="3">番号を間違えたので修正したい。<br />12345→11111<br />資料請求情報管理から修正済みです</td>
            </tr>
          </table>
        </div>
        <div class="row mar-bottom30">
          <div class="col-md-12 text-center">
            <input onclick="location.href='{{route('backend.students.contact.edit',['stu_id'=>$stu_id, 'contact_id'=>$contact_id])}}'" value="編集する" type="button" class="btn btn-sm btn-primary btn-mar-right">
            <input onclick="location.href='{{route('backend.students.contact.delete_cnf', ['stu_id'=>$stu_id, 'contact_id'=>$contact_id])}}'" value="削除する" type="button" class="btn btn-sm btn-primary">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <input onclick="location.href='{{route('backend.students.contact.index', $stu_id)}}'" value="お問い合わせ情報一覧に戻る" type="button" class="btn btn-sm btn-primary">
          </div>
        </div>
      </div>
    </section>
    <!-- End content student contact detail -->
@endsection