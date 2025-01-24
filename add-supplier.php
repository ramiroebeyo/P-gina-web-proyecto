<?php
session_start();
if(!isset($_SESSION['user'])) header('location: index.php');
$user = $_SESSION['user']; 
$_SESSION['table'] = 'suppliers';

if(strlen($user['first_name']) > 12){
    $user['first_name'] = substr($user['first_name'], 0, 10);
    $user['first_name'] .= "...";
} 
?>

<!DOCTYPE html>
<html lang='en'>    
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>IMS - Supplier</title>
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="css/topNav.css">
    <link rel="stylesheet" type="text/css" href="css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="css/sidebarSubMenu.css">
    <link rel="stylesheet" type="text/css" href="css/add-product.css">
    <script src="https://kit.fontawesome.com/c3935f05a0.js" crossorigin="anonymous"></script>
</head>
<body>
    <script>
        // elimina el scroll
        //document.addEventListener("DOMContentLoaded", () => {
            // Asegura que el `html` y `body` estén configurados correctamente
            //document.documentElement.style.overflow = "hidden";
            //document.documentElement.style.height = "100%";
            //document.body.style.overflow = "hidden";
            //document.body.style.height = "100%";
        //});
    </script>

    <div id="dashboardContainer">
        <?php include('partials/sidebar.php');?>
        <div class="contentIcons" id="contentIcons">
            <?php include('partials/topNav.php'); ?>
                <div class="content">
                    <div class="contentMain">
                        <div id="productFormContainer">
                            <form action="database/supplier-add.php" method="POST" class="productForm">
                                <div class="productFormInputContainer">
                                    <label for="supplier_name">Supplier Name</label>
                                    <input type="text" class="productFormInput" id="supplier_name" name="supplier_name"/>
                                </div>
                                <div class="productFormInputContainer">
                                    <label for="supplier_location">Supplier Location</label>
                                    <textarea class="productFormInput productDescriptionTextarea" id="supplier_location" name="supplier_location"/></textarea>
                                </div>
                                <div class="productFormInputContainer">
                                    <label for="supplier_description">Supplier Description</label>
                                    <textarea class="productFormInput productDescriptionTextarea" id="supplier_description" name="supplier_description"/></textarea>
                                </div>
                                <div class="productFormInputContainer">
                                    <label for="email">Supplier Email</label>
                                    <input type="email" class="productFormInput" id="email" name="email"/>
                                </div>
                                <div>
                                    <button type="submit" class="productBtn"><i class="fa fa-plus"></i> Create Supplier </button>
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