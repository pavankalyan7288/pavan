<?php

include('db.php');


if (isset($_GET['edit'])) {

    $id = $_GET['edit'];
    $editData = edit_data($con, $id);
}

if (isset($_POST['update']) && isset($_GET['edit'])) {

    $id = $_GET['edit'];
    update_data($con, $id);
}


function edit_data($con, $id)
{
    $query = "SELECT * FROM `user-details` WHERE id = $id";
    $result = mysqli_query($con, $query);
    $data = mysqli_fetch_assoc($result);
    return $data;
}


function update_data($con, $id)
{
    $full_name = legal_input($_POST['full_name']);
    $email_address = legal_input($_POST['email_address']);
    $phone_number = legal_input($_POST['phone_number']);
    $password = legal_input($_POST['password']);
    $status = legal_input($_POST['status']);
    $assign_vechicles = legal_input($_POST['assign_vechicles']);

    $query = "UPDATE `user-details`
            SET full_name='$full_name',
                email_address='$email_address',
                phone_number='$phone_number',
                password='$password',
                status='$status',
                assign_vechicles='$assign_vechicles'
            WHERE id=$id";

    $exec = mysqli_query($con, $query);

    if ($exec) {
        header('location: user-table.php');
        
    } else {
        $msg = "Error: " . $query . "<br>" . mysqli_error($con);
        echo $msg;
    }
}


function legal_input($value)
{
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}
?>
