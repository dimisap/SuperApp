<?php

include_once 'dbentry.php';


if(isset($_GET['id'])){

    $id = mysqli_real_escape_string($conn,$_GET['id']);
    $query = "SELECT * FROM `appusers` WHERE `id` = '$id'";
    
    $result = mysqli_query($conn,$query);

    while($row = mysqli_fetch_array($result)){

        $imageDate = $row['image'];
        $imageType = mysqli_real_escape_string($conn,$_FILES['image']['type']);
    }
    header("content-type: image/".$imageType);
    echo $imageDate;
}else{
    echo "Error";
}

?>