@extends('backend.backend')

@section('content')
<!-- <script src="{{ asset('') }}/public/backend/common/js/dist/jquery.bootstrap-duallistbox.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->

{!! Form::open( ['id' => 'frmEnterpriseRegist', 'class' => 'form-horizontal','method' => 'post', 'route' => 'backend.enterprises.regist', 'enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8']) !!}
    <!-- content enterprise regist -->
    <section id="page">
      <div class="container">
        <div class="row content">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td class="col-title"><label for="ent_name">法人名 <span class="note_required">※</span></label></td>
                <td>
                  <input name="ent_name" id="ent_name" type="text" class="form-control form-control--small">
                  @if ($errors->first('ent_name'))
                    <div class="help-block with-errors">※ {!! $errors->first('ent_name') !!}</div>
                  @endif
                </td>
                <td class="col-title"><label for="ent_login">ログインID <span class="note_required">※</span></label></td>
                <td>
                  <input name="ent_login" id="ent_login" type="text" class="form-control form-control--default">
                  @if ($errors->first('ent_login'))
                    <div class="help-block with-errors">※ {!! $errors->first('ent_login') !!}</div>
                  @endif
                </td>
                <td class="col-title"><label for="textPass">パスワード <span class="note_required">※</span></label></td>
                <td>
                  <input name="ent_passwd" id="ent_passwd" type="text" class="form-control form-control--default">
                  @if ($errors->first('ent_passwd'))
                    <div class="help-block with-errors">※ {!! $errors->first('ent_passwd') !!}</div>
                  @endif
                </td>
              </tr>
              <tr>
                <td class="col-title">傘下の学校</td>
                <td colspan="5">
                  <table class="table table-bordered" style="background:transparent;">
                    <tbody>
                      <tr>
                        <td rowspan="2" valign="bottom">
                          <select name="cus_name_lb2" multiple="multiple" id="cus_name_lb2" style="width: 120px;">
                            <option value="">&nbsp;</option>
                          </select>
                        </td>
                        <td align="right"><input name="cus_name_add" id="cus_name_add" value="←追加" type="button"></td>
                        <td><select name="cus_name_kana" id="cus_name_kana">
                          <option value="あ">あ行</option>
                          <option value="か">か行</option>
                          <option value="さ">さ行</option>
                          <option value="た">た行</option>
                          <option value="な">な行</option>
                          <option value="は">は行</option>
                          <option value="ま">ま行</option>
                          <option value="や">や行</option>
                          <option value="ら">ら行</option>
                          <option value="わ">わ行</option>
                        </select></td>
                      </tr>
                      <tr>
                        <td align="right"><input name="cus_name_del" id="cus_name_del" value="削除→" type="button"></td>
                        <td>
                          <select name="cus_name_lb1" multiple="multiple" id="cus_name_lb1" style="width: 120px;">
                            <option value="" style="width: 100px;">&nbsp;</option>
                            <!-- <option>岡山理科大学</option>
                            <option>岡山商科大学</option>
                            <option>岡山大学</option>
                            <option>岡山学院大学</option> -->
                          </select>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="row mar-bottom30">
          <div class="col-md-12 text-center">
            <input name="btnSave" id="btnSave" value="登録する" type="submit" class="btn btn-sm btn-primary">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <input onclick="history.back()" value="前の画面に戻る" type="button" class="btn btn-sm btn-primary">
          </div>
        </div>
      </div>
    </section>
    <meta name="_token" content="{!! csrf_token() !!}" />
    <!-- End content enterprise regist -->
<script type="text/javascript">
      $('#cus_name_add').click(function(){
        var optVal1 = $( "#cus_name_lb1 option:selected" ).val();
        var optText1 = $( "#cus_name_lb1 option:selected" ).text();
        var htmlOption1 = "<option value="+optVal1+">" + optText1 + "</option>";
        if(optVal1 != null){
          $('#cus_name_lb2').append(htmlOption1);
          $("#cus_name_lb1 option:selected").remove();
        }
        $("#cus_name_lb1 option:first-child").attr("selected", true);

      });

      $('#cus_name_del').click(function(){
        var optVal2 = $( "#cus_name_lb2 option:selected" ).val();
        var optText2 = $( "#cus_name_lb2 option:selected" ).text();
        var htmlOption2 = "<option value="+optVal2+">" + optText2 + "</option>";
        if(optVal2 != null){
          $('#cus_name_lb1').append(htmlOption2);
          $("#cus_name_lb2 option:selected").remove();
        }
        $("#cus_name_lb2 option:first-child").attr("selected", true);
        
      });       
    

</script>
<script type="text/javascript">
  $('#cus_name_kana').on('change',function(){
    var cnk = $(this).val();
    getCusName(cnk);
    });

  $(document).ready(function(){
    var cnk = $('#cus_name_kana').val();
    getCusName(cnk); 

  });

  function getCusName(cnk){
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });    
    var url = "{{route('backend.enterprise.cnk_ajax')}}";
    var htmlOptions = "";
    $.ajax({
                type: "POST",
                url: url,
                data: {cnk:cnk},
                success: function (data) {
                  //console.log(data['cnk']);
                  $.each(data['cnk'], function(key, val){
                  htmlOptions += "<option value="+key+">" + val + "</option>";
                  });                  
                  $('#cus_name_lb1').html(htmlOptions);
                  $("#cus_name_lb1 option:first-child").attr("selected", true);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
        });
  }

</script>

<script type="text/javascript">
   var url_cnk = "{{route('backend.enterprises.regist')}}";
   //var data = "";
  $('#btnSave').click(function(){
    getAllCusName();
  });
   function getAllCusName(){
        $("#cus_name_lb2 option").each(function( index ) {
          //console.log( index + ": " + $(this).val());
          data = $(this).val();
          console.log(data);
        });

      $.ajax({
                type: "POST",
                url: url_cnk,
                data: {cnk:data},
                success: function (data) {
                  console.log(data['cnk']);                  
                },
                error: function(data) {
                    console.log('Error:', data);
                }                       
        });
   }
</script>
@endsection