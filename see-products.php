<?php
    include('database/connection.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ims - See products</title>
    </head>
    <body>
        <table>
            <tr>
                <th>Id</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Location</th>
                <th>Quantity</th>
                <th>Created_by</th>
                <th>Created_at</th>
                <th>Updated_at</th>
            </tr>
            <?php 
                $sql = "SELECT id, product_name, description, location, quantity, created_by, created_at, updated_at FROM products;";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <tbody>
                <?php foreach($rows as $row): ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['product_name'];?></td>                    
                    <td><?php echo $row['description'];?></td>
                    <td><?php echo $row['location'];?></td>
                    <td><?php echo $row['quantity'];?></td>
                    <td><?php echo $row['created_by'];?></td>
                    <td><?php echo $row['created_at'];?></td>
                    <td><?php echo $row['updated_at'];?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="createButtonContainer">
            <a href="add-product.php"><button type="submit">Create Product</button></a>
        </div>
    </body>
</html>