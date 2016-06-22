@extends('backend.backend')
@section('content')
	<!-- content student detail -->
    <section id="page">
      <div class="container">
        <div class="row content content--list">
          <div class="text-right">
            <input type="button" onClick="location.href='student_edit.html'" value="編集する" class="btn btn-sm btn-primary btn-mar-right">
            <input type="button" onClick="location.href='student_delete_cnf.html'" value="削除する" class="btn btn-sm btn-primary">
          </div>
          <table class="table table-bordered">
            <tr>
              <td class="col-title">氏名</td>
              <td>{{ $personal->per_fname }}　{{ $personal->per_gname }}</td>
              <td class="col-title">ふりがな</td>
              <td>{{ $personal->per_fname_kana }}　{{ $personal->per_gname_kana }}</td>
              <td class="col-title">誕生日</td>
              <td>西暦 {{ date('Y', strtotime($personal->per_birthday)) }} 年 {{ date('m', strtotime($personal->per_birthday)) }} 月 {{ date('d', strtotime($personal->per_birthday)) }} 日</td>
            </tr>
            <tr>
              <td class="col-title">性別</td>
              <td><?php echo ($personal->per_sex == 1) ? '男' : '女'; ?></td>
              <td class="col-title">高校</td>
              <td>岡山高等学校</td>
              <td class="col-title">学年</td>
              <td>{{ $personal->per_grade }}</td>
            </tr>
            <tr>
              <td class="col-title">郵便番号</td>
              <td>700-0001</td>
              <td class="col-title">住所</td>
              <td colspan="3">{{ $personal->per_address1 }} {{ $personal->per_address2 }} {{ $personal->per_address3 }}</td>
            </tr>
            <tr>
              <td class="col-title">電話番号</td>
              <td>{{ $personal->per_phone }}</td>
              <td class="col-title">メールアドレス</td>
              <td>{{ $personal->per_email }}</td>
              <td class="col-title">ステータス</td>
              <td><?php echo ($personal->per_status == 0) ? '仮登録' : '本登録'; ?></td>
            </tr>
          </table>
        </div>
        <div class="row mar-bottom30">
          <div class="col-md-12 text-center">
            <input type="button" onclick="location.href='student_brochure_list.html'" value="資料請求情報管理" class="btn btn-sm btn-primary  btn-mar-right">
            <input type="button" onclick="location.href='{{route('backend.students.contact.index', 1)}}'" value="問い合わせ管理" class="btn btn-sm btn-primary btn-mar-right">
            <input type="button" onclick="location.href='student_present_list.html'" value="希望プレゼント管理" class="btn btn-sm btn-primary">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <input type="button" onClick="location.href='{{ route('backend.students.index') }}'" value="一覧に戻る" class="btn btn-sm btn-primary">
          </div>
        </div>
      </div>
    </section>
    <!-- End content student detail -->
@endsection