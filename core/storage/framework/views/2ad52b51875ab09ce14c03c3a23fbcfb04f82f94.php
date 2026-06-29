<div class="modal fade" id="user_edit_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('Send Mail To Order Sender')); ?></h5>
                <button type="button" class="close" data-bs-dismiss="modal"><span>×</span></button>
            </div>
            <form action="<?php echo e(route(route_prefix().'admin.package.order.manage.send.mail')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="name"><?php echo e(__('Name')); ?></label>
                        <input type="text" class="form-control" name="name" placeholder="<?php echo e(__('Enter name')); ?>">
                    </div>
                    <div class="form-group">
                        <label for="email"><?php echo e(__('Email')); ?></label>
                        <input type="text" class="form-control" name="email" placeholder="<?php echo e(__('Email')); ?>">
                    </div>
                    <div class="form-group">
                        <label for="Subject"><?php echo e(__('Subject')); ?></label>
                        <input type="text" class="form-control" name="subject" value="<?php echo e(__('Your order Replay From {site}')); ?>">
                        <small class="info-text"><?php echo e(__('{site} will be replaced by site title')); ?></small>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__('Message')); ?></label>
                        <input type="hidden" name="message">
                        <div class="summernote"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Send Mail')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="order_status_change_modal" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('order Status Change')); ?></h5>
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
            </div>
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <form action="<?php echo e(route(route_prefix().'admin.package.order.manage.change.status')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <input type="hidden" name="order_id" id="order_id">
                    <div class="form-group">
                        <label for="order_status"><?php echo e(__('order Status')); ?></label>
                        <select name="order_status" class="form-control" id="order_status">
                            <option value="pending"><?php echo e(__('Pending')); ?></option>
                            <option value="in_progress"><?php echo e(__('In Progress')); ?></option>
                            <option value="cancel"><?php echo e(__('Cancel')); ?></option>
                            <option value="complete"><?php echo e(__('Complete')); ?></option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Change Status')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\core\resources\views/landlord/admin/package-order-manage/portion/status-and-mail-send.blade.php ENDPATH**/ ?>