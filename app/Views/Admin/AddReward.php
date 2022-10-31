<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4" style="justify-content: center;">
<div class="col-sm-12 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4" style="text-align: center;">Add New Promotion</h6>
        <form class="" action="/AddReward" method="post" enctype="multipart/form-data">

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="rewardname" id="rewardname"
                placeholder="" value="<?= set_value('rewardname') ?>">
            <label for="rewardname">Reward's Name</label>
        </div>

        <div class="form-floating mb-3">
          <div class="mb-3">
          <label for="rewardimage" class="form-label">Image of Reward</label>
          <input class="form-control bg-dark" type="file" name="rewardimage" id="rewardimage">
        </div>
        </div>

        <div class="form-floating mb-3">
          <select class="form-select mb-3" aria-label="Default select example" name="rewardtier" id="rewardtier">

              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
          </select>
          <label for="rewardtier">Reward Tier</label>
        </div>

        <?php if (isset($validation)): ?>
         <div class="col-12">
           <div class="alert alert-primary" role="alert">
             <?= $validation->listErrors() ?>
           </div>
         </div>
       <?php endif; ?>

        <button type="submit" class="btn btn-primary" >Add Promotion</button>
        </form>
      </div>
  </div>
</div>
</div>
