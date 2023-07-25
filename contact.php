<?php include 'components/navbar.php';



include('form_handler.php');

?>

<!------------contact us-------->
<section class="location">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126325.57066634555!2d80.33327301269566!3d8.335145709642982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afcf4f99360e159%3A0xc111fe9ebc6dcf0e!2sAnuradhapura!5e0!3m2!1sen!2slk!4v1656746184759!5m2!1sen!2slk"
        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>
<section class="contact-us">
    <div class="row">
        <div class="contact-col">
            <div>
                <i class="fa fa-home"></i>
                <span>
                    <h5> No 123,XYC Building</h5>
                    <p> Anuradhapura Road, Mihintale</p>
                </span>
            </div>
            <div>
                <i class="fa fa-phone"></i>
                <span>
                    <h5> +94 0123456789</h5>
                    <p> Monday to Saturday, 6AM to 11PM</p>
                </span>
            </div>
            <div>
                <i class="fa fa-envelope-o"></i>
                <span>
                    <h5> info@fitnessmaster.com</h5>
                    <p> Email us your query</p>
                </span>
            </div>

        </div>



        <div class="contact-col">
            <?php
            if (isset($_SESSION['addComment'])) {
                echo $_SESSION['addComment'];
                unset($_SESSION['addComment']);
            }
            ?>
            <?php
            if (isset($_SESSION['failComment'])) {
                echo $_SESSION['failComment'];
                unset($_SESSION['failComment']);
            }
            ?>
            <form action="" method="POST">

                <label for="name">Enter name</label>
                <input type="text" name="name" placeholder="name" value="<?php echo $_SESSION['user_name']; ?>" required
                    readonly>
                <label for="email">Enter Email</label>
                <input type="email" name="email" placeholder="Enter email"
                    value="<?php echo $_SESSION['user_email']; ?>" required readonly>
                <label for="comment">Comment</label>
                <textarea rows="8" name="comment" placeholder="comment" required ></textarea>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</section>
<!-------Footer-------->
<?php include 'components/footer.php' ?>


</body>

</html>

<?php


if (isset($_POST['submit'])) {
    // Retrieve form data
    $userId = $_SESSION['user_id'];
    $des = $_POST['comment'];



    $sql = "INSERT INTO workout (user_id, description) VALUES ('$userId', '$des')";
    $result = mysqli_query($conn, $sql);
    if ($result == true) {
        $_SESSION['addComment'] = '
        <span class="success" style="  background-color: green;
  padding: 5px 10px;
  color: white;
  border-radius: 5px;
  display: inline-block;">Add Comment Successfully!</span>
 
      ';
        header('location: http://localhost/gym/contact.php');
        exit();
    } else {
        $_SESSION['failComment'] = '<span class="fail">Failed!</span>';
        header('location: http://localhost/gym/contact.php');
        exit();
    }
}

?>