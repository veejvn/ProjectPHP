<?php 
    use App\Models\User;
    $user = User::where('id',auth()->id)->first();
    $this->layout(config('view.layout')); 
?>
<?php $this->start("page"); ?>
<main class="main-content" role="main">
    <section class="user_profile">
        <div class="container">
            <div class="row text-dark your_account">
                <h1><b>Tài khoản của bạn</b></h1>
            </div>
            <div class="row">
                <div class="col text-dark col_left">
                    <h2>Lịch sử giao dịch</h2>
                    <p>Bạn chưa có đơn hàng nào nào</p>
                </div >
                <div class="col text-dark col_right">
                    <h2>Thông tin tài khoản</h2>
                    <p>Tên tài khoản: <?= $user->fullname?></p>
                    <p>Email: <?= $user->email?></p>
                    <p>Số điện thoại: <?= $user->phone_number?></p>
                    <p>Địa chỉ: <?= $user->address?></p>
                </div>
            </div>
        </div>
    </section>


</main>
<?php $this->stop(); ?>