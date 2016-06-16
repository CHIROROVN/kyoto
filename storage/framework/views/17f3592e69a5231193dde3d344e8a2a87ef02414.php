<?php $__env->startSection('content'); ?>
	<!-- content baitai list -->
    <section id="page">
      <div class="container">
        <div class="row content content--list">
          <p>全123件中、99件が該当しました。うち、1～20件を表示しています。</p>
          <div class="row fl-right mar-bottom">
            <div class="col-md-12">
              <input onclick="location.href='<?php echo e(route('backend.unyversitys.regist')); ?>'" value="大学の新規登録" type="button" class="btn btn-sm btn-primary"/>
            </div>
          </div>
          <table class="table table-bordered table-striped clearfix">
            <tr>
              <td class="col-title" align="center">大学コード</td>
              <td class="col-title" align="center">大学名</td>
              <td class="col-title" align="center">大学名かな</td>
              <td class="col-title" align="center">都道府県</td>
              <td class="col-title" align="center">編集</td>
              <td class="col-title" align="center">削除</td>
            </tr>
            <tr>
              <td>11111</td>
              <td>東京大学</td>
              <td>とうきょうだいがく</td>
              <td>東京都</td>
              <td align="center"><input onclick="location.href='university_edit.html'" value="編集" type="button" class="btn btn-xs btn-primary"></td>
              <td align="center"><input onclick="location.href='university_delete_cnf.html'" value="削除" type="button" class="btn btn-xs btn-primary"></td>
            </tr>
           <tr>
              <td>22222</td>
              <td>京都大学</td>
              <td>きょうとだいがく</td>
              <td>京都府</td>
              <td align="center"><input onclick="location.href='university_edit.html'" value="編集" type="button" class="btn btn-xs btn-primary"></td>
              <td align="center"><input onclick="location.href='university_delete_cnf.html'" value="削除" type="button" class="btn btn-xs btn-primary"></td>
            </tr>
          </table>
        </div>
        <div class="row mar-bottom30">
          <div class="col-md-12 text-center">
            <input name="button3" value="前の20件を表示" disabled="disabled" type="submit" class="btn btn-sm btn-primary form-control--mar-right">
            <input name="button4" value="次の20件を表示" type="submit" class="btn btn-sm btn-primary">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <input name="button7" value="再検索（条件を引き継ぐ）" type="submit" class="btn btn-sm btn-primary form-control--mar-right">
            <input name="button5" value="再検索（条件をクリアする）" type="reset" class="btn btn-sm btn-primary">
          </div>
        </div>
      </div>
    </section>
    <!-- End content baitai list -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>