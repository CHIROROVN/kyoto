<?php $__env->startSection('content'); ?>
	<!-- content student contact regist -->
    <section id="page">
      <div class="container">
        <div class="row content content--list">
          <h3>お問い合わせ管理　＞　お問い合わせ情報の新規登録</h3>
          <table class="table table-bordered">
            <tr>
              <td class="col-title">日付</td>
              <td><label for="textbirthday">西暦</label>
                <input name="txtyearbirth" id="textbirthday" class="form-control form-control--small-xs" type="text"> 年 
                <input name="txtmontdbirth" class="form-control form-control--small-xs" type="text"> 月 
                <input name="txtyearbirth" class="form-control form-control--small-xs" type="text"> 日
                <input name="button4" id="button4" value="今日" type="submit" class="btn btn-xs btn-primary">
              </td>
              <td class="col-title">応対者</td>
              <td>山田花子</td>
            </tr>
            <tr>
              <td class="col-title"><label for="texttitle">タイトル</label></td>
              <td colspan="3"><input name="txttitle" id="texttitle" class="form-control form-control--large" type="text"></td>
            </tr>
            <tr>
              <td class="col-title"><label for="textcontent">内容</label></td>
              <td colspan="3"><textarea name="txtcontent" cols="70" rows="5" id="textcontent" class="form-control form-control--large"></textarea></td>
            </tr>
          </table>
        </div>
        <div class="row mar-bottom30">
          <div class="col-md-12 text-center">
            <input name="button3" id="button3" value="登録する" type="submit" class="btn btn-sm btn-primary mar-right">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <input onclick="location.href='student_contact_list.html'" value="お問い合わせ情報一覧に戻る" type="button" class="btn btn-sm btn-primary">
          </div>
        </div>
      </div>
    </section>
    <!-- End content student contact regist -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>