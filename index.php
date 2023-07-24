
<?php include 'components/heroSection.php' ?>

    <!---------Guidence------------>
    <section class="Guidence">
      <h1>Guidence we offer</h1>
      <p>"You get what you work for, not what you wish for"</p>

      <div class="row">
        <div class="Guidence-col">
          <h3>Fat burn</h3>
          <p>
            We show the way to burn your fat simply and it gives the body you
            want
          </p>
        </div>
        <div class="Guidence-col">
          <h3>Muscle Gain</h3>
          <p>We Guide You In Proper Way To Get A Muscular Body That You Want</p>
        </div>

        <div class="Guidence-col">
          <h3>Weight Lifting</h3>
          <p>
            We Train You To Be A Professional Weight Lifter To Achieve Your High
            Goals
          </p>
        </div>
      </div>
    </section>
    <!--------priority------->

    <section class="priority">
      <h1>Our First Priority</h1>
      <p>Our Main Focus Is To Keep Your Health Best</p>

      <div class="row">
        <div class="priority-col">
          <img src="images/Screenshot_20230627-163819.png" />
          <div class="layer">
            <h3>BURN</h3>
          </div>
        </div>
        <div class="priority-col">
          <img src="images/Screenshot_20230627-165745.png" />
          <div class="layer">
            <h3>MUSCLE</h3>
          </div>
        </div>
        <div class="priority-col">
          <img src="images/Screenshot_20230627-163255.png" />
          <div class="layer">
            <h3>WEIGHT</h3>
          </div>
        </div>
      </div>
    </section>

    <!--------difference------------->
    <section class="difference">
      <h1>Our Facilities</h1>
      <p>
        We Have The Sri Lanka's First Grade Fitness Consultants With World Class
        Branding Equipments, Well Trained Doctors And A Good Food Outlet With
        Full Of Nutritions You Want.
      </p>

      <div class="row">
        <div class="difference-col">
          <img src="images/Screenshot_20230627-170944.png" />
          <h3>Best Equipments</h3>
          <p>Change Your Body As You Want With The Best Equipments We Have</p>
        </div>
        <div class="difference-col">
          <img src="images/Screenshot_2021-12-18-10-03-43.png" />
          <h3>Best Trainers</h3>
          <p>Play With Our Trainers Together And Achieve What You Want</p>
        </div>
        <div class="difference-col">
          <img src="images/Screenshot_2021-12-18-10-03-28.png" />
          <h3>Best Consultants</h3>
          <p>Follow The Instructions And Be Fit And Healthy</p>
        </div>
      </div>
    </section>

    <!-------testimonials------>
    <section class="testimonials">
      <h1>What Our Followers Says</h1>
      <p>There Are Some Experiences That Our Followers Had Shared With Us.</p>

      <div class="row">
        <div class="testimonials-col">
          <img src="images/pexels-andrea-piacquadio-3757954.jpg" />
          <div>
            <p>
              I've been here for last 6,7 months and now I feel a real change in
              my body. It makes me mentally good also.
            </p>
            <h3>Shakila Wanigasooriya</h3>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
          </div>
        </div>
        <div class="testimonials-col">
          <img src="images/Screenshot_2021-12-18-10-04-39.png" />
          <div>
            <p>
              I know about this place from one of my friends. I have been here
              for just 3 months but I Feel real change to my whole body.
            </p>
            <h3>Nithika Seram</h3>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-o"></i>
          </div>
        </div>
      </div>
    </section>

    <!---------call to action------->
    <section class="cta">
      <h1>Come And Join With Us To Feel The Change</h1>
      <button type="button" class="btn btn-warning">Join with Us</button>
    </section>
    <!-------call to action-------->

    <!-------Footer-------->
    <?php include 'components/footer.php' ?>

    <!----------javaScript for toggle Menu-------->
    <script>
      
      var navlinks = document.getElementById("navlinks");

      function showMenu() {
        navlinks.style.right = "0";
      }
      function hideMenu() {
        navlinks.style.right = "-200px";
      }
    </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
  </body>
</html>
