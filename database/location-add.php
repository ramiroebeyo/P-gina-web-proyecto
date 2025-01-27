<?php
    session_start();

    $table_name = $_SESSION['table'];
    
    $location_name = $_POST['location_name'];
    $location_description = $_POST['location_description'];
    $creator = $_SESSION['user']['id'];
    if($location_name == ''){
        $response = [
            'success' => false,
            'message' => 'Location name is required'
        ];
        $_SESSION['response'] = $response;
        header('location: ../add-location.php');
        exit();
    }
    try{
    $insert_method = "INSERT INTO $table_name(location_name, location_description, created_by, created_at, updated_at) 
                        VALUES ('".$location_name."', '".$location_description."', '".$creator."', NOW(), NOW())";
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
    header('location: ../add-location.php');
?>