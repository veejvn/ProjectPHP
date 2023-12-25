<?php $this->layout(config('view.layout')); ?>
<?php $this->start("page"); ?>
<div class="change_password_form">
<?php
    if (isset($_SESSION['confirm_verification']) && $_SESSION['confirm_verification'] === true) {
        $action = '/changepassword_confirm_verification';
    } else {
        $action = '/changepassword';
    }
?>
    <form action="<?php echo $action; ?>" method="POST">
        <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $err) {
                        echo "<li>$err</li>";
                    } ?>
                </ul>
            </div>
        <?php endif; ?>
        <!-- Old Password input -->
        <h1>Đổi Mật Khẩu</h1>
        <?php if(!isset($_SESSION['confirm_verification'])) 
            echo '
            <div class="form-outline mb-4">
            <input type="password" id="old_password" class="form-control" placeholder="Old Password" name="old_password" required />
            </div>
        ';     
        ?>        
        <!-- New Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="new_password" class="form-control" placeholder="New Password" name="new_password" required />
        </div>
        <!-- Confirm New Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="confirm_password" class="form-control" placeholder="Confirm New Password" name="confirm_password" required />
        </div>
        <!-- Submit button -->
        <div class="text-center">
            <button type="submit" class="btn btn-secondary btn-block mb-4">Change Password</button>
        </div>
    </form>
</div>
<?php $this->stop(); ?>