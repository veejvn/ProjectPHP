<?php
namespace App\Controllers\Product;

use App\Controllers\BaseController;
use App\Http\Paginator;
use App\Http\Response;
use App\Models\Orderdetail;
use App\Models\Product;
use App\Traits\PaginatorTrait;

class ProductController extends BaseController 
{
    use PaginatorTrait;

    public function showPage(){
        $items = Product::paginate($this->getPerPage());
        $total = Product::count();
        
        $paginator = new Paginator($this->request, $items, $total);

        $paginator->onEachSide(2);      

        $this->render("product/product",[
            'items' => $items,
            'paginator' => $paginator
        ]);
    }

    public function showDetail(){
        $this->render("product/detail");
    }

    public function find(){
        $products = Product::where('title', 'LIKE', '%' . $_POST['data'] . '%')->get();
        $Data = [
            'products' => $products,
        ];
        $this->render('product/find',$Data);
    }

    public function product_delete(){
        $id = $this->request->post('id');
        $product = Product::where('products_id',$id);

        if($product){
            $product->delete();
        }
        $return_url = $this->request->post('return_url','/home');
        return $this->redirect($return_url);
    }  
    
    public function showFormAdd(){
        $this->render('product/product-add');
    }

    public function showFormUpdate(){
        $id = $this->request->get('id');
        $product = Product::where('products_id',$id)->first();
        $data = [
            'product' => $product
        ];
        
        $this->render('product/product-update',$data);
    }

    public function add_product(){
        $param['new_products_id'] = $this->request->post('new_products_id');
        $param['new_category_id'] = $this->request->post('new_category_id');
        $param['new_title'] = $this->request->post('new_title');
        $param['new_price'] = $this->request->post('new_price');
        $param['new_description'] = $this->request->post('new_description');
        
        $errors = [];

        $product = Product::where('products_id',$param['new_products_id'])->first();

        if($product)
            $errors['products_id'] = 'This product already exists, please enter another product';
        if(empty($errors)){
            Product::insert([
                'products_id' => $param['new_products_id'],
                'category_id' => $param['new_category_id'],
                'title' => $param['new_title'],
                'price' => $param['new_price'],
                'description' => $param['new_description']
            ]);
            $this->redirect('/product');
        }
        $Data = [
            'errors' => $errors,
        ];
        $this->render('product/product-add',$Data);
    }
    
    public function update_product(){
        $param['products_id'] = $this->request->post('products_id');
        $param['category_id'] = $this->request->post('category_id');
        $param['title'] = $this->request->post('title');
        $param['price'] = $this->request->post('price');
        $param['description'] = $this->request->post('description');
        
        $errors = [];

        $product = Product::where('products_id',$param['products_id'])->first();

        if(!$product)
            $errors['products_id'] = 'This product does not exist, please enter another product';
        if(empty($errors)){
            Product::where('products_id',$product->products_id)->update([
                        'category_id' => $param['category_id'],
                        'title' => $param['title'],
                        'price' => $param['price'],
                        'description' => $param['description']
            ]);
            $this->redirect('/product');
        }
        $Data = [
            'errors' => $errors,
        ];
        $this->render('product/product-update',$Data);
    }
}