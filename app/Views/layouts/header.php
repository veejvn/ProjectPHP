<header>
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="/home"><img src="assets/images/logo.webp" style="width: 90px;" class="" alt=""></a>
            </div>
            <div class="col-md-2">
                <form action="/find" method="POST" class="header_searching_bar">
                    <input type="text" class="header_searching_bar_text" placeholder="Tìm kiếm..." name="data" />
                    <button class="header_searching_bar_button"><i class="fa fa-search" onclick="" type="submit"></i></button>
                </form>
            </div>
            <div class="col-md-2 phone">
                <a href="" class="header_info">
                    <i class="fa fa-phone header_icon"></i>
                    <span>0961 452 578</span>
                </a>
            </div>
            <div class="col-md-2 shop_system">
                <a href="" class="header_info">
                    <i class="fa fa-building header_icon"></i>
                    <span>Hệ thống cửa hàng</span>
                </a>
            </div>
            <!-- Có điều chỉnh -->
            
                <?php if (auth()) : ?>
                    <div class="col-md-2 account">
                        <a href="/info" class="header_info">
                            <i class="fa fa-user header_icon"></i>
                            <span>Chào,<?= auth()->fullname ?></span>
                        </a>
                    </div>
                    <div class="col-md-1">
                        <a href="/logout" class="header_logout">
                            <i class="fa fa-sign-out header_icon" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="col">
                        <a href="/changepassword" class="header_change">
                            <i class="fas fa-lock header_icon"></i>
                        </a>
                    </div>         
                <?php else : ?>
                    <div class="col">
                    <a href="/login" class="header_info">
                        <i class="fa fa-user header_icon"></i>
                        <span>Tài khoản</span>
                    </a>
                    </div>                  
                <?php endif; ?>           
            <div class="col">
                <a href="/cart" class="header_info">
                    <i class="fa fa-shopping-bag header_icon position-relative">
                        <?php use App\Models\Orderdetail; if(auth()) : ?>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <?php
                                $orders = Orderdetail::where('user_id',auth()->id)->where('order_id',NULL)->count();
                                echo $orders;
                            ?>
                            <span class="visually-hidden">unread messages</span>
                        </span>
                        <?php endif; ?>
                    </i>

                    <span></span>
                </a>
            </div>
        </div>
    </div>
    </div>
    <div class="lower">
        <div class="row">
            <nav>
                <div>
                    <ul class="main-menu">
                        <li><a href="/home">TRANG CHỦ</a></li>
                        <li><a href="/product">BÁNH SINH NHẬT <i class="fa fa-angle"></i></a></li>
                        <li><a href="#">LIÊN HỆ</a></li>
                        <li><a href="#">TIN TỨC KHUYẾN MẠI</a></li>
                    </ul>
                </div>
            </nav>
        </div>
</header>