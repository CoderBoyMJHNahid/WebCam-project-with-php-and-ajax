<?php

session_start();

if (isset($_SESSION['image'])) {
    
    $imagePath = 'uploads/'.$_SESSION['image']; 

    $fileName = 'downloaded_image.jpg';

    if (file_exists($imagePath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $fileName);
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($imagePath));
        readfile($imagePath);
        exit;
    } else {
        
        header("Location: index.php");
        
    }
}else{
    header("Location: index.php");
}


?>