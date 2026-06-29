<?php $__env->startSection('title'); ?>
    <?php echo e(__('Admin Health')); ?>

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

    <style>
        .issue-animation{
            animation: zoom ease-in-out 2s infinite;
        }

        @keyframes zoom {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.25);
            }
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $display_errors =  "ini_get method not allowed";
        $memory_limit =  "ini_get method not allowed";
        $post_max_size =  "ini_get method not allowed";
        $max_execution_time =  "ini_get method not allowed";
        $upload_max_filesize =  "ini_get method not allowed";

        $issues = 0;
        if (function_exists('ini_get')){
            // GTR = Greater, EQL = Equal
            $display_errors =  ini_get("display_errors");
            $memory_limit =  ini_get("memory_limit"); //Must be GTR or EQL 512
            $post_max_size =  ini_get("post_max_size"); //Must be GTR or EQL 128
            $max_execution_time =  ini_get("max_execution_time"); //Must be GTR or EQL 300
            $upload_max_filesize =  ini_get("upload_max_filesize"); //Must be GTR or EQL 128

            foreach (
                [
                    [(int)str_replace('M','',$memory_limit), 512],
                    [(int)str_replace('M','',$post_max_size), 128],
                    [(int)$max_execution_time, 300],
                    [(int)str_replace('M','',$upload_max_filesize), 128]
                ] ?? [] as $item)
                {
                    if (current($item) < last($item))
                    {
                        $issues++;
                    }
                }
        }
    ?>

    <div class="row">
        <div class="col-sm-6 m-auto">
            <?php if($issues > 0): ?>
                <div class="alert alert-danger">
                    <p><strong class="text-danger"><?php echo __(number_to_word($issues) . ' ' . ($issues > 1 ? 'issues detected!' : 'issue detected!')); ?></strong></p>
                    <p><?php echo e(__('If all necessary values are not configured correctly, it may affect the system’s functionality')); ?></p>
                </div>
            <?php endif; ?>

            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    PHP version
                    <span class="badge badge-info badge-pill">
                        <?php
                            echo "V"." ".phpversion();
                        ?>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php echo e(__('MySQL version')); ?>

                    <span class="badge badge-info badge-pill">
                        <?php
                            echo "V"." ". DB::select("SELECT VERSION() as version")[0]->version;
                        ?>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Laravel version
                    <span class="badge badge-info badge-pill">
                    <?php
                        echo "V"." ".app()->version();
                    ?>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php echo e(__('Database create permission')); ?>

                    <?php
                        $website_has_permission_to_create_database = get_static_option('website_has_permission_to_create_database');
                    ?>
                    <span
                        class="badge <?php if($website_has_permission_to_create_database === 'yes'): ?> badge-success <?php else: ?> badge-danger <?php endif; ?>  badge-pill"><?php echo e($website_has_permission_to_create_database); ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php echo e(__('Wildcard subdomain')); ?>

                    <?php
                        $website_has_permission_to_create_database = get_static_option('website_has_permission_to_create_database');
                    ?>
                    <span
                        class="badge <?php if($website_has_permission_to_create_database == 'yes'): ?> badge-success <?php else: ?> badge-danger <?php endif; ?> badge-pill"><?php echo e($website_has_permission_to_create_database); ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php echo e(__('Wildcard SSL')); ?>

                    <?php
                        $website_wildcard_subdomain_working = get_static_option('website_wildcard_subdomain_working');
                    ?>
                    <span
                        class="badge <?php if($website_wildcard_subdomain_working == 'yes'): ?> badge-success <?php else: ?> badge-danger <?php endif; ?> badge-pill"><?php echo e($website_wildcard_subdomain_working); ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php echo e(__('Cron Job')); ?>

                    <?php
                        $website_cron_job = get_static_option('website_cron_job');
                    ?>
                    <span
                        class="badge <?php if($website_cron_job == 'yes'): ?> badge-success <?php else: ?> badge-danger <?php endif; ?> badge-pill"><?php echo e($website_cron_job); ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <p> <?php echo e(__('Memory Limit')); ?> <small class="d-block"><?php echo e(__('recommended memory limit is 512MB')); ?></small></p>
                    <span class="badge <?php echo e(str_replace('M','',$memory_limit) >= 512 ? 'badge-success' : 'badge-danger issue-animation'); ?> badge-pill"><?php echo e($memory_limit); ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <p> <?php echo e(__('Maximum Execution Time')); ?> <small
                            class="d-block"><?php echo e(__('recommended maximum execution time is 300')); ?></small></p>

                    <span class="badge <?php echo e($max_execution_time >= 300 ? 'badge-success' : 'badge-danger issue-animation'); ?> badge-pill"><?php echo e($max_execution_time); ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php echo e(__('Display Errors')); ?>

                    <span
                        class="badge <?php if($display_errors == 'Off'): ?> badge-danger <?php else: ?> badge-success <?php endif; ?> badge-pill"><?php echo e($display_errors); ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <p> <?php echo e(__('Max File Upload Size')); ?> <small class="d-block"><?php echo e(__('recommended post size is 128M')); ?></small></p>
                    <span class="badge <?php echo e(str_replace('M','',$upload_max_filesize) >= 128 ? 'badge-success' : 'badge-danger issue-animation'); ?> badge-pill"><?php echo e($upload_max_filesize); ?></span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <p> <?php echo e(__('Post Max Size')); ?> <small class="d-block"><?php echo e(__('recommended post size is 128M')); ?></small></p>
                    <span class="badge <?php echo e(str_replace('M','',$post_max_size) >= 128 ? 'badge-success' : 'badge-danger issue-animation'); ?> badge-pill"><?php echo e($post_max_size); ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php echo e(__('Database engine')); ?>

                    <span
                        class="badge badge-info badge-pill"><?php echo e(\Config::get('database.connections.mysql.engine')); ?></span>
                </li>

                <li class="list-group-item d-flex  justify-content-start align-items-center flex-wrap">
                    <p class="d-block mb-3"><?php echo e(__('Php Extension list')); ?></p>
                    <?php
                        $colors = ["badge-success",'badge-primary','badge-secondary','badge-danger','badge-warning'];
                    ?>
                    <?php $__currentLoopData = get_loaded_extensions() ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ext): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="badge badge-secondary badge-pill m-1 extension"><?php echo e($ext); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </li>


            </ul>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <!-- Start datatable js -->
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
    <script>
        (function($){
            "use strict";
            $(document).ready(function() {
                $(document).on('click','.user_change_password_btn',function(e){
                    e.preventDefault();
                    var el = $(this);
                    var form = $('#user_password_change_modal_form');
                    form.find('#ch_user_id').val(el.data('id'));
                });
                $('#all_user_table').DataTable( {
                    "order": [[ 0, "desc" ]]
                } );

            } );

        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(route_prefix().'admin.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\core\resources\views/landlord/admin/health.blade.php ENDPATH**/ ?>