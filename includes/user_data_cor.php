<?php 

    $username = $_POST['username'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];

    if ($username == "" or $city == "" or $phone == "") {

        echo "error";

    } else {

        $data = ["username" => $username, "city" => $city, "phone" => $phone];

        session_start();

        $_SESSION['user_data'] = $data;

        echo "success";
    }
    
    
    


?>


