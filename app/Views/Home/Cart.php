<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/details.css'); ?>">

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Featured Games Start ***** -->
          <div class="row">

            <div class="heading-section"style="text-align: center;">

              <?php if (session()->get('isLoggedIn')): ?>
              <div class="main-button" style=" float: left; margin-left: 20px;">
                <a href="<?php echo base_url();?>/Home/Build_PC">View Order Status</a>
              </div>
              <div class="main-button" style=" float: right; margin-right: 20px;">
                <a href="<?php echo base_url();?>/Home/Build_PC">CheckOut</a>
              </div>
            <?php endif; ?>
              <h4><em>Cart</em> Page</h4>
              <br><br>
            </div>

            <div class="col-lg">
              <div class="featured-games header-text">
								<div class="row">
                  <table class="cart">
                   <tr>
                     <th class="cartnumber">No.</th>
                     <th>IMAGE</th>
                     <th>ITEM</th>
                     <th>PRICE</th>
                     <th>Quantity</th>
                     <th>TotalPrice</th>
                   </tr>


                   <?php foreach ($cart as $cart){ ?>
                   <tr>

                     <td class="counterCell"></td>
                     <td><?php echo $cart["ProductId"]; ?></td>




                   </tr>

                 <?php } ?>
                 </table>
                </div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    	</div>
    </div>
<?php echo view('sections/footer.php');?>
