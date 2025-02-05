<?php
    session_start();
    include('connection.php');

if(isset($_POST['create_btn'])){
    $table_name = $_SESSION['table'];
    
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $supplier = $_POST['supplier'];
    $quantity = $_POST['quantity'];
    $creator = $_SESSION['user']['id'];
    if($product_name == ''){
        $response = [
            'success' => false,
            'message' => 'Product name is required'
        ];
        $_SESSION['response'] = $response;
        header('location: ../add-product.php');
        exit();
    }
    if($quantity == ''){
        $response = [
            'success' => false,
            'message' => 'Quantity is required'
        ];
        $_SESSION['response'] = $response;
        header('location: ../add-product.php');
        exit();
    }
    try{
    $insert_method = "INSERT INTO $table_name(product_name, description, location, supplier, quantity, created_by, created_at, updated_at) 
                        VALUES ('".$product_name."', '".$description."', '".$location."', '".$supplier."', '".$quantity."', '".$creator."', NOW(), NOW())";
    include('connection.php');

    $response = [
        'success' => true,
        'message' => $product_name .' succesfully added to the system'
    ];  
    $conn->exec($insert_method);

    } catch (PDOException $e){
    $response = [
        'success' => false,
        'message' => $e->getMessage()
    ]; 
    }

    $_SESSION['response'] = $response;
    header('location: ../add-product.php');
} 

if(isset($_POST['edit_btn'])){
    $table_name = $_SESSION['table'];

    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $supplier = $_POST['supplier'];
    $quantity = $_POST['quantity'];
    $creator = $_SESSION['user']['id'];
    if($product_name == ''){
        $response = [
            'success' => false,
            'message' => 'Product name is required'
        ];
        $_SESSION['response'] = $response;
        header('location: ../see-products.php');
        exit();
    }
    if($location == ''){
        $response = [
            'success' => false,
            'message' => 'Location is required'
        ];
        $_SESSION['response'] = $response;
        header('location: ../see-products.php');
        exit();
    }
    if($supplier == ''){
        $response = [
            'success' => false,
            'message' => 'Supplier is required'
        ];
        $_SESSION['response'] = $response;
        header('location: ../see-products.php');
        exit();
    }
    if($quantity == '' || $quantity < 0){
        $response = [
            'success' => false,
            'message' => 'Quantity value is not valid'
        ];
        $_SESSION['response'] = $response;
        header('location: ../edit-product.php');
        exit();
    }

    try{
        $sql = "UPDATE products SET product_name = :product_name, description = :description, location = :location, supplier = :supplier, quantity = :quantity, created_by =:creator, updated_at = :updated_at WHERE id = :id LIMIT 1;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':product_name', $product_name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':supplier', $supplier);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':creator', $creator);
        $stmt->bindParam(':updated_at', $updated_at);
        $stmt->bindParam(':id', $id);
        $sql_execute = $stmt->execute();
        
    }catch(PDOException $e){
        $response = [
            'success' => false,
            'message' => $e->getMessage()
        ];
    }
    $_SESSION['response'] = $response;
    header('location: ../see-products.php');
}
?>