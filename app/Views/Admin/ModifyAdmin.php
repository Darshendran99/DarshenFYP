<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4" style="justify-content: center;">
<div class="col-sm-12 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4" style="text-align: center;">View Admin</h6>
        <!-- <form class="" action="/AddAdmin" method="post"> -->
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="staffname" id="staffname"
                placeholder="" value="<?php echo $viewadmin["staffName"];?>">
            <label for="staffname">Staff Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="staffemail" id="staffemail"
                placeholder="" value="<?php echo $viewadmin["staffEmail"];?>">
            <label for="staffemail">Staff Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="staffpassword" id="staffpassword"
                placeholder="" value="<?php echo $viewadmin["stafPassword"];?>">
            <label for="staffpassword">Staff Password</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="createdon" id="createdon"
                placeholder="" value="<?php echo $viewadmin["created_at"];?>" readonly>
            <label for="createdon">Created on</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="createdon" id="createdon"
                placeholder="" value="<?php echo $viewadmin["updated_at"];?>" readonly>
            <label for="createdon">Lastly Updated on</label>
        </div>


        <button type="submit" class="btn btn-primary" >Add Admin</button>
        </form>
      </div>
  </div>
</div>
</div>