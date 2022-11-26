<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4" style="justify-content: center;">
<div class="col-sm-12 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4" style="text-align: center;">Edit CPU price for graph</h6>
        <form class="" action="/UpdateModCPU" method="post">

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="cpuprice" id="cpuprice"
                placeholder="" value="<?php echo $viewcpu["cpuPrice"];?>">
            <label for="cpuprice">CPU Price</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="createdon" id="createdon"
                placeholder="" value="<?php echo $viewcpu["cpuUpdatedDate"];?>" readonly>
            <label for="createdon">Created on</label>
        </div>
        <?php if (isset($validation)): ?>
         <div class="col-12">
           <div class="alert alert-danger" role="alert">
             <?= $validation->listErrors() ?>
           </div>
         </div>
       <?php endif; ?>

       <?php if (session()->get('msg')): ?>
         <div class="alert alert-danger" role="alert">
           <?= session()->get('msg') ?>
         </div>
       <?php endif; ?>

         <input type="hidden" class="form-control" name="cpuId" id="cpuId" value="<?php echo $viewcpu["cpuId"];?>">  </input>
        <button type="submit" class="btn btn-outline-primary m-2" >Add CPU Price</button>
        <button type="reset" class="btn btn-outline-info m-2" > Reset Changes</button>
      </form>
      <form class="" action="/DeleteModCPU" method="post" style="float: right;">
         <input type="hidden" class="form-control" name="cpuId" id="cpuId" value="<?php echo $viewcpu["cpuId"];?>">  </input>
        <button type="submit" class="btn btn-outline-warning m-2" >Delete CPU Price</button>
      </form>
      </div>
  </div>
</div>
</div>
