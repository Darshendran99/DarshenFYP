<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/details.css'); ?>">

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">
          <?php if (session()->get('msg')): ?>
          <div class="alert alert-danger" role="alert" style="text-align:center;">
          <?=session()
        ->get('msg') ?>
          </div>
          <?php
endif; ?>
          <!-- ***** Featured  Start ***** -->
          <div class="row">

            <div class="heading-section"style="text-align: center;">

              <?php if (session()
    ->get('isLoggedIn')): ?>
              <div class="main-button" style=" float: left; margin-left: 20px;">
                <a href="<?php echo base_url(); ?>/Home/OrderStatus">View Order Status</a>
              </div>
              <div class="main-button" style=" float: right; margin-right: 20px;">
                <a href="<?php echo base_url(); ?>/Home/Payment">CheckOut</a>
              </div>
            <?php
endif; ?>
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
                     <th></th>
                   </tr>

                   <?php foreach ($cart as $cart)
{ ?>
                   <tr>

                     <td class="counterCell"></td>

                       <?php if ($cart["ProductId"] != "")
    { ?>
                          <td><img class="productDetailsImage" src="data:image/png;base64,<?php echo base64_encode($cart["itemImage"]); ?>" alt="" style="height: 100px; width: 100px;"></td>
                          <?php
    } ?>
                       <?php if ($cart["PromotionId"] != "")
    { ?>
                         <td><img class="productDetailsImage" src="data:image/png;base64,<?php echo base64_encode($cart["itemImage"]); ?>" alt="" style="height: 100px; width: 100px;"></td>
                        <?php
    } ?>
                      <?php if ($cart["ComponentId"] != "")
    { ?>
                        <td><img class="productDetailsImage" src="data:image/png;base64,<?php echo base64_encode($cart["itemImage"]); ?>" alt="" style="height: 100px; width: 100px;"></td>
                        <?php
    } ?>
                        <td><?php echo $cart["itemName"]; ?></td>
                        <td style="text-align: center;">RM <?php echo $cart["itemPrice"]; ?></td>
                        <td style="text-align: center;"><?php echo $cart["itemQuantity"]; ?></td>
                        <td style="text-align: center;">RM <?php echo round(($cart["itemPrice"] * $cart["itemQuantity"])); ?></td>

                        <div class="main-border-button">
                          <form class="" action="/RemoveProductItem" method="post">
                          <?php if ($cart["ProductId"] != "")
    { ?>
                            <div class="col-12 col-sm-4" >
                              <input type="hidden" name="prodID" id="prodID" value="<?php echo $cart["ProductId"]; ?>"></input>
                              <td><button type="submit" class="btn btn-primary" style="  margin:auto; display:block;">Remove</button></td>
                            </div>
                             <?php
    } ?>
                             </form>
                             <form class="" action="/RemovePromotionItem" method="post">
                          <?php if ($cart["PromotionId"] != "")
    { ?>
                            <div class="col-12 col-sm-4">
                              <input type="hidden" name="promID" id="promID" value="<?php echo $cart["PromotionId"]; ?>"></input>
                              <td><button type="submit" class="btn btn-primary" style="  margin:auto; display:block;">Remove</button></td>
                            </div>
                           <?php
    } ?>
                           </form>
                           <form class="" action="/RemoveComponentItem" method="post">
                         <?php if ($cart["ComponentId"] != "")
    { ?>
                           <div class="col-12 col-sm-4">
                             <input type="hidden" name="compID" id="compID" value="<?php echo $cart["ComponentId"]; ?>"></input>
                             <td><button type="submit" class="btn btn-primary" style="  margin:auto; display:block;">Remove</button></td>
                           </div>
                           <?php
    } ?>
                           </form>
                      </div>

                   </tr>

                 <?php
} ?>
                 </table>
                </div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    	</div>
    </div>
<?php echo view('sections/footer.php'); ?>
