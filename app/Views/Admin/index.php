<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4"style="justify-content: center;">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Today's Sale</p>
                    <h6 class="mb-0">RM 7533</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-area fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Customers</p>
                    <h6 class="mb-0"> <?php echo $userData;?></h6>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-pie fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Revenue</p>
                    <?php
                    $total_price_sum = 0;
                    foreach ($payment as $payment => $thepayment) {
                      $total_price_sum = $total_price_sum + $thepayment["PaymentTotal"];
                    }?>
                    <h6 class="mb-0">RM <?php echo $total_price_sum; ?></h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sale & Revenue End -->


<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
          <?php if (session()->get('success')): ?>
 <div class="alert alert-success" role="alert">
    <?= session()->get('success') ?>
   </div>
<?php endif; ?>
            <h6 class="mb-0">Recent Pending Payment</h6>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                      <th scope="col">#</th>
                      <th scope="col">OredrID</th>
                      <th scope="col">UserID</th>
                      <th scope="col">PaymentID</th>
                      <th scope="col">Items Ordered</th>
                      <th scope="col">Order Status</th>
                      <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach ($ordersTable as $ordersTable => $theordersTable) {?>
                    <tr>
                      <?php if ($theordersTable["orderStatus"] == 0){?>
                        <td scope="row"></td>
                        <td><?php echo $theordersTable["orderId"]; ?></td>
                        <td><?php echo $theordersTable["userId"]; ?></td>
                        <td><?php echo $theordersTable["paymentId"]; ?></td>
                        <td> <?php echo $theordersTable["itemsOrdered"]; ?></td>
                        <td> <?php if ( $theordersTable["orderStatus"] == 0 ) {?>
                              Processing
                            <?php }?>
                        </td>
                        <td>
                          <form class="" action="/ApproveOrder" method="post">
                            <input type="hidden" name="ordrId" id="ordrId" value="<?php echo $theordersTable["orderId"]; ?>">
                          <button type="submit" class="btn btn-primary" >Approve Order</button>
                        </form>
                        </td>
                    </tr>
                  <?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Recent Sales End -->
