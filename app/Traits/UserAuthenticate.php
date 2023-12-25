<?php

namespace App\Traits;

use App\Models\User;

trait UserAuthenticate
{
    
    public function authenticate($credentials)
    {
        $user = User::where(['username'=>$credentials['username']])->first();
        if($user){
            // Check password with password_hash in Database
            if(password_check($credentials['password'],$user->password)){
                return $user;
            }
        }
        return null;
    }

    public function signout(){
        //unset($_SESSION['user']);
        session()->remove('user');
        session()->remove('admin');
        if(isset($_COOKIE['credentials'])){
            setcookie('credentials', null, time() - 3600);
        }
    }
}