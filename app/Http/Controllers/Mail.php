<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Mail extends Controller
{
    public function mail_transfer(){
        $this->mail('neeraj.waveinfotech@gmail.com' , 'dcwdcwdcvv');
        echo "done";
    }
    public function mail($email, $string ){
        $mail_to = "$email";

        $data = "$email";
        $method = "AES-256-CBC";
        $key = "encryptionKey123";
        $options = 0;
        $iv = '1234567891011121';
        $encemail = openssl_encrypt($data, $method, $key, $options,$iv);

        $mail_from = "neeraj.waveinfotech@gmail.com";
        $header = "From: $mail_from";

        $url = " ";
        $body = "Please click on the link http://localhost/user_details/mail/reset.php?token=$string&email=$encemail";
        $title = "Change Token ";

        if(mail($mail_to,$title,$body,$header)){
            $errmsg = "Mail sent successfully. Please check your mail ";
        }else{
            $errmsg = "Some error occurred";
        }
    }
}
