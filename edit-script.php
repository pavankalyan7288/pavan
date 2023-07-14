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
    $query = "SELECT * FROM `vechiles-details` WHERE id = $id";
    $result = mysqli_query($con, $query);
    $data = mysqli_fetch_assoc($result);
    return $data;
}

function update_data($con, $id)
{
    $vechile_name = legal_input($_POST['vechile_name']);
    $vechile_cost = legal_input($_POST['vechile_cost']);
    $phone_number = legal_input($_POST['phone_number']);
    $vechile_owner = legal_input($_POST['vechile_owner']);
    $vechile_no = legal_input($_POST['vechile_no']);
    $status = legal_input($_POST['status']);

    $query = "UPDATE `vechiles-details`
              SET vechile_name ='$vechile_name',
                  vechile_cost='$vechile_cost',
                  phone_number='$phone_number',
                  vechile_owner='$vechile_owner',
                  vechile_no='$vechile_no',
                  status='$status'
              WHERE id=$id";

    $exec = mysqli_query($con, $query);

    if ($exec) {
        header('Location: vechiles.php');
        exit();
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

