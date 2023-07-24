<?php include 'components/navbar.php' ?>

<section>
  <div class="container py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-4">
        <div class="card rounded-3">
          <div class="card-body mx-1 my-2">
            <div class="d-flex align-items-center">
              <div>
                <i class="fab fa-cc-visa fa-4x text-black pe-3"></i>
              </div>
              <div>
                <p class="d-flex flex-column mb-0">
                  <b>Select payment Method</b>
                </p>
              </div>
            </div>

            <div class="pt-3">
              <div class="d-flex flex-row pb-3">
                <div class="rounded d-flex w-100 p-3 align-items-center"
                  style="background-color: rgba(18, 101, 241, 0.07);">
                  <div class="d-flex align-items-center pe-3">
                    <input class="form-check-input" type="radio" name="radioNoLabelX" id="radioNoLabel11" value=""
                      aria-label="..." checked />
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-0 text-primary">Online Payment</h6>
                  </div>
                </div>
              </div>

              <div class="d-flex flex-row pb-3">
              <div class="rounded d-flex w-100 p-3 align-items-center"
                  style="background-color: rgba(18, 101, 241, 0.07);">
                  <div class="d-flex align-items-center pe-3">
                    <input class="form-check-input" type="radio" name="radioNoLabelX" id="radioNoLabel22" value=""
                      aria-label="..." />
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-0 text-primary">Payment Slip</h6>
                  </div>
                </div>
              </div>
            </div>

            <div class="d-flex justify-content-between align-items-center pb-1">
              <a href="index.php" class="text-muted">Go back</a>
              <button type="button" class="btn btn-primary btn-lg">Pay amount</button>
            </div>
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