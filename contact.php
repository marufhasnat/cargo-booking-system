<?php 

    require_once 'header.php';
    require_once 'connection.php';

    if(isset($_POST['send-message'])){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $result = mysqli_query($connect, "INSERT INTO `feedback`(`name`, `email`, `message`) VALUES ('$name','$email','$message')");

        if($result){

            $success = 'Thank You For Your Valueable Feedback:)';

        } else{

            $error = 'Something Went Wrong!';

        }

    }

?>

<div class="contact-container mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <form method="POST" action="">
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <div class="row">
                            <div class="col-md-2">
                            <label class="form-label" for="form4Example1">Full Name:</label>
                            </div>
                            <div class="col-md-10">
                            <input type="text" id="form4Example1" class="form-control" name="name" placeholder="Please Enter Full Name" required />
                            </div>
                        </div>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <div class="row">
                            <div class="col-md-2">
                            <label class="form-label" for="form4Example2">Email Address:</label>
                            
                            </div>
                            <div class="col-md-10">
                            <input type="email" id="form4Example2" class="form-control" name="email" placeholder="Please Enter Email Address" required />
                            </div>
                        </div>
                    </div>

                    <!-- Message input -->
                    <div class="form-outline mb-4">
                        <div class="row">
                            <div class="col-md-2">
                            <label class="form-label" for="form4Example3">Message:</label>                                                
                            </div>
                            <div class="col-md-10">
                            <textarea class="form-control" id="form4Example3" rows="4" name="message" placeholder="Please Enter Review Message" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="offset-md-2">
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-dark btn-block mb-4" name="send-message">Send Message</button>
                    </div>

                            <?php 
                                if(isset($success)){
                                    ?>
                                    <div class="alert alert-success alert-dismissible fade show mt-3 mb-3" role="alert"><?= $success ?>
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

                </form>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="contact-image">
                    <img style="filter: grayscale(100%) !important;" class="img-fluid" src="images/map.png" alt="map">
                </div>
            </div>
        </div>
    </div>
</div>


<script src="js/bootstrap.bundle.min.js"></script>


<?php

    // require_once 'footer.php';

?>