<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
      <div class="container-fluid pt-4 px-4">
          <div class="row g-4">
            <?php if (session()->get('deleted')): ?>
            <div class="alert alert-danger" role="alert">
            <?= session()->get('deleted') ?>
            </div>
            <?php endif; ?>
              <div class="col-12">
                  <div class="bg-secondary rounded h-100 p-4">
                      <h6 class="mb-4">Payment Table</h6>
                      <div class="table-responsive">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">PaymentID</th>
                                      <th scope="col">UserID</th>
                                      <th scope="col">Name</th>
                                      <th scope="col">Email</th>
                                      <th scope="col">Total</th>
                                      <th scope="col"></th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($paymentsTable as $paymentsTable){ ?>
                                  <tr>
                                      <td scope="row"></td>
                                      <td><?php echo $paymentsTable["PaymentId"]; ?></td>
                                      <td><?php echo $paymentsTable["userid"]; ?></td>
                                      <td><?php echo $paymentsTable["Name"]; ?></td>
                                      <td><?php echo $paymentsTable["PaymentEmail"]; ?></td>
                                      <td><?php echo $paymentsTable["PaymentTotal"]; ?></td>
                                      <td>
                                        <form class="" action="/ViewPayment" method="post">
                                          <input type="hidden" name="payId" id="payId" value="<?php echo $paymentsTable["PaymentId"]; ?>">
                                        <button type="submit" class="btn btn-primary">More Details</button>
                                      </form>
                                      </td>
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
