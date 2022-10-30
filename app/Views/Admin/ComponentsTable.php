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
                                      <th scope="col">Details</th>
                                      <th scope="col">Image</th>
                                      <th scope="col">Component Type</th>
                                      <th scope="col">Price</th>
                                      <th scope="col">Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($componentsTable as $componentsTable){ ?>
                                  <tr>
                                      <td scope="row"></td>
                                      <td><?php echo $componentsTable["ComponentId"]; ?></td>
                                      <td><?php echo $componentsTable["ComponentName"]; ?></td>
                                      <td><?php echo $componentsTable["ComponentDetails"]; ?></td>
                                      <td><img class="productDetailsImage" src="data:image/png;base64,<?php echo base64_encode($componentsTable["ComponentImage"]); ?>" alt="" style="height: 100px; width: 100px;"></td>
                                      <td> <?php echo $componentsTable["ComponentType"]; ?></td>
                                      <td>RM <?php echo $componentsTable["ComponentPrice"]; ?></td>
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
