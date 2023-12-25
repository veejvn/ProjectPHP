<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    /**
     * Tên bảng
     * 
     * @var string
     */
    protected $table ='users';

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
        'fullname',
        'phone_number',
        'email',
        'address',
        'username',
        'password',
        'role_id',
    ];
    
}