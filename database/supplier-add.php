<?php
    session_start();

    $table_name = $_SESSION['table'];
    
    $supplier_name = $_POST['supplier_name'];
    $description = $_POST['supplier_location'];
    $email = $_POST['email'];
    $creator = $_SESSION['user']['id'];
    if($supplier_name == ''){
        $response = [
            'success' => false,
            'message' => 'Supplier name is required'
        ];
        $_SESSION['response'] = $response;
        header('location: ../add-supplier.php');
        exit();
    }
    if($email == ''){
        $response = [
            'success' => false,
            'message' => 'Email is required'
        ];
        $_SESSION['response'] = $response;
        header('location: ../add-supplier.php');
        exit();
    }
    try{
    $insert_method = "INSERT INTO $table_name(supplier_name, supplier_location, email, created_by, created_at, updated_at) 
                        VALUES ('".$supplier_name."', '".$description."', '".$email."', '".$creator."', NOW(), NOW())";
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
    header('location: ../add-supplier.php');
?>