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
                      <h6 class="mb-4">Responsive Table</h6>
                      <div class="table-responsive">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">CPU ID</th>
                                      <th scope="col">CPU Price</th>
                                      <th scope="col">Updated On</th>
                                      <th scope="col">Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($cpusTable as $cpusTable){ ?>
                                  <tr>
                                      <td scope="row"></td>
                                      <td><?php echo $cpusTable["cpuId"]; ?></td>
                                      <td><?php echo $cpusTable["cpuPrice"]; ?></td>
                                      <td><?php echo $cpusTable["cpuUpdatedDate"]; ?></td>
                                      <td>
                                      <form class="" action="/ModifyCPU" method="post">
                                        <input type="hidden" name="thecpuId" id="thecpuId" value="<?php echo $cpusTable["cpuId"]; ?>">
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
