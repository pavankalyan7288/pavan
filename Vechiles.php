<?php
include('db.php');
$sql = "SELECT * FROM `vechiles-details`";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
    
    .table-data {
        width: 65%;
        margin-right: 8px;
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
        <h2>Vehicles List</h2>
    </div>
    <?php if(mysqli_num_rows($result) > 0): ?>
    <table>
        <tr>
            <th>s.n</th>
            <th>Vehicle Name</th>
            <th>Vehicle Cost</th>
            <th>Phone Number</th>
            <th>Vehicle Owner</th>
            <th>Vehicle Number</th>
            <th>status</th>
            <th>edit</th>
            <th>remove</th>
            <th>add</th>
        </tr>
        
        <?php
        $sn = 1;
        while ($row = mysqli_fetch_assoc($result)):
        ?>
        <tr>
            <td><?php echo $sn; ?></td>
            <td><?php echo $row['vechile_name']; ?></td>
            <td><?php echo $row['vechile_cost']; ?></td>
            <td><?php echo $row['phone_number']; ?></td>
            <td><?php echo $row['vechile_owner']; ?></td>
            <td><?php echo $row['vechile_no']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><a href="edit-form.php?edit=<?php echo $row['id']; ?>">edit</a></td>
            <td><a href="remove-script.php?remove=<?php echo $row['id']; ?>">remove</a></td>
            <td><a href="add.php?add=<?php echo $row['id']; ?>">Add</a></td>
        </tr>
        <?php
        $sn++;
        endwhile;
        ?>
        
    </table>
    <?php else: ?>
        <p>No Data Found</p>
    <?php endif; ?>
    
</div>

</body>
</html>
