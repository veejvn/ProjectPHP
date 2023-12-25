<?php $this->layout(config('view.layout')); ?>
<?php $this->start("page"); ?>

<div class="wrapper_bread">
    <div class="content ">
    <div class="text"><b>GATEUAX KEM TƯƠI</b></div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="text-dark">Danh sách bánh kem</h3>    
            </div>
            <?php 
                if(session()->get('admin') === true)
                    $delete = '<div class="col-4 add_product">
                                    <a href="/add_product">Thêm Sản Phẩm</a>
                                </div>';
                else
                    $delete = '';         
            ?>
            <?php echo $delete ?>
        </div>          
        <div class="row">
            <div class="col-12" id="product-list">
                <?php 
                    $this->insert("product/product-list", ["items" => $items, "paginator" => $paginator]);
                ?>
            </div>
        </div>
    </div>
</div>
<?php $this->stop(); ?>

<?php $this->start("js"); ?>
    <?php $this->insert("product/product-script"); ?>
<?php $this->stop(); ?>
