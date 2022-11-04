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
                                      <th scope="col">Name</th>
                                      <th scope="col">Email</th>
                                      <th scope="col">Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($adminsTable as $adminsTable){ ?>
                                  <tr>
                                      <td scope="row"></td>
                                      <td><?php echo $adminsTable["StaffId"]; ?></td>
                                      <td><?php echo $adminsTable["staffName"]; ?></td>
                                      <td><?php echo $adminsTable["staffEmail"]; ?></td>
                                      <td>
                                        <form class="" action="/ModifyAdmin" method="post">
                                          <input type="hidden" name="adminid" id="adminid" value="<?php echo $adminsTable["StaffId"]; ?>">
                                        <button type="submit" class="btn btn-primary" >More Details</button>
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
