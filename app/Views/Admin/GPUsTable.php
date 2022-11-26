<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
      <div class="container-fluid pt-4 px-4">
          <div class="row g-4">
            <?php if (session()->get('success')): ?>
   <div class="alert alert-success" role="alert">
      <?= session()->get('success') ?>
     </div>
<?php endif; ?>
<?php if (session()->get('deleted')): ?>
<div class="alert alert-danger" role="alert">
<?= session()->get('deleted') ?>
</div>
<?php endif; ?>
              <div class="col-12">
                  <div class="bg-secondary rounded h-100 p-4">
                      <h6 class="mb-4">GPU Table</h6>
                      <div class="table-responsive">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">GPU ID</th>
                                      <th scope="col">GPU Price</th>
                                      <th scope="col">Updated On</th>
                                      <th scope="col">Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($gpusTable as $gpusTable){ ?>
                                  <tr>
                                      <td scope="row"></td>
                                      <td><?php echo $gpusTable["gpuId"]; ?></td>
                                      <td><?php echo $gpusTable["gpuPrice"]; ?></td>
                                      <td><?php echo $gpusTable["gpuUpdatedDate"]; ?></td>
                                      <td>
                                      <form class="" action="/ModifyGPU" method="post">
                                        <input type="hidden" name="thegpuId" id="thegpuId" value="<?php echo $gpusTable["gpuId"]; ?>">
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
