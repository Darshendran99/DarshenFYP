<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/details.css'); ?>">

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Featured Games Start ***** -->
          <div class="row">

            <div class="heading-section"style="text-align: center;">

              <h4><em>Order </em>Status</h4>
              <br><br>
            </div>

            <div class="col-lg">
              <div class="featured-games header-text">
								<div class="row">
                  <table class="cart">
                   <tr>
                     <th class="cartnumber">No.</th>
                     <th>Reference Number <p>(Payment)</p></th>
                     <th>Shipping Address</th>
                     <th>Item Ordered </th>
                     <th>Grand Total</th>
                     <th>Order Status</th>

                   </tr>


                   <?php foreach ($orderView as $orderView){ ?>
                   <tr>

                     <td class="counterCell"></td>
                        <td><?php echo $orderView["paymentId"]; ?></td>
                        <td><?php echo $orderView["shippingAddress"]; ?></td>
                        <td><?php echo $orderView["itemsOrdered"]; ?></td>
                        <td>RM <?php echo $orderView["grandTotal"]; ?></td>

                        <?php if ($orderView["orderStatus"] == 0){ ?>
                        <td>Procesing Payment</td>
                      <?php }else if ($orderView["orderStatus"] == 1) { ?>
                        <td>Order Confirmed</td>
                      <?php }else if ($orderView["orderStatus"] == 2) { ?>
                        <td>Shipping</td>
                      <?php }else if ($orderView["orderStatus"] == 3) { ?>
                          <td>Order Received</td>
                          <?php }else{ ?>
                            <td> BackEnd Error... Please Contact staf to rolve issue</td>
                          <?php } ?>


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
