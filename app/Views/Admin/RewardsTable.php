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
                                      <th scope="col">Image</th>
                                      <th scope="col">Reward Tier</th>
                                      <th scope="col">Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($rewardsTable as $rewardsTable){ ?>
                                  <tr>
                                      <td scope="row"></td>
                                      <td><?php echo $rewardsTable["RewardID"]; ?></td>
                                      <td><?php echo $rewardsTable["RewardName"]; ?></td>
                                      <td><img class="productDetailsImage" src="data:image/png;base64,<?php echo base64_encode($rewardsTable["RewardImage"]); ?>" alt="" style="height: 100px; width: 100px;"></td>
                                      <td> <?php echo $rewardsTable["RewardTier"]; ?></td>
                                      <td>
                                        <button type="submit" class="btn btn-primary" >More Details</button>
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
