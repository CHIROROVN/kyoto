@extends('backend.backend')
@section('content')
	 <!-- content student contact list -->
    <section id="page">
      <div class="container">
        <div class="row content content--list">
        <div class="msg-alert-action">
          @if ($message = Session::get('success'))
            <div class="alert alert-success  alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <ul class="no-margin-bottom"><strong><li> {{ $message }}</li></strong></ul>
            </div>
          @elseif($message = Session::get('danger'))
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <ul class="no-margin-bottom"><strong><li> {{ $message }}</li></strong></ul>
            </div>
          @endif
        </div>
        
          <table class="table table-bordered">
            <tr>
              <td class="col-title">氏名</td>
              <td>{{$student->per_fname}}</td>
              <td class="col-title">ふりがな</td>
              <td>{{$student->per_fname_kana}}</td>
              <td class="col-title">誕生日</td>
              <td>西暦 {{date('Y', strtotime($student->per_birthday))}} 年 {{date('m', strtotime($student->per_birthday))}} 月 {{date('d', strtotime($student->per_birthday))}} 日</td>
            </tr>
            <tr>
              <td class="col-title">性別</td>
              <td>@if($student->per_sex == '1') 男 @elseif($student->per_sex == '2') 女 @endif</td>
              <td class="col-title">高校</td>
              <td>岡山高等学校</td>
              <td class="col-title">学年</td>
              <td>{{$student->per_grade}} 年生（4/1現在）</td>
            </tr>
            <tr>
              <td class="col-title">郵便番号</td>
              <td>{{$student->per_zipcode}}</td>
              <td class="col-title">住所</td>
              <td colspan="3">{{$student->per_address1}} {{$student->per_address2}} {{$student->per_address3}}</td>
            </tr>
            <tr>
              <td class="col-title">電話番号</td>
              <td>{{$student->per_phone}}</td>
              <td class="col-title">メールアドレス</td>
              <td>{{$student->per_email}}</td>
              <td class="col-title">ステータス</td>
              <td>@if($student->per_status == '0') 規定 @elseif($student->per_status == '1') 本登録 @endif</td>
            </tr>
          </table>
          <div class="text-right">
            <input onclick="location.href='{{route('backend.students.contact.regist', $stu_id)}}'" value="お問い合わせ情報の新規登録" type="button" class="btn btn-sm btn-primary">
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