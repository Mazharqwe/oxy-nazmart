<?php $__env->startSection('title'); ?>
    <?php echo e(__('Order Details')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.media-upload.css','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('media-upload.css'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Order Details')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrap d-flex justify-content-between">
                            <div class="left-wrapper">
                                <h4 class="header-title mb-4"><?php echo e(__('Order Details')); ?></h4>
                            </div>
                            <div class="right-wrapper">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.link-with-popover','data' => ['url' => ''.e(route(route_prefix().'admin.package.order.manage.all')).'','class' => 'info']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('link-with-popover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => ''.e(route(route_prefix().'admin.package.order.manage.all')).'','class' => 'info']); ?><?php echo e(__('All Orders')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </div>
                        </div>
                        <div class="table-wrap table-responsive">
                            <table class="table table-default table-striped table-bordered">
                                <thead class="text-white" style="background-color: #b66dff">
                                <tr>
                                    <th><?php echo e(__('ID')); ?></th>
                                    <th><?php echo e(__('Details')); ?></th>
                                    <th><?php echo e(__('Payment Status')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?php echo e($order->id); ?></td>
                                    <td>
                                        <div class="parent d-flex justify-content-start">
                                            <strong class="text-dark "><?php echo e(__('Package Name :')); ?></strong>
                                            <span class="text-primary mx-2"><?php echo e($order->package_name); ?></span><br><br>
                                        </div>

                                        <div class="parent d-flex justify-content-start">
                                            <strong class="text-dark "><?php echo e(__('Package Price :')); ?></strong>
                                            <span
                                                class="text-primary mx-2"><?php echo e(amount_with_currency_symbol($order->package_price)); ?></span><br><br>
                                        </div>

                                        <div class="parent d-flex justify-content-start">
                                            <strong class="text-dark "><?php echo e(__('Payment Gateway :')); ?></strong>
                                            <span
                                                class="text-primary mx-2 text-capitalize"><?php echo e(str_replace('_',' ',$order->package_gateway)); ?></span><br><br>
                                        </div>

                                        <div class="parent d-flex justify-content-start">
                                            <strong class="text-dark "><?php echo e(__('Order User Name :')); ?></strong>
                                            <span class="text-primary mx-2"> <?php echo e($order->name); ?></span><br><br>
                                        </div>

                                        <div class="parent d-flex justify-content-start">
                                            <strong class="text-dark "><?php echo e(__('Order User Email :')); ?></strong>
                                            <span class="text-primary mx-2"><?php echo e($order->email); ?></span><br><br>
                                        </div>

                                        <div class="parent d-flex justify-content-start">
                                            <strong class="text-dark "><?php echo e(__('Subdomain :')); ?></strong>
                                            <span class="text-primary mx-2"><?php echo e($order->tenant_id); ?></span><br><br>
                                        </div>

                                        <div class="parent d-flex justify-content-start">
                                            <strong class="text-dark "><?php echo e(__('Order Date :')); ?></strong>
                                            <span
                                                class="text-primary mx-2"><?php echo e(date_format($order->created_at,'d M Y')); ?></span><br><br>
                                        </div>

                                        <?php if(!empty($all_custom_fields)): ?>
                                            <strong class="mb-2 text-secondary mt-4"><?php echo e(__('(Custom Fields)')); ?></strong>
                                            <?php $__currentLoopData = $all_custom_fields ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="att mb-2 mt-2">
                                                    <strong class="text-dark "><?php echo e(ucfirst($key) . ' : '); ?></strong>
                                                    <span><?php echo e($field); ?></span><br>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

                                        <?php if($order->status != 'trial'): ?>
                                            <?php
                                                $attachments = 'assets/landlord/uploads/payment_attachments/'.$order->attachments;
                                            ?>

                                            <?php if($order->transaction_id): ?>
                                                    <div class="parent d-flex justify-content-start">
                                                        <strong class="text-dark "><?php echo e(__('Transaction ID :')); ?></strong>
                                                        <span class="text-primary mx-2">
                                                        <p><?php echo e($order->transaction_id); ?></p>
                                                    </span><br><br>
                                                    </div>
                                            <?php endif; ?>


                                            <?php if(!is_dir($attachments) && file_exists($attachments)): ?>
                                                <div class="parent d-flex justify-content-start">
                                                    <strong class="text-dark "><?php echo e(__('Attachment :')); ?></strong>
                                                    <span class="text-primary mx-2">
                                                        <a href="<?php echo e(global_asset($attachments)); ?>"
                                                           target="_blank">
                                                            <img class="rounded"
                                                                 src="<?php echo e(global_asset($attachments)); ?>"
                                                                 alt="" style="width: 100px;height: 50px">
                                                        </a>
                                                    </span><br><br>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <?php if($order->payment_status == 'complete'): ?>
                                            <span
                                                class="alert alert-success text-capitalize"><?php echo e(__($order->payment_status)); ?></span>
                                        <?php else: ?>
                                            <span
                                                class="alert alert-warning text-capitalize"><?php echo e($order->payment_status ? __($order->payment_status) : __('Pending')); ?></span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.media-upload.markup','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('media-upload.markup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.media-upload.js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('media-upload.js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make(route_prefix().'admin.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\core\resources\views/landlord/admin/package-order-manage/order-view.blade.php ENDPATH**/ ?>