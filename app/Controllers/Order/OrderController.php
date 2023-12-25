<?php

namespace App\Controllers\Order;

use App\Controllers\BaseController;
use App\Models\Orderdetail;
use App\Models\Order;

class OrderController extends BaseController
{
    public function showCart()
    {
        $this->render("order/Cart");
    }

    
    public function AddCart()
    {
        
        if(is_null(auth())) redirect("/login");;
        
        $params = [];
        $params["user_id"] = auth()->id;
        $params["product_id"] = $_POST["id"];
        $params["quantity"] = $_POST["quantity"];
        $params["price"] = $_POST["price"];
        $params["total_money"] = $_POST["quantity"]*$_POST["price"];

        

        $order = Orderdetail::where('user_id', $params["user_id"])->where('product_id', $params["product_id"])->where('order_id','=',null)->first();
        if($order){
        $order->number = $order->number+$params['quantity'];
        $order->total_money = $order->number*$order->price;
        $order->save();
        }else
        {
            Orderdetail::insert([
                        "user_id" => $params["user_id"],
                        "product_id" => $params["product_id"],
                        "number" => $params["quantity"],
                        "price" => $params["price"],
                        "total_money" => $params["total_money"],
                    ]);
        }
        
        if(isset($_POST['buynow'])) redirect('/cart');
        redirect("/product");

    }

    public function delete()
    {
        $id = $_GET['id'];
        $order = Orderdetail::where('user_id', auth()->id)->where('product_id', $id)->first();
        $order->delete();
        $order->save();

        redirect('/cart');
    }
    
    public function placeOrder()
    {

        $validate = Orderdetail::where('user_id','=', auth()->id)->where('order_id','=',null)->first();
        if(!$validate) redirect('/cart');

        $user = auth();
        $params = [];

        $params['user_id'] = $user->id;
        $params['fullname'] = $user->fullname;
        $params['email'] = $user->email;
        $params['phone_number'] = $user->phone_number;
        $params['address'] = $user->address;
        $params['total_money'] = $_POST['total_money'];

        
        
        Order::insert($params);
        $id = Order::orderby('id','desc')->first()->id;
        $orders = Orderdetail::where('user_id','=',auth()->id)->where('order_id','=',null)->get();
        foreach ($orders as $order) {
            $order->order_id = $id;
            $order->save();
        }
        redirect('/home');
    }
}

?>