<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    /**
     * Tên bảng
     * 
     * @var string
     */
    protected $table ='orders';

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
        'fullname',
        'email',
        'phone_number',
        'address',
        'note',
        'status',
        'total_money',
    ];
}

?>