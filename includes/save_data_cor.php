<?php 
    include "config.php";

    session_start();

    if(isset($_POST['take_photo_image'])){

        $folder_path = '../uploads/';

        $image_parts = explode(";base64,", $_POST['take_photo_image']);

        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);

        $image_name = uniqid() . '.png';

        $file = $folder_path . $image_name;

        if (file_put_contents($file, $image_base64)) {
            
            $sql = "INSERT INTO user_data (`user_name`, `user_city`, `user_phone`, `user_img`) VALUES ('{$_SESSION['user_data']['username']}','{$_SESSION['user_data']['city']}','{$_SESSION['user_data']['phone']}','{$image_name}')";

            $runQuery = mysqli_query($conn,$sql) or die("runQuery failed!!");

            if ($runQuery) {

                $_SESSION['image'] = $image_name;

                echo json_encode(["massage" => $image_name,"status" => true]);

            } else {

                echo json_encode(["massage" => "Data could not saved","status" => false]);
            }
            
        }else{
            echo json_encode(["massage" => "image could not uploaded","status" => false]);
        }

    }else if(isset($_POST['upload_image'])){
        
        $file_name = $_FILES['upload_image']['name'];

        $extension = pathinfo($file_name,PATHINFO_EXTENSION);

        $valid_ext = ['jpg', 'jpeg', 'png'];

        if (in_array($extension,$valid_ext)) {

            $file_new_name = uniqid() . "." . $extension;

            $folder_path = '../uploads/'.$file_new_name;

            if (move_uploaded_file($_FILES['upload_image']['tmp_name'],$folder_path)) {
            
                $upload_sql = "INSERT INTO user_data (`user_name`, `user_city`, `user_phone`, `user_img`) VALUES ('{$_SESSION['user_data']['username']}','{$_SESSION['user_data']['city']}','{$_SESSION['user_data']['phone']}','{$file_new_name}')";

                $upload_runQuery = mysqli_query($conn,$upload_sql) or die("runQuery2 failed!!");

                if ($upload_runQuery) {

                    $_SESSION['image'] = $file_new_name;

                    echo json_encode(["massage" => $file_new_name,"status" => true]);

                } else {

                    echo json_encode(["massage" => "Data could not saved","status" => false]);
                }

            } else {
                echo json_encode(["massage" => "image could not uploaded","status" => false]);
            }
            
        }else{
            echo json_encode(["massage" => "Invalid image file extension. Please try with jpg,jpeg and png","status" => false]);
        }




    }
    


?>