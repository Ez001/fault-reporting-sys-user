<main>
   <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-md-10 d-flex flex-column align-items-center justify-content-center">
                  <div class="card mb-3">
                     <div class="card-body">

                        <div class="pt-4 pb-2 mb-3">
                           <h5 class="card-title pb-0 fs-4">Sign Up</h5>
                           <h6>Please, fill in the details below!</h6>
                        </div>

                        <?= $web_app->showAlert( $msg ) ?>
                     
                        <form class="row g-3 needs-validation" method="POST" novalidate>
                           <div class="row ">
                              <div class="col-md-6 mb-3">
                                 <label for="first_name" class="form-label fw-bold">First Name</label>
                                 <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Enter First Name" value="<?= $web_app->persistData( 'first_name', false, $clear ); ?>" autofocus required>
                                 <div class="invalid-feedback">Please enter your first name!</div>
                              </div> 
                              <div class="col-md-6 mb-3">
                                 <label for="last_name" class="form-label fw-bold">Last Name</label>
                                 <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter Last Name" value="<?= $web_app->persistData( 'last_name', false, $clear ); ?>"  required>
                                 <div class="invalid-feedback">Please enter your last name!</div>
                              </div> 
                              <div class="col-md-6 mb-3">
                                 <label for="email" class="form-label fw-bold">Email</label>
                                 <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" value="<?= $web_app->persistData( 'email', false, $clear  ); ?>"  required>
                                 <div class="invalid-feedback">Please enter your email!</div>
                              </div> 

                              <div class="col-md-6 mb-3">
                                 <label for="pword" class="form-label fw-bold">Password</label>
                                 <input type="password" name="pword" class="form-control" id="pword" placeholder="Enter Password" required>
                                 <div class="invalid-feedback">Please enter your password!</div>
                              </div>
                           </div>
                           <div class="text-center">
                              <button class="btn btn-success" type="submit" name="sign_up_btn">Sign Up</button>
                           </div>
                           <div class="text-center">
                              <p class="small mb-0">Already have account? <a href="login">Login</a></p>
                           </div>
                        </form>

                     </div>
                  </div>

                  <div class="credits">
                     Developed by <a href="https://fixthings.com.ng">FixT</a>
                  </div>

               </div>
            </div>
         </div>
      </section>

   </div>
</main><!-- End #main -->