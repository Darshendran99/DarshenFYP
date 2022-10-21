
  <div class="container">
  	<div class="row">
  		<div class="col-lg-12">
  			<div class="page-content">
  				<div class="heading-section"style="text-align: center;">
  					<h4><em>Account</em>Management</h4>
  				</div>
  					<div class="row">

              <form class="" action="/updateAccount" method="post">

                <div class="row">
                  <div class="col-12 col-sm-6">
                    <div class="form-group">
                     <label for="firstname">First Name</label>
                     <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $users["firstname"];?>">  </input>
                    </div>
                  </div>

                  <div class="col-12 col-sm-6">
                    <div class="form-group">
                     <label for="lastname">Last Name</label>
                     <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $users["lastname"];?>"> </input>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                     <label for="address">Address</label>
                     <input type="text" class="form-control" name="address" id="address" value="<?php echo $users["address"];?>"> </input>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                     <label for="email">Email</label>
                     <input type="text" class="form-control" name="email" id="email" value="<?php echo $users["email"];?>"> </input>
                    </div>
                  </div>

                  <div class="col-12 col-sm-6">
                    <div class="form-group">
                     <label for="password">Password</label>
                     <input type="password" class="form-control" name="password" id="password" value=""> </input>
                   </div>
                 </div>

                 <div class="col-12 col-sm-6">
                   <div class="form-group">
                    <label for="password_confirm">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirm" id="password_confirm" value=""> </input>
                  </div>
                </div>

                <?php if (isset($validation)): ?>
                 <div class="col-12">
                   <div class="alert alert-danger" role="alert">
                     <?= $validation->listErrors() ?>
                   </div>
                 </div>
               <?php endif; ?>
               </div>


                <div class="row">
                            <div class="col-12 col-sm-4">
                              <button type="submit" class="btn btn-primary">Update</button>
                            </div>

                          </form>

  						</div>


  					</div>






  			</div>
  			</div>
  			</div>
  			</div>

	<?php echo view('sections/footer.php');?>
