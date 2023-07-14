<?php

include('db.php');
include('Vechiles.php');

if(isset($_POST['create'])){
    $msg = insert_data($con);
}

function insert_data($con){
    $vechile_name = legal_input($_POST['vechile_name']);
    $vechile_cost = legal_input($_POST['vechile_cost']);
    $phone_number = legal_input($_POST['phone_number']);
    $vechile_owner = legal_input($_POST['vechile_owner']);
    $vechile_no= legal_input($_POST['vechile_no']);
    $status = legal_input($_POST['status']);
    
    $sql = "INSERT INTO `vechiles-details` (vechile_name, vechile_cost, phone_number, vechile_owner, vechile_no,status ) VALUES ('$vechile_name', '$vechile_cost', '$phone_number', '$vechile_owner',' $vechile_no','$status')";

    if(mysqli_query($con, $sql)){
        echo "success";
        header('Location: Vechiles.php' );
    } else {
        echo "error: " . $sql . " " . mysqli_error($con);
    }
}

function legal_input($input){
    return $input;
}

?>