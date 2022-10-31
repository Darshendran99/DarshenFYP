<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4" style="justify-content: center;">
<div class="col-sm-12 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4" style="text-align: center;">Add New GPU Price for this month</h6>
        <form class="" action="/AddGPU" method="post">

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="gpuprice" id="gpuprice"
                placeholder="" value="<?= set_value('gpuprice') ?>">
            <label for="gpuprice">GPU Price</label>
        </div>

        <?php if (isset($validation)): ?>
         <div class="col-12">
           <div class="alert alert-primary" role="alert">
             <?= $validation->listErrors() ?>
           </div>
         </div>
       <?php endif; ?>

        <button type="submit" class="btn btn-primary" >Add GPU Price</button>
        </form>
      </div>
  </div>
</div>
</div>
