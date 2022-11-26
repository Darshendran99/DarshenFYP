<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/payment.css'); ?>">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Featured Games Start ***** -->
          <div class="row">

            <div class="heading-section"style="text-align: center;">
              <h4><em>PAYMENT</em> Page</h4>
              <br><br>
            </div>

            <div class="col-lg">
              <div class="featured-games header-text">
								<div class="row">

                  <div class="paymentRow">
                    <div class="col-50">
                      <form class="" action="/Payment" method="post">

                      <label for="name"><i class="fa fa-user"></i> Full Name</label>
                      <input type="text" id="name" name="name" placeholder="John M. Doe" value="<?= set_value('name') ?>">
                      <label for="email"><i class="fa fa-envelope"></i> Email</label>
                      <input type="text" id="email" name="email" placeholder="john@example.com" value="<?= set_value('email') ?>">
                      <label for="address"><i class="fa fa-address-card-o"></i> Address</label>
                      <input type="text" id="address" name="address" placeholder="542 W. 15th Street" value="<?= set_value('address') ?>">
                      <label for="city"><i class="fa fa-institution"></i> City</label>
                      <input type="text" id="city" name="city" placeholder="New York" value="<?= set_value('city') ?>">

                      <div class="paymentRow">
                        <div class="col-50">
                          <label for="state">State</label>
                          <input type="text" id="state" name="state" placeholder="NY" value="<?= set_value('state') ?>">
                        </div>
                        <div class="col-50">
                          <label for="zip">Zip</label>
                          <input type="text" id="zip" name="zip" placeholder="10001" value="<?= set_value('zip') ?>">
                        </div>
                      </div>
                      <input type="checkbox" id="cod" name="cod" value="cod">
                      <label for="cod" style="float: left;"><i class="fa fa-money"></i> Cash On Delivery?</label>
                    </input>
                    </div>

                    <div class="col-50">

                      <label for="fname">Accepted Cards</label>
                      <div class="icon-paymentContainer">
                        <i class="fa fa-cc-visa" style="color:navy;"></i>
                        <i class="fa fa-cc-amex" style="color:blue;"></i>
                        <i class="fa fa-cc-mastercard" style="color:red;"></i>
                        <i class="fa fa-cc-discover" style="color:orange;"></i>
                      </div>


                      <label for="cardname">Name on Card</label>
                      <input type="text" id="cardname" name="cardname" placeholder="John More Doe" value="<?= set_value('cardname') ?>">
                      <label for="cardnumber">Credit card number</label>
                      <input type="text" id="cardnumber" name="cardnumber" placeholder="1111222233334444" value="<?= set_value('cardnumber') ?>">
                      <label for="expmonth">Exp Month</label>
                      <input type="text" id="expmonth" name="expmonth" placeholder="September" value="<?= set_value('expmonth') ?>">

                      <div class="paymentRow">
                        <div class="col-50">
                          <label for="expyear">Exp Year</label>
                          <input type="text" id="expyear" name="expyear" placeholder="2018" value="<?= set_value('expyear') ?>">
                        </div>
                        <div class="col-50">
                          <label for="cvv">CVV</label>
                          <input type="text" id="cvv" name="cvv" placeholder="352" value="<?= set_value('cvv') ?>">
                        </div>
                      </div>
                    </div>


                  </div>

                  <?php if (isset($validation)): ?>
                   <div class="col-lg">
                     <div class="alert alert-danger" role="alert">
                       <?= $validation->listErrors() ?>
                     </div>
                   </div>
                  <?php endif; ?>

                  <?php if (session()->get('msg')): ?>
                    <div class="alert alert-danger" role="alert">
                      <?= session()->get('msg') ?>
                    </div>
                  <?php endif; ?>

                  <?php $total_price_sum = 0; $total_items = "";
                  foreach ($cart as $cartValues){
                    $total_price_sum = $total_price_sum + $cartValues["itemPrice"];
                    $total_items =$total_items."&emsp; ".$cartValues["itemName"];
                  } ?>

                  <div class="row">

                  <div class="col-12 col-sm-4">
                    <br>
                    <input type="hidden" id="totalPrice" name="totalPrice" value="<?php echo $total_price_sum; ?>">
                    <input type="hidden" id="totalItem" name="totalItem" value="<?php echo $total_items; ?>">
                    <?php if ($total_price_sum > 6000) { ?>
                    <button type="submit" class="btn btn-primary">Try your luck and get a free Reward</button>
                  <?php }else{ ?>
                    <button type="submit" class="btn btn-primary">Place Order</button>
                  <?php } ?>
                  </div>
                </form>
              </div>
              </div>
            </div>
            <br>
            <div class="col-25">
              <div class="paymentContainer">
                <h4>Cart
                  <span class="price" style="color:white">
                    <i class="fa fa-shopping-cart">&emsp;</i>
                    <b><?php echo count($cart);?></b>
                  </span>
                </h4>
                <br>
              <?php
              foreach ($cart as $cart){ ?>
                <?php if ($cart["ProductId"] != ""){ ?>
                <p><a><?php echo $cart["itemName"]; ?></a> <span class="price">RM <?php echo round(($cart["itemPrice"] * $cart["itemQuantity"]));?></span></p>
              <?php } ?>
              <?php if ($cart["PromotionId"] != ""){ ?>
              <p><a><?php echo $cart["itemName"]; ?></a> <span class="price">RM <?php echo round(($cart["itemPrice"] * $cart["itemQuantity"]));?></span></p>
            <?php } ?>
            <?php if ($cart["ComponentId"] != ""){ ?>
            <p><a ><?php echo $cart["itemName"]; ?></a> <span class="price">RM <?php echo round(($cart["itemPrice"] * $cart["itemQuantity"]));?></span></p>
          <?php }} ?>
                <hr>

                <a>Total <span class="price" style="color:white"><b>RM <?php echo $total_price_sum;?></b></span></a>


                </div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    	</div>
    </div>
<?php echo view('sections/footer.php');?>
