<?php
ob_start();

include 'components/navbar.php';



include('form_handler.php');

?>

<section class="vh-100">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">


                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                        <p class="text-center h1 fw-bold mb-1 mx-1 mx-md-4 mt-1">Ask for Information</p>

                        <form class="mx-1 mx-md-4" action="" method="POST">
                            <div class="d-flex flex-row align-items-center mb-1">

                                <?php
                                if (isset($_SESSION['addInfo'])) {
                                    echo $_SESSION['addInfo'];
                                    unset($_SESSION['addInfo']);
                                }
                                ?>
                                <?php
                                if (isset($_SESSION['failInfo'])) {
                                    echo $_SESSION['failInfo'];
                                    unset($_SESSION['failInfo']);
                                }
                                ?>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-1">

                                <div class="form-outline flex-fill mb-0">
                                    <input type="text" id="form3Example1c" class="form-control"
                                        value="<?php echo $_SESSION['user_name']; ?>" name="name" readonly />
                                    <label class="form-label" for="form3Example1c">Your Name</label>
                                </div>
                            </div>

                            <div class="d-flex flex-row align-items-center mb-1">

                                <div class="form-outline flex-fill mb-0">
                                    <input type="email" id="form3Example3c" class="form-control" name="email"
                                        value="<?php echo $_SESSION['user_email']; ?>" readonly />
                                    <label class="form-label" for="form3Example3c">Your Email</label>
                                </div>
                            </div>

                            <div class="d-flex flex-row align-items-center mb-1">

                                <div class="form-outline flex-fill mb-0">
                                    <textarea rows="8" type="text" id="form3Example4c" class="form-control"
                                        name="info" required ></textarea>
                                    <label class="form-label" for="form3Example4c">Ask</label>
                                </div>
                            </div>


                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </form>

                    </div>
                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                        <img src="images/pexels-karolina-grabowska-4397831.jpg" class="img-fluid" alt="Sample image">

                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>

</body>

</html>

<?php


if (isset($_POST['submit'])) {
    // Retrieve form data
    $userId = $_SESSION['user_id'];
    $des = $_POST['info'];



    $sql = "INSERT INTO advise (user_id, advice) VALUES ('$userId', '$des')";
    $result = mysqli_query($conn, $sql);
    if ($result == true) {
        $_SESSION['addInfo'] = '
        <span class="success" style="  background-color: green;
  padding: 5px 10px;
  color: white;
  border-radius: 5px;
  display: inline-block;">Ask information Successfully!</span>
 
      ';
        header('location: http://localhost/gym/advise.php');
        exit();
    } else {
        $_SESSION['failInfo'] = '<span class="fail">Failed!</span>';
        header('location: http://localhost/gym/advise.php');
        exit();
    }
}
ob_flush();
?>