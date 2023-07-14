<?php

include("db.php");
if(isset($_GET['remove'])){
    $id = $_GET['remove'];
    remove_data($con, $id);
}

function remove_data($con, $id){
    $query = "DELETE FROM `vechiles-details` WHERE id = $id";
    $exec = mysqli_query($con, $query);

    if($exec){
        header('location: vechiles.php');
        exit;
    } else {
        $msg = "Error: " . $query . "<br>" . mysqli_error($con);
        echo $msg;
    }
}
?>
