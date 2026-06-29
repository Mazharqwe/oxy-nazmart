<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <?php
                        if (auth('admin')->user()->image != null)
                        {
                            $image_id = auth('admin')->user()->image;
                        } else {
                            $image_id = get_static_option('placeholder_image');
                        }
                    ?>

                    <?php if($image_id != null): ?>
                        <?php echo render_image_markup_by_attachment_id($image_id,'','full',true); ?>

                    <?php else: ?>
                        <img src="<?php echo e(asset('assets/landlord/uploads/media-uploader/no-image.jpg')); ?>" alt="">
                    <?php endif; ?>
                    <span class="login-status online"></span>
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2"><?php echo e(auth('admin')->user()->name); ?></span>
                    <span class="text-secondary text-small"><?php echo e(auth('admin')->user()->username); ?></span>
                </div>
                <?php if(auth('admin')->user()->email_verified === 1): ?>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                <?php endif; ?>
            </a>
        </li>
        <?php echo \App\Facades\LandlordAdminMenu::render_sidebar_menus(); ?>

    </ul>
</nav>
<?php /**PATH C:\laragon\www\core\resources\views/landlord/admin/partials/sidebar.blade.php ENDPATH**/ ?>