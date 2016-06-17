<?php $__env->startSection('content'); ?>
<?php echo Form::open(array('route' => 'backend.baitais.regist', 'enctype'=>'multipart/form-data')); ?>

<div class="container">
  <div class="row content">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td class="col-title"><label for="baitai_code">媒体コード <span class="note_required">※</span></label></td>
          <td>
            <input name="baitai_code" id="baitai_code" type="text" class="form-control form-control--default" value="<?php echo e(old('baitai_code')); ?>">
            <?php if($errors->first('baitai_code')): ?><span class="error-input"><?php echo $errors->first('baitai_code'); ?></span><?php endif; ?>
          </td>
          <td class="col-title"><label for="baitai_name">媒体名 <span class="note_required">※</span></label></td>
          <td>
            <input name="baitai_name" id="baitai_name" type="text" class="form-control form-control--default" value="<?php echo e(old('baitai_name')); ?>">
            <?php if($errors->first('baitai_name')): ?><span class="error-input"><?php echo $errors->first('baitai_name'); ?></span><?php endif; ?>
          </td>
          <td class="col-title"><label for="rdNewOld">新旧<!-- 性別 --> <span class="note_required">※</span></label></td>
          <td>
            <input name="baitai_kind" id="rdNewOld" value="2" type="radio" <?php if(old('baitai_kind') == 2): ?> <?php echo e('checked'); ?> <?php endif; ?>> 新　　　
            <input name="baitai_kind" value="1" type="radio" <?php if(old('baitai_kind') == 1): ?> <?php echo e('checked'); ?> <?php endif; ?>> 旧
            <?php if($errors->first('baitai_kind')): ?><span class="error-input"><?php echo $errors->first('baitai_kind'); ?></span><?php endif; ?>
          </td>
        </tr>
        <tr>
          <td class="col-title"><label for="baitai_year">発行年</label></td>
          <td colspan="5">
            <input name="baitai_year" id="baitai_year" type="text" class="form-control form-control--small" value="<?php echo e(old('baitai_year')); ?>" maxlength="4">  年
            <?php if($errors->first('baitai_year')): ?><span class="error-input"><?php echo $errors->first('baitai_year'); ?></span><?php endif; ?>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="row mar-bottom30">
    <div class="col-md-12 text-center">
      <input name="button4" id="button4" value="登録する" type="submit" class="btn btn-sm btn-primary">
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <input onclick="location.href='<?php echo e(route('backend.baitais.index')); ?>'" value="前の画面に戻る" type="button" class="btn btn-sm btn-primary">
    </div>
  </div>
</div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>