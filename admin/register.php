<?php 

    require_once '../connection.php';
    session_start();

    if(!isset($_SESSION['admin_login'])){
        header('location: login.php');
    }

    if(isset($_POST['admin_register'])){

        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';

        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $city = $_POST['city'];
        // $city_result = mysqli_query($connect, "SELECT * FROM `location` WHERE `id` = '$city_id'");
        // $city_row = mysqli_fetch_assoc($city_result);
        // $city = $city_row['division'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];

        $input_errors = array();

        if(empty($name)){
            $input_errors['name'] = "Full Name Field Is Required!";
        }
        if(empty($email)){
            $input_errors['email'] = "Email Address Field Is Required!";
        }
        if(empty($contact)){
            $input_errors['contact'] = "Contact Number Field Is Required!";
        }
        if(empty($city)){
            $input_errors['city'] = "City Field Is Required!";
        }
        if(empty($password)){
            $input_errors['password'] = "Password Field Is Required!";
        }
        if(empty($repassword)){
            $input_errors['repassword'] = "Retype Password Field Is Required!";
        }

        if(count($input_errors) == 0){

            $email_check = mysqli_query($connect, "SELECT * FROM `admin` WHERE `email` = '$email'");
            $email_check_row = mysqli_num_rows($email_check);

            if($email_check_row == 0){

                if(strlen($password) > 5){

                    if($password == $repassword){
                        
                        $result = mysqli_query($connect, "INSERT INTO `admin`(`fullname`, `contact`, `city`, `email`, `password`, `re-password`) VALUES ('$name','$contact','$city','$email','$password','$repassword')");

                        if($result){
                            $success = 'Registration Successfully Happend!';
                        } else{
                            $error = 'Something Went Wrong!';
                        }

                    } else{
                        $password_exits = "Password Didn't Match With Retype Password!";
                    }

                } else{
                    $password_exits = "Password Need To Be More Than 5 Charaters!";
                }

            } else{
                $email_exits = "This Email Already Exits!";
            }

        }

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
            ?> <li class="nav-item">
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
                        <a class="nav-link" href="finish-cargo.php">Finished Orders</a>
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

    <section class="h-100 mt-5">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4 text-center">Register Admin</h1>
                            <form method="POST" class="needs-validation" novalidate="" autocomplete="off" action="">

                                <?php 
                                if(isset($success)){
                                    ?>
                                <div class="alert alert-success alert-dismissible fade show mt-3 mb-3" role="alert">
                                    <?= $success ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <?php
                                }
                            ?>

                                <?php 
                                if(isset($error)){
                                    ?>
                                <div class="alert alert-danger alert-dismissible fade show mt-3 mb-3" role="alert">
                                    <?= $error ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <?php
                                }
                            ?>

                                <?php 
                                if(isset($email_exits)){
                                    ?>
                                <div class="alert alert-danger alert-dismissible fade show mt-3 mb-3" role="alert">
                                    <?= $email_exits ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <?php
                                }
                            ?>

                                <?php 
                                if(isset($password_exits)){
                                    ?>
                                <div class="alert alert-danger alert-dismissible fade show mt-3 mb-3" role="alert">
                                    <?= $password_exits ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <?php
                                }
                            ?>
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="name">Full Name</label>
                                    <input id="name" type="text" class="form-control" name="name" value=""
                                        placeholder="Please Enter Full Name" required autofocus>
                                    <?php 
                                        if(isset($input_errors['name'])){
                                            echo '<span style="display: block;color: red; margin-top: 10px;">'.$input_errors['name'].'</span>';
                                        }
                                    ?>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="email">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control" name="email" value=""
                                        placeholder="Please Enter Email Address" required>
                                    <?php 
                                        if(isset($input_errors['email'])){
                                            echo '<span style="display: block;color: red; margin-top: 10px;">'.$input_errors['email'].'</span>';
                                        }
                                    ?>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="contact">Contact Number</label>
                                    <input id="contact" type="text" class="form-control" name="contact" value=""
                                        placeholder="Please Enter Contact Number" pattern="01[3|5|6|7|8|9][0-9]{8}"
                                        required autofocus>
                                    <?php 
                                        if(isset($input_errors['contact'])){
                                            echo '<span style="display: block;color: red; margin-top: 10px;">'.$input_errors['contact'].'</span>';
                                        }
                                    ?>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="contact">City</label>
                                    <select class="form-control" name="city">
                                        <option value="">Select</option>
                                        <?php 
                                                $result = mysqli_query($connect, "SELECT * FROM `location`");

                                                while($row = mysqli_fetch_assoc($result)){ ?>
                                        <option value="<?= $row['division'] ?>"><?= $row['division'] ?></option>
                                        <?php
                                                    }
                                                ?>
                                    </select>
                                    <?php 
                                        if(isset($input_errors['city'])){
                                            echo '<span style="display: block;color: red; margin-top: 10px;">'.$input_errors['city'].'</span>';
                                        }
                                    ?>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="password">Password</label>
                                    <input id="password" type="password" class="form-control" name="password"
                                        placeholder="Please Enter Password" required>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                    <?php 
                                        if(isset($input_errors['password'])){
                                            echo '<span style="display: block;color: red; margin-top: 10px;">'.$input_errors['password'].'</span>';
                                        }
                                    ?>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="repassword">Retype Password</label>
                                    <input id="repassword" type="password" class="form-control" name="repassword"
                                        placeholder="Please Retype Password" required>
                                    <?php 
                                        if(isset($input_errors['repassword'])){
                                            echo '<span style="display: block;color: red; margin-top: 10px;">'.$input_errors['repassword'].'</span>';
                                        }
                                    ?>
                                </div>

                                <div class="text-center mt-5">
                                    <button type="submit" name="admin_register" class="btn btn-dark ms-auto">
                                        Register Admin
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="text-center mt-5 mb-3 text-muted">
                        Copyright &copy; 2022 &mdash; Fantstic Five
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>