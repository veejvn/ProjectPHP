<?php

namespace App\Controllers\Auth;
use App\Controllers\BaseController;
use App\Traits\UserAuthenticate;
use App\Models\User;

class LoginController extends BaseController
{
    use UserAuthenticate;

    public function showForm()
    {
        return $this->render("auth/login");
    }

    public function login()
    {
        $credentials = $this->getCredentials();
        $user = $this->authenticate($credentials);
        if($user) {

            $user->password = null;
            session()->set('user', serialize($user));

            if(isset($_POST['remember_me'])){

                $str = serialize($credentials);
                $encrypted = encrypt($str,ENCRYPTION_KEY);
                setcookie('credentials', $encrypted, time() + (86400 * 30));
                
            }

            $admin = User::where('username',$user->username)->where('role_id',1)->first();
            if($admin){
                session()->setFlash(\FLASH::SUCCESS, 'Login successfully!');
                session()->set('admin',true);
                $this->redirect('/product');
            }else
            session()->setFlash(\FLASH::SUCCESS, 'Login successfully!');
                $this->redirect('/home');
        }
        else $errors[] ='Username or password is invalid';
        $Data = [
            'errors' => $errors,
        ];
        $this->render('auth/login',$Data);
    }

    public function showInfo()
    {
        $this->render('auth/info');
    }

    public function getCredentialS()
    {
        return [
            'username' => $_POST['username'] ?? null,
            'password' => $_POST['password'] ?? null
        ];
    }

    public function logout(){
        $this->signout();
        // $this->session->setFlash(\FLASH::INFO,'Byte');
        $this->redirect('/home');
    }
}   
