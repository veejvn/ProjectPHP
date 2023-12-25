<?php $this->layout(config('view.layout')); ?>
<?php $this->start("page"); ?>
<div class="forgot_password_form">
    <form action="/recovery" method="POST">
        <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $err) {
                        echo "<li>$err</li>";
                    } ?>
                </ul>
            </div>
        <?php endif; ?>
        <h1>Khôi Phục Mật Khẩu</h1>
        <!-- Email input -->
        <p>Nhập email đã đăng kí tài khoản của bạn để khôi phục mật khẩu</p>
        <div class="form-outline mb-4">
            <input type="email" id="email" class="form-control" placeholder="Email" name="email" required />
        </div>
        <!-- Submit button -->
        <div class="text-center">
            <button type="submit" class="btn btn-secondary btn-block mb-4">Reset Password</button>
        </div>
    </form>
</div>

<?php $this->stop(); ?>