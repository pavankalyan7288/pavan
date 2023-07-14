<?php

include("db.php");
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    delete_data($con, $id);
}

function delete_data($con, $id){
    $query = "DELETE FROM `user-details` WHERE id = $id";
    $exec = mysqli_query($con, $query);

    if($exec){
        header('location: user-table.php');
        exit;
    } else {
        $msg = "Error: " . $query . "<br>" . mysqli_error($con);
        echo $msg;
    }
}
?>
