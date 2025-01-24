<?php
    session_start();

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
        'message' => $produt_name .' succesfully added to the system'
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
?>