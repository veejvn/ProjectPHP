<?php

namespace App\Controllers\Auth;
use App\Models\User;
use App\Controllers\BaseController;

class RegisterController extends BaseController
{
    public function showform(){
        return $this->render('auth/register');
    }
    
    public function register()
    {
        $param['full_name'] = $_POST['full_name'];
        $param['phone_number'] = $_POST['phone_number'];
        $param['address'] = $_POST['address'];  
        $param['email'] = $_POST['email'];
        $param['username'] = $_POST['username'];
        $param['password'] = $_POST['password'];
        $param['repeated_password'] = $_POST['repeted_password'];

        $errors = [];

        // Validate Username
        $pattern = '/^[a-zA-Z0-9_]{6,20}$/';
        if(!preg_match($pattern, $param['username'])){
            $errors['username'] = "Only letters, numbers, underscore and at least 6 characters long allowed";
        }

        //Validate email
        if(!filter_var($param['email'], FILTER_VALIDATE_EMAIL)){
            $errors['email'] = "Invalid email format";
        }
        
        //Validate password
        $pattern = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/';
        if(!preg_match($pattern, $param['password'])){
            $errors['password'] = "Password must contains at least one capitalize letter, number and special character.";
        }

        //Validate cofirm_password
        if($param['password'] !== $param['repeated_password']){
            $errors['repeated_password'] = "Password does not match";
        }

        $user = User::where('username',$param['username'])->first();
        if($user) $errors['username'] = "This username is already taken. Please choose another one.";
        //Kiểm tra chỉ duy nhất 1 email
        $user = User::where('email',$param['email'])->first();
        if($user) $errors['email'] = "This email is already taken. Please use email another one.";

        // var_dump($_POST['terms']);
        // exit();

        if(!isset($_POST['terms'])) $errors['terms'] = 'You need to agree with the terms to continue the registration.';

        if(empty($errors)){
            User::insert([
                'fullname'=>$param['full_name'],
                'phone_number'=>$param['phone_number'],
                'email'=>$param['email'],
                'address'=>$param['address'],
                'username'=>$param['username'],
                'password'=> password_encrypt($param['password']),
                'role_id'=> '2',
            ]);
            redirect('/login');
        }
        $Data = [
            'errors' => $errors,
        ];
        $this->render('auth/register',$Data);
    }
}