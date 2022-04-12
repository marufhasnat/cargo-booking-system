<?php 

    require_once 'header.php';

    $email = $_SESSION['user_login'];

    if(isset($_POST['profile-submit'])){

        $fullname = $_POST['fullname'];
        $user_email = $_POST['email'];
        $contact = $_POST['contact'];
        $city = $_POST['city'];

        $result = mysqli_query($connect, "UPDATE `users` SET `fullname`='$fullname',`contact`='$contact',`city`='$city',`email`='$user_email' WHERE `email` = '$email'");

        if($result){
            ?>

<script type="text/javascript">
alert('Profile Updated Successfully!');
javascript: history.go(-1);
</script>

<?php
        } else{
            ?>
<script type="text/javascript">
alert('Profile Update Not Successful!');
</script>
<?php
        }

    }

?>


<!-- profile form -->
<section class="cargo-form mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="lg-offset-2 col-lg-8 col-md-12">
                <div class="sender-details mt-5 p-5" style="background-color: whitesmoke;">

                    <?php 

                            $result = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");

                            while($row = mysqli_fetch_assoc($result)){
                                
                        ?>

                    <form method="POST" action="">
                        <h5 style="font-weight: bold;" class="text-center mb-5"><?= $row['fullname'] ?>'s Profile
                        </h5>
                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example1">Full Name:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" id="form4Example1" class="form-control" name="fullname"
                                        value="<?= $row['fullname'] ?>" required />
                                </div>
                            </div>
                        </div>


                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example2">Email Address:</label>

                                </div>
                                <div class="col-md-9">
                                    <input type="email" id="form4Example2" class="form-control" name="email"
                                        value="<?= $row['email'] ?>" required />
                                </div>
                            </div>
                        </div>


                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example3">Contact Number:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="form4Example3" rows="4" name="contact"
                                        value="0<?= $row['contact'] ?>" pattern="01[3|5|6|7|8|9][0-9]{8}"
                                        required></input>
                                </div>
                            </div>
                        </div>


                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example3">City Name:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="form4Example3" rows="4" name="city"
                                        value="<?= $row['city'] ?>" required></input>
                                </div>
                            </div>
                        </div>


                        <div class="button-sub text-center">

                            <button type="submit" class="btn btn-dark btn-block mt-4" name="profile-submit">Update
                                Profile</button>
                        </div>

                        <?php } ?>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="../js/bootstrap.bundle.min.js"></script>

</body>

</html>