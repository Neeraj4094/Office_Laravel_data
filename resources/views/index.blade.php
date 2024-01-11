<?php
$msg = $email = $errmsg = $err_email = $err_password = '';
include 'form_handler.php';
$encryted = $_GET['email'];
$simple_string = $email;

$data = "$encryted";
$method = "AES-256-CBC";
$key = "encryptionKey123";
$options = 0;
$iv = '1234567891011121';
$email = openssl_decrypt($data, $method, $key, $options,$iv);
$token = openssl_encrypt($email, $method, $key, $options,$iv);

if(($_SERVER["REQUEST_METHOD"] == "POST") &&  isset($_POST['update_token'] )){
    $email = !empty($_POST['email']) ? $_POST['email']: '';
    $password = !empty($_POST['password']) ? $_POST['password']: '';
    
    $errorhandler = new errorhandler();
    $token_details = new token_details();
    $check_data = new check_email_exists();
    date_default_timezone_set("Asia/Calcutta");
    $user_data = $check_data->check_is_email_exists($conn,$email);
    
    $user_expiry_time = $user_data['expiry_time'];
    $expiry_time = strtotime($user_expiry_time);
    
    $current_time = strtotime(date('Y-m-d H:i:s'));

    $err_email = $errorhandler->is_email_valid($email);
    $err_password = $errorhandler->is_password_valid($password);
    // echo $expiry_time . "<br>" . $current_time;
    if(empty($err_email) && empty($err_password)){
        if($expiry_time >= $current_time){
            $string = "0123456789qwertzuioplkjhgfdsayxcvbnm";
            $string = str_shuffle($string);
            $string = substr($string, 0, 10);
            date_default_timezone_set("Asia/Calcutta");
            $current_date_time = date('Y-m-d H:i:s');
            $expiry = date("Y-m-d H:i", strtotime($current_date_time . "+150 minutes"));

            $update_token_data = $token_details->update_token($string,$expiry,$conn);
            echo (!$update_token_data) ? ("Error: " . mysqli_error($conn)) : '';
            $errmsg = "Token updated successfully";
        }else{
            $errmsg = "Sorry time expires";
        }
    }else{
        $errmsg = "Please complete te form";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    <h2 class="w-full text-center border bg-green-50"><?php echo $errmsg ?></h2>
    <main class="w-full h-screen flex items-center justify-center">
    <!-- <section class="flex item-center justify-center w-full h-full p-6 border"> -->
        <form action="reset.php?email=<?php echo $data ?>" method="post" class="border  w-96 p-2 pt-8 h-60 rounded-lg space-y-4">
            <div class="grid">
                <label for="email" class="text-lg">Email :-</label>
                <input type="email" name="email" id="email" value="<?php echo $email ?>" placeholder="Enter email" class="border p-1 rounded-lg">
                <small class="text-red-500"><?php echo $err_email ?></small>
            </div>
            <div class="grid">
                <label for="password" class="text-lg">Password :-</label>
                <input type="password" name="password" id="password" value="<?php echo $password ?>" placeholder="Enter password" class="border p-1 rounded-lg">
                <small class="text-red-500"><?php echo $err_password ?></small>
            </div>
            <input type="submit" name="update_token" id="login" value="Login" class="border p-1 px-3 rounded-lg bg-blue-600 text-white">
        </form>
    <!-- </section> -->
    </main>
</body>
</html>