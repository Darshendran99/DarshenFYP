<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
      <div class="container-fluid pt-4 px-4">
          <div class="row g-4">
            <?php if (session()->get('success')): ?>
   <div class="alert alert-success" role="alert">
      <?= session()->get('success') ?>
     </div>
<?php endif; ?>
              <div class="col-12">
                  <div class="bg-secondary rounded h-100 p-4">
                      <h6 class="mb-4">Responsive Table</h6>
                      <div class="table-responsive">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Id</th>
                                      <th scope="col">User Id</th>
                                      <th scope="col">Payment Id</th>
                                      <th scope="col">Shipping Address</th>
                                      <th scope="col">Items Ordered</th>
                                      <th scope="col">Order Status</th>
                                      <th scope="col">Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($ordersTable as $ordersTable){ ?>
                                  <tr>
                                      <td scope="row"></td>
                                      <td><?php echo $ordersTable["orderId"]; ?></td>
                                      <td><?php echo $ordersTable["userId"]; ?></td>
                                      <td><?php echo $ordersTable["paymentId"]; ?>"</td>
                                      <td> <?php echo $ordersTable["shippingAddress"]; ?></td>
                                      <td> <?php echo $ordersTable["itemsOrdered"]; ?></td>
                                      <td> <?php echo $ordersTable["orderStatus"]; ?></td>
                                      <td><button type="submit" class="btn btn-primary" style=" display:block;">Remove</button></td>
                                  </tr>
                                  <?php } ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- Table End -->
