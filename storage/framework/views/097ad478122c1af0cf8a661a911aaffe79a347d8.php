<?php $__env->startSection('content'); ?>

<?php echo Form::open( ['id' => 'frmEnterpriseEdit', 'class' => 'form-horizontal','method' => 'post', 'route' => ['backend.enterprises.edit', $enterprise->ent_id], 'enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8']); ?>

    <!-- content enterprise edit -->
    <section id="page">
      <div class="container">
        <div class="row content">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td class="col-title"><label for="ent_name">法人名 <span class="note_required">※</span></label></td>
                <td>
                  <input name="ent_name" id="ent_name" type="text" class="form-control form-control--small" value="<?php if(old('ent_name')): ?><?php echo e(old('ent_name')); ?><?php else: ?><?php echo e($enterprise->ent_name); ?><?php endif; ?>">
                  <?php if($errors->first('ent_name')): ?>
                    <div class="help-block with-errors">※ <?php echo $errors->first('ent_name'); ?></div>
                  <?php endif; ?>
                </td>
                <td class="col-title"><label for="ent_login">ログインID <span class="note_required">※</span></label></td>
                <td>
                  <input name="ent_login" id="ent_login" type="text" class="form-control form-control--default" value="<?php if(old('ent_login')): ?><?php echo e(old('ent_login')); ?><?php else: ?><?php echo e($enterprise->ent_login); ?><?php endif; ?>">
                  <?php if($errors->first('ent_login')): ?>
                    <div class="help-block with-errors">※ <?php echo $errors->first('ent_login'); ?></div>
                  <?php endif; ?>
                </td>
                <td class="col-title"><label for="textPass">パスワード <span class="note_required">※</span></label></td>
                <td>
                  <input name="ent_passwd" id="ent_passwd" type="text" class="form-control form-control--default" value="<?php if(old('ent_passwd')): ?><?php echo e(old('ent_passwd')); ?><?php else: ?><?php echo e($enterprise->ent_passwd); ?><?php endif; ?>">
                  <?php if($errors->first('ent_passwd')): ?>
                    <div class="help-block with-errors">※ <?php echo $errors->first('ent_passwd'); ?></div>
                  <?php endif; ?>
                </td>
              </tr>
              <tr>
                <td class="col-title">傘下の学校 <span class="note_required">※</span></td>
                <td colspan="5">
                  <table class="table table-bordered" style="background:transparent;">
                    <tbody>
                      <tr>
                        <td rowspan="2" valign="bottom">
                          <select name="cus_name_lb2[]" multiple="multiple" id="cus_name_lb2" style="width: 120px;">
                            <!-- <?php if($count = count(CusName($enterprise->ent_id))): ?>
                              <?php foreach(CusName($enterprise->ent_id) as $key => $cusName): ?>
                                <option value="<?php echo e(@$cusName->cus_id); ?>"><?php echo e(@$cusName->cus_name); ?></option>
                              <?php endforeach; ?>
                            <?php endif; ?> -->
                          </select>
                          <?php if($errors->first('cus_name_lb2')): ?>
                            <div class="help-block with-errors">※ <?php echo $errors->first('cus_name_lb2'); ?></div>
                          <?php endif; ?>
                        </td>
                        <td align="right"><input name="cus_name_add" id="cus_name_add" value="←追加" type="button"></td>
                        <td><select name="cus_name_kana" id="cus_name_kana">
                          <option value="あ" <?php if(old('cus_name_kana') == 'あ'): ?> selected="selected" <?php endif; ?> >あ行</option>
                          <option value="か" <?php if(old('cus_name_kana') == 'か'): ?> selected="selected" <?php endif; ?> >か行</option>
                          <option value="さ" <?php if(old('cus_name_kana') == 'さ'): ?> selected="selected" <?php endif; ?> >さ行</option>
                          <option value="た" <?php if(old('cus_name_kana') == 'た'): ?> selected="selected" <?php endif; ?> >た行</option>
                          <option value="な" <?php if(old('cus_name_kana') == 'な'): ?> selected="selected" <?php endif; ?> >な行</option>
                          <option value="は" <?php if(old('cus_name_kana') == 'は'): ?> selected="selected" <?php endif; ?> >は行</option>
                          <option value="ま" <?php if(old('cus_name_kana') == 'ま'): ?> selected="selected" <?php endif; ?> >ま行</option>
                          <option value="や" <?php if(old('cus_name_kana') == 'や'): ?> selected="selected" <?php endif; ?> >や行</option>
                          <option value="ら" <?php if(old('cus_name_kana') == 'ら'): ?> selected="selected" <?php endif; ?> >ら行</option>
                          <option value="わ" <?php if(old('cus_name_kana') == 'わ'): ?> selected="selected" <?php endif; ?> >わ行</option>
                        </select></td>
                      </tr>
                      <tr>
                        <td align="right"><input name="cus_name_del" id="cus_name_del" value="削除→" type="button"></td>
                        <td>
                          <select name="cus_name_lb1" multiple="multiple" id="cus_name_lb1" style="width: 120px;">
                            <option value="" style="width: 100px;">&nbsp;</option>

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
            <input name="btnSave" id="btnSave" value="登録する" type="button" class="btn btn-sm btn-primary">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <input onclick="history.back()" value="前の画面に戻る" type="button" class="btn btn-sm btn-primary">
          </div>
        </div>
      </div>
    </section>
    <meta name="_token" content="<?php echo csrf_token(); ?>" />
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
    var url = "<?php echo e(route('backend.enterprise.cnk_ajax')); ?>";
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
  $('#btnSave').click(function(){
    $("#cus_name_lb2 option").each(function( index ) {
      $(this).prop("selected", true);
    });
    $( "form#frmEnterpriseEdit" ).submit();
  });

   function getAllCusName(){
    var data = [];
    var url_cnk = "<?php echo e(route('backend.enterprises.regist')); ?>";
        $("#cus_name_lb2 option").each(function( index ) {
          //console.log( index + ": " + $(this).val());
          data = $(this).val();
          console.log(data);
        });

      $.ajax({
                type: "get",
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>