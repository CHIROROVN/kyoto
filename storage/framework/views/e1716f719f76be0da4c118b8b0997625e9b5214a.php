<?php $__env->startSection('content'); ?>
<?php echo Form::open(array('route' => 'backend.baitais.index', 'method' => 'get')); ?>

<div class="container">
  <div class="row content">
    <div class="row fl-right mar-bottom">
      <div class="col-md-12">
        <input onclick="location.href='<?php echo e(route('backend.baitais.regist')); ?>'" value="媒体の新規登録" type="button" class="btn btn-sm btn-primary">
      </div>
    </div>
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td class="col-title"><label for="s_baitai_code">媒体コード</label></td>
          <td>
            <input name="s_baitai_code" id="s_baitai_code" type="text" class="form-control form-control--default" value="<?php echo $s_baitai_code; ?>">
          </td>
          <td class="col-title"><label for="s_baitai_name">媒体名</label></td>
          <td><input name="s_baitai_name" id="s_baitai_name" type="text" class="form-control form-control--default" value="<?php echo $s_baitai_name; ?>"></td>
          <td class="col-title"><label for="s_baitai_kind">新旧</label></td>
          <td>
            <input name="s_baitai_kind_old" id="s_baitai_kind" class="baitai_kind" value="1" type="checkbox" <?php if($s_baitai_kind_old == 1): ?> <?php echo e('checked'); ?> <?php endif; ?>> 旧　　　
            <input name="s_baitai_kind_new" class="baitai_kind" value="2" type="checkbox" <?php if($s_baitai_kind_new == 2): ?> <?php echo e('checked'); ?> <?php endif; ?>> 新
          </td>
        </tr>
        <tr>
          <td class="col-title"><label for="s_baitai_year_begin">発行年</label></td>
          <td colspan="5">
              <?php
              $year_current = date('Y');
              $year_next = date('Y') + 1;
              $year_prev = date('Y') - 1;
              ?>
              <select name="s_baitai_year_begin" id="s_baitai_year_begin" class="form-control form-control--small">
                <option value="">指定なし</option>
                <option value="<?php echo e($year_prev); ?>" <?php if($s_baitai_year_begin == $year_prev): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($year_prev); ?></option>
                <option value="<?php echo e($year_current); ?>" <?php if($s_baitai_year_begin == $year_current): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($year_current); ?></option>
                <option value="<?php echo e($year_next); ?>" <?php if($s_baitai_year_begin == $year_next): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($year_next); ?></option>
              </select>
              ～
              <select name="s_baitai_year_end" id="s_baitai_year_end" class="form-control form-control--small">
                <option value="" >指定なし</option>
                <option value="<?php echo e($year_prev); ?>" <?php if($s_baitai_year_end == $year_prev): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($year_prev); ?></option>
                <option value="<?php echo e($year_current); ?>" <?php if($s_baitai_year_end == $year_current): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($year_current); ?></option>
                <option value="<?php echo e($year_next); ?>" <?php if($s_baitai_year_end == $year_next): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($year_next); ?></option>
              </select>
           </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="row mar-bottom30">
    <div class="col-md-12 text-center">
      <input value="検索開始（AND検索）" type="submit" class="btn btn-sm btn-primary form-control--mar-right">
      <input name="button5" id="reset" value="クリア（全消し）" type="reset" class="btn btn-sm btn-primary" onclick="location.href='<?php echo e(route('backend.baitais.search', array('where' => 'null'))); ?>'">
    </div>
  </div>
</div>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>