<?php

include('db.php');
include('Vechiles.php');

if(isset($_POST['create'])){
    $msg = insert_data($con);
}


function legal_input($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Vehicles</title>
<style>
    
body{
    overflow-x: hidden;
}

* {
  box-sizing: border-box;
}

.user-details form {
    height: 100vh;
    border: 2px solid #f1f1f1;
    padding: 16px;
    background-color: white;
}

.user-details{
    width: 30%;
    float: left;
}

input{
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

button[type=submit] {
    background-color: #434140;
    color: #ffffff;
    padding: 10px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
    font-size: 20px;
}

label{
    font-size: 18px;
}

button[type=submit]:hover {
    background-color:#3d3c3c;
}

.form-title a, .form-title h2{
    display: inline-block;
}

.form-title a{
    text-decoration: none;
    font-size: 20px;
    background-color: green;
    color: honeydew;
    padding: 2px 10px;
}
 
</style>
</head>
<body>

<div class="user-details">
    <div class="form-title">
        <h2>Create Form</h2>
    </div>
 
    <p style="color:red"><?php if(!empty($msg)){echo $msg; }?></p>

    <form method="post" action="add-script.php">
        <label>vechile_name</label>
        <input type="text" placeholder="Enter vechile_name" name="vechile_name" required>
        <label>vechile_cost</label>
        <input type="number" placeholder="Enter vechile_cost" name="vechile_cost" required>
        <label>phone_number</label>
        <input type="number" placeholder="Enter Phone Number" name="phone_number" required>
        <label>vechile_owner</label>
        <input type="text" placeholder="Enter vechile_owner" name="vechile_owner" required> 
        <label>vechile_no</label>
        <input type="number" placeholder="Enter vechile_no" name="vechile_no" required>
        <select name="status" style="text-align:left;padding:10px;font-size:15px;color:black;font-weight:bold;">
        <option value="inactive">Inactive</option>
        <option value="active">Active</option>
        </select><br><br>
        <button type="submit" name="create">Submit</button>
    </form>
</div>

</body>
</html>
