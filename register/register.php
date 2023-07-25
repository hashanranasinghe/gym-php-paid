<?php


ob_start();

include('../form_handler.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="register.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="header">
        <h1>The Fitness Master</h1>
        <h2>Sign Up</h2>
    </div>
    <section class="justify-content-center align-items-center m-0">


        <div class="row justify-content-center align-items-center">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="../images/Screenshot_20230627-132205.png" class="rounded d-block mx-auto" alt="image"
                    style="height:500px">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action="" method="POST">



                    <!-- name input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="name" name="username" class="form-control form-control-lg"
                            placeholder="Name" required />
                        <label class="form-label" for="name">Full Name</label>
                    </div>


                    <?php
                    if (isset($_SESSION['unSuccessful'])) {
                        echo $_SESSION['unSuccessful'];
                        unset($_SESSION['unSuccessful']);
                    }
                    if (isset($_SESSION['invalid'])) {
                        echo $_SESSION['invalid'];
                        unset($_SESSION['invalid']);
                    }
                    ?>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="email" name="email" class="form-control form-control-lg"
                            placeholder="Email" required />
                        <label class="form-label" for="email">Email address</label>
                    </div>

                    <!-- phone input -->
                    <div class="form-outline mb-4">
                        <input type="number" id="phone" name="phone" class="form-control form-control-lg"
                            placeholder="Phone Number" required />
                        <label class="form-label" for="phone">Phone Number</label>
                    </div>
                    <?php
                    if (isset($_SESSION['password'])) {
                        echo $_SESSION['password'];
                        unset($_SESSION['password']);
                    }
                    ?>
                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input type="password" id="password" name="password" class="form-control form-control-lg"
                            placeholder="Password" pattern="(?=.*\d)(?=.*[a-zA-Z])(?=.*[\W_]).{8,}" required />
                        <label class="form-label" for="password">Password (at least 8 characters with a special
                            character)</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input type="password" id="cPassword" class="form-control form-control-lg"
                            placeholder="Confirm Password" name="cpassword" required />
                        <label class="form-label" for="cPassword">Confirm Password</label>
                    </div>


                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;" name="submit">Sign Up</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="../login/login.php"
                                class="link-danger">Login</a>
                        </p>
                    </div>

                </form>
            </div>
        </div>

    </section>
    <script>
        // JavaScript validation
        document.getElementById("password").addEventListener("input", function () {
            const passwordInput = this.value;
            const passwordPattern = /^(?=.*\d)(?=.*[a-zA-Z])(?=.*[\W_]).{8,}$/;
            const isValidPassword = passwordPattern.test(passwordInput);
            this.setCustomValidity(isValidPassword ? "" : "Password must be at least 8 characters with a special character.");
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>

<?php


if (isset($_POST['submit'])) {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phone'];
    $pass = $_POST['password'];
    $cPass = $_POST['cpassword'];

    // Check if the email is in a valid format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['invalid'] = '<span class="fail"  style="padding: 5px 10px;
        color: red;">Invalid email format!</span>';
        header('Location: http://localhost/gym/register/register.php');
        exit();
    }

    // Check if the passwords match
    if ($pass !== $cPass) {
        $_SESSION['password'] = '<span class="fail" style="padding: 5px 10px;
        color: red;">Passwords do not match!</span>';
        header('Location: http://localhost/gym/register/register.php');
        exit();
    }

    // Hash the password before storing it in the database
    $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

    // Make sure to sanitize user input to prevent SQL injection
    // I'll assume you have sanitized the variables in this example
    // $username = mysqli_real_escape_string($conn, $username);
    // $email = mysqli_real_escape_string($conn, $email);
    // $phoneNumber = mysqli_real_escape_string($conn, $phoneNumber);

    // Establish a database connection (assuming you have done this already)

    // Check if the email is already registered
    $checkSql = "SELECT * FROM user WHERE email = '$email'";
    $checkResult = mysqli_query($conn, $checkSql);
    $count = mysqli_num_rows($checkResult);
    if ($count > 0) {
        $_SESSION['unSuccessful'] = '<span class="fail" style="padding: 5px 10px;
        color: red;">Email address already registered!</span>';
        header('Location: http://localhost/gym/register/register.php');
        exit();
    }

    // If the email is not registered, proceed to insert the new user
    $sql = "INSERT INTO user (username, email, phone_number, password) VALUES ('$username', '$email', '$phoneNumber', '$hashedPassword')";
    $result = mysqli_query($conn, $sql);
    if ($result == true) {
        $_SESSION['accountCreated'] = '<span class="success"  style="  background-color: green;
        padding: 5px 10px;
        color: white;
        border-radius: 5px;
        display: inline-block;">Account ' . $username . ' created!</span>';
        header('Location: http://localhost/gym/login/login.php');
        exit();
    } else {
        $_SESSION['unSuccessful'] = '<span class="fail">' . $username . ' failed!</span>';
        header('Location: http://localhost/gym/register/register.php');
        exit();
    }
}
ob_flush();
?>