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
                <a href="<?php echo base_url();?>/Home/Payment">CheckOut</a>
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

                       <?php if ($cart["ProductId"] != ""){ ?>
                          <td><img class="productDetailsImage" src="data:image/png;base64,<?php echo base64_encode($cart["itemImage"]); ?>" alt="" style="height: 100px; width: 100px;"></td>
                          <?php } ?>
                       <?php if ($cart["PromotionId"] != ""){ ?>
                         <td><img class="productDetailsImage" src="data:image/png;base64,<?php echo base64_encode($cart["itemImage"]); ?>" alt="" style="height: 100px; width: 100px;"></td>
                        <?php } ?>
                      <?php if ($cart["ComponentId"] != ""){ ?>
                        <td><img class="productDetailsImage" src="data:image/png;base64,<?php echo base64_encode($cart["itemImage"]); ?>" alt="" style="height: 100px; width: 100px;"></td>
                        <?php } ?>
                        <td><?php echo $cart["itemName"]; ?></td>
                        <td>RM <?php echo $cart["itemPrice"]; ?></td>
                        <td><?php echo $cart["itemQuantity"]; ?></td>
                        <td>RM <?php echo round(($cart["itemPrice"] * $cart["itemQuantity"]));?></td>

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
