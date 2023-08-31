<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <title> Fitness Center Website Design</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css">
</head>

<body>
    <section class="sub-header">
        <nav>
            <a href="index.html"> <img src="images/Screenshot_2021-12-18-10-08-57.png"></a>
            <div class="nav-links " id="navlinks">
                <i class="fa fa-window-close" onclick="hideMenu()"></i>
                <ul>
                    <li> <a href="index.html">HOME</a></li>
                    <li> <a href="about.html">ABOUT</a></li>
                    <li> <a href="guidence.html">GUIDENCE</a></li>
                    <li> <a href="contact.html">CONTACT</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>


        </nav>
        <h1> Guidence </h1>
    </section>

    <!-----------Guidence------->

    <section class="Guidence">
        <h1> Guidence We Offer</h1>
        <p> We Have The Best Collection Of Fitness Trainee Masters</p>

        <div class="row">
            <div class="Guidence-col">
                <h3> Fat Burn </h3>
                <p> We Show The Way To Burn Your Fat Simply And It Gives The Body You Want </p>


            </div>
            <div class="Guidence-col">
                <h3> Muscle Gain </h3>
                <p> We Guide You In Proper Way To Get A Muscular Body That You Want </p>
            </div>

            <div class="Guidence-col">
                <h3> Weight Lifting </h3>
                <p> We Train You To Be A Professional Weight Lifter To Achieve Your High Goals </p>
            </div>



        </div>

    </section>
    <!-----------facilities------->
    <section class="difference">
        <h1> Our Facilities</h1>
        <p> We Have The Sri Lanka's First Grade Fitness Consultants With World Class Branding Equipments, Well Trained
            Doctors And A Good Food Outlet With Full Of Nutritions You Want. </p>

        <div class="row">
            <div class="difference-col">
                <img src="images/Screenshot_2022-05-08-15-45-06.png">
                <h3> Best Equipments</h3>
                <p> Change Your Body As You Want With The Best Equipments We Have </p>
            </div>
            <div class="difference-col">
                <img src="images/Screenshot_2021-12-18-10-03-43.png">
                <h3> Best Trainers</h3>
                <p> Play With Our Trainers Together And Achieve What You Want</p>
            </div>
            <div class="difference-col">
                <img src="images/Screenshot_2021-12-18-10-03-28.png">
                <h3> Best Consultants</h3>
                <p> Follow The Instructions And Be Fit And Healthy</p>
            </div>
        </div>
    </section>

    <!-------Footer-------->
    <?php include 'components/footer.php' ?>

</body>

</html>
?>