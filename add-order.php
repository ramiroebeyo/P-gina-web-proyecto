<?php
session_start();
if(!isset($_SESSION['user'])) header('location: index.php');
$user = $_SESSION['user']; 
$_SESSION['table'] = 'orders';

if(strlen($user['first_name']) > 12){
    $user['first_name'] = substr($user['first_name'], 0, 10);
    $user['first_name'] .= "...";
} 

include('database/connection.php');
?>

<!DOCTYPE html>
<html lang='en'>    
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>IMS - Add-order</title>
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="css/topNav.css">
    <link rel="stylesheet" type="text/css" href="css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="css/add-user.css">
    <link rel="stylesheet" type="text/css" href="css/add-product.css">
    <script src="https://kit.fontawesome.com/c3935f05a0.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="dashboardContainer">
        <?php include('partials/sidebar.php');?>
        <div class="contentIcons" id="contentIcons">
            <?php include('partials/topNav.php'); ?>
                <div class="content">
                    <div class="contentMain">
                        <div id="userFormContainer">
                            <form action="database/order-add.php" method="POST" class="userForm">
                                <div class="productFormInputContainer">
                                    <label for="location">Product ordered</label>
                                    <?php 
                                            $sql = "SELECT product_name FROM products;";
                                            $stmt = $conn->prepare($sql);
                                            $stmt->execute();
                                            
                                            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                    <select name="product" class="productFormInput"> 
                                        <?php foreach($rows as $row): ?>
                                            <option><?php echo $row['product_name'];?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="userFormInputContainer">
                                    <label for="ordered_quantity">quantity</label>
                                    <input type="number" class="userFormInput" id="ordered_quantity" name="ordered_quantity"/>
                                </div>
                                <div class="productFormInputContainer">
                                    <label for="supplier">Supplier</label>
                                    <?php 
                                            $sql = "SELECT supplier_name FROM suppliers;";
                                            $stmt = $conn->prepare($sql);
                                            $stmt->execute();
                                            
                                            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                    <select name="supplier" class="productFormInput"> 
                                        <?php foreach($rows as $row): ?>
                                            <option><?php echo $row['supplier_name'];?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div>
                                    <button type="submit" class="userBtn"><i class="fa fa-plus"></i> Add order </button>
                                </div>
                            </form>
                            <?php if(isset($_SESSION['response'])){ 
                                    $response_message = $_SESSION['response']['message'];
                                    $is_success = $_SESSION['response']['success'];
                                ?>
                                <div class="responseMessage">
                                    <p class="responseMessage <?= $is_success ? 'responseMessage__success' : 'responseMessage__error' ?>">
                                        <?= $response_message ?>    
                                    </p>
                                </div>
                            <?php unset($_SESSION['response']); } ?>
                        </div>
                    </div>
                </div>  
        </div>        
    </div>
    
    <script src="js/script.js"></script>
</body>
</html>