<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4" style="justify-content: center;">
<div class="col-sm-12 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4" style="text-align: center;">Add New Admin</h6>
        <form class="" action="/AddAdmin" method="post">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="staffname" id="staffname"
                placeholder="" value="<?= set_value('staffname') ?>">
            <label for="staffname">Staff Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="staffemail" id="staffemail"
                placeholder="" value="<?= set_value('staffemail') ?>">
            <label for="staffemail">Staff Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="staffpassword" id="staffpassword"
                placeholder="" value="">
            <label for="staffpassword">Staff Password</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="staffpassword_confirm" id="staffpassword_confirm"
                placeholder="" value="">
            <label for="staffpassword_confirm">Retype Password</label>
        </div>

        <?php if (isset($validation)): ?>
         <div class="col-12">
           <div class="alert alert-primary" role="alert">
             <?= $validation->listErrors() ?>
           </div>
         </div>
       <?php endif; ?>

        <button type="submit" class="btn btn-primary" >Add Admin</button>
        </form>
      </div>
  </div>
</div>
</div>
