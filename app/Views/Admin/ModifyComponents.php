<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4" style="justify-content: center;">
<div class="col-sm-12 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4" style="text-align: center;">Add New PC Component</h6>

        <form class="" action="/UpdateModComponent" method="post" enctype="multipart/form-data">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="componentname" id="componentname"
                placeholder="" value="<?php echo $viewcomponent["ComponentName"]; ?>">
            <label for="componentname">Component's Name</label>
        </div>
        <div class="form-floating mb-3">
          <select class="form-select mb-3" aria-label="Default select example" name="componenttype" id="componenttype">
              <option value="<?php echo $viewcomponent["ComponentType"]; ?>"><?php echo $viewcomponent["ComponentType"]; ?></option>
              <option value="CPU">CPU</option>
              <option value="Mobo">Motherboard</option>
              <option value="GPU">GPU</option>
              <option value="RAM">RAM</option>
              <option value="SSD">SSD</option>
              <option value="PSU">PSU</option>
              <option value="Casing">Casing</option>
          </select>
          <label for="componenttype">Component Type</label>
        </div>
        <div class="form-floating mb-3">
          <select class="form-select mb-3" aria-label="Default select example" name="compbrand" id="compbrand">
              <option value="<?php echo $viewcomponent["ComponentBrand"]; ?>"><?php echo $viewcomponent["ComponentBrand"]; ?></option>
              <option value="Intel">Intel</option>
              <option value="Amd">Amd</option>
              <option value="NVIDIA">NVIDIA</option>
              <option value="Kingston">Kingston</option>
              <option value="NZXT">NZXT</option>
          </select>
          <label for="compbrand">Component Brand</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="compbrand2" id="compbrand2"
                placeholder="" value="<?php echo $viewcomponent["ComponentBrand"]; ?>">
            <label for="compbrand2">If Component Brand name is not included, type in here</label>
        </div>
        <div class="form-floating mb-3">
          <div class="mb-3">
          <label for="componentimage" class="form-label">Image of Promotion</label>
          <input class="form-control bg-dark" type="file" name="componentimage" id="componentimage">
          <img class="productDetailsImage" src="data:image/png;base64,<?php echo base64_encode($viewcomponent["ComponentImage"]); ?>" alt="" style="height: 100px; width: 100px; margin-top: 10px;">
        </div>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="componentdetails" id="componentdetails"
                placeholder="" value="<?php echo $viewcomponent["ComponentDetails"]; ?>">
            <label for="componentdetails">Component Details</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="componentprice" id="componentprice"
                placeholder="" value="<?php echo $viewcomponent["ComponentPrice"]; ?>">
            <label for="componentprice">Component Price</label>
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

         <input type="hidden" class="form-control" name="componentid" id="componentid" value="<?php echo $viewcomponent["ComponentId"];?>">  </input>
        <button type="submit" class="btn btn-primary" >Add Component</button>
        <button type="reset" class="btn btn-outline-info m-2" > Reset Changes</button>
        </form>
      </div>
  </div>
</div>
</div>
