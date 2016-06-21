@extends('backend.backend')
@section('content')
	 <!-- content student contact list -->
    <section id="page">
      <div class="container">
        <div class="row content content--list">
          <table class="table table-bordered">
            <tr>
              <td class="col-title">氏名</td>
              <td>山田　太郎</td>
              <td class="col-title">ふりがな</td>
              <td>やまだ　たろう</td>
              <td class="col-title">誕生日</td>
              <td>西暦 1980 年 12 月 25 日</td>
            </tr>
            <tr>
              <td class="col-title">性別</td>
              <td>男</td>
              <td class="col-title">高校</td>
              <td>岡山高等学校</td>
              <td class="col-title">学年</td>
              <td>3 年生（4/1現在）</td>
            </tr>
            <tr>
              <td class="col-title">郵便番号</td>
              <td>700-0001</td>
              <td class="col-title">住所</td>
              <td colspan="3">岡山県　倉敷市　福井125-7　スギモトマンション1101</td>
            </tr>
            <tr>
              <td class="col-title">電話番号</td>
              <td>086-111-1111</td>
              <td class="col-title">メールアドレス</td>
              <td>sugimoto@chiroro.co.jp</td>
              <td class="col-title">ステータス</td>
              <td>本登録</td>
            </tr>
          </table>
          <div class="text-right">
            <input onclick="location.href='{{route('backend.students.contact.regist')}}'" value="お問い合わせ情報の新規登録" type="button" class="btn btn-sm btn-primary">
          </div>
          <table class="table table-bordered table-striped clearfix">
            <tr>
              <td class="col-title" align="center" style="width:150px;">日付</td>
              <td class="col-title" align="center">タイトル</td>
              <td class="col-title" align="center">応対者</td>
              <td class="col-title" align="center">詳細</td>
              <td class="col-title" align="center">編集</td>
              <td class="col-title" align="center">削除</td>
            </tr>
            @if(count($contacts) > 0)
              @foreach($contacts as $contact)
                <tr>
                  <td>{{@formatDate($contact->contact_date)}}</td>
                  <td>{{$contact->contact_title}}</td>
                  <td>{{@$users[$contact->contact_fst_user]}}</td>
                  <td align="center"><input onclick="location.href='{{route('backend.students.index').'/'}}{{$stu_id}}{{'/contacts/detail/'}}{{$contact->contact_id}}'"  value="詳細" type="button" class="btn btn-xs btn-primary"></td>
                  <td align="center"><input onclick="location.href='{{route('backend.students.contact.edit', ['stu_id'=>$stu_id, 'contact_id'=>$contact->contact_id])}}'" value="編集" type="button" class="btn btn-xs btn-primary"></td>
                  <td align="center"><input onclick="location.href='{{route('backend.students.contact.delete_cnf', ['stu_id'=>$stu_id, 'contact_id'=>$contact->contact_id])}}'" value="削除" type="button" class="btn btn-xs btn-primary"></td>
                </tr>
              @endforeach
            @else
              <tr><td colspan="6" style="text-align: center;">該当するデータがありません。</td></tr>
            @endif
          </table>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <input onclick="location.href='{{route('backend.students.detail',['stu_id'=>$stu_id])}}'" value="詳細に戻る" type="button" class="btn btn-sm btn-primary">
          </div>
        </div>
      </div>
    </section>
    <!-- End content student contact list -->
@endsection