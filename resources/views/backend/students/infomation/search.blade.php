@extends('backend.backend')
@section('content')
<!-- content student search -->
{!! Form::open(array('route' => 'backend.students.index', 'method' => 'get', 'enctype'=>'multipart/form-data')) !!}
<div class="container">
  <div class="row content">
    <table class="table table-bordered">
        <tbody>
          <tr>
            <td class="col-title"><label for="s_per_fname">氏名</label></td>
            <td>
              <!-- s_per_fname and s_per_gname -->
              <div class="mar-bottom">よみ：
                <input name="s_per_fname" id="s_per_fname" type="text" class="form-control form-control--small form-control--mar-right" value="{{ $s_per_fname }}">
                <input name="s_per_gname" type="text" class="form-control form-control--small" value="{{ $s_per_gname }}">
              </div>

              <!-- s_per_fname_kana and s_per_gname_kana -->
              <div>漢字：
                <input name="s_per_fname_kana" type="text" class="form-control form-control--small form-control--mar-right" value="{{ $s_per_fname_kana }}">
                <input name="s_per_gname_kana" id="" type="text" class="form-control form-control--small" value="{{ $s_per_gname_kana }}">
              </div>
            </td>

            <!-- per_id -->
            <td class="col-title"><label for="per_id">会員ID</label></td>
            <td>
              <input name="s_per_id_from" id="per_id" type="text" class="form-control form-control--small form-control--mar-right" value="{{ $s_per_id_from }}">～&nbsp;
              <input name="s_per_id_to" type="text" class="form-control form-control--small" value="{{ $s_per_id_to }}">
            </td>
            <td class="col-title"><label for="per_birthday">誕生日</label></td>

            <td>
              <!-- per_birthday -->
              <div class="mar-bottom">西暦
                <input name="s_per_birthday_year_from" id="per_birthday" type="text" class="form-control form-control--small-xs" value="{{ $s_per_birthday_year_from }}"> 年 
                <input name="s_per_birthday_month_from" type="text" class="form-control form-control--small-xs" value="{{ $s_per_birthday_month_from }}"> 月 
                <input name="s_per_birthday_day_from" type="text" class="form-control form-control--small-xs" value="{{ $s_per_birthday_day_from }}"> 日 
              </div>
              <div> ～&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="s_per_birthday_year_to" type="text" class="form-control form-control--small-xs" value="{{ $s_per_birthday_year_to }}"> 年 
                <input name="s_per_birthday_month_to" type="text" class="form-control form-control--small-xs" value="{{ $s_per_birthday_month_to }}"> 月 
                <input name="s_per_birthday_day_to" type="text" class="form-control form-control--small-xs" value="{{ $s_per_birthday_day_to }}"> 日
              </div>
            </td>
          </tr>

          <tr>
            <!-- per_sex -->
            <td class="col-title"><label for="per_sex">性別</label></td>
            <td>
              <input name="s_per_sex_men" id="per_sex" value="1" type="checkbox" @if($s_per_sex_men == 1) checked="" @endif> 男　　　
              <input name="s_per_sex_women" value="2" type="checkbox" @if($s_per_sex_women == 2) checked="" @endif> 女
            </td>

            <!-- hs_name or univ_name -->
            <td class="col-title"><label for="textschoolname">高校</label></td>
            <td><input name="txtschoolname" id="textschoolname" type="text" class="form-control form-control--default"></td>

            <!-- per_grade -->
            <td class="col-title"><label for="per_grade">学年</label></td>
            <td>
              <input name="s_per_grade_from" id="per_grade" type="text" class="form-control form-control--small-xs" value="{{ $s_per_grade_from }}"> 年生 ～ 
              <input name="s_per_grade_from" type="text" class="form-control form-control--small-xs" value="{{ $s_per_grade_from }}"> 年生 （4/1現在）
            </td>
          </tr>

          <tr>
            <!-- per_zipcode -->
            <td class="col-title"><label for="per_zipcode">郵便番号</label></td>
            <td>ハイフンなし7桁
              <input name="s_per_zipcode" id="per_zipcode" type="text" class="form-control form-control--small" value="{{ $s_per_zipcode }}"></td>

            <td class="col-title"><label for="per_pref_code">住所</label></td>
            <td colspan="3">
              <!-- per_pref_code -->
              <select name="s_per_pref_code" id="per_pref_code" class="form-control form-control--small">
                <option value="0">▼都道府県</option>
              </select>

              <!-- per_address1 -->
              <label for="per_address1">（市区町村）</label>
              <input name="s_per_address1" id="per_address1" type="text" class="form-control form-control--small" value="{{ $s_per_address1 }}">

              <!-- per_address2 -->
              <label for="per_address2">（地名番地）</label>
              <input name="per_address2" id="per_address2" type="text"  class="form-control form-control--small" value="{{ $per_address2 }}">

              <!-- per_address3 -->
              <label for="per_address3">（ビル等）</label>
              <input name="per_address3" id="per_address3" type="text"  class="form-control form-control--small" value="{{ $per_address3 }}">
            </td>
          </tr>

          <tr>
            <!-- per_phone -->
            <td class="col-title"><label for="per_phone">電話番号</label></td>
            <td>ハイフンなし
              <input name="per_phone" id="per_phone" type="text" class="form-control form-control--small" value="{{ $per_phone }}"></td>

            <!-- per_email -->
            <td class="col-title"><label for="per_email">メールアドレス</label></td>
            <td colspan="3">
              <input name="per_email" id="per_email" type="email" class="form-control form-control--default form-control--mar-right" value="{{ $per_email }}">
            </td>
          </tr>

          <tr>
            <!-- fst_date -->
            <td class="col-title"><label for="fst_date">初回登録日</label></td>
            <td>
              <div class="mar-bottom">西暦
                <input name="s_fst_date_year_from" id="fst_date" type="text" class="form-control form-control--small-xs" value="{{ $s_fst_date_year_from }}"> 年 
                <input name="s_fst_date_month_from" type="text" class="form-control form-control--small-xs" value="{{ $s_fst_date_month_from }}"> 月 
                <input name="s_fst_date_day_from" type="text" class="form-control form-control--small-xs" value="{{ $s_fst_date_day_from }}"> 日
              </div>
              <div> ～&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="s_fst_date_year_to" type="text" class="form-control form-control--small-xs" value="{{ $s_fst_date_year_to }}"> 年 
                <input name="s_fst_date_month_to" type="text" class="form-control form-control--small-xs" value="{{ $s_fst_date_month_to }}"> 月 
                <input name="s_fst_date_day_to" type="text" class="form-control form-control--small-xs" value="{{ $s_fst_date_day_to }}"> 日
              </div>
            </td>

              <!-- per_status -->
            <td class="col-title"><label for="per_status">ステータス</label></td>
            <td colspan="3">
              <input name="s_per_status_" id="per_status" value="" type="checkbox"> 本登録　　　
              <input name="ckstatus" value="" type="checkbox"> 仮登録
            </td>
          </tr>
        </tbody>
      </table>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <input value="検索開始（AND検索）" type="submit" class="btn btn-sm btn-primary btn-mar-right">
      <input name="button5" id="button5" value="クリア（全消し）" type="reset" class="btn btn-sm btn-primary" onclick="location.href='{{ route('backend.students.index') }}'">
    </div>
  </div>
</div>
</form>
<!-- End content student search -->
@endsection