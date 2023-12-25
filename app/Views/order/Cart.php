<?php $this->layout(config('view.layout')); ?>
<?php $this->start("page"); ?>
    <br><h1 class="text-center"><B>GIỎ HÀNG</B></h1><br>
    <div class="container">
        <form action="/cart" method="POST">
                <table class="table">
                    <tr>
                        <th class="cart_headertext">STT</th>
                        <th class="cart_headertext">Hình ảnh</th>
                        <th class="cart_headertext">Tên sản phẩm</th>
                        <th class="cart_headertext">Đơn giá</th>
                        <th class="cart_headertext">Số lượng</th>
                        <th class="cart_headertext">Thành tiền</th>
                        <th class="cart_headertext"></th>
                    </tr>
                    
                    <?php
                    use App\Models\Orderdetail;
                    use App\Models\Product;

                    if(auth()){
                        $i=1;
                        $total = 0;
                        foreach (Orderdetail::where('user_id','=', auth()->id)->where('order_id','=', null)->get() as $order) {
                        $product = Product::where("products_id", $order->product_id)->first();
                        echo "<tr>
                            <td>".$i."</td>
                            <td><img src=\"assets/images/".$product->products_id.".png\" class=\"product-img\"></td>
                            <td><b>".$product->title."</b></td>
                            <td class=\"cart_total\">".number_format($order->price,0,".",",")."đ</td>
                            <td>".$order->number."</td>
                            <td class=\"cart_total\">".number_format($order->total_money,0,".",",")."đ</td>
                            <td><a href=\"cart/delete?id=".$order->product_id."\">Xóa</a></td>
                            </tr>";
                        $i++;
                        $total += $order->total_money;
                        }
                    }
                    ?>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Tổng tiền: <?php if(auth()) echo "<span class=\"cart_total\">".number_format($total,0,".",",")."đ</span><input type=\"hidden\" name=\"total_money\" value=\"".$total."\">";?></td>
                        <td></td>
                    </tr>
                </table>  

                <div class="container text-center">
                <td><?php if(auth()) echo"<button type=\"submit\" class=\"cart_button\"><b>THANH TOÁN</b></button>"?></td> 
                </div><br>
        </form>
    </div>
<?php $this->stop(); ?>
