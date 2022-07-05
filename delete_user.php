<?php
    session_start();

    include_once 'dbentry.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM `appusers` WHERE `id` = '$id'";
    mysqli_query($conn,$sql);

    header("Location: administrator.php?delete_success");
?>