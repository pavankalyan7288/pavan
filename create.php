<?php

include('db.php');
include('user-table.php');

if(isset($_POST['create'])){
    $msg = insert_data($con);
}

// insert query
/* function insert_data($con){
    $full_name = legal_input($_POST['full_name']);
    $email_address = legal_input($_POST['email_address']);
    $phone_number = legal_input($_POST['phone_number']);
    $password = legal_input($_POST['password']);
    $status = legal_input($_POST['status']);
    $assign_vechicles = legal_input($_POST['assign_vechicles']); */

   /*  $query = "INSERT INTO `user-details` (`full name`, `email address`, `Phone number`, `Password`, `Status`, `Assign Vechiles`) VALUES ('$full_name', '$email_address', '$phone_number', '$password', '$status', '$Assign_Vechiles')";
    $exec = mysqli_query($con, $query);
    if ($exec) {
        $msg = "Data was created successfully";
        return $msg;
    } else {
        $msg = "Error: " . $query . "<br>" . mysqli_error($con);
        return $msg;
    } */


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

    <form method="post" action="create-script.php">
        <label>full_name</label>
        <input type="text" placeholder="Enter Full Name" name="full_name" required>
        <label>email_address</label>
        <input type="email" placeholder="Enter Email Address" name="email_address" required>
        <label>phone_number</label>
        <input type="number" placeholder="Enter Phone Number" name="phone_number" required>
        <label>Password</label>
        <input type="password" placeholder="Enter Password" name="password" required>   
        <select name="status" style="text-align:left;padding:10px;font-size:15px;color:black;font-weight:bold;">
        <option value="inactive">Inactive</option>
        <option value="active">Active</option>
        </select><br>

        <label>assign_vechicles</label>
        <input type="text" placeholder="Enter Assign Vehicles" name="assign_vechicles" required>
          
        <button type="submit" name="create">Submit</button>
    </form>
</div>

</body>
</html>
