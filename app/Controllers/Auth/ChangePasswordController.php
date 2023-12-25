<?php

namespace App\Controllers\Auth;
use App\Controllers\BaseController;
use App\Models\User;
use App\Models\Recovery;

class ChangePasswordController extends BaseController{
    public function showForm()
    {
        return $this->render("auth/changepassword");
    }
    public function changepassword(){
        $param['old_password'] = $_POST['old_password'];
        $param['new_password'] = $_POST['new_password'];
        $param['confirm_password'] = $_POST['confirm_password'];

        $errors = [];

        $user = User::where('id',auth()->id)->first();
        if(!password_check($param['old_password'],$user->password)){
            $errors['old_password'] = "Old password entered incorrectly";
        }

        $pattern = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/';;
        if(!preg_match($pattern, $param['new_password'])){
            $errors['new_password'] = "Only letters, numbers, underscore and at least 6 characters long allowed";
        }
        
        if( $param['confirm_password'] != $param['confirm_password']){
            $errors['confirm_password'] = "Re-enter the wrong password";
        }

        if(empty($errors)){
            User::where('id', $user->id)->update(['password' => password_encrypt($param['new_password'])]);
            redirect('/home');
        }
        $Data = ['errors' => $errors];
        $this->render('auth/changepassword',$Data);
    }
    // Hàm đổi mật khẩu dùng cho xác thực
    public function changepassword_confirm_verification(){
        $param['new_password'] = $_POST['new_password'];
        $param['confirm_password'] = $_POST['confirm_password'];
        $errors = [];

        $pattern = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/';;
        if(!preg_match($pattern, $param['new_password'])){
            $errors['new_password'] = "Only letters, numbers, underscore and at least 6 characters long allowed";
        }
        
        if( $param['confirm_password'] != $param['confirm_password']){
            $errors['confirm_password'] = "Re-enter the wrong password";
        }

        $user = User::where('email',unserialize($_SESSION['email']))->first();
        if(empty($errors)){
            User::where('id', $user->id)->update(['password' => password_encrypt($param['new_password'])]);
            Recovery::where('email',$user->email)->delete();
            unset($_SESSION['confirm_verification']);
            unset($_SESSION['email']);           
            redirect('/login');
        }
        $Data = ['errors' => $errors];
        $this->render('auth/changepassword',$Data);
    }

    
}