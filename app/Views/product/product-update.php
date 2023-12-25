<?php $this->layout(config('view.layout')); ?>
<?php $this->start("page"); ?>
<div class="product-update">
    <form action="/update_product" method="POST">
        <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $err) {
                        echo "<li>$err</li>";
                    } ?>
                </ul>
            </div>
        <?php endif; ?> 
        
        <h1>Chỉnh Sửa Sản Phẩm</h1>
        <div class="form-outline mb-4">
            <input type="text" id="products_id" class="form-control" placeholder="Product ID" name="products_id" value="<?= $product->products_id ?>" required />
        </div>      
        <div class="form-outline mb-4">
            <input type="number" id="category_id" class="form-control" placeholder="Category ID" name="category_id" value="<?= $product->category_id ?>" required />
        </div>
        <div class="form-outline mb-4">
            <input type="text" id="title" class="form-control" placeholder="Title" name="title" value="<?= $product->title ?>" required />
        </div>
        <div class="form-outline mb-4">
            <input type="number" id="price" class="form-control" placeholder="Price" name="price" value="<?= $product->price ?>" required />
        </div>
        <div class="form-outline mb-4">
            <input type="text" id="description" class="form-control" placeholder="Description" name="description" value="<?= $product->description ?>" required />
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-secondary btn-block mb-4">Change Product</button>
        </div>
    </form>
</div>
<?php $this->stop(); ?>