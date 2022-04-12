<?php 

    require_once 'header.php';

    if(isset($_POST['cargo-submit'])){

    //   header('location: myorder.php');
        $sname = $_POST['sname'];
        $semail = $_POST['semail'];
        $scontact = $_POST['scontact'];
        $saddress = $_POST['saddress'];
        $scity = $_POST['scity'];

        $rname = $_POST['rname'];
        $remail = $_POST['remail'];
        $rcontact = $_POST['rcontact'];
        $raddress = $_POST['raddress'];
        $rcity = $_POST['rcity'];

        $cweight = $_POST['cweight'];
        $clength = (int) $_POST['clength'];
        $cwidth = (int) $_POST['cwidth'];
        $cheight = (int) $_POST['cheight'];
        $cquantity = (int) $_POST['cquantity'];
        $ctype = $_POST['ctype'];
        $cdate = $_POST['cdate'];

        // print_r($_POST);

        $email = $_SESSION['user_login'];
        $data_id = mysqli_query($connect, "SELECT `id` FROM `users` WHERE `email` = '$email'");
        $user_id;
        while($rowdata = mysqli_fetch_array($data_id)){
            $user_id = $rowdata['id'];
        }
        // echo $user_id;

        $cvolume = ($clength * $cwidth * $cheight) * $cquantity;
        // print $cvolume;

        $basic_price;
        
        if(!($scity == $rcity)){
            
            if($scity == 'Dhaka' || $rcity == 'Dhaka'){

                if(($scity == 'Dhaka' && $rcity == 'Chattogram') || ($scity == 'Chattogram' && $rcity == 'Dhaka')){
                    $basic_price = 1500;
                } else if(($scity == 'Dhaka' && $rcity == 'Shylet') || ($scity == 'Shylet' && $rcity == 'Dhaka')){
                    $basic_price = 1200;
                } else if(($scity == 'Dhaka' && $rcity == 'Rajshahi') || ($scity == 'Rajshahi' && $rcity == 'Dhaka')){
                    $basic_price = 700;
                } else if(($scity == 'Dhaka' && $rcity == 'Khulna') || ($scity == 'Khulna' && $rcity == 'Dhaka')){
                    $basic_price = 900;
                } else if(($scity == 'Dhaka' && $rcity == 'Rangpur') || ($scity == 'Rangpur' && $rcity == 'Dhaka')){
                    $basic_price = 800;
                } else if(($scity == 'Dhaka' && $rcity == 'Barisal') || ($scity == 'Barisal' && $rcity == 'Dhaka')){
                    $basic_price = 1000;
                } else if(($scity == 'Dhaka' && $rcity == 'Mymensingh') || ($scity == 'Mymensingh' && $rcity == 'Dhaka')){
                    $basic_price = 600;
                }
    
                // echo $basic_price;
    
                $weight_price;
                if($cweight >=0 && $cweight <= 5){
                    $weight_price = 0;
                } else if($cweight >= 5.1 && $cweight <= 10){
                    $weight_price = $basic_price * 1.11;
                } else if($cweight >= 10.1 && $cweight <= 25){
                    $weight_price = $basic_price * 1.22;
                } else if($cweight >= 25.1 && $cweight <= 100){
                    $weight_price = $basic_price * 1.33;
                } else if($cweight > 100){
                    $weight_price = $basic_price * 1.44;
                }
    
                // echo $weight_price;
    
                $voulme_price;
                if($cvolume >=0 && $cvolume <= 8){
                    $voulme_price = 0;
                } else if($cvolume >= 8.1 && $cvolume <= 27){
                    $voulme_price = $basic_price * 1.11;
                } else if($cvolume >= 27.1 && $cvolume <= 64){
                    $voulme_price = $basic_price * 1.22;
                } else if($cvolume >= 64.1 && $cvolume <= 124){
                    $voulme_price = $basic_price * 1.33;
                } else if($cvolume > 124){
                    $voulme_price = $basic_price * 1.44;
                }
    
                $total_price = $basic_price + $weight_price + $voulme_price;
                // print $total_price;
    
    
                $tracking_id = md5(time() . mt_rand(1, 10));
                // echo $tracking_id;
                
                $result = mysqli_query($connect, "INSERT INTO `cargo`(`user_id`, `weight`, `volume`, `quantity`, `date`, `sender_name`, `sender_email`, `sender_contact`, `sender_address`, `sender_city`, `receiver_name`, `receiver_email`, `receiver_contact`, `receiver_address`, `receiver_city`, `tracking_id`) VALUES ('$user_id', '$cweight', '$cvolume', '$cquantity', '$cdate', '$sname', '$semail', '$scontact', '$saddress', '$scity', '$rname', '$remail', '$rcontact', '$raddress', '$rcity', '$tracking_id')");
    
                if($result){
    
                    $cargo_data = mysqli_query($connect, "SELECT `id` FROM `cargo` WHERE `tracking_id` =  '$tracking_id'");
                    $cargo_id;
                    while($rowdata = mysqli_fetch_array($cargo_data)){
                        $cargo_id = $rowdata['id'];
                    }
    
                    $price_result = mysqli_query($connect, "INSERT INTO `price`(`user_id`, `cargo_id`, `basic_price`, `weight_price`, `volume_price`) VALUES ('$user_id', '$cargo_id', '$basic_price', '$weight_price', '$voulme_price')");
    
                    if($price_result){
    
                        $tracking_result = mysqli_query($connect, "INSERT INTO `tracking`(`user_id`,`tracking_id`, `status`) VALUES ('$user_id', '$tracking_id', 'pending')");
    
                        if($tracking_result) {
                            header('location: payment.php');
                        } else {
                            $error = 'Something Went Wrong!';
                        }
    
                    } else{
    
                        $error = 'Something Went Wrong!';
    
                    }
    
                } else {
    
                    $error = 'Something Went Wrong!';
    
                }

            } else {

                $error = "Please Choose One City Dhaka To Order Cargo! ";

            }

        } else{
            $error = "Please Select Different Cities To Order Cargo!";
        }

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
                        <h5 style="font-weight: bold;" class="text-center mb-5">Sender's Details</h5>
                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example1">Sender's Name:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" id="form4Example1" class="form-control" name="sname"
                                        placeholder="Sender's Name" value="<?= isset($sname) ? $sname : '' ?>"
                                        required />
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
                                        placeholder="Sender's Email" value="<?= isset($semail) ? $semail : '' ?>"
                                        required />
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
                                        placeholder="Sender's Contact Number" pattern="01[3|5|6|7|8|9][0-9]{8}"
                                        value="<?= isset($scontact) ? $scontact : '' ?>" required></input>
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
                                        placeholder="Sender's Address" value="<?= isset($saddress) ? $saddress : '' ?>"
                                        required></input>
                                </div>
                            </div>
                        </div>


                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example3">Sender's City:</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control" name="scity" required>
                                        <option value="<?= isset($scity) ? $scity : '' ?>">Select</option>
                                        <?php 
                                                  $result = mysqli_query($connect, "SELECT * FROM `location`");

                                                  while($row = mysqli_fetch_assoc($result)){ ?>
                                        <option value="<?= $row['division'] ?>"><?= $row['division'] ?></option>
                                        <?php
                                                      }
                                                  ?>
                                    </select>
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
                                        placeholder="Receiver's Name" value="<?= isset($rname) ? $rname : '' ?>"
                                        required />
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
                                        placeholder="Receiver's Email" value="<?= isset($remail) ? $remail : '' ?>"
                                        required />
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
                                        placeholder="Receiver's Contact Number" pattern="01[3|5|6|7|8|9][0-9]{8}"
                                        value="<?= isset($rcontact) ? $rcontact : '' ?>" required></input>
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
                                        placeholder="Receiver's Address"
                                        value="<?= isset($raddress) ? $raddress : '' ?>" required></input>
                                </div>
                            </div>
                        </div>


                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example3">Receiver's City:</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control" name="rcity" required>
                                        <option value="<?= isset($rcity) ? $rcity : '' ?>">Select</option>
                                        <?php 
                                                  $result = mysqli_query($connect, "SELECT * FROM `location`");

                                                  while($row = mysqli_fetch_assoc($result)){ ?>
                                        <option value="<?= $row['division'] ?>"><?= $row['division'] ?></option>
                                        <?php
                                                      }
                                                  ?>
                                    </select>
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
                                    <input type="number" id="form4Example1" class="form-control" name="cweight"
                                        placeholder="Cargo's Weight in Kilogram"
                                        value="<?= isset($cweight) ? $cweight : '' ?>" required />
                                </div>
                            </div>
                        </div>


                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example3">Cargo's Length:</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control" name="clength">
                                        <option value="1">Less Than 1 Meter</option>
                                        <option value="1">1 Meter</option>
                                        <option value="2">2 Meter</option>
                                        <option value="3">3 Meter</option>
                                        <option value="4">4 Meter</option>
                                        <option value="5">5 Meter</option>
                                        <option value="6">6 Meter</option>
                                        <option value="7">7 Meter</option>
                                        <option value="8">8 Meter</option>
                                        <option value="9">9 Meter</option>
                                        <option value="10">10 Meter</option>
                                        <option value="12">Greater Than 10 Meter</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example3">Cargo's Width:</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control" name="cwidth">
                                        <option value="1">Less Than 1 Meter</option>
                                        <option value="1">1 Meter</option>
                                        <option value="2">2 Meter</option>
                                        <option value="3">3 Meter</option>
                                        <option value="4">4 Meter</option>
                                        <option value="5">5 Meter</option>
                                        <option value="6">6 Meter</option>
                                        <option value="7">7 Meter</option>
                                        <option value="8">8 Meter</option>
                                        <option value="9">9 Meter</option>
                                        <option value="10">10 Meter</option>
                                        <option value="12">Greater Than 10 Meter</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example3">Cargo's Height:</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control" name="cheight">
                                        <option value="1">Less Than 1 Meter</option>
                                        <option value="1">1 Meter</option>
                                        <option value="2">2 Meter</option>
                                        <option value="3">3 Meter</option>
                                        <option value="4">4 Meter</option>
                                        <option value="5">5 Meter</option>
                                        <option value="6">6 Meter</option>
                                        <option value="7">7 Meter</option>
                                        <option value="8">8 Meter</option>
                                        <option value="9">9 Meter</option>
                                        <option value="10">10 Meter</option>
                                        <option value="12">Greater Than 10 Meter</option>
                                    </select>
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
                                        placeholder="Cargo's Quantity"
                                        value="<?= isset($cquantity) ? $cquantity : '' ?>" required />
                                </div>
                            </div>
                        </div>

                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example3">Cargo's Type:</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control" name="ctype">
                                        <option value="">Documents</option>
                                        <option value="">Cloths</option>
                                        <option value="">Electronics</option>
                                        <option value="">Mechanicals</option>
                                        <option value="">Chemicals</option>
                                        <option value="">Liquids</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example1">Order Date:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="date" id="form4Example1" class="form-control" name="cdate"
                                        placeholder="Order Date" value="<?= isset($cdate) ? $cdate : '' ?>" required />
                                </div>
                            </div>
                        </div>

                        <div class="button-sub text-center">
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-dark btn-block mt-4" name="cargo-submit">Proceed
                                Details</button>
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