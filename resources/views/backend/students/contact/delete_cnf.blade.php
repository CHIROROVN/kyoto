@extends('backend.backend')
@section('content')
	<!-- content student contact delete cnf -->
    <section id="page">
      <div class="container">
        <div class="row content content--list">
          <h3><a style="text-decoration:none;" href="{{route('backend.students.contact.index', $stu_id)}}">お問い合わせ管理</a>　＞　登録済みお問い合わせ情報の削除</h3>
          <p>この情報を削除しますか？</p>
          <table class="table table-bordered">
            <tr>
              <td class="col-title">日付</td>
              <td>西暦 {{date('Y', strtotime($contact->contact_date))}} 年 {{date('m', strtotime($contact->contact_date))}} 月 {{date('d', strtotime($contact->contact_date))}} 日</td>
              <td class="col-title">応対者</td>
              <td>{{$users[$contact->contact_fst_user]}}</td>
            </tr>
            <tr>
              <td class="col-title">タイトル</td>
              <td colspan="3">{{$contact->contact_title}}</td>
            </tr>
            <tr>
              <td class="col-title">内容</td>
              <td colspan="3"><?php echo nl2br($contact->contact_main) ?></td>
            </tr>
          </table>
        </div>
        <div class="row mar-bottom30">
          <div class="col-md-12 text-center">

            <input type="button" onClick="location.href='{{route('backend.students.contact.delete', ['stu_id'=>$stu_id, 'contact_id'=>$contact_id])}}'" name="delete" value="削除する" class="btn btn-sm btn-primary mar-right btn-mar-right">
            <input type="button" onClick="history.back()" value="やめる" class="btn btn-sm btn-primary">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <input type="button" onClick="location.href='{{route('backend.students.contact.index', $stu_id)}}'" value="お問い合わせ情報一覧に戻る" class="btn btn-sm btn-primary">
          </div>
        </div>
      </div>
    </section>
    <!-- End content student contact delete cnf -->
@endsection