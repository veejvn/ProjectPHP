<?php $this->layout(config('view.layout')); ?>
<?php $this->start("page"); ?>
<div class="container mt-5">
<div class="row">
    <div class="text-center"><h1><span class="find_header text-dark">TÌM KIẾM</span></h1></div>
<?php 
    foreach ($products as $product) 
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