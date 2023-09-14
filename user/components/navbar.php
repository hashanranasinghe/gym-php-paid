<?php 

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0" />
    <title>Fitness Center Website Design</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" type="text/css" href="styles/style.css" media="all" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <nav>
      <div class="navClass">
      <div>
                <a href="index.php">

                <img src="images/logo.png" /></a>
            </div>
            <div>
                
                
                <i class="fa fa-bars" onclick="showMenu()"></i>
            </div>
      </div>



            <div class="nav-links" id="navlinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="community.php">COMMUNITY</a></li>
                        <li><a href="about.php">ABOUT US</a></li>
                        <li><a href="contact.php">Contact US</a></li>
                        <li><a href="exercise.php">My Exercises</a></li>
                        <li><a href="?logout=true">Logout</a></li>
                </ul>
            </div>
    </nav>
    <script>
        var navlinks = document.getElementById("navlinks");

        function showMenu() {
            navlinks.style.right = "0";
        }
        function hideMenu() {
            navlinks.style.right = "-200px";
        }


    </script>


<?php


// Logout function
function logout() {

    $_SESSION = array();


    session_destroy();


    header("Location: http://localhost/gym/login/login.php");
    exit();
}

if (isset($_GET["logout"])) {
    logout();
}



ob_flush();
?>
