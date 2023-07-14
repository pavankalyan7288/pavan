<?php
include('db.php');

$fetchData = fetch_data($con);

function fetch_data($con){
  $sql = "SELECT * FROM `user-details` ORDER BY id DESC";
  $result = mysqli_query($con, $sql);
  
  if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
      // Access the data from each row
      $id = $row['id'];
      $full_name = $row['full_name'];
      $email_address = $row['email_address'];
      $phone_number = $row['phone_number'];
      $password = $row['password'];
      $status = $row['status'];
      $assign_vechicles = $row['assign_vechicles'];
      
      // Display the data or perform other operations
      echo "ID: " . $id . "<br>";
      echo "full_name: " . $full_name . "<br>";
      echo "email_address: " . $email_address . "<br>";
      echo "phone_number: " . $phone_number . "<br>";
      echo "password: " . $password . "<br>";
      echo "status: " . $status . "<br>";
      echo "assign_vechicles: " . $assign_vechicles . "<br>";
      echo "<hr>";
    }
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
  }
  
  mysqli_close($con);
}
?>
