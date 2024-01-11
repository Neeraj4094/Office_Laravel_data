<?php

class errorhandler{
    private function clear_data($data){
        $data = trim($data);
        $result = empty($data) ? "*Invalid" : '';
        return $result;
    }

    public function is_name_valid($name){
        $err = $this->clear_data($name);
        if(!preg_match("/^[a-z ,.'-]+$/i",$name)){
            $err = "*Invalid";
            return $err;
        }
    }
    public function is_email_valid($email){
        $err = $this->clear_data($email);
        if(!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/",$email)){
            $err = "*Invalid";
            return $err;
        }
    }
    public function is_password_valid($password){
        $err = $this->clear_data($password);
        if(!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",$password)){
            $err = "*Invalid";
            return $err;
        }
    }
    public function is_image_valid($image){
        $error = $image['error'];
        $image_name = $image['name'];
        $image_ext = pathinfo($image_name, PATHINFO_BASENAME);
        if(empty($image['error'])){
            $extension = substr($image_ext,-3);
            $ext_list = ['png','jpg'];
            if(!in_array($extension,$ext_list)){
                $err = "Invalid extension";
                return $err;
            }
        }else{
            $err = "Please select Image";
            return $err;
        }
    }
    
}

class insert {
    public function add_users($name,$email,$password,$image,$conn){
        $query = "Insert into user_details(name,email,password,user_image) values('$name','$email','$password','$image')";
        $insert = mysqli_query($conn,$query);
        return $insert;
    }
}

class check_email_exists{
    public function check_is_email_exists($conn,$email){
        $query = "Select * from change_token where email = '$email'";
        $query_data = mysqli_query($conn,$query);
        $fetch = mysqli_fetch_assoc($query_data);
        return $fetch;
    }
    
    public function count_rows($conn,$email){
        $query = "SELECT id from change_token where email='$email'";
        $check_email = mysqli_query($conn,$query);
        $rowcount  = mysqli_num_rows( $check_email );
        return $rowcount;
    }

}


class token_details {
    public function change_token($name,$email,$password,$token,$expiry,$conn){
        $query = "Insert into change_token (name,email,password,token,expiry_time) values('$name','$email','$password','$token','$expiry')";
        $insert = mysqli_query($conn,$query);
        return true;
    }
    public function update_token($token,$expiry,$conn){
        $query = "Update change_token set token= '$token', expiry_time = '$expiry'";
        $update = mysqli_query($conn,$query);
        return true;
    }
}
?>