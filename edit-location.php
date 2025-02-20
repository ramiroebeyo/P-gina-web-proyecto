<?php
session_start();
if(!isset($_SESSION['user'])) header('location: index.php');
$user = $_SESSION['user']; 
$_SESSION['table'] = 'locations';

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
    <title>IMS - Edit Location</title>
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="css/topNav.css">
    <link rel="stylesheet" type="text/css" href="css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="css/sidebarSubMenu.css">
    <link rel="stylesheet" type="text/css" href="css/add-product.css">
    <link rel="stylesheet" type="text/css" href="css/see-tables.css">
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
                        <div>
                        </div>
                        <div id="productFormContainer">
                            <?php
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                                
                                $sql = "SELECT * FROM locations WHERE id =? LIMIT 1;";
                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(1, $id, PDO::PARAM_INT);
                                $stmt->execute();
                                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                            ?>
                                <form action="database/location-add.php" method="POST" class="productForm">
                                    <input type="hidden" name="id" value="<?= $user['id']; ?>"/>
                                    <div class="productFormInputContainer">
                                        <label for="location_name">Location Name</label>
                                        <input type="text" class="productFormInput" id="location_name" name="location_name" value="<?= $user['location_name']; ?>"/>
                                    </div>
                                    <div class="productFormInputContainer">
                                        <label for="location_description">Location Description</label>
                                        <textarea class="productFormInput productDescriptionTextarea" id="location_description" name="location_description" value="<?= $user['location_description']; ?>"/><?= $user['location_description']; ?></textarea>
                                    </div>
                                    <div>
                                        <button type="submit" name="edit_btn" class="productBtn"><i class="fa fa-plus"></i> Edit Location </button>
                                    </div>
                                </form>
                            <?php } ?>                          
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