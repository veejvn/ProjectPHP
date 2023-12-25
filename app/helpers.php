<?php
use App\Models\User;

if (!function_exists("config")) {
    function config($key)
    {
        $config = $GLOBALS["config"];

        return $config->get($key);
    }
}

if (!function_exists("redirect")) {
    function redirect($location)
    {
        if (ob_get_level()) {
            ob_end_clean();
        }

        header("Location: $location");
        exit();
    }
}

if (!function_exists("auth")) {
    function auth()
    {
        $userSerialize = session()->get('user');

        $user = $userSerialize ? unserialize($userSerialize) : null;
        
        return $user;
    }
}

if (!function_exists('check_login')) {

    function check_login(){
        return isset($_POST['user']) ? true : false;
    }
}

if (!function_exists("encrypt")) {
    function encrypt($pureString, $encryptionKey)
    {
        $ciphering = "AES-128-CTR";

        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;

        $encryption_iv = "12312432425345";
        $encryption = openssl_encrypt($pureString, $ciphering, $encryptionKey, $options, $encryption_iv);

        return $encryption;
    }
}

if(!function_exists('password_encrypt')){
    function password_encrypt($password){
        $options = [
            'cost'=>12,
        ];
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }
}

if(!function_exists('password_check')){
    function password_check($password,$password_hash){
        return password_verify($password,$password_hash);
    }
}
   
if(!function_exists('session')){
    /**
     * Tra ve symfony session object
     * 
     * @return \App\Http\Session\Session
     */
    function session(){
        /**
         * @var \App\Http\Session\Session
         */
        $session = $GLOBALS['session'];
        return $session;
    }
}
if(!function_exists('cookie')){
    /**
     * Tra ve cookie duoc browser submit kem theo
     * 
     * @return \Symfony\Component\HttpFoundation\InputBag
     * 
     */
    function cookie(){
        $cookies = request()->cookies;
        return $cookies;
    }
}
if(!function_exists('request')){
    /**
     * Return trquest handler
     * 
     * @return \App\Http\Request
     */
    function request(){
        /**
         * @var \App\Http\Request
         */
        $request = $GLOBALS['request'];
        return $request;
    }
}

class Flash
{
    public const SUCCESS = 'success';
    public const WARNING = 'warning';
    public const INFO = 'info';
    public const ERROR = 'error';
}