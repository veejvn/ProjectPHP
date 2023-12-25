<?php $this->layout(config('view.layout')); ?>
<?php $this->start("page"); ?>
<div class="verify_code_page">
    <form action="/confirm_verification" method="POST">
        <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $err) {
                        echo "<li>$err</li>";
                    } ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Verification code input -->
        <h1>Nhập Mã Xác Thực</h1>
        <p>Chúng tôi đã gửi mã xác thực đến mail của bạn. Vui lòng kiểm tra và nhập đúng mã xác thực để đổi lại mật khẩu</p>
        <div class="form-outline mb-4">
            <input type="text" id="verification_code" class="form-control" placeholder="Verification Code" name="verification_code" required />
        </div>

        <!-- Submit button -->
        <div class="text-center">
            <button type="submit" class="btn btn-secondary btn-block mb-4">Verify Code</button>
        </div>
    </form>
</div>
<?php $this->stop(); ?>