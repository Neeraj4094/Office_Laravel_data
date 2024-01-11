<?php
$servername = "localhost";
$user_name = "root";
$password = "";

try{
    $conn = mysqli_connect($servername,$user_name,$password);
    if(!$conn){
        die("Connection error" . mysqli_error($conn));
    }

    $create_db = "users";
    $create_db_query = "CREATE DATABASE if not exists $create_db";
    $result = mysqli_query($conn,$create_db_query);
    if(!$result){
        die("Database not created " . mysqli_error($conn));
    }
    
    // $use_db = "use $cerate_db";
    mysqli_select_db($conn,$create_db);

    $create_table = "CREATE TABLE if not exists User_details(
        id int(10) AUTO_INCREMENT PRIMARY KEY,
        name varchar(100) not null,
        email varchar(100) not null,
        password varchar(100) not null,
        user_image varchar(100) not null
        )";
    $user_result = mysqli_query($conn,$create_table);
    if(!$user_result){
        die("Database not created " . mysqli_error($conn));
    }

    $create_table = "CREATE TABLE if not exists change_token(
        id int(10) AUTO_INCREMENT PRIMARY KEY,
        name varchar(100) not null,
        email varchar(100) not null,
        password varchar(100) not null,
        token varchar(100) not null,
        expiry_time datetime 
        )";
    $user_result = mysqli_query($conn,$create_table);
    if(!$user_result){
        die("Database not created " . mysqli_error($conn));
    }

}catch(Exception $e){
    die("Error: " . mysqli_error($e));
}
?>