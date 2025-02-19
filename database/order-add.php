<?php
session_start();
include('connection.php');

$table_name = $_SESSION['table'];

$product = $_POST['product'];
$supplier = $_POST['supplier'];
$ordered_quantity = $_POST['ordered_quantity'];
$creator = $_SESSION['user']['id'];
if($product == ''){
    $response = [
        'success' => false,
        'message' => 'Product is required'
    ];
    $_SESSION['response'] = $response;
    header('location: ../add-order.php');
    exit();
}
if($ordered_quantity == '' || $ordered_quantity < 0){
    $response = [
        'success' => false,
        'message' => 'Valid quantity is required'
    ];
    $_SESSION['response'] = $response;
    header('location: ../add-order.php');
    exit();
}

try{
$insert_method = "INSERT INTO $table_name(product, supplier, ordered_quantity, created_by, created_at) 
                    VALUES ('".$product."', '".$supplier."', '".$ordered_quantity."', '".$creator."', NOW())";
include('connection.php');

$response = [
    'success' => true,
    'message' => 'Succesfully added to the system'
];  
$conn->exec($insert_method);

$sql = "SELECT quantity FROM products WHERE product_name = :product_name;";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':product_name', $product);
$stmt->execute();

$product_quantity = $stmt->fetch(PDO::FETCH_ASSOC)['quantity'];
$new_quantity = $product_quantity + $ordered_quantity;

$sql = "UPDATE products SET quantity = :quantity WHERE product_name = :product_name;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':quantity', $new_quantity);
        $stmt->bindParam(':product_name', $product);
        $stmt->execute();

} catch (PDOException $e){
$response = [
    'success' => false,
    'message' => $e->getMessage()
]; 
}

$_SESSION['response'] = $response;
header('location: ../add-order.php')
?>