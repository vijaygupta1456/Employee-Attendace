<?php include('header.php'); ?>

<body style="background-color:#22507a">
  <form action="create.php" method="POST">
    <section class="">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col">
            <div class="card card-registration my-4">
              <div class="row g-0">
                <div class="col-xl-6 d-none d-xl-block">
                  <img src="img/reg.webp" alt="Sample photo" class="img-fluid" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;">
                </div>
                <div class="col-xl-6">
                  <div class="card-body p-md-5 text-black">
                    <h3 class="mb-5 text-uppercase">Registration form</h3>

                    <div class="row">
                      <div class="col-md-6 mb-4">
                        <div class="form-outline">
                          <label class="form-label" for="fname">First name</label>
                          <input type="text" name="fname" id="fname" class="form-control form-control-lg" />
                        </div>
                      </div>
                      <div class="col-md-6 mb-4">
                        <div class="form-outline">
                          <label class="form-label" for="lname">Last name</label>
                          <input type="text" name="lname" id="lname" class="form-control form-control-lg" />
                        </div>
                      </div>
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="id">Employee ID</label>
                      <input type="text" name="id" id="id" class="form-control form-control-lg" />
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="position">Position</label>
                      <input type="text" name="position" id="position" class="form-control form-control-lg" placeholder="Software Developer, Testing, Software Designer....." />
                    </div>

                    <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                      <h6 class="mb-0 me-4">Gender: </h6>

                      <div class="form-check form-check-inline mb-0 me-4">
                        <input class="form-check-input" type="radio" name="gender" id="femaleGender"
                        value="female" />
                        <label class="form-check-label" for="femaleGender">Female</label>
                      </div>

                      <div class="form-check form-check-inline mb-0 me-4">
                        <input class="form-check-input" type="radio" name="gender" id="maleGender"
                        value="male" />
                        <label class="form-check-label" for="maleGender">Male</label>
                      </div>

                      <div class="form-check form-check-inline mb-0">
                        <input class="form-check-input" type="radio" name="gender" id="otherGender"
                        value="other" />
                        <label class="form-check-label" for="otherGender">Other</label>
                      </div>

                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-4">
                        <div class="form-outline">
                          <label class="form-label" for="form3Example1m1">Date Of Joining</label>
                          <input type="date" name="doj" id="form3Example1m1" class="form-control form-control-lg" />
                        </div>
                      </div>
                      <div class="col-md-6 mb-4">
                        <div class="form-outline">
                          <label class="form-label" for="form3Example1n1">Date Of Birth</label>
                          <input type="date" name="dob" id="form3Example1n1" class="form-control form-control-lg" />
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-4">
                        <div class="form-outline">
                          <label class="form-label" for="form3Example1m1">Mobile Number</label>
                          <input type="text" name="mobile" id="form3Example1m1" class="form-control form-control-lg" />
                        </div>
                      </div>
                      <div class="col-md-6 mb-4">
                        <div class="form-outline">
                          <label class="form-label" for="form3Example1n1">Emergency Mobile Number</label>
                          <input type="text" name="emobile" id="form3Example1n1" class="form-control form-control-lg" />
                        </div>
                      </div>
                    </div>


                    <div class="form-outline mb-4">
                      <label class="form-label" for="form3Example9">Email ID</label>
                      <input type="email" name="email" id="form3Example9" class="form-control form-control-lg" />
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-4">
                        <div class="form-outline">
                          <label class="form-label" for="form3Example1m1">Password</label>
                          <input type="Password" name="password" id="form3Example1m1" class="form-control form-control-lg" />
                        </div>
                      </div>
                      <div class="col-md-6 mb-4">
                        <div class="form-outline">
                          <label class="form-label" for="form3Example1n1">Confirm Password</label>
                          <input type="Password" name="newpassword" id="form3Example1n1" class="form-control form-control-lg" />
                        </div>
                      </div>
                    </div>

                    <div class="d-flex justify-content-end pt-3">
                      <button type="submit" name="submit" class="btn btn-warning btn-lg ms-2">Submit form</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </form>
</body>

