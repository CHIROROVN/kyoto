@extends('backend.backend')
@section('content')
	<!-- content student contact edit -->
    <section id="page">
      <div class="container">
      {!! Form::open( ['id' => 'frmContactEdit', 'class' => 'form-horizontal','method' => 'post', 'route' => ['backend.students.contact.edit', $stu_id, $contact->contact_id], 'enctype'=>'multipart/form-data']) !!}
        <div class="row content content--list">
          <h3>お問い合わせ管理　＞　登録済みお問い合わせ情報の編集</h3>
          <table class="table table-bordered">
            <tr>
              <td class="col-title">日付 <span class="note_required">※</span></td>
              <td><label for="date">西暦</label>
                <input name="year" id="year" class="form-control form-control--small-xs" type="text" maxlength="4" value="@if(old('year')){{old('year')}}@else {{date('Y', strtotime($contact->contact_date))}} @endif"> 年 
                <input name="month" id="month" class="form-control form-control--small-xs" type="text" maxlength="2" value="@if(old('month')){{old('month')}}@else {{date('m', strtotime($contact->contact_date))}} @endif"> 月 
                <input name="day" id="day" class="form-control form-control--small-xs" type="text" maxlength="2" value="@if(old('day')){{old('day')}}@else {{date('d', strtotime($contact->contact_date))}} @endif"> 日
                <input name="dateNow" id="dateNow" value="今日" type="button" class="btn btn-xs btn-primary">
                  @if ($errors->first('year'))
                    <div class="help-block with-errors">※ {!! $errors->first('year') !!}</div>
                  @endif
                  @if ($errors->first('month'))
                    <div class="help-block with-errors">※ {!! $errors->first('month') !!}</div>
                  @endif
                  @if ($errors->first('day'))
                    <div class="help-block with-errors">※ {!! $errors->first('day') !!}</div>
                  @endif
              </td>
              <td class="col-title">応対者</td>
              <td>{{@$users[$contact->contact_fst_user]}}
              <input name="contact_fst_user" id="contact_fst_user" value="{{$contact->contact_fst_user}}" type="hidden">
              </td>
            </tr>
            <tr>
              <td class="col-title"><label for="contact_title">タイトル <span class="note_required">※</span></label></td>
              <td colspan="3"><input name="contact_title" id="contact_title" class="form-control form-control--large" type="text" value="{{old('contact_title')}}">
                  @if ($errors->first('contact_title'))
                    <div class="help-block with-errors">※ {!! $errors->first('contact_title') !!}</div>
                  @endif
              </td>
            </tr>
            <tr>
              <td class="col-title"><label for="contact_main">内容 <span class="note_required">※</span></label></td>
              <td colspan="3"><textarea name="contact_main" cols="70" rows="5" id="contact_main" class="form-control form-control--large">{{old('contact_main')}}</textarea>
                  @if ($errors->first('contact_main'))
                    <div class="help-block with-errors">※ {!! $errors->first('contact_main') !!}</div>
                  @endif
              </td>
            </tr>
          </table>
        </div>
        <div class="row mar-bottom30">
          <div class="col-md-12 text-center">
            <input name="button3" id="button3" value="保存する" type="submit" class="btn btn-sm btn-primary">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <input onclick="location.href='student_contact_list.html'" value="お問い合わせ情報一覧に戻る" type="button" type="button" class="btn btn-sm btn-primary">
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </section>
  <script type="text/javascript">
  var date  = new Date();
  var day   = convert2Digit(date.getDay());
  var month = convert2Digit(date.getMonth()+1);
  var year  = date.getFullYear();
  $('#dateNow').click(function(event) {
    $('#year').val(year);
    $('#month').val(month);
    $('#day').val(day);
  });

  function convert2Digit(num){
    return num > 9 ? "" + num: "0" + num;
  }
</script>
    <!-- End content student contact edit -->
@endsection