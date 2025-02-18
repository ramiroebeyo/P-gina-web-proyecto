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
                            <?php 
                                $sqlSupp = "SELECT supplier_name FROM suppliers;";
                                $stmtSupp = $conn->prepare($sqlSupp);
                                $stmtSupp->execute();
                                
                                $rowsSupp = $stmtSupp->fetchAll(PDO::FETCH_ASSOC);

                                $sqlLoc = "SELECT location_name FROM locations;";
                                $stmtLoc = $conn->prepare($sqlLoc);
                                $stmtLoc->execute();
                                
                                $rowsLoc = $stmtLoc->fetchAll(PDO::FETCH_ASSOC);
                            ?>
                            <form action="see-products.php" method="GET" class="filterForm">
                                <select name="supplier" class="filterSelect"> 
                                    <div class="filterOptions">
                                        <option> Filter </option>
                                        <?php foreach($rowsSupp as $row): ?>
                                            <option><?php echo $row['supplier_name'];?></option>
                                        <?php endforeach; ?>
                                        <?php foreach($rowsLoc as $row): ?>
                                            <option><?php echo $row['location_name'];?></option>
                                        <?php endforeach; ?>                                            
                                    </div>
                                </select>
                                <a href="see-products.php">
                                    <button type="submit" name="filter_btn" style="background: rgb(223, 223, 223); border: 1px solid rgba(108, 108, 108, 0.628); border-radius: 7px; font-size: 20px; padding: 15px;" onmousedown="this.style.background='rgb(200, 200, 200)'" onmouseup="this.style.background='rgb(223, 223, 223)'">OK</button>
                                </a>
                            </form>
                            <div class="tableContainer">
                                <table class="seeTable">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Product Name</th>
                                            <th>Description</th>
                                            <th>Location</th>
                                            <th>Supplier</th>
                                            <th>Quantity</th>
                                            <th>Created_by</th>
                                            <th>Created_at</th>
                                            <th>Updated_at</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                        if(isset($_GET['supplier'])){                                       
                                            $filter = trim(strtolower($_GET['supplier']));
                                            $suppliers = array_map('strtolower', array_map('trim', array_column($rowsSupp, 'supplier_name')));
                                            
                                            foreach ($suppliers as $supplier): 
                                                if($filter == $supplier){
                                                    $sql = "SELECT id, product_name, description, location, supplier, quantity, created_by, created_at, updated_at FROM products WHERE supplier = :supplier;";
                                                    $stmt = $conn->prepare($sql);
                                                    $stmt->bindParam(':supplier', $filter);
                                                    $stmt->execute();

                                                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                }else{
                                                    $sql = "SELECT id, product_name, description, location, supplier, quantity, created_by, created_at, updated_at FROM products WHERE location = :supplier;";
                                                    $stmt = $conn->prepare($sql);
                                                    $stmt->bindParam(':supplier', $filter);
                                                    $stmt->execute();

                                                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                }
                                            endforeach;
                                        } else{
                                            $sql = "SELECT id, product_name, description, location, supplier, quantity, created_by, created_at, updated_at FROM products;";
                                            $stmt = $conn->prepare($sql);
                                            $stmt->execute();

                                            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                        }    
                                    ?>
                                    <tbody>
                                        <?php foreach($rows as $row): ?>
                                        <tr>
                                            <td><?php echo $row['id'];?></td>
                                            <td><?php echo $row['product_name'];?></td>                    
                                            <td><?php echo $row['description'];?></td>
                                            <td><?php echo $row['location'];?></td>
                                            <td><?php echo $row['supplier'];?></td>
                                            <td><?php echo $row['quantity'];?></td>
                                            <td><?php echo $row['created_by'];?></td>
                                            <td><?php echo $row['created_at'];?></td>
                                            <td><?php echo $row['updated_at'];?></td>
                                            <td class="editBtn"> 
                                                <a href="edit-product.php?id=<?php echo $row['id'];?>"><i class="fa fa-pen-to-square"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>      
                            <div class="createButtonContainer">
                                <a href="add-product.php" class="add"><button type="submit">Create Product</button></a>
                            </div>
                            <div class="downloadButtonContainer">
                                <a href="download-products.php"class="download" ><button type="submit">Download to Excel</button></a>
                            </div>                 
                        </div>
                    </div>
                </div>  
            </div>        
        </div>
        <script src="js/script.js"></script>        
    </body>
</html>