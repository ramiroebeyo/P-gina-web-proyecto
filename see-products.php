<?php
    session_start();
    if(!isset($_SESSION['user'])) header('location: index.php');
    $user = $_SESSION['user']; 
    $_SESSION['table'] = 'users';
    
    if(strlen($user['first_name']) > 12){
        $user['first_name'] = substr($user['first_name'], 0, 10);
        $user['first_name'] .= "...";
    }
    include('database/connection.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ims - See products</title>
        <link rel="stylesheet" type="text/css" href="css/dashboard.css">
        <link rel="stylesheet" type="text/css" href="css/topNav.css">
        <link rel="stylesheet" type="text/css" href="css/sidebar.css">
        <link rel="stylesheet" type="text/css" href="css/see-tables.css">
        <script src="https://kit.fontawesome.com/c3935f05a0.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div id="dashboardContainer">
            <?php include('partials/sidebar.php');?>
            <div class="contentIcons" id="contentIcons">
                <?php include('partials/topNav.php'); ?>
                <div class="content">
                    <div class="contentMain">
                        <div>
                            <label for="table" class="products">Products</label>
                            <div class="tableContainer">
                                <table class="seeTable">
                                    <thead>
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
                                    </thead>
                                    
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
                            </div>      
                            <div class="createButtonContainer">
                                <a href="add-product.php"><button type="submit">Create Product</button></a>
                            </div>                 
                        </div>
                    </div>
                </div>  
            </div>        
        </div>
        <script src="js/script.js"></script>        
    </body>
</html>