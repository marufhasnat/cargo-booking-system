<?php 

    require_once 'header.php';

    $cargo_id;
    $user_id;
    $driver_id;

    if(isset($_GET['cargo-id']) && isset($_GET['user-id'])){

        $cargo_id = base64_decode($_GET['cargo-id']);
        $user_id = base64_decode($_GET['user-id']);
        $driver_id = base64_decode($_GET['driver-id']);

    }

    $result = mysqli_query($connect, "SELECT * FROM `cargo` WHERE `id` = '$cargo_id' AND `user_id` = '$user_id' ");

    $tracking_id;

    while($row = mysqli_fetch_assoc($result)){

        $tracking_id = $row['tracking_id'];

    }


    if(isset($_POST['update-status'])){

        $status = $_POST['status'];
        $location = $_POST['location'];
        $date = $_POST['date'];


        if($status == 'delivered'){

            $result = mysqli_query($connect, "UPDATE `cargo` SET `status`= 2 WHERE `id` = '$cargo_id' ");
            $driver_status_update = mysqli_query($connect, "UPDATE `driver` SET `status`=0 WHERE `id` = '$driver_id'");
            
        }

        $result = mysqli_query($connect, "UPDATE `tracking` SET `status`='$status',`location`='$location',`date`='$date' WHERE `tracking_id` = '$tracking_id'");

        if($result){

                    ?>

<script type="text/javascript">
alert("Cargo's Status Changed Successfully!");
javascript: history.go(-1);
</script>

<?php

                    $success = "Cargo's Status Changed Successfully!";
                    
                    
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
                        <?php 

                                $result = mysqli_query($connect, "SELECT * FROM `tracking` WHERE `user_id` = '$user_id' AND `tracking_id` = '$tracking_id' ");

                                while($row = mysqli_fetch_assoc($result)){

                            ?>

                        <h5 style="font-weight: bold;" class="text-center mb-5">Manage Cargo</h5>
                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example1">Tracking ID:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" id="form4Example1" class="form-control" name="location"
                                        value="<?= $row['tracking_id'] ?>" readonly />
                                </div>
                            </div>
                        </div>

                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example3">Cargo's Status:</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control" name="status">
                                        <option value="<?= $row['status'] ?>"><?= ucwords($row['status']) ?>
                                        </option>
                                        <option value="processing">Processing</option>
                                        <option value="onway">On The Way</option>
                                        <option value="delivered">Delivered</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example1">Cargo's Location:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" id="form4Example1" class="form-control" name="location"
                                        placeholder="Cargo's Location"
                                        value="<?= isset($row['location']) ? $row['location'] : '' ?>" required />
                                </div>
                            </div>
                        </div>

                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example1">Current Date:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="date" id="form4Example1" class="form-control" name="date"
                                        value="<?= isset($row['date']) ? $row['date'] : '' ?>" required />
                                </div>
                            </div>
                        </div>

                        <?php
                                }
                            ?>

                        <div class="button-sub text-center">
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-dark btn-block mt-4" name="update-status">Update
                                Status</button>
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