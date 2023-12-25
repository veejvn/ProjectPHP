<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recovery extends Model
{
    use SoftDeletes;

    /**
     * Tên bảng
     * 
     * @var string
     */
    protected $table ='recovery';

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
        'email',
        'code'
    ];
    
}