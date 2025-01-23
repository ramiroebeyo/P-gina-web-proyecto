<?php
    include('database/connection.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ims - See users</title>
    </head>
    <body>
        <table>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Created_at</th>
                <th>Updated_at</th>
            </tr>
            <?php 
                $sql = "SELECT id, first_name, last_name, username, email, created_at, updated_at FROM users;";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <tbody>
                <?php foreach($rows as $row): ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['first_name'];?></td>                    
                    <td><?php echo $row['last_name'];?></td>
                    <td><?php echo $row['username'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['created_at'];?></td>
                    <td><?php echo $row['updated_at'];?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="createButtonContainer">
            <a href="add-user.php"><button type="submit">Create User</button></a>
        </div>
    </body>
</html>