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
                            <label for="table" class="products">Locations</label>
                            <table class="seeTable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Location Name</th>
                                        <th>Location Description</th>
                                        <th>Created_by</th>
                                        <th>Created_at</th>
                                        <th>Updated_at</th>
                                    </tr>
                                </thead>
                                
                                <?php 
                                    $sql = "SELECT * FROM locations;";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();
                                    
                                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                                <tbody>
                                    <?php foreach($rows as $row): ?>
                                    <tr>
                                        <td><?php echo $row['id'];?></td>
                                        <td><?php echo $row['location_name'];?></td>                    
                                        <td><?php echo $row['location_description'];?></td>
                                        <td><?php echo $row['created_by'];?></td>|
                                        <td><?php echo $row['created_at'];?></td>
                                        <td><?php echo $row['updated_at'];?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div class="createButtonContainer">
                                <a href="add-location.php"><button type="submit">Add Location</button></a>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>        
        </div>
        <script src="js/script.js"></script>        
    </body>
</html>