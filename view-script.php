<?php
include('db.php');

$fetchData = fetch_data($con);

function fetch_data($con){
  $sql = "SELECT * FROM `vechiles-details` ORDER BY id DESC";
  $result = mysqli_query($con, $sql);
  
  if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
      // Access the data from each row
      $id = $row['id'];
      $vechile_name = $row['vechile_name'];
      $vechile_cost= $row['vechile_cost'];
      $phone_number = $row['phone_number'];
      $vechile_owner = $row['vechile_owne'];
      $vechile_no = $row['vechile_no'];
      $status = $row['status'];
      
      
      // Display the data or perform other operations
      echo "ID: " . $id . "<br>";
      echo "vechile_name: " . $vechile_name . "<br>";
      echo "vechile_cost: " . $vechile_cost . "<br>";
      echo "phone_number: " . $phone_number . "<br>";
      echo "vechile_owner: " . $vechile_owner . "<br>";
      echo "vechile_no: " . $vechile_no . "<br>";
      echo "status: " . $status . "<br>";
      echo "<hr>";
    }
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
  }
  
  mysqli_close($con);
}
?>
