<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
      <div class="container-fluid pt-4 px-4">
          <div class="row g-4">

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
                                      <th scope="col">address</th>
                                      <th scope="col">email</th>
                                      <th scope="col">email</th>
                                      <th scope="col">Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($adminsTable as $adminsTable){ ?>
                                  <tr>
                                      <td scope="row"></td>
                                      <td><?php echo $adminsTable["StaffId"]; ?></td>
                                      <td><?php echo $adminsTable["staffName"]; ?></td>
                                      <td><?php echo $adminsTable["staffEmail"]; ?>"</td>
                                      <td> <?php echo $adminsTable["created_at"]; ?></td>
                                      <td> <?php echo $adminsTable["updated_at"]; ?></td>
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
