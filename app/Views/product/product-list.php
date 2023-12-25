<div class="product-list list">
    <div class="row">
    <?php echo "<div class=\"row\">";
        $count = 0;
        $delete;
        $modify;
    ?>
        <?php foreach ($items as $item): ?>
            <?php $count++; ?>
            <!-- if(session()->get('admin') === true)
                {
                    $delete = '<a href="/product-delete" class="remove-item delete-product" data-id="'.$item->products_id.'" data-return-url="'.request()->fullUrl().'"><i class="fa-solid fa-trash"></i></a>';
                    $modify = '<a href="/update_product" class="modify-item"><i class="fa-solid fa-pen-to-square"></i></a>';
                }
            else;
                $delete = '' -->
            <div class="col-md-3 col-sm-6">
                    <div class="product">
                        <div class="product-header">
                            <img src="assets/images/<?= $item->products_id ?>.png" class="product-img">
                        </div>
                        <div class="product-footer">
                            <div class="product-title"><b><?= $item->title ?></b></div>
                            <div class="text-center" style="color:black"><?= $item->products_id ?></div>
                            <div class="product-order">
                                <div class="product-price"><b><?= number_format($item->price,0,",",".") ?></b></div>
                                <a href="/detail?id=<?= $item->products_id ?>"><div class="product-btn"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div></a>
                                <?php if(session()->get('admin') === true): ?>
                                <a href="/product-delete" class="remove-item delete-product" data-id="<?= $item->products_id ?>" data-return-url="<?= request()->fullUrl() ?>"><i class="fa-solid fa-trash"></i></a>
                                <a href="/update_product?id=<?= $item->products_id ?>" class="modify-item"><i class="fa-solid fa-pen-to-square"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php if ($count % 4 === 0) {
                echo '</div>'; // Đóng hàng hiện tại
                echo '<div class="row">'; // Mở một hàng mới
                echo '</div>';
            } ?>
        <?php endforeach; ?>
</div>
<!-- Hiển thị phân trang bên dưới bảng -->
<div class="pagination">
    <?= $this->insert('partials/pagination', ['paginator' => $paginator]); ?>
</div>
<?= $this->insert('product/product-delete'); ?>