@extends('backend.backend')
@section('content')
	<!-- content student regist -->
{!! Form::open(array('route' => 'backend.students.regist', 'enctype'=>'multipart/form-data')) !!}
<div class="container">
  <div class="row content content--regist">
    <table class="table table-bordered">
        <tbody>
          <tr>
            <!-- per id -->
            <td class="col-title"><label for="per_id">請求者番号</label></td>
            <td>
              <input name="per_id" id="per_id" type="text" class="form-control form-control--small" readonly="" value="{{ $per_id }}">
            </td>

            <!-- baitai_id -->
            <td class="col-title"><label for="baitai_id">媒体番号 <span class="note_required">※</span></label></td>
            <td colspan="3">
              <input name="baitai_id" id="baitai_id" type="text" class="form-control form-control--small" value="{{ old('baitai_id') }}"> →
              @if ($errors->first('baitai_id'))<span class="error-input">{!! $errors->first('baitai_id') !!}</span>@endif
            </td>
          </tr>

          <tr>
            <!-- per_fname and per_gname -->
            <td class="col-title"><label for="textname">氏名 <span class="note_required">※</span></label></td>
            <td>
              <input name="per_fname" type="text" class="form-control form-control--small form-control--mar-right" value="{{ old('per_fname') }}">
              <input name="per_gname" id="textname" type="text" class="form-control form-control--small" value="{{ old('per_gname') }}">
              @if ($errors->first('per_fname'))<span class="error-input">{!! $errors->first('per_fname') !!}</span>@endif
              @if ($errors->first('per_gname'))<span class="error-input">{!! $errors->first('per_gname') !!}</span>@endif
            </td>

            <!-- per_fname_kana and per_gname_kana -->
            <td class="col-title"><label for="per_fname_kana">フリガナ <span class="note_required">※</span></label></td>
            <td>
              <input name="per_fname_kana" type="text" id="per_fname_kana" class="form-control form-control--small form-control--mar-right" value="{{ old('per_fname_kana') }}">
              <input name="per_gname_kana" id="per_gname_kana" type="text" class="form-control form-control--small" value="{{ old('per_gname_kana') }}">
              @if ($errors->first('per_fname_kana'))<span class="error-input">{!! $errors->first('per_fname_kana') !!}</span>@endif
              @if ($errors->first('per_gname_kana'))<span class="error-input">{!! $errors->first('per_gname_kana') !!}</span>@endif
            </td>

            <!-- per_way -->
            <td class="col-title"><label for="per_way">請求方法</label></td>
            <td>
              <select name="per_way" id="per_way" class="form-control form-control--small">
                  <option value="0" @if(old('per_way') == 0) selected="" @endif>請求方法</option>
                  <option value="1" @if(old('per_way') == 1) selected="" @endif>Postmail</option>
                  <option value="2" @if(old('per_way') == 2) selected="" @endif>Tel</option>
                  <option value="3" @if(old('per_way') == 3) selected="" @endif>Website</option>
              </select>
            </td>
          </tr>

         <tr>
            <!-- per_phone -->
            <td class="col-title"><label for="per_phone">電話番号</label></td>
            <td>ハイフンなし
              <input name="per_phone" id="per_phone" type="text" class="form-control form-control--default" value="{{ old('per_phone') }}"></td>

            <!-- per_email -->
            <td class="col-title"><label for="per_email">メールアドレス <span class="note_required">※</span></label></td>
            <td>
              <input name="per_email" id="per_email" type="text" class="form-control form-control--default form-control--mar-right" value="{{ old('per_email') }}">
              @if ($errors->first('per_email'))<span class="error-input">{!! $errors->first('per_email') !!}</span>@endif
            </td>

            <!-- per_sex -->
            <td class="col-title"><label for="per_sex">性別 <span class="note_required">※</span></label></td>
            <td>
              <input name="per_sex" id="per_sex" value="1" type="radio" @if(old('per_sex') == 1) checked="" @endif> 男　　　
              <input name="per_sex" value="2" type="radio" @if(old('per_sex') == 1) checked="" @endif> 女
              @if ($errors->first('per_sex'))<span class="error-input">{!! $errors->first('per_sex') !!}</span>@endif
            </td>
          </tr>

          <tr>
            <!-- per_zipcode -->
            <td class="col-title"><label for="per_zipcode">郵便番号 <span class="note_required">※</span></label></td>
            <td><label for="per_zipcode">ハイフンなし7桁</label>
              <input name="per_zipcode" id="per_zipcode" type="text" class="form-control form-control--smaller form-control--mar-right" value="{{ old('per_zipcode') }}">
              <input name="" value="住所選択" type="button" id="btn-zipcode" class="btn btn-xs btn-primary" style="margin-top: -4.5px;">
              @if ($errors->first('per_zipcode'))<span class="error-input">{!! $errors->first('per_zipcode') !!}</span>@endif
            </td>

            <!-- per_pref_code -->
            <td class="col-title"><label for="per_pref_code">都道府県</label></td>
            <td colspan="3">
              <select name="per_pref_code" id="per_pref_code" class="form-control form-control--small" value="{{ old('per_pref_code') }}">
                  <option value="0">都道府県</option>
                  @foreach ( $prefs as $pref )
                  <option value="{{ $pref->pref_id }}">{{ $pref->pref_name }}</option>
                  @endforeach
              </select>
            </td>
          </tr>
          <tr>
            <td class="col-title"><label for="sbprefecture">住所 <span class="note_required">※</span></label></td>
            <td colspan="5">
              <select name="sbprefecture" id="sbprefecture" class="form-control form-control--small">
                <option selected="selected">▼都道府県</option>
              </select>

              <!-- per_address1 -->
              <label for="per_address1">（市区町村）</label>
              <input name="per_address1" id="per_address1" type="text" class="form-control form-control--default" value="{{ old('per_address1') }}">

              <!-- per_address2 -->
              <label for="per_address2">（地名番地）</label>
              <input name="per_address2" id="per_address2" type="text"  class="form-control form-control--default" value="{{ old('per_address2') }}">

              <!-- per_address3 -->
              <label for="per_address3">（ビル等）</label>
              <input name="per_address3" id="per_address3" type="text"  class="form-control form-control--default" value="{{ old('per_address3') }}">

              @if ($errors->first('per_address1'))<span class="error-input">{!! $errors->first('per_address1') !!}</span>@endif
              @if ($errors->first('per_address2'))<span class="error-input">{!! $errors->first('per_address2') !!}</span>@endif
            </td>
          </tr>

          <tr>
            <!-- per_hs_id -->
            <td class="col-title"><label for="per_hs_id">高校・大学 <span class="note_required">※</span></label></td>
            <td>
              <input name="per_hs_name" id="per_hs_id" type="text" class="form-control form-control--smaller form-control--mar-right" value="{{ old('per_hs_name') }}">
              <input name="per_hs_id" type="hidden" id="per_hs_id-id" value="{{ old('per_hs_id') }}">

              <input name="txtschoolname1"  type="text" class="form-control form-control--smaller">
              <span>年生・回生</span>
            </td>
            <td class="col-title"><label for="sbprefectures">都道府県 <span class="note_required">※</span></label></td>
            <td>
              <select name="sbprefectures" id="sbprefectures" class="form-control form-control--small">
                  <option selected="selected">都道府県</option>
              </select>
            </td>

            <!-- per_birthday -->
            <td class="col-title"><label for="per_birthday">誕生日</label></td>
            <td>西暦
                <input name="per_birthday_year" id="per_birthday" type="text" class="form-control form-control--small-xs" value="{{ old('per_birthday_year') }}"> 年 
                <input name="per_birthday_month" type="text" class="form-control form-control--small-xs" value="{{ old('per_birthday_month') }}"> 月 
                <input name="per_birthday_day" type="text" class="form-control form-control--small-xs" value="{{ old('per_birthday_day') }}"> 日 
            </td>
          </tr>
        </tbody>
      </table>

      <div id="scrollbox3">
      <table class="table table-bordered table-striped clearfix" id="tbl-list-personal">
        <tbody>
        <tr>
          <td class="col-title" align="center">類似率</td>
          <td class="col-title" align="center">入力日</td>
          <td class="col-title" align="center">氏名</td>
          <td class="col-title" align="center">氏名よみ</td>
          <td class="col-title" align="center">性別</td>
          <td class="col-title" align="center">住所</td>
          <td class="col-title" align="center">電話番号</td>
          <td class="col-title" align="center">メールアドレス</td>
        </tr>
        <tr>
          <td align="right">99%</td>
          <td>2016/04/06</td>
          <td>山田　太郎</td>
          <td>やまだ　たろう</td>
          <td>男</td>
          <td>岡山県倉敷市福井125-7</td>
          <td>086-430-3956</td>
          <td>test@chiroro.co.jp</td>
        </tr>
        <tr>
          <td align="right">99%</td>
          <td>2016/04/06</td>
          <td>山田　太郎</td>
          <td>やまだ　たろう</td>
          <td>男</td>
          <td>岡山県倉敷市福井125-7</td>
          <td>086-430-3956</td>
          <td>test@chiroro.co.jp</td>
        </tr>
        <tr>
          <td align="right">99%</td>
          <td>2016/04/06</td>
          <td>山田　太郎</td>
          <td>やまだ　たろう</td>
          <td>男</td>
          <td>岡山県倉敷市福井125-7</td>
          <td>086-430-3956</td>
          <td>test@chiroro.co.jp</td>
        </tr>
        <tr>
          <td align="right">99%</td>
          <td>2016/04/06</td>
          <td>山田　太郎</td>
          <td>やまだ　たろう</td>
          <td>男</td>
          <td>岡山県倉敷市福井125-7</td>
          <td>086-430-3956</td>
          <td>test@chiroro.co.jp</td>
        </tr>
        <tr>
          <td align="right">99%</td>
          <td>2016/04/06</td>
          <td>山田　太郎</td>
          <td>やまだ　たろう</td>
          <td>男</td>
          <td>岡山県倉敷市福井125-7</td>
          <td>086-430-3956</td>
          <td>test@chiroro.co.jp</td>
        </tr>
        <tr>
          <td align="right">99%</td>
          <td>2016/04/06</td>
          <td>山田　太郎</td>
          <td>やまだ　たろう</td>
          <td>男</td>
          <td>岡山県倉敷市福井125-7</td>
          <td>086-430-3956</td>
          <td>test@chiroro.co.jp</td>
        </tr>
        <tr>
          <td align="right">99%</td>
          <td>2016/04/06</td>
          <td>山田　太郎</td>
          <td>やまだ　たろう</td>
          <td>男</td>
          <td>岡山県倉敷市福井125-7</td>
          <td>086-430-3956</td>
          <td>test@chiroro.co.jp</td>
        </tr>
        <tr>
          <td align="right">99%</td>
          <td>2016/04/06</td>
          <td>山田　太郎</td>
          <td>やまだ　たろう</td>
          <td>男</td>
          <td>岡山県倉敷市福井125-7</td>
          <td>086-430-3956</td>
          <td>test@chiroro.co.jp</td>
        </tr>
        <tr>
          <td align="right">99%</td>
          <td>2016/04/06</td>
          <td>山田　太郎</td>
          <td>やまだ　たろう</td>
          <td>男</td>
          <td>岡山県倉敷市福井125-7</td>
          <td>086-430-3956</td>
          <td>test@chiroro.co.jp</td>
        </tr>
        <tr>
          <td align="right">99%</td>
          <td>2016/04/06</td>
          <td>山田　太郎</td>
          <td>やまだ　たろう</td>
          <td>男</td>
          <td>岡山県倉敷市福井125-7</td>
          <td>086-430-3956</td>
          <td>test@chiroro.co.jp</td>
        </tr>
       </tbody>
      </table>
      <script>
        $('#scrollbox3').enscroll({
          showOnHover: true,
          verticalTrackClass: 'track3',
          verticalHandleClass: 'handle3'
        });
      </script>
      </div>

      <table class="table table-bordered clearfix">
       <tbody>
         <tr>
            <!-- pamph_id -->
            <td class="col-title"><label for="pamph_id">資料請求番号 <span class="note_required">※</span></label></td>
            <td colspan="5">
              <div class="mar-bottom">
                @for ( $i = 1; $i <= 16; $i++ )
                <input name="pamph_id_{{ $i }}" type="text" @if($i == 1) id="pamph_id" @endif class="form-control form-control--small-xs form-control--mar-right" value="{{ old('pamph_id_' . $i) }}">
                @endfor
              </div>
              <div>
                @for ( $i = 17; $i <= 32; $i++ )
                <input name="pamph_id_{{ $i }}" type="text" @if($i == 1) id="pamph_id" @endif class="form-control form-control--small-xs form-control--mar-right" value="{{ old('pamph_id_' . $i) }}">
                @endfor
              </div>
              @if ($errors->first('pamph_id'))<span class="error-input">{!! $errors->first('pamph_id') !!}</span>@endif
            </td>
          </tr>
          <tr>
            <!-- campaign_id -->
            <td class="col-title"><label for="campaign_id">希望プレゼント</label></td>
            <td colspan="5">
              <input name="campaign_id" id="campaign_id" type="text" class="form-control form-control--default" value="{{ old('campaign_id') }}"> 
            </td>
          </tr>
        </tbody>
      </table>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <input name="regist" value="本登録" type="submit" class="btn btn-sm btn-primary btn-mar-right">
      <input name="regist_temp" value="仮登録" type="submit" class="btn btn-sm btn-primary btn-mar-right">
      <input name="button7" value="クリア（全消し）" type="reset" class="btn btn-sm btn-primary">
    </div>
  </div>
</div>
</form>
<!-- End content student regist -->

<script>
  $(document).ready(function(){
    // highschool
    $( "#per_hs_id" ).autocomplete({
      minLength: 0,
      // source: pamphlets,
      source: function(request, response){
          var key = $('#per_hs_id').val();
          $.ajax({
              url: "{{ route('backend.pamphlets.autocomplete.highschool') }}",
              beforeSend: function(){
                  // alert("beforeSend");
              },
              async:    true,
              data: { key: key },
              dataType: "json",
              method: "get",
              success: response
          });
      },
      focus: function( event, ui ) {
        $( "#per_hs_id" ).val( ui.item.label );
        return false;
      },
      select: function( event, ui ) {
        $( "#per_hs_id" ).val( ui.item.label );
        $( "#per_hs_id-id" ).val( ui.item.value );
        // $( "#per_hs_id-description" ).html( ui.item.desc );
        return false;
      }
    }).autocomplete( "instance" )._renderItem = function( ul, item ) {
        return $( "<li>" )
          //.append( "<a>" + item.label + "<br>" + item.desc + "</a>" )
          .append( "<a>" + item.desc + "</a>" )
          .appendTo( ul );
    };
  });
</script>

@endsection