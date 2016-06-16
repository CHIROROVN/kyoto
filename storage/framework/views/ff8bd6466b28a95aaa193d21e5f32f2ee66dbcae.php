<?php $__env->startSection('content'); ?>
  <!-- content customer detail -->
    <section id="page">
      <div class="container">
        <div class="row content content--regist">
          <table class="table table-bordered">
            <tr>
              <td class="col-title">学校コード</td>
              <td><?php echo e($customer->cus_code); ?></td>
              <td class="col-title">学校名</td>
              <td><?php echo e($customer->cus_name); ?></td>
              <td class="col-title">見出し</td>
              <td><?php echo e($customer->cus_title); ?></td>
            </tr>
            <tr>
              <td class="col-title">旧学校名</td>
              <td><?php echo e($customer->cus_old_name); ?></td>
              <td class="col-title">親法人</td>
              <td><?php echo e(@$enterprises[$customer->ent_id]); ?></td>
              <td rowspan="3" class="col-title">注意文言</td>
              <td rowspan="3"><?php echo e($customer->cus_notice); ?></td>
            </tr>
            <tr>
              <td class="col-title">有料・無料</td>
              <td>
                <?php if($customer->cus_pay == '0'): ?> フリー <?php else: ?> 有料 <?php endif; ?>
              </td>
              <td class="col-title">女子専用</td>
              <td><?php if($customer->cus_sex == '2'): ?> 女性のみ <?php else: ?> いいえ <?php endif; ?> </td>
            </tr>
            <?php 
              $arr_cus_kind = ['01'=>'大学', '02'=>'職業大学', '11'=>'短期大学', '21'=>'専門学校', '22'=>'職業訓練法人', '23'=>'一般教育機関', '24'=>'留学・外国教育機関', '25'=>'新聞奨学会', '26'=>'看護学校']; 
              $arr_cus_owner = ['01'=>'国立', '02'=>'公立', '03'=>'私立'];
              $arr_cus_mail_send = [''=>'しない', '0'=>'曜日指定', '1'=>'日付指定'];
            ?>
            <tr>
              <td class="col-title">学校区分</td>
              <td><?php echo e(@$arr_cus_kind[$customer->cus_kind]); ?></td>
              <td class="col-title">運営区分</td>
              <td><?php echo e(@$arr_cus_owner[$customer->cus_owner]); ?></td>
            </tr>
          </table>
          <table class="table table-bordered">
            <tr>
              <td rowspan="2" class="col-title">担当者①</td>
              <td class="col-title">所属</td>
              <td><?php echo e($customer->cus_staff1_belong); ?></td>
              <td class="col-title">名前</td>
              <td><?php echo e($customer->cus_staff1_name); ?></td>
              <td class="col-title">名前かな</td>
              <td><?php echo e($customer->cus_staff1_name_kana); ?></td>
            </tr>
           <tr>
              <td class="col-title">TEL</td>
              <td><?php echo e($customer->cus_staff1_tel); ?></td>
              <td class="col-title">FAX</td>
              <td><?php echo e($customer->cus_staff1_fax); ?></td>
              <td class="col-title">メール</td>
              <td><?php echo e($customer->cus_staff1_email); ?></td>
            </tr>
            <tr>
              <td rowspan="2" class="col-title">担当者②</td>
              <td class="col-title">所属</td>
              <td><?php echo e($customer->cus_staff2_belong); ?></td>
              <td class="col-title">名前</td>
              <td><?php echo e($customer->cus_staff2_name); ?></td>
              <td class="col-title">名前かな</td>
              <td><?php echo e($customer->cus_staff2_name_kana); ?></td>
            </tr>
           <tr>
              <td class="col-title">TEL</td>
              <td><?php echo e($customer->cus_staff2_tel); ?></td>
              <td class="col-title">FAX</td>
              <td><?php echo e($customer->cus_staff2_fax); ?></td>
              <td class="col-title">メール</td>
              <td><?php echo e($customer->cus_staff2_email); ?></td>
            </tr>
            <tr>
              <td rowspan="2" class="col-title">担当者③</td>
              <td class="col-title">所属</td>
              <td><?php echo e($customer->cus_staff3_belong); ?></td>
              <td class="col-title">名前</td>
              <td><?php echo e($customer->cus_staff3_fax); ?></td>
              <td class="col-title">名前かな</td>
              <td><?php echo e($customer->cus_staff3_name_kana); ?></td>
            </tr>
           <tr>
              <td class="col-title">TEL</td>
              <td><?php echo e($customer->cus_staff3_tel); ?></td>
              <td class="col-title">FAX</td>
              <td><?php echo e($customer->cus_staff3_fax); ?></td>
              <td class="col-title">メール</td>
              <td><?php echo e($customer->cus_staff3_email); ?></td>
            </tr>
          </table>
          <table class="table table-bordered">
            <tr>
              <td class="col-title">ログインID</td>
              <td><?php echo e($customer->cus_login); ?></td>
              <td class="col-title">パスワード</td>
              <td><?php echo e($customer->cus_passwd); ?></td>
              <td class="col-title">メール送信</td>
              <td><?php echo e(@$arr_cus_mail_send[$customer->cus_mail_send]); ?></td>
            </tr>
           <tr>
              <td class="col-title">メール送信間隔</td>
              <td></td>
              <td class="col-title">ZIPパスワード</td>
              <td><?php echo e($customer->cus_zip_pwd); ?></td>
              <td class="col-title">ファイル形式</td>
              <td> <?php if($customer->cus_mail_attach == '1'): ?> CSV <?php elseif($customer->cus_mail_attach == '2'): ?> Excel <?php else: ?> しない <?php endif; ?> </td>
            </tr>
          </table>
        </div>
        <div class="row mar-bottom30">
          <div class="col-md-12 text-center">
            <input onclick="location.href='<?php echo e(route('backend.customers.edit', $customer->cus_id)); ?>'" value="編集する" type="button" class="btn btn-sm btn-primary btn-mar-right">
            
            <input data-toggle="modal" data-target="#myModal-<?php echo e($customer->cus_id); ?>" value="削除する" type="button" class="btn btn-sm btn-primary">

            <!-- popup -->
            <div class="modal fade bs-example-modal-sm" id="myModal-<?php echo e($customer->cus_id); ?>" role="dialog">
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
                    <a href="<?php echo e(route('backend.customers.delete', $customer->cus_id)); ?>" class="btn btn-xs btn-primary"><?php echo e(trans('common.modal_btn_delete')); ?></a>
                    <button type="button" class="btn btn-xs btn-default" data-dismiss="modal"><?php echo e(trans('common.modal_btn_cancel')); ?></button>
                  </div>
                </div>
                <!-- End Modal content-->
                </div>
              </div>
          </div> 
        </div>

        <div class="row">
          <div class="col-md-12 text-center">
            <input onclick="location.href='<?php echo e(route('backend.customers.index')); ?>'" value="一覧に戻る" type="button" class="btn btn-sm btn-primary">
          </div>
        </div>
      </div>
    </section>
    <!-- End content customer detail -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>