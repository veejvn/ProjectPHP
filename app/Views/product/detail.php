<?php
    use App\Models\Product;

    $product = Product::where('products_id', $_GET["id"])->first();

    $this->layout(config('view.layout')); 
?>
<?php $this->start("page"); ?>
<div class="wrapper_bread">
    <div class="content ">
    <div class="text"><b>GATEUAX KEM TƯƠI</b></div>
    </div>
</div>
<img src="" alt="">
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <?php
                echo "<img src=\"assets/images/".$product->products_id.".png\" class=\"detail_img\">";
            ?>
        </div>
        <div class="col-md-8 col-sm-12">
            <div class="row">
                <div class="detail_description">
                    <h2><?= $product->title?></h2>
                    <hr>
                    <p>Mã sản phẩm: <?=$product->products_id ?></p>
                    <form action="/detail" method="POST">
                        <span>Giá: <b><?= number_format($product->price,0,",",".")?></b>đ</span><br><br>
                        <input type="hidden" name="id" value="<?=$product->products_id ?>">
                        <input type="hidden" name="price" value="<?=$product->price ?>">
                        <span>Số lượng: <input name="quantity" type="number" class="detail_quantity" value="1" min="1" max="50"></span><br>
                        <br><button type="submit" class="detail_button addcart"><b>THÊM VÀO GIỎ HÀNG</b></button><button type="submit" name= "buynow" class="detail_button buynow"><b>MUA NGAY</b></button>
                    </form>
                </div>
            </div>
            <br>
        </div>
    </div>
    <br>
</div>
<?php $this->stop(); ?>
