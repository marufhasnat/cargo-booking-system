<?php 

    require_once 'header.php';

    if(isset($_POST['change-passwrd'])){

        $npassword = $_POST['npassword'];
        $rpassword = $_POST['rpassword'];

        $email = $_SESSION['user_login'];

        $data = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");
        

            // $success = 'Your Password Changed Successfully!)';
            if(strlen($npassword) > 5){

                if($npassword == $rpassword){
                    
                    $result = mysqli_query($connect, "UPDATE `users` SET `password`='$npassword',`re-password`='$rpassword' WHERE `email` = '$email'");

                    if($result){
                        $success = 'Your Password Changed Successfully!';
                    } else{
                        $error = 'Something Went Wrong!';
                    }

                } else{
                    $password_exits = "Password Didn't Match With Retype Password!";
                }

            } else{
                $password_exits = "Password Need To Be More Than 5 Charaters!";
            }


    }

?>



<section class="change-password">
    <div class="container">
        <div class="row justify-content-center">
            <div class="lg-offset-2 col-lg-8 col-md-12">
                <form method="POST" action="" class="mt-5 p-5" style="background-color: whitesmoke;">
                    <?php 
                                    if(isset($success)){
                                        ?>
                    <div class="alert alert-success alert-dismissible fade show mt-3 mb-3" role="alert">
                        <?= $success ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                                    }
                                ?>

                    <?php 
                                    if(isset($error)){
                                        ?>
                    <div class="alert alert-danger alert-dismissible fade show mt-3 mb-3" role="alert"><?= $error ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                                    }
                                ?>

                    <?php 
                                    if(isset($password_exits)){
                                        ?>
                    <div class="alert alert-danger alert-dismissible fade show mt-3 mb-3" role="alert">
                        <?= $password_exits ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                                    }
                                ?>

                    <!-- new password input -->
                    <div class="form-outline mb-4">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label" for="form4Example2">New Password:</label>

                            </div>
                            <div class="col-md-9">
                                <input type="password" id="form4Example2" class="form-control" name="npassword"
                                    placeholder="Please Enter New Password" required />
                            </div>
                        </div>
                    </div>

                    <!-- Retype new password input -->
                    <div class="form-outline mb-4">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label" for="form4Example3">ReType Password:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="password" class="form-control" id="form4Example3" rows="4" name="rpassword"
                                    placeholder="Please ReType New Password" required></input>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-dark btn-block mt-2 mb-4" name="change-passwrd">Change
                            Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<script src="../js/bootstrap.bundle.min.js"></script>

</body>

</html>