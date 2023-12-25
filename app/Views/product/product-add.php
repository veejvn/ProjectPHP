<?php $this->layout(config('view.layout')); ?>
<?php $this->start("page"); ?>
<div class="product-add">
    <form action="/add_product" method="POST">
        <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $err) {
                        echo "<li>$err</li>";
                    } ?>
                </ul>
            </div>
        <?php endif; ?> 
        <h1>Thêm Sản Phẩm</h1>
        <div class="form-outline mb-4">
            <input type="text" id="new_products_id" class="form-control" placeholder="New Product ID" name="new_products_id" required />
        </div>      
        <div class="form-outline mb-4">
            <input type="number" id="new_category_id" class="form-control" placeholder="New Category ID" name="new_category_id" required />
        </div>
        <div class="form-outline mb-4">
            <input type="text" id="new_title" class="form-control" placeholder="New Title" name="new_title" required />
        </div>
        <div class="form-outline mb-4">
            <input type="number" id="new_price" class="form-control" placeholder="New Price" name="new_price" required />
        </div>
        <div class="form-outline mb-4">
            <input type="text" id="new_description" class="form-control" placeholder="New Description" name="new_description" required />
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-secondary btn-block mb-4">Add Product</button>
        </div>
    </form>
</div>
<?php $this->stop(); ?>