<?php 

    require_once 'header.php';

    $email = $_SESSION['admin_login'];

    $driver_id;

    if(isset($_GET['driver-id'])){

        $driver_id = base64_decode($_GET['driver-id']);

    }
    

    if(isset($_POST['amount-submit'])){

        $amount = (int) $_POST['amount'];

        $result = mysqli_query($connect, "SELECT * FROM `driver` WHERE `id` = '$driver_id'");

        $driver_amount;
        while($row = mysqli_fetch_assoc($result)){

            $driver_amount = $row['amount'];

        }

        $driver_amount += $amount;

        $result = mysqli_query($connect, "UPDATE `driver` SET `amount`='$driver_amount' WHERE `id` = '$driver_id'");

        if($result){

            $success = 'Payment Is Done!';

        } else{
            $error = "Something Went Wrong!";
        }

    }


?>


<!-- cargo's form -->
<section class="cargo-form mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="lg-offset-2 col-lg-8 col-md-12">

                <?php 
                                if(isset($success)){
                                    ?>
                <div class="alert alert-success alert-dismissible fade show mt-3 " role="alert">
                    <?= $success ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                                }
                            ?>

                <?php 
                                if(isset($error)){
                                    ?>
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert"><?= $error ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                                }
                            ?>

                <div class="sender-details mt-5 p-5" style="background-color: whitesmoke;">

                    <form method="POST" action="">

                        <?php 

                                $result = mysqli_query($connect, "SELECT * FROM `driver` WHERE `id` = '$driver_id'");

                                while($row = mysqli_fetch_assoc($result)){
                            
                            ?>

                        <h5 style="font-weight: bold;" class="text-center mb-5">Make Payment of
                            <?= $row['fullname'] ?> (Driver)</h5>

                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example1">Enter The Amount:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="number" id="form4Example1" class="form-control" name="amount"
                                        placeholder="Enter The Amount" required />
                                </div>
                            </div>
                        </div>

                        <?php

                            }   

                            ?>

                        <div class="button-sub text-center">
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-dark btn-block mt-4" name="amount-submit">Give
                                Payment</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="payment-method">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="payment-title text-center mt-5">
                    <h5>Other Payment Method Coming Soon!</h5>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-md-3 col-sm-6">
                <div class="pay-img text-center">
                    <img src="../images/bkash.png" class="img-fluid" alt="bkash">
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="pay-img text-center">
                    <img src="../images/nagad.png" class="img-fluid" alt="nagad">
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="pay-img text-center">
                    <img src="../images/rocket.png" class="img-fluid" alt="rocket">
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="pay-img text-center">
                    <img src="../images/upay.png" class="img-fluid" alt="upay">
                </div>
            </div>
        </div>
    </div>
</section>


<script src="../js/bootstrap.bundle.min.js"></script>

</body>

</html>