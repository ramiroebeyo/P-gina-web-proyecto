  
  <?php
    session_start();
    if(isset($_SESSION['user'])) header('location: see-products.php');

    $error_message = '';

    if($_POST){
        include('database/connection.php'); 

        $username = $_POST['username'];
        $password = $_POST['password'];

        //$query = 'SELECT * FROM users WHERE users.email="'. $username .'" AND users.password= "'. $password .'"';
        //$stmt = $conn->prepare($query);
        //$stmt->execute();
        
        

        //if($stmt->rowCount() > 0){
            //$stmt->setFetchMode(PDO::FETCH_ASSOC);
            //$user = $stmt->fetchAll()[0];
            //$_SESSION['user'] = $user;

            //header('Location: dashboard.php');
        //} else $error_message = 'El nombre de usuario o la contraseña no son correctos';
        $stmt = $conn->prepare("SELECT * FROM users");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
        $users = $stmt->fetchAll();

        
        $user_exist = false;
        foreach($users as $user){
            $upass = $user['password'];
            $uname = $user['username'];
            
            if($uname == $username && password_verify($password, $upass)){
                $user_exist = true;
                $_SESSION['user'] = $user;
                break;
            }
        }
        
        if($user_exist) header('location: dashboard.php');
        else $error_message = 'Password or username is incorrect';

    }
?>


<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>IMS - Login Page</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body id="loginBody">
    <?php
        if(!empty($error_message)) { ?>
    <div id="errorMessage">
        <p>
                Error: <?= $error_message ?>
        </p>
    <?php } ?>
    </div>
    <div class="container"> 
        <div class='loginHeader'>
                <h1>IMS</h1>
                <p>Inventory Management System</p>
        </div>
        <div class='loginBody'>
            <form action='login.php' method='POST'>
                <div class='loginInputsContainer'>
                    <label for="">Username</label>
                    <input placeholder="username" name="username" type="text" />
                </div>
                <div class='loginInputsContainer'>
                    <label for="">Password</label>
                    <input placeholder="password" name="password" type="password" />
                </div>
                <div class="loginButtonContainer">
                    <button type="submit">Login</button>
                </div>
        </div>
    </div>
</body>
</html>