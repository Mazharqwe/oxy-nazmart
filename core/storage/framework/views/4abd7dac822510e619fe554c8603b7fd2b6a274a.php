<?php
    $route_name ='landlord';
?>


<?php $__env->startSection('title'); ?>
    <?php echo e(__('All Failed Tenants')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.datatable.css','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('datatable.css'); ?>
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
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.summernote.css','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('summernote.css'); ?>
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

<?php $__env->startSection('content'); ?>
    <div class="col-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4"><?php echo e(__('All Failed Tenants')); ?></h4>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.error-msg','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('error-msg'); ?>
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
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.flash-msg','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('flash-msg'); ?>
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

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.datatable.table','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('datatable.table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                     <?php $__env->slot('th', null, []); ?> 
                        <th><?php echo e(__('Tenant Name')); ?></th>
                        <th><?php echo e(__('Domain')); ?></th>
                        <th><?php echo e(__('Theme')); ?></th>
                        <th><?php echo e(__('Payment Status')); ?></th>
                        <th><?php echo e(__('Payment Log')); ?></th>
                        <th><?php echo e(__('Action')); ?></th>
                     <?php $__env->endSlot(); ?>
                     <?php $__env->slot('tr', null, []); ?> 
                        <?php $__currentLoopData = $tenants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($user->id); ?></td>
                                <td><?php echo e($user->id.'.'.env('CENTRAL_DOMAIN')); ?></td>
                                <td><?php echo e($user->theme_slug); ?></td>
                                <td><?php echo e($user?->payment_log?->payment_status); ?></td>
                                <td>
                                    <?php if(!empty($user?->payment_log)): ?>
                                        <?php
                                            $payment_log = $user?->payment_log;
                                        ?>
                                        <a class="btn btn-info btn-sm payment_log_modal_open_btn"
                                           href="javascript:void(0)"
                                           data-bs-target="#tenant_payment_log_modal"
                                           data-bs-toggle="modal"
                                           data-email="<?php echo e($payment_log?->email); ?>"
                                           data-name="<?php echo e($payment_log?->name); ?>"
                                           data-package="<?php echo e($payment_log?->package_name); ?>"
                                           data-gateway="<?php echo e($payment_log?->package_gateway); ?>"
                                           data-tenant="<?php echo e($payment_log?->tenant_id); ?>"
                                           data-theme="<?php echo e($payment_log?->theme_slug); ?>"
                                           data-status="<?php echo e($payment_log?->status); ?>"
                                           data-payment_status="<?php echo e($payment_log?->payment_status); ?>"
                                           data-transaction_id="<?php echo e($payment_log?->transaction_id); ?>"
                                           data-created_at="<?php echo e($payment_log?->created_at); ?>"
                                        ><?php echo e(__('Open Log')); ?></a>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.delete-popover','data' => ['url' => ''.e(route('landlord.admin.tenant.failed.delete',$user->id)).'','popover' => ''.e(__('Delete')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('delete-popover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => ''.e(route('landlord.admin.tenant.failed.delete',$user->id)).'','popover' => ''.e(__('Delete')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modal.button','data' => ['target' => 'tenant_edit','extra' => 'tenant_edit_btn','type' => 'info','dataid' => ''.e($user->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['target' => 'tenant_edit','extra' => 'tenant_edit_btn','type' => 'info','dataid' => ''.e($user->id).'']); ?>
                                        <i class="mdi mdi-pencil"></i>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modal.button','data' => ['target' => 'user_add_subscription','extra' => 'user_add_subscription','type' => 'success','dataid' => ''.e($user->id).'','datastatus' => ''.e($user?->payment_log?->status).'','datauser' => ''.e(!empty($user?->payment_log?->user_id)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['target' => 'user_add_subscription','extra' => 'user_add_subscription','type' => 'success','dataid' => ''.e($user->id).'','datastatus' => ''.e($user?->payment_log?->status).'','datauser' => ''.e(!empty($user?->payment_log?->user_id)).'']); ?>
                                        <?php echo e(__('Regenerate')); ?>

                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                                    <?php if(empty($user->payment_log)): ?>
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modal.button','data' => ['target' => 'tenant_create_payment_log_modal','extra' => 'tenant_create_payment_log_modal','type' => 'primary','dataid' => ''.e($user->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['target' => 'tenant_create_payment_log_modal','extra' => 'tenant_create_payment_log_modal','type' => 'primary','dataid' => ''.e($user->id).'']); ?>
                                            <?php echo e(__('Create Payment Log')); ?>

                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php $__env->endSlot(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
        </div>
    </div>


    
    <div class="modal fade" id="user_add_subscription" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Regenerate Tenant')); ?></h5>
                    <button type="button" class="close" data-bs-dismiss="modal"><span>×</span></button>
                </div>

                <form action="<?php echo e(route('landlord.admin.tenant.failed.assign.subscription')); ?>"
                      id="user_add_subscription_form"
                      method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="subs_tenant_id" id="subs_user_id">
                        <input type="hidden" name="subs_pack_id" id="subs_pack_id">

                        
                        
                        
                        
                        
                        
                        
                        
                        

                        
                        
                        
                        
                        
                        
                        
                        

                        
                        
                        
                        
                        
                        
                        
                        
                        

                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        

                        
                        
                        
                        
                        
                        
                        

                        
                        
                        
                        
                        
                        
                        
                        
                        
                        

                        <div class="form-group">
                            <label for=""><?php echo e(__('Account Status')); ?></label>
                            <select class="form-control" name="account_status">
                                <option value="complete"><?php echo e(__('Complete')); ?></option>
                                <option value="pending"><?php echo e(__('Pending')); ?></option>
                                <option value="trial"><?php echo e(__('Trial')); ?></option>
                            </select>
                            <p>
                                <small
                                    class="text-primary"><?php echo e(__('You can set account status pending or complete from here')); ?></small>
                            </p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="tenant_edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Edit Tenant')); ?></h5>
                    <button type="button" class="close" data-bs-dismiss="modal"><span>×</span></button>
                </div>

                <form action="<?php echo e(route('landlord.admin.tenant.failed.edit')); ?>" id="tenant_edit_modal_form" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="tenant_id" id="tenant_id">
                        <div class="form-group">
                            <label for="password"><?php echo e(__('Domain Name')); ?></label>
                            <input type="text" class="form-control" name="tenant_name"
                                   placeholder="<?php echo e(__('Enter Domain Name')); ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Update')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="tenant_payment_log_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Tenant Payment Log')); ?></h5>
                    <button type="button" class="close" data-bs-dismiss="modal"><span>×</span></button>
                </div>

                <div class="modal-body">

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                </div>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="tenant_create_payment_log_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Create Tenant Payment Log')); ?></h5>
                    <button type="button" class="close" data-bs-dismiss="modal"><span>×</span></button>
                </div>

                <form action="<?php echo e(route('landlord.admin.tenant.failed.manual.paymentlog')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="tenant_id" id="tenant_id">

                        <div class="form-group user-select-wrapper">
                            <label for="subdomain"><?php echo e(__('User')); ?></label>
                            <select class="form-select user" id="user" name="user">
                                <option value="" selected disabled><?php echo e(__('Select an user')); ?></option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group custom_subdomain_wrapper mt-3">
                            <label for="custom-subdomain"><?php echo e(__('Add new subdomain')); ?></label>
                            <input class="form--control custom_subdomain" id="custom-subdomain" type="text"
                                   autocomplete="off" value="<?php echo e(old('subdomain')); ?>"
                                   placeholder="<?php echo e(__('Subdomain')); ?>"
                                   style="border:0;border-bottom: 1px solid #595959;width: 100%">
                            <div id="subdomain-wrap"></div>
                        </div>

                        <div class="form-group mt-3">
                            <?php
                                $themes = getAllThemeSlug();
                            ?>
                            <label for="custom-theme"><?php echo e(__('Add Theme')); ?></label>
                            <select class="form-select text-capitalize" name="custom_theme" id="custom-theme">
                                <?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($theme); ?>"><?php echo e($theme); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for=""><?php echo e(__('Select A Package')); ?></label>
                            <select class="form-control package_id_selector" name="package">
                                <option value=""><?php echo e(__('Select Package')); ?></option>
                                <?php $__currentLoopData = \App\Models\PricePlan::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($price->id); ?>" data-id="<?php echo e($price->id); ?>">
                                        <?php echo e($price->title); ?> <?php echo e('('.float_amount_with_currency_symbol($price->price).')'); ?>

                                        - <?php echo e(\App\Enums\PricePlanTypEnums::getText($price->type)); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for=""><?php echo e(__('Payment Status')); ?></label>
                            <select class="form-control" name="payment_status">
                                <option value="complete"><?php echo e(__('Complete')); ?></option>
                                <option value="pending"><?php echo e(__('Pending')); ?></option>
                            </select>
                            <p>
                                <small
                                    class="text-primary"><?php echo e(__('You can set payment status pending or complete from here')); ?></small>
                            </p>
                        </div>

                        <div class="form-group">
                            <label for=""><?php echo e(__('Account Status')); ?></label>
                            <select class="form-control" name="status">
                                <option value="complete"><?php echo e(__('Complete')); ?></option>
                                <option value="pending"><?php echo e(__('Pending')); ?></option>
                            </select>
                            <p>
                                <small
                                    class="text-primary"><?php echo e(__('You can set payment status pending or complete from here')); ?></small>
                            </p>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn btn-success"><?php echo e(__('Create')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="send_mail_to_tenant_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Send Mail To Subscriber')); ?></h5>
                    <button type="button" class="close" data-bs-dismiss="modal"><span>×</span></button>
                </div>
                <form action="<?php echo e(route(route_prefix().'admin.tenant.send.mail')); ?>"
                      id="send_mail_to_subscriber_edit_modal_form" method="post">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="email"><?php echo e(__('Email')); ?></label>
                            <input type="text" readonly class="form-control" id="email" name="email"
                                   placeholder="<?php echo e(__('Email')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="edit_icon"><?php echo e(__('Subject')); ?></label>
                            <input type="text" class="form-control" id="subject" name="subject"
                                   placeholder="<?php echo e(__('Subject')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="message"><?php echo e(__('Message')); ?></label>
                            <input type="hidden" name="message">
                            <div class="summernote"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button id="submit" type="submit" class="btn btn-primary"><?php echo e(__('Send Mail')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.datatable.js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('datatable.js'); ?>
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
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.summernote.js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('summernote.js'); ?>
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
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.custom-js.landloard-unique-subdomain-check','data' => ['name' => 'custom_subdomain']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('custom-js.landloard-unique-subdomain-check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('custom_subdomain')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    

    <script>
        $(document).ready(function () {
            let theme_selected_first = false; // if theme selected first then after domain selection do not change theme again

            $(document).on('click', '.tenant_edit_btn', function () {
                let el = $(this);
                let id = el.data('id');

                let modal = $('#tenant_edit_modal_form');
                modal.find('input[name=tenant_id]').val(id);
                modal.find('input[name=tenant_name]').val(id);
            });


            $(document).on('click', '.payment_log_modal_open_btn', function () {
                let el = $(this);
                let email = el.data('email');
                let name = el.data('name');
                let package = el.data('package');
                let gateway = el.data('gateway');
                let tenant = el.data('tenant');
                let theme = el.data('theme');
                let status = el.data('status');
                let payment_status = el.data('payment_status');
                let transaction_id = el.data('transaction_id');
                let created_at = el.data('created_at');

                let modal = $('#tenant_payment_log_modal');

                let markup = ``;
                markup += `<h4><?php echo e(__('User Information')); ?></h4>`;
                markup += `<hr class="my-2">`;
                markup += `<p><?php echo e(__('User Email:')); ?> ${email}</p>`;
                markup += `<p><?php echo e(__('User Name:')); ?> ${name}</p>`;
                markup += `<p><?php echo e(__('Tenant:')); ?> ${tenant}</p>`;
                markup += `<p><?php echo e(__('Account Status:')); ?> ${status}</p>`;

                markup += `<h4 class='mt-5'><?php echo e(__('Theme Information')); ?></h4>`;
                markup += `<hr class="my-2">`;
                markup += `<p><?php echo e(__('Theme:')); ?> ${theme}</p>`;

                markup += `<h4 class='mt-5'><?php echo e(__('Payment Information')); ?></h4>`;
                markup += `<hr class="my-2">`;
                markup += `<p><?php echo e(__('Package:')); ?> ${package}</p>`;
                markup += `<p><?php echo e(__('Payment Gateway:')); ?> ${gateway}</p>`;
                let color = 'text-danger';
                if (payment_status === 'complete') {
                    color = 'text-success';
                }
                markup += `<p class='${color}'><?php echo e(__('Payment Status:')); ?> ${payment_status}</p>`;
                markup += `<p><?php echo e(__('Transaction ID:')); ?> ${transaction_id}</p>`;
                markup += `<p><?php echo e(__('Payment Date:')); ?> ${created_at}</p>`;

                modal.find('.modal-body').children().remove();
                modal.find('.modal-body').append(markup);
            });

            $(document).on('click', '.tenant_create_payment_log_modal', function (){
                let el = $(this);
                let tenant_id = el.data('id');
                let modal = $('#tenant_create_payment_log_modal');

                modal.find('input#tenant_id').val(tenant_id);
            });

            //Assign Subscription Modal Code
            $(document).on('click', '.user_add_subscription', function () {
                let user_id = $(this).data('id');
                let user = $(this).data('user');
                let status = $(this).data('status');

                $('#subs_user_id').val(user_id);
                let user_wrapper = $('.user-select-wrapper');
                user_wrapper.hide();

                if (!user) {
                    user_wrapper.show();
                }

                let modal = $('#user_add_subscription');
                modal.find(`select option`).attr('selected', false);

                if (status !== undefined)
                {
                    modal.find(`select option[value=${status}]`).attr('selected', true);
                }
            });

            $(document).on('change', '.package_id_selector', function () {
                let el = $(this);
                let form = $('.user_add_subscription_form');
                $('#subs_pack_id').val(el.val());
            });


            let custom_subdomain_wrapper = $('.custom_subdomain_wrapper');
            custom_subdomain_wrapper.hide();
            $(document).on('change', '#subdomain', function (e) {
                let el = $(this);
                let subdomain_type = el.val();

                if (subdomain_type == 'custom_domain__dd') {
                    custom_subdomain_wrapper.slideDown();
                    custom_subdomain_wrapper.find('#custom-subdomain').attr('name', 'custom_subdomain');
                } else {
                    custom_subdomain_wrapper.slideUp();
                    custom_subdomain_wrapper.removeAttr('#custom-subdomain').attr('name', 'custom_subdomain');
                }
            });

            $(document).on('change', '#subdomain', function () {
                let el = $(this).parent().parent().find(".form-group #custom-theme");
                let subdomain = $(this).val();

                if (!theme_selected_first) {
                    $.ajax({
                        url: '<?php echo e(route('landlord.admin.tenant.check.subdomain.theme')); ?>',
                        type: 'POST',
                        data: {
                            _token: '<?php echo e(csrf_token()); ?>',
                            subdomain: subdomain
                        },
                        beforeSend: function () {
                            el.find('option').attr('selected', false);
                        },
                        success: function (res) {
                            el.find("option[value=" + res.theme_slug + "]").attr('selected', true);
                        }
                    });
                }
            });

            $(document).on('change', '#custom-theme', function () {
                theme_selected_first = true;
            });

            $(document).on('submit', '#user_add_subscription_form', function () {
                $(this).find('button[type=submit]').attr('disabled', true);
            });
        });
    </script>

    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {

                $(document).on('click', '.send_mail_to_tenant_btn', function () {
                    var el = $(this);
                    var email = el.data('id');

                    var form = $('#send_mail_to_subscriber_edit_modal_form');
                    form.find('#email').val(email);
                });
                $('.summernote').summernote({
                    height: 300,   //set editable area's height
                    codemirror: { // codemirror options
                        theme: 'monokai'
                    },
                    callbacks: {
                        onChange: function (contents, $editable) {
                            $(this).prev('input').val(contents);
                        }
                    }
                });
            });

        })(jQuery)
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make($route_name.'.admin.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\core\resources\views/landlord/admin/tenant/failed.blade.php ENDPATH**/ ?>