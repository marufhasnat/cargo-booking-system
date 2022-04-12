<?php 

    require_once 'header.php';

    $email = $_SESSION['user_login'];
    $data_id = mysqli_query($connect, "SELECT `id` FROM `users` WHERE `email` = '$email'");
    $user_id;
    while($rowdata = mysqli_fetch_array($data_id)){
        $user_id = $rowdata['id'];
    }

    


?>


<!-- cargo's form -->
<section class="cargo-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="lg-offset-2 col-lg-8 col-md-12">

                <div class="sender-details mt-5 p-5" style="background-color: whitesmoke;">

                    <form method="POST" action="">

                        <h5 style="font-weight: bold;" class="text-center mb-5">Track Your Cargo By Tracking ID</h5>

                        <div class="form-outline mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label" for="form4Example1">Enter Your Tracking ID:</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" id="form4Example1" class="form-control" name="tracking-result"
                                        placeholder="Enter Your Tracking ID" required />
                                </div>
                            </div>
                        </div>

                        <div class="button-sub text-center">
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-dark btn-block mt-4" name="tracking-submit">Track
                                Cargo</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<?php 
    
      if(isset($_POST['tracking-submit'])){

        $tracking_res = $_POST['tracking-result'];

      ?>

<div class="basic-price-table">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">

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
                                
                                
                                $result = mysqli_query($connect, "SELECT * FROM `tracking` WHERE `tracking_id` LIKE '%$tracking_res%'");
                                $temp = mysqli_num_rows($result);

                                if($temp > 0){

                                  while($row = mysqli_fetch_assoc($result)) {

                    ?>

                <table class="table table-bordered table-striped table-hover mt-5 mb-5">
                    <thead>
                        <tr>
                            <td colspan="9">
                                <h3>Tracking Cargo</h3>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Tracking ID</th>
                            <th scope="col">Location</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $row['tracking_id'] ?></td>
                            <td><?= $row['location'] ?></td>
                            <td><?= $row['date'] ?></td>
                            <td><?= ucwords($row['status']) ?></td>
                            <?php } 
                                        } else {

                                          ?>
                            <!-- <h1 style="color: red; margin-top: 25px; text-align: center">Sorry Nothing Found!</h1> -->
                            <div class="alert alert-danger alert-dismissible fade show mt-3 mb-3" role="alert">
                                <h5>Sorry Nothing Found!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php

                                        }?>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php

    }

    ?>


<script src="../js/bootstrap.bundle.min.js"></script>

</body>

</html>