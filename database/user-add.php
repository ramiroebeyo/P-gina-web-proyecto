<?php
    session_start();
if(isset($_POST['create_btn'])){
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
}

if(isset($_POST['edit_btn'])){
    include('connection.php');
    $table_name = $_SESSION['table'];

    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $updated_at = date('Y-m-d H:i:s'); 

    if($first_name == ''){
        $response = [
            'success' => false,
            'message' => 'Name is required'
        ];
        $_SESSION['response'] = $response;
        header('location: ../edit-user.php');
        exit();
    }
    
    if($last_name == ''){
        $response = [
            'success' => false,
            'message' => 'Last name is required'
        ];
        $_SESSION['response'] = $response;
        header('location: ../edit-user.php');
        exit();
    }

    if($username == ''){
        $response = [
            'success' => false,
            'message' => 'username is required'
        ];
        $_SESSION['response'] = $response;
        header('location: ../edit-user.php');
        exit();
    }

    if($email == ''){
        $response = [
            'success' => false,
            'message' => 'Email is required'
        ];
        $_SESSION['response'] = $response;
        header('location: ../edit-user.php');
        exit();
    }

    try{
        $sql = "UPDATE users SET first_name = :first_name, last_name = :last_name, username = :username, email = :email, updated_at = :updated_at WHERE id = :id LIMIT 1;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':updated_at', $updated_at);
        $stmt->bindParam(':id', $id);
        $sql_execute = $stmt->execute();
    }catch(PDOException $e){
        $response = [
            'success' => false,
            'message' => $e->getMessage()
        ];
    }
}
    $_SESSION['response'] = $response;
    header('location: ../see-users.php');
?>