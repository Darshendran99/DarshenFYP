<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4" style="justify-content: center;">
<div class="col-sm-12 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4" style="text-align: center;">Edit GPU price for graph</h6>
        <!-- <form class="" action="/AddCPU" method="post"> -->

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="cpuprice" id="cpuprice"
                placeholder="" value="<?php echo $viewgpu["gpuPrice"];?>">
            <label for="cpuprice">CPU Price</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="createdon" id="createdon"
                placeholder="" value="<?php echo $viewgpu["gpuUpdatedDate"];?>" readonly>
            <label for="createdon">Created on</label>
        </div>


        <button type="submit" class="btn btn-primary" >Add GPU Price</button>
        </form>
      </div>
  </div>
</div>
</div>
