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
                                      <th scope="col">User's ID</th>
                                      <th scope="col">Full Name</th>
                                      <th scope="col">Address</th>
                                      <th scope="col">Email</th>
                                      <th scope="col">Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($usersTable as $usersTable){ ?>
                                  <tr>
                                      <td scope="row"></td>
                                      <td><?php echo $usersTable["id"]; ?></td>
                                      <td><?php echo $usersTable["firstname"]; ?> <?php echo $usersTable["lastname"]; ?></td>
                                      <td><?php echo $usersTable["address"]; ?></td>
                                      <td><?php echo $usersTable["email"]; ?></td>
                                      <td>
                                        <form class="" action="/ModifyUser" method="post">
                                          <input type="hidden" name="userid" id="userid" value="<?php echo $usersTable["id"]; ?>">
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
