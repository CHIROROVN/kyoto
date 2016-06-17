<?php $__env->startSection('content'); ?>
<?php echo Form::open(array('route' => array('backend.campaigns.edit', $campaign->campaign_id), 'enctype'=>'multipart/form-data')); ?>

<div class="container">
  <div class="row content">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <!-- campaign_name -->
          <td class="col-title"><label for="campaign_name">キャンペーン名 <span class="note_required">※</span></label></td>
          <td>
            <input name="campaign_name" id="campaign_name" type="text" class="form-control form-control--small" value="<?php echo e($campaign->campaign_name); ?>">
            <?php if($errors->first('campaign_name')): ?><span class="error-input"><?php echo $errors->first('campaign_name'); ?></span><?php endif; ?>
          </td>

          <!-- presentlist_id -->
          <td class="col-title"><label for="presentlist_id">プレゼント名 <span class="note_required">※</span></label></td>
          <td>
            <select name="presentlist_id" id="presentlist_id" class="form-control form-control--small">
              <option value="">▼選択</option>
              <?php foreach($presents as $present): ?>
              <option value="<?php echo e($present->presentlist_id); ?>" <?php if($campaign->presentlist_id == $present->presentlist_id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($present->present_name); ?></option>
              <?php endforeach; ?>
            </select>
            <?php if($errors->first('presentlist_id')): ?><span class="error-input"><?php echo $errors->first('presentlist_id'); ?></span><?php endif; ?>
          </td>

          <!-- baitai_id -->
          <td class="col-title"><label for="baitai_id">媒体名 <span class="note_required">※</span></label></td>
          <td>
            <select name="baitai_id" id="baitai_id" class="form-control form-control--small">
              <option value="">▼選択</option>
              <?php foreach($baitais as $baitai): ?>
              <option value="<?php echo e($baitai->baitai_id); ?>" <?php if($campaign->baitai_id == $baitai->baitai_id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($baitai->baitai_name); ?></option>
              <?php endforeach; ?>
            </select>
            <?php if($errors->first('baitai_id')): ?><span class="error-input"><?php echo $errors->first('baitai_id'); ?></span><?php endif; ?>
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
      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal-<?php echo e($campaign->campaign_id); ?>">削除</button>
      <!-- popup -->
      <div class="modal fade bs-example-modal-sm" id="myModal-<?php echo e($campaign->campaign_id); ?>" role="dialog">
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
              <a href="<?php echo e(route('backend.campaigns.delete', [$campaign->campaign_id, 'page' => $page])); ?>" class="btn btn-xs btn-primary"><?php echo e(trans('common.modal_btn_delete')); ?></a>
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
      <input onclick="location.href='<?php echo e(route('backend.campaigns.index')); ?>'" value="前の画面に戻る" type="button" class="btn btn-sm btn-primary">
    </div>
  </div>
</div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>