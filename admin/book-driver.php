<?php 

    require_once 'header.php';

    $email = $_SESSION['admin_login'];

    $cargo_id;
    $user_id;
    $driver_id;

    if(isset($_GET['cargo-id']) && isset($_GET['user-id']) && isset($_GET['driver-id'])){

        $cargo_id = base64_decode($_GET['cargo-id']);
        $user_id = base64_decode($_GET['user-id']);
        $driver_id = base64_decode($_GET['driver-id']);

    }

    if(isset($_POST['driver-submit'])){

        $driver_id = $_POST['driverid'];

        $result = mysqli_query($connect, "UPDATE `cargo` SET `driver_id`='$driver_id' WHERE `id` = '$cargo_id'");

        if($result){

            $update_status = mysqli_query($connect, "UPDATE `driver` SET `status`= 1 WHERE `id` = '$driver_id'");

            if($update_status) {
            ?>

<script type="text/javascript">
alert('Booked Driver Successfully!');
</script>

<?php

            } else{

                $error = 'Something Went Wrong!';

            }

        }

    }

?>


<div class="basic-price-table">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

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

                                if($driver_id == 0){

                            ?>

                                    <form method="POST" action="">
                                        <h5 style="font-weight: bold;" class="text-center mb-5">Book Driver
                                        </h5>
                                        <div class="form-outline mb-4">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="form-label" for="form4Example3">Driver
                                                        Name:</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <select class="form-control" name="driverid" required>
                                                        <option value="<?= isset($driverid) ? $driverid : '' ?>">
                                                            Select
                                                        </option>
                                                        <?php 
                                                  $result = mysqli_query($connect, "SELECT * FROM `driver` WHERE `status` = 0");

                                                  while($row = mysqli_fetch_assoc($result)){ ?>
                                                        <option value="<?= $row['id'] ?>">
                                                            <?= $row['fullname'] . ' (0' . $row['contact'].')' ?>
                                                        </option>
                                                        <?php
                                                      }
                                                  ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="button-sub text-center">
                                            <!-- Submit button -->
                                            <button type="submit" class="btn btn-dark btn-block mt-4"
                                                name="driver-submit">Book Driver</button>
                                        </div>

                                    </form>
                                    <?php

                                            } else {
                                                ?>

                                    <div class="form-outline mb-4">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label" for="form4Example1"
                                                    style="margin: 10px;">Booked Driver:</label>
                                            </div>
                                            <?php 

                                                $result = mysqli_query($connect, "SELECT * FROM `driver` WHERE `id` = '$driver_id'");

                                                while($row = mysqli_fetch_assoc($result)) {


                                                ?>
                                            <div class="col-md-9">
                                                <input type="text" id="form4Example1" class="form-control"
                                                    name="fullname"
                                                    value="<?= $row['fullname'] . ' (0' . $row['contact'].')' ?>"
                                                    readonly />
                                            </div>

                                            <?php } ?>
                                        </div>
                                    </div>

                                    <?php
                                            }
                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


            </div>
        </div>
    </div>
</div>



<script src="../js/bootstrap.bundle.min.js"></script>

</body>

</html>