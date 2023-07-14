<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Logout handling
if (isset($_GET['logout'])) {
    /*session_unset('username');*/
    session_destroy();
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>DASHBOARD</title>
    <link rel="stylesheet" href="style.css" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicles</title>
    <style>
    table, td, th {
        border: 1px solid #ddd;
        text-align: left;
        
    }
    
    table {
        border-collapse: collapse;
        max-width: 100%;
        width: 90%;
    }
    
    .table-container {
        width: 65%;
        margin-right: 20px;
    }
    
    .table-data {
        margin-top: 30px;
    }
    
    th, td {
        padding: 15px;
    }
    
    body {
        overflow-x: hidden;
    }
    
    * {
        box-sizing: border-box;
    }
    * {
  margin: 0px;
  padding: 0px;
  box-sizing: border-box;
}

body {
  font-family: Georgia, "Times New Roman", Times, serif;
  color: white;
  background-color: black;
}

.container {
  max-width: 90rem;
  margin: 2rem auto;
  padding: 0px 2rem;
}

.img-fluid {
  max-width: 100%;
}
nav {
  display: flex;
  justify-content: space-between;
  padding: 1rem 3rem;
  align-items: center;
}

.items {
  display: flex;
  align-items:center;
  gap: 30px;
  margin: 50px;
  
}

.items a:link {
  text-decoration: none;
  color: white;
  font-size: 1.5rem;
  font-weight: bold;
}

.items a:hover {
  color: red;
}

.active {
  color: red !important;
}

button {
  font-size: 2rem;
  padding: 0.6rem 1rem;
  font-weight: bold;
  color: white;
  background: linear-gradient(to right, #c31432, #892211);
  border-radius: 10px;
  box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
  cursor: pointer;
  border: none;
}

button:hover {
  background: white;
  outline: 1px solid red;
  color: red;
  border: none;
}

.row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  justify-content: center;
  align-items: center;
}


</style>
</head>
<body>
         <p style="text-align:right;font-size:30px;color:red;font-weiht:bold;float:right;"><a href="logout.php">Logout</a></p><br><br>
         <p style="text-align:right;font-size: 20px;color:red;font-weight:bold;float:right;">Hey, <?php echo $_SESSION['username']; ?>!</p><br><br>
         <p style="background-color:#666;padding: 30px; text-align: center;font-size: 35px;color: white;margin-bottom:90px;">WELCOME TO DASHBOARD</p>
    <div class="items">
         <a href="Menu.php" class="active">Menu</a>
         <a href="Home.php">Home</a>
         <a href="Vechiles.php">Vechiles</a>
         <a href="user-table.php">Users</a>
         <a href="About.php">About</a>
        
    </div
    <?php
    include('db.php');
     
    $query = "SELECT * FROM `user-details` WHERE status = 'active'";
     $result = mysqli_query($con, $query);

     if (mysqli_num_rows($result) > 0) {
        echo "Active Vechiles:<br>";
        echo "<table>";
        echo "<tr>";
        echo "<th>s.n</th>";
        echo "<th>full_name</th>";
        echo "<th>email_address</th>";
        echo "<th>Phone Number</th>";
        echo "<th>password</th>";
        echo "<th>status</th>";
        echo "<th>assign_vechicles</th>";
        echo "</tr>";

    $sn = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $sn . "</td>";
        echo "<td>" . $row['full_name'] . "</td>";
        echo "<td>" . $row['email_address'] . "</td>";
        echo "<td>" . $row['phone_number'] . "</td>";
        echo "<td>" . $row['password'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "<td>" . $row['assign_vechicles'] . "</td>";
        echo "</tr>";
        $sn++;
    }

    echo "</table>";
} else {
    echo "No active users found.";
}
     
?>
   
<?php
    include('db.php');
     
    $query = "SELECT * FROM `vechiles-details` WHERE status = 'active'";
     $result = mysqli_query($con, $query);

     if (mysqli_num_rows($result) > 0) {
        echo "Active Users:<br>";
        echo "<table>";
        echo "<tr>";
        echo "<th>s.n</th>";
        echo "<th>Vehicle Name</th>";
        echo "<th>Vehicle Cost</th>";
        echo "<th>Phone Number</th>";
        echo "<th>Vehicle Owner</th>";
        echo "<th>Vehicle Number</th>";
        echo "<th>Status</th>";
        echo "</tr>";

    $sn = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $sn . "</td>";
        echo "<td>" . $row['vechile_name'] . "</td>";
        echo "<td>" . $row['vechile_cost'] . "</td>";
        echo "<td>" . $row['phone_number'] . "</td>";
        echo "<td>" . $row['vechile_owner'] . "</td>";
        echo "<td>" . $row['vechile_no'] . "</td>";
        echo "<td>" . $row['Status'] . "</td>";
        echo "</tr>";
        $sn++;
    }

    echo "</table>";
} else {
    echo "No active users found.";
}
     
?>
</body>
</html>