<?php
   include('db.php');
   $sql = "SELECT * FROM `user-details` ORDER BY id DESC";
   $result = mysqli_query($con, $sql);
  
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Users</title>
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
    
    .table-data{
        width: 65%;
        margin-right:8px;
        /* float: right; */
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
</style>
</head>
<body>


<div class="table-data">
    <div class="list-title">
        <h2>Users List</h2>
    </div>

    <table border="1">
        <tr>
            <th>S.N</th>
            <th>full_name</th>
            <th>email_address</th>
            <th>phone_number</th>
            <th>password</th>
            <th>status</th>
            <th>assign_vechicles</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Create</th>
        </tr>
        
        <?php
        if(mysqli_num_rows($result) >0) {
            $sn = 1;
            // foreach($fetchData as $data) {
                while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $sn; ?></td>
            <td><?php echo $row['full_name']; ?></td>
            <td><?php echo $row['email_address']; ?> </td>
            <td><?php echo $row['phone_number']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php
                if($row['status']=="1")
                echo "Active";
            else 
                echo "Inactive";
            ?>                          
            </td> 
            <td><?php echo $row['assign_vechicles']; ?></td>
            <td><a href="update-form.php?edit=<?php echo $row['id']; ?>">Edit</a></td>
            <td><a href="delete-script.php?delete=<?php echo $row['id']; ?>">Delete</a></td>
            <td><a href="create.php"?Create=<?php echo $row['id']; ?>">Create</a></td>
        </tr>
        <?php
            $sn++;
            }
        } else {
        ?>
        <tr>
            <td colspan="9">No Data Found</td>
        </tr>
        <?php
        }
        ?>
    </table>
</div>

</body>
</html>
