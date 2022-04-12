<?php 

    require_once 'header.php';

    $email = $_SESSION['user_login'];
    $data_id = mysqli_query($connect, "SELECT `id` FROM `users` WHERE `email` = '$email'");
    $user_id;
    while($rowdata = mysqli_fetch_array($data_id)){
        $user_id = $rowdata['id'];
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

                <table class="table table-bordered table-striped table-hover mt-5 mb-5">
                    <thead>
                        <tr>
                            <td colspan="10">
                                <h3>My Cargo Orders</h3>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Tracking ID</th>
                            <th scope="col">Sender Name</th>
                            <th scope="col">Sender Contact</th>
                            <th scope="col">Sender City</th>
                            <th scope="col">Receiver Name</th>
                            <th scope="col">Receiver Contact</th>
                            <th scope="col">Receiver City</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                
                                $result = mysqli_query($connect, "SELECT * FROM `cargo` WHERE `user_id` = '$user_id' ");
                                $tracking_result = mysqli_query($connect, "SELECT * FROM `tracking` WHERE `user_id` = '$user_id' ");


                                $cargo_id;
                                $tracking_id;

                                while($row = mysqli_fetch_assoc($result)){

                                  $cargo_id = $row['id'];
                                  $tracking_id = $row['tracking_id'];

                                ?>
                        <tr>
                            <td><?= $row['tracking_id'] ?></td>
                            <td><?= $row['sender_name'] ?></td>
                            <td><?= $row['sender_contact'] ?></td>
                            <td><?= $row['sender_city'] ?></td>
                            <td><?= $row['receiver_name'] ?></td>
                            <td><?= $row['receiver_contact'] ?></td>
                            <td><?= $row['receiver_city'] ?></td>
                            <td><?= date('d-M-Y', strtotime($row['date'])) ?></td>

                            <?php 

                                    $price_result = mysqli_query($connect, "SELECT * FROM `price` WHERE `user_id` = '$user_id' AND `cargo_id` = '$cargo_id' AND `total_price` != '' "); 
                                    
                                    while($row = mysqli_fetch_assoc($price_result)){
                                        ?>

                            <td><?= $row['total_price'] ?> TK</td>

                            <?php
                                    }
                                 
                                $tracking_result = mysqli_query($connect, "SELECT * FROM `tracking` WHERE `user_id` = '$user_id' AND `tracking_id` = '$tracking_id' ");

                                while($row = mysqli_fetch_assoc($tracking_result)){

                                ?>

                            <td><?= ucwords($row['status']) ?></td>
                        </tr>

                        <?php }
                                    
                                } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<script src="../js/bootstrap.bundle.min.js"></script>

</body>

</html>