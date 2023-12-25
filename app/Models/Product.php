<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    
    /**
     * Tên bảng
     * 
     * @var string
     */
    protected $table ='Products';

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
        'id',
        'category_id',
        'title',
        'price',
        'thumbnail',
        'description',
    ];
    

}