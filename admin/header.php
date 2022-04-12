<?php

require_once '../connection.php';
session_start();

if(!isset($_SESSION['admin_login'])){
    header('location: login.php');
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargo Management System</title>
    <!-- css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <img src="../images/logo.png" alt="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <?php 
          if(isset($_SESSION['admin_login'])){
            ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="profile.php">Admin Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="changepassword.php">Change Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="logout.php">Logout</a>
                    </li>
                    <?php
          } else {
            ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                    <?php
          }
        ?>
                </ul>
            </div>
        </div>
    </nav>


    <div class="bottom-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="nav">
                        <a class="nav-link" aria-current="page" href="../index.php">Home</a>
                        <?php 
            if(isset($_SESSION['admin_login'])){
              ?>
                        <a class="nav-link" href="register.php">Add Admin</a>
                        <a class="nav-link" href="add-driver.php">Add Driver</a>
                        <a class="nav-link" href="manage-cargos.php">Request Orders</a>
                        <a class="nav-link" href="finish-cargo.php">Finished Orders</a></a>
                        <a class="nav-link" href="manage-users.php">Manage Users</a>
                        <a class="nav-link" href="manage-drivers.php">Manage Drivers</a>
                        <a class="nav-link" href="feedbacks.php">Feedbacks</a>
                        <?php
            } 
          ?>
                        <a class="nav-link" href="../prices.php">Pricing</a>
                    </nav>
                </div>
            </div>
        </div>
    </div>