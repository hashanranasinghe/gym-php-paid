<?php
ob_start();
session_start();

include "../form_handler.php"; ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="login.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
  <div class="header">
    <h1>The Fitness Master</h1>
    <h2>Login</h2>
  </div>

  <section class="justify-content-center align-items-center m-0">


    <div class="row justify-content-center align-items-center">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="../images/Screenshot_2021-12-18-10-04-02.png" class="rounded mx-auto d-block" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <?php if (isset($_SESSION["accountCreated"])) {
            echo $_SESSION["accountCreated"];
            unset($_SESSION["accountCreated"]);
        } ?>
        <?php if (isset($_SESSION["noUser"])) {
            echo $_SESSION["noUser"];
            unset($_SESSION["noUser"]);
        } ?>
         <?php if (isset($_SESSION["incorrectEmail"])) {
             echo $_SESSION["incorrectEmail"];
             unset($_SESSION["incorrectEmail"]);
         } ?>
          
        <form action="" method="POST">


          <!-- Email input -->

          <br/>
          <div class="form-outline mb-4">
            <input type="email" id="email" name="email" class="form-control form-control-lg"
              placeholder="Enter a valid email address" required />
            <label class="form-label" for="email">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="password" name="password" class="form-control form-control-lg"
              placeholder="Enter password" required />
            <label class="form-label" for="password">Password</label>
          </div>


          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;"
              name="submit">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="../register/register.php"
                class="link-danger">Sign Up</a>
            </p>
          </div>

        </form>
      </div>
    </div>

  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
</body>

</html>

<?php if (isset($_POST["submit"])) {
    echo "===========================";
    $email = $_POST["email"];
    $pass = $_POST["password"];

    // Make sure to sanitize user input to prevent SQL injection
    // I'll assume you have sanitized the variables in this example
    // $email = mysqli_real_escape_string($conn, $email);
    // $pass = mysqli_real_escape_string($conn, $pass);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["incorrectEmail"] =
            '<span class="fail">Invalid email format!</span>';
        header("Location: http://localhost/gym/user/login/login.php");
        exit();
    } else {
        $sql = "SELECT * FROM user WHERE email = '$email'";

        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            // If user exists, fetch the user's hashed password from the database
            $row = mysqli_fetch_assoc($result);
            $hashedPassword = $row["password"];
            // Verify the provided password against the hashed password
            if (password_verify($pass, $hashedPassword)) {
                $_SESSION["loginMessage"] =
                    '<span class="success">Welcome ' . $email . "</span>";
                // After successful login
                $_SESSION["user_name"] = $row["username"]; // Assuming the column name for the username is 'username' in your database
                $_SESSION["user_email"] = $row["email"];
                $_SESSION["user_id"] = $row["id"];
                header("location: http://localhost/gym/user/exercise.php");
                exit();
            } else {
                $_SESSION[
                    "noUser"
                ] = '<div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <div>
                  Invalid Email or Password!!
                </div>
              </div>';
                header("location: http://localhost/gym/user/login/login.php");
                exit();
            }
        } else {
            $_SESSION["noUser"] =
                '<div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <div>
                User not registered!
                </div>
              </div>';
            header("location: http://localhost/gym/user/login/login.php");
            exit();
        }
      }
    }
    ob_flush();
    
?>
