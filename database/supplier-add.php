<?php
    session_start();
    include('connection.php');

    if(isset($_POST['edit_btn'])){
        $table_name = $_SESSION['table'];

        $id = $_POST['id'];
        $supplier_name = $_POST['supplier_name'];
        $supplier_cuit = $_POST['supplier_cuit'];
        $location = $_POST['supplier_location'];
        $description = $_POST['supplier_description'];
        $email = $_POST['supplier_email'];
        $creator = $_SESSION['user']['id'];
        $updated_at = date('Y-m-d H:i:s');
        
        if (preg_match('/^\d{2}-\d{9}$/', $supplier_cuit)) {
            echo "Formato válido.";
        } else {
            $response = [
                'success' => false,
                'message' => 'Formato de cuit incorrecto. Debe ser nn-nnnnnnnnn.'
            ];
            $_SESSION['response'] = $response;
            header('location: ../edit-supplier.php');
            exit();
        }        

        if($supplier_name == ''){
            $response = [
                'success' => false,
                'message' => 'Supplier name is required'
            ];
            $_SESSION['response'] = $response;
            header('location: ../edit-supplier.php');
            exit();
        }

        if($email == ''){
            $response = [
                'success' => false,
                'message' => 'Email is required'
            ];
            $_SESSION['response'] = $response;
            header('location: ../edit-supplier.php');
            exit();
        }

        try{
            $sql = "UPDATE suppliers SET supplier_name = :supplier_name, supplier_cuit = :supplier_cuit, supplier_location = :supplier_location, supplier_description = :supplier_description, supplier_email = :supplier_email, created_by =:creator, updated_at = :updated_at WHERE id = :id LIMIT 1;";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':supplier_name', $supplier_name);
            $stmt->bindParam(':supplier_cuit', $supplier_cuit);
            $stmt->bindParam(':supplier_location', $location);
            $stmt->bindParam(':supplier_description', $description);
            $stmt->bindParam(':supplier_email', $email);
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
    }

if(isset($_POST['create_btn'])){
    $table_name = $_SESSION['table'];

    $supplier_name = $_POST['supplier_name'];
    $supplier_cuit = $_POST['supplier_cuit'];
    $location = $_POST['supplier_location'];
    $description = $_POST['supplier_description'];
    $email = $_POST['supplier_email'];
    $creator = $_SESSION['user']['id'];

    if (preg_match('/^\d{2}-\d{9}$/', $supplier_cuit)) {
        echo "Formato válido.";
    } else {
        $response = [
            'success' => false,
            'message' => 'Formato de cuit incorrecto. Debe ser nn-nnnnnnnnn.'
        ];
        $_SESSION['response'] = $response;
        $_SESSION['old_data'] = $_POST;
        header('location: ../add-supplier.php');
        exit();
    }  

    if($supplier_name == ''){
        $response = [
            'success' => false,
            'message' => 'Supplier name is required'
        ];
        $_SESSION['response'] = $response;
        $_SESSION['old_data'] = $_POST;
        header('location: ../add-supplier.php');
        exit();
    }
    if($supplier_cuit == ''){
        $response = [
            'success' => false,
            'message' => 'Supplier cuit is required'
        ];
        $_SESSION['response'] = $response;
        $_SESSION['old_data'] = $_POST;
        header('location: ../add-supplier.php');
        exit();
    }
    if($email == ''){
        $response = [
            'success' => false,
            'message' => 'Email is required'
        ];
        $_SESSION['response'] = $response;
        $_SESSION['old_data'] = $_POST;
        header('location: ../add-supplier.php');
        exit();
    }
    try{
    $insert_method = "INSERT INTO $table_name(supplier_name, supplier_cuit, supplier_location, supplier_description, supplier_email, created_by, created_at, updated_at) 
                        VALUES ('".$supplier_name."', '".$supplier_cuit."', '".$location."', '".$description."', '".$email."', '".$creator."', NOW(), NOW())";
    include('connection.php');

    $response = [
        'success' => true,
        'message' => $supplier_name .' succesfully added to the system'
    ];  
    $conn->exec($insert_method);

    } catch (PDOException $e){
    $response = [
        'success' => false,
        'message' => $e->getMessage()
    ];
    }
    }
    header('location: ../see-suppliers.php');
?>