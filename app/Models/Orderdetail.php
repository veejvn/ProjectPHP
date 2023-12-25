<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orderdetail extends Model
{
    use SoftDeletes;

    /**
     * Tên bảng
     * 
     * @var string
     */
    protected $table ='order_detail';

    /**
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Danh sách các thuột tính
     * 
     * @var array
     */
    protected $fillable = [
        'user_id',
        'order_id',
        'product_id',
        'number',
        'price',
        'total_money',
    ];
}

?>