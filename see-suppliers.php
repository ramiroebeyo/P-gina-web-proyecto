<?php
    session_start();
    if(!isset($_SESSION['user'])) header('location: index.php');
    $user = $_SESSION['user']; 
    $_SESSION['table'] = 'suppliers';
    
    if(strlen($user['first_name']) > 12){
        $user['first_name'] = substr($user['first_name'], 0, 10);
        $user['first_name'] .= "...";
    }
    include('database/connection.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ims - See suppliers</title>
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
                            <label for="table" class="products">Suppliers</label>
                            <div class="tableContainer">
                                <table class="seeTable">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Supplier Name</th>
                                            <th>Supplier cuit</th>
                                            <th>Supplier location</th>
                                            <th>Supplier Description</th>
                                            <th>Supplier Email</th>
                                            <th>Created_by</th>
                                            <th>Created_at</th>
                                            <th>Updated_at</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    
                                    <?php 
                                        $sql = "SELECT * FROM suppliers;";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute();
                                        
                                        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <tbody>
                                        <?php foreach($rows as $row): ?>
                                        <tr>
                                            <td><?php echo $row['id'];?></td>
                                            <td><?php echo $row['supplier_name'];?></td> 
                                            <td><?php echo $row['supplier_cuit'];?></td>                    
                                            <td><?php echo $row['supplier_location'];?></td>
                                            <td><?php echo $row['supplier_description'];?></td>                                    
                                            <td><?php echo $row['supplier_email'];?></td>
                                            <td><?php echo $row['created_by'];?></td>
                                            <td><?php echo $row['created_at'];?></td>
                                            <td><?php echo $row['updated_at'];?></td>
                                            <td class="editBtn"> 
                                                <a href="edit-supplier.php?id=<?php echo $row['id'];?>"><i class="fa fa-pen-to-square"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>      
                            <div class="createButtonContainer">
                                <a href="add-supplier.php" class="add"><button type="submit">Add Supplier</button></a>
                            </div>
                            <div class="downloadButtonContainer">
                                <a href="download-suppliers.php"class="download" ><button type="submit">Download to Excel</button></a>
                            </div>          
                        </div>
                    </div>
                </div>  
            </div>        
        </div>
        <script src="js/script.js"></script>        
    </body>
</html>