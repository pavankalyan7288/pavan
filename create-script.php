<?php

include('db.php');
include('user-table.php');

if(isset($_POST['create'])){
    $msg = insert_data($con);
}

function insert_data($con){
    $full_name = legal_input($_POST['full_name']);
    $email_address = legal_input($_POST['email_address']);
    $phone_number = legal_input($_POST['phone_number']);
    $password = legal_input($_POST['password']);
    $status = legal_input($_POST['status']);
    $assign_vechicles = legal_input($_POST['assign_vechicles']);

    $sql = "INSERT INTO `user-details` (full_name, email_address, Phone_number, password, status, assign_vechicles) VALUES ('$full_name', '$email_address', '$phone_number', '$password', '$status', '$assign_vechicles')";

    if(mysqli_query($con, $sql)){
        echo "success";
        header('Location: user-table.php' );
    } else {
        echo "error: " . $sql . " " . mysqli_error($con);
    }
}

function legal_input($input){
    return $input;
}

?>