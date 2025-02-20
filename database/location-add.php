<?php
    session_start();
    include('connection.php');

    if(isset($_POST['create_btn'])) {
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
            $insert_method = "INSERT INTO $table_name (location_name, location_description, created_by, created_at, updated_at) 
                            VALUES ('".$location_name."', '".$location_description."', '".$creator."', NOW(), NOW())";
            include('connection.php');

            $response = [
                'success' => true,
                'message' => $location_name .' successfully added to the system'
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
        $table_name = $_SESSION['table'];

        $id = $_POST['id'];
        $location_name = $_POST['location_name'];
        $location_description = $_POST['location_description'];
        $creator = $_SESSION['user']['id'];
        $updated_at = date('Y-m-d H:i:s');        

        if($location_name == ''){
            $response = [
                'success' => false,
                'message' => 'Location name is required'
            ];
            $_SESSION['response'] = $response;
            header('location: ../edit-location.php');
            exit();
        }

        try{ 
            $sql = "UPDATE locations SET location_name = :location_name, location_description = :location_description, updated_at = :updated_at WHERE id = :id LIMIT 1;";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':location_name', $location_name);
            $stmt->bindParam(':location_description', $location_description);
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
    header('location: ../see-locations.php');
?>