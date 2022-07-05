<?php
    session_start();

    include_once 'dbentry.php';

    $id = $_GET['id'];

    
    $sql = "DELETE FROM `add_question_texat` WHERE `id` = '$id'";
    mysqli_query($conn,$sql);

    header("Location: questions.php?delete_success");
?>