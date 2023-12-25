<?php $this->layout(config('view.layout')); ?>
<?php $this->start("css"); ?>
<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
<?php $this->stop(); ?>
<?php $this->start("page"); ?>
<div id="wrapper">
<div class="owl-carousel">
  <div>
    <img src="assets/images/home-banner1.webp" alt="">
  </div>
  <div>
    <img src="assets/images/home-banner2.webp" alt="">
  </div>
  <div>
    <img src="assets/images/home-banner3.webp" alt="">
  </div>
  <div>
    <img src="assets/images/home-banner4.webp" alt="">
  </div>
</div>
</div>
<div class="index-title"><h1>SẢN PHẨM TIÊU BIỂU</h1></div>
<div class="container">
    <div class="row">
      <?php
      use App\Models\Product;

      foreach (Product::where('category_id','=',3)->take(8)->get() as $product) 
      {
        
          echo "<div class=\"col-md-3 col-sm-6\">
          <div class=\"product\">
            <div class=\"product-header\">
            <img src=\"assets/images/".$product->products_id.".png\" class=\"product-img\">
            </div>
            <div class=\"product-footer\">
              <div class=\"product-title\"><b>".$product->title."</b></div>
              <div class=\"text-center\" style=\"color:black\">$product->products_id</div>
              <div class=\"product-order\">
              <div class=\"product-price\"><b>".number_format($product->price,0,",",".")."đ</b></div>
              <a href=\"/detail?id=".$product->products_id."\"><div class=\"product-btn\"><i class=\"fa fa-shopping-cart\" aria-hidden=\"true\"></i></div></a>
              </div>
            </div>
          </div>
        </div>";
      }
    ?>
    </div>
</div>
<?php $this->stop(); ?>
<?php $this->start("js"); ?>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/home-owl-carousel.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
<?php $this->stop(); ?>