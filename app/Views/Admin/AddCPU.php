<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4" style="justify-content: center;">
<div class="col-sm-12 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4" style="text-align: center;">Add New CPU Price for this month</h6>
        <form class="" action="/AddCPU" method="post">

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="cpuprice" id="cpuprice"
                placeholder="" value="<?= set_value('cpuprice') ?>">
            <label for="cpuprice">CPU Price</label>
        </div>

        <?php if (isset($validation)): ?>
         <div class="col-12">
           <div class="alert alert-primary" role="alert">
             <?= $validation->listErrors() ?>
           </div>
         </div>
       <?php endif; ?>

        <button type="submit" class="btn btn-primary" >Add CPU Price</button>
        </form>
      </div>
  </div>
</div>
</div>
