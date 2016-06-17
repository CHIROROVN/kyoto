<?php $__env->startSection('content'); ?>
<?php echo Form::open(array('route' => array('backend.presents.edit', $present->presentlist_id), 'enctype'=>'multipart/form-data')); ?>

<div class="container">
  <div class="row content">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td class="col-title"><label for="present_code">プレゼントコード <span class="note_required">※</span></label></td>
          <td>
            <input name="present_code" id="present_code" type="text" class="form-control form-control--small" maxlength="3" value="<?php echo e($present->present_code); ?>">
            <?php if($errors->first('present_code')): ?><span class="error-input">※<?php echo $errors->first('present_code'); ?></span><?php endif; ?>
          </td>
          <td class="col-title"><label for="present_name">プレゼント名 <span class="note_required">※</span></label></td>
          <td>
            <input name="present_name" id="present_name" type="text" class="form-control form-control--default" value="<?php echo e($present->present_name); ?>">
            <?php if($errors->first('present_name')): ?><span class="error-input">※<?php echo $errors->first('present_name'); ?></span><?php endif; ?>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="row mar-bottom30">
    <div class="col-md-12 text-center">
      <input type="hidden" name="page" value="<?php echo e($page); ?>">
      <input name="button4" id="button4" value="登録する" type="submit" class="btn btn-sm btn-primary">
      <!-- delete -->
      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal-<?php echo e($present->presentlist_id); ?>">削除</button>
      <!-- popup -->
      <div class="modal fade bs-example-modal-sm" id="myModal-<?php echo e($present->presentlist_id); ?>" role="dialog">
        <div class="modal-dialog modal-sm">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><?php echo e(trans('common.modal_header_delete')); ?></h4>
            </div>
            <div class="modal-body">
              <p><?php echo e(trans('common.modal_content_delete')); ?></p>
            </div>
            <div class="modal-footer">
              <a href="<?php echo e(route('backend.presents.delete', [$present->presentlist_id, 'page' => $page])); ?>" class="btn btn-xs btn-primary"><?php echo e(trans('common.modal_btn_delete')); ?></a>
              <button type="button" class="btn btn-xs btn-default" data-dismiss="modal"><?php echo e(trans('common.modal_btn_cancel')); ?></button>
            </div>
          </div>
          <!-- End Modal content-->
        </div>
      </div>
      <!-- end popup -->
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <input onclick="location.href='<?php echo e(route('backend.presents.index')); ?>'" value="前の画面に戻る" type="button" class="btn btn-sm btn-primary">
    </div>
  </div>
</div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>