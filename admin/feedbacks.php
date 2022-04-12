<?php 

    require_once 'header.php';

    $email = $_SESSION['admin_login'];

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
                            <td colspan="9">
                                <h3>Cargo Feedbacks</h3>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email Address</th>
                            <th scope="col">Message</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                
                                $result = mysqli_query($connect, "SELECT * FROM `feedback`");

                                while($row = mysqli_fetch_assoc($result)){

                                ?>
                        <tr>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['message'] ?></td>
                            <td><a style="text-decoration: none;"
                                    href="delete.php?feedback-delete=<?= base64_encode($row['id']) ?>"
                                    onclick="return confirm('Are You Sure To Delete?')">Delete</a></td>

                        </tr>

                        <?php 
                                    
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