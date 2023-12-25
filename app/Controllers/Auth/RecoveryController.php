<?php

namespace App\Controllers\Auth;
use App\Controllers\BaseController;
use App\Models\User;
use App\Models\Recovery;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class RecoveryController extends BaseController{
    public function showForm(){
        return $this->render("auth/recovery");
    }

    public $errors = [];
    
    public function recovery(){
        $email = $_POST['email'];
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['format_email'] = "Invalid email format";
        }
        $user = User::where('email',$email)->first();
        if(!$user){
            $errors['email'] = "This email has not registered an account";
        }
        if(empty($errors)){
            // Tạo và lưu mã xác minh vào cơ sở dữ liệu
            $verificationCode = $this->generateRandomCode();
            $this->saveVerificationCodeToDatabase($email, $verificationCode);
            // Gửi mã xác minh đến email người dùng
            $this->sendVerificationCodeByEmail($email, $verificationCode);
            // Chuyển hướng người dùng đến trang xác nhận mã xác minh
            if(empty($errors))
                redirect('/confirm_verification');
        }
        $Data = ['errors' => $errors];
        $this->render('auth/recovery',$Data);
    }

    public function generateRandomCode() {
        return bin2hex(random_bytes(4)); // Đây là một ví dụ mã xác minh 8 ký tự
    }

    public function saveVerificationCodeToDatabase($email, $code) {
        // Thực hiện lưu vào cơ sở dữ liệu
        $recovery = Recovery::where("email",$email)->first();
        if($recovery){
            Recovery::where('email',$email)->update(['code' => $code]);
        }else{
            Recovery::insert([
                'email' => $email,
                'code' => $code
            ]);
        }
    }
    
    // Hàm gửi mã xác minh đến email người dùng
    public function sendVerificationCodeByEmail($email, $code) {
        $mail = new PHPMailer(true);

        try {
            // Cài đặt thông tin SMTP
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'vesy19032003@gmail.com';
            $mail->Password   = 'sbzk tgxd oxjn pgcn';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            // Cài đặt người gửi và địa chỉ email của người gửi
            $mail->setFrom('vesy19032003@gmail.com', 'Tiem Banh Kem');

            // Thêm người nhận
            $mail->addAddress($email);

            // Cài đặt tiêu đề và nội dung email
            $mail->Subject = 'Verify account';
            $mail->Body    = "Mã xác nhận của bạn là: $code";

            // Gửi email
            $mail->send();
        } catch (Exception $e) {
            $errors['sendmail'] = "Error when sending email";
        }
    }

    public function showFormConfirm(){
        return $this->render("auth/confirm_verification");
    }

    public function confirm_verification(){
        $param['code'] = $_POST['verification_code'];
        $errors = [];

        $recovery = Recovery::where('code',$param['code'])->first();
        if($recovery){    
            $_SESSION['confirm_verification'] = true;
            $_SESSION['email'] = serialize($recovery->email);
            redirect('/changepassword');
        }else{
            $errors['code'] = "The verification code is incorrect or does not exist";
        }
        $Data = ['errors' => $errors];
        $this->render('auth/confirm_verification',$Data);
    }
}