<?php
    session_start();

    $table_name = $_SESSION['table'];
    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $encrypted = password_hash($password, PASSWORD_DEFAULT);
    if($first_name == '' || $last_name == '' || $username == '' || $email == '' || $password == ''){
        $response = [
            'success' => false,
            'message' => 'All fields are required'
        ];
        $_SESSION['response'] = $response;
        header('location: ../add-user.php');
        exit();
    }
    try{
    $insert_method = "INSERT INTO $table_name(first_name, last_name, username, email, password, created_at, updated_at) 
                        VALUES ('".$first_name."', '".$last_name."', '".$username."', '".$email."', '".$encrypted."', NOW(), NOW())";
    include('connection.php');

    var_dump($password);
    $response = [
        'success' => true,
        'message' => $first_name .' '. $last_name .' succesfully added to the system'
    ];
    $conn->exec($insert_method);

    } catch (PDOException $e){
    $response = [
        'success' => false,
        'message' => $e->getMessage()
    ]; 
    }

    $_SESSION['response'] = $response;
    header('location: ../see-users.php');
?>