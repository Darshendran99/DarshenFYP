<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4" style="justify-content: center;">
<div class="col-sm-12 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4" style="text-align: center;">Add New User</h6>
        <form class="" action="/AddUser" method="post">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="firstname" id="firstname"
                placeholder="" value="<?= set_value('firstname') ?>">
            <label for="firstname">First Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="lastname" id="lastname"
                placeholder="" value="<?= set_value('lastname') ?>">
            <label for="lastname">Last Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="email" id="email"
                placeholder="" value="<?= set_value('email') ?>">
            <label for="email">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="address" id="address"
                placeholder="" value="<?= set_value('address') ?>">
            <label for="address">Address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="password" id="password"
                placeholder="" value="">
            <label for="password">Password</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="password_confirm" id="password_confirm"
                placeholder="" value="">
            <label for="password_confirm">Retype Password</label>
        </div>

        <?php if (isset($validation)): ?>
         <div class="col-12">
           <div class="alert alert-primary" role="alert">
             <?= $validation->listErrors() ?>
           </div>
         </div>
       <?php endif; ?>

        <button type="submit" class="btn btn-primary" >Add User</button>
        </form>
      </div>
  </div>
</div>
</div>
