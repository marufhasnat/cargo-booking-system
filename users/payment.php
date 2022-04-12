<?php 

    require_once 'header.php';

    $email = $_SESSION['user_login'];
    $data_id = mysqli_query($connect, "SELECT `id` FROM `users` WHERE `email` = '$email'");
    $user_id;
    while($rowdata = mysqli_fetch_array($data_id)){
        $user_id = $rowdata['id'];
    }

    if(isset($_POST['payment-submit'])){
        header('location: payment-getway.php');
    }

?>


<!-- cargo's form -->
<section class="cargo-form mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="lg-offset-2 col-lg-8 col-md-12">
                <div class="sender-details mt-5 p-5" style="background-color: whitesmoke;">

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

                    <form method="POST" action="">
                        <?php 

                                $result = mysqli_query($connect, "SELECT * FROM `cargo` WHERE `user_id` = '$user_id' AND `status` = 0 ");

                                while($row = mysqli_fetch_assoc($result)){

                            ?>

                        <h5 style="font-weight: bold;" class="text-center mb-5">Sender's Details</h5>
                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example1">Sender's Name:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" id="form4Example1" class="form-control" name="sname"
                                        value="<?= $row['sender_name'] ?>" readonly />
                                </div>
                            </div>
                        </div>


                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example2">Sender's Email:</label>

                                </div>
                                <div class="col-md-9">
                                    <input type="email" id="form4Example2" class="form-control" name="semail"
                                        value="<?= $row['sender_email'] ?>" readonly />
                                </div>
                            </div>
                        </div>


                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example3">Sender's Contact:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="form4Example3" rows="4" name="scontact"
                                        value="<?= $row['sender_contact'] ?>" readonly></input>
                                </div>
                            </div>
                        </div>


                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example3">Sender's Address:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="form4Example3" rows="4" name="saddress"
                                        value="<?= $row['sender_address'] ?>" readonly></input>
                                </div>
                            </div>
                        </div>


                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example3">Sender's City:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="form4Example3" rows="4" name="scity"
                                        value="<?= $row['sender_city'] ?>" readonly></input>
                                </div>
                            </div>
                        </div>

                        <h5 style="font-weight: bold;" class="text-center mb-5 mt-5">Receiver's Details</h5>

                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example1">Receiver's Name:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" id="form4Example1" class="form-control" name="rname"
                                        value="<?= $row['receiver_name'] ?>" readonly />
                                </div>
                            </div>
                        </div>


                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example2">Receiver's Email:</label>

                                </div>
                                <div class="col-md-9">
                                    <input type="email" id="form4Example2" class="form-control" name="remail"
                                        value="<?= $row['receiver_email'] ?>" readonly />
                                </div>
                            </div>
                        </div>


                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example3">Receiver's Contact:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="form4Example3" rows="4" name="rcontact"
                                        value="<?= $row['receiver_contact'] ?>" readonly></input>
                                </div>
                            </div>
                        </div>


                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example3">Receiver's Address:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="form4Example3" rows="4" name="raddress"
                                        value="<?= $row['receiver_address'] ?>" readonly></input>
                                </div>
                            </div>
                        </div>


                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example3">Receiver's City:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="form4Example3" rows="4" name="rcity"
                                        value="<?= $row['receiver_city'] ?>" readonly></input>
                                </div>
                            </div>
                        </div>

                        <h5 style="font-weight: bold;" class="text-center mb-5 mt-5">Cargo's Details</h5>

                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example1">Cargo's Weight:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" id="form4Example1" class="form-control" name="cweight"
                                        value="<?= $row['weight'] . ' kg' ?>" readonly />
                                </div>
                            </div>
                        </div>


                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example1">Cargo's Volume:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" id="form4Example1" class="form-control" name="cvolume"
                                        value="<?= $row['volume'] . ' m^3'?>" readonly />
                                </div>
                            </div>
                        </div>

                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example1">Cargo's Quantity:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="number" id="form4Example1" class="form-control" name="cquantity"
                                        value="<?= $row['quantity'] ?>" readonly />
                                </div>
                            </div>
                        </div>

                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example1">Order Date:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" id="form4Example1" class="form-control" name="cdate"
                                        value="<?= date('d-M-Y', strtotime($row['date'])) ?>" readonly />
                                </div>
                            </div>
                        </div>

                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example1">Tracking ID:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" id="form4Example1" class="form-control" name="ctracking"
                                        value="<?= $row['tracking_id'] ?>" readonly />
                                </div>
                            </div>
                        </div>

                        <?php
                                }
                            ?>

                        <?php 

                            $result = mysqli_query($connect, "SELECT * FROM `price` WHERE `user_id` = '$user_id' AND `total_price` = '' ");

                            while($row = mysqli_fetch_assoc($result)){

                                $total_price = (int) $row['basic_price'] + (int) $row['weight_price'] + (int) $row['volume_price'];

                            ?>

                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example1">Total Price:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" id="form4Example1" class="form-control" name="ctracking"
                                        value="<?= $total_price . ' TK' ?>" readonly />
                                </div>
                            </div>
                        </div>

                        <?php

                            } 

                            ?>

                        <div class="button-sub text-center">
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-dark btn-block mt-4" name="payment-submit">Make
                                Payment</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



<script src="../js/bootstrap.bundle.min.js"></script>

</body>

</html>