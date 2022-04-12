<?php 

    require_once '../connection.php';

    if(isset($_GET['feedback-delete'])){

        $id = base64_decode($_GET['feedback-delete']);
        $result = mysqli_query($connect, "DELETE FROM `feedback` WHERE `id` = $id");
        header('location: feedbacks.php');

    }

    if(isset($_GET['user-delete'])){

        $id = base64_decode($_GET['user-delete']);
        $result = mysqli_query($connect, "DELETE FROM `users` WHERE `id` = $id");
        header('location: manage-users.php');

    }

?>