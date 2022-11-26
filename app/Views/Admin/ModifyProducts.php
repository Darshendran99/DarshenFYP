<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4" style="justify-content: center;">
<div class="col-sm-12 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4" style="text-align: center;">View Product</h6>

        <form class="" action="/UpdateModProduct" method="post" enctype="multipart/form-data">

      <div class="form-floating mb-3">
          <input type="text" class="form-control" name="productname" id="productname"
              placeholder="" value="<?php echo $viewproduct["ProductName"];?>">
          <label for="productname">Product's Name</label>
      </div>
      <div class="form-floating mb-3">
        <div class="mb-3">
        <label for="productimage" class="form-label">Image of Product</label>
        <input class="form-control bg-dark" type="file" name="productimage" id="productimage">
        <img class="productDetailsImage" src="data:image/png;base64,<?php echo base64_encode($viewproduct["ProductImage"]); ?>" alt="" style="height: 100px; width: 100px;">
      </div>
      </div>
      <div class="form-floating mb-3">
          <input type="text" class="form-control" name="productprice" id="productprice"
              placeholder="" value="<?php echo $viewproduct["ProductPrice"];?>">
          <label for="productprice">Product's Price</label>
      </div>
      <div class="form-floating mb-3">
          <input type="text" class="form-control" name="productLink" id="productLink"
              placeholder="" value="<?php echo $viewproduct["productLink"];?>">
          <label for="productcpu">Product's Youtube Link</label>
      </div>
      <div class="form-floating mb-3">
          <input type="text" class="form-control" name="productcpu" id="productcpu"
              placeholder="" value="<?php echo $viewproduct["ProductCPU"];?>">
          <label for="productcpu">CPU</label>
      </div>
      <div class="form-floating mb-3">
          <input type="text" class="form-control" name="productgpu" id="productgpu"
              placeholder="" value="<?php echo $viewproduct["ProductGPU"];?>">
          <label for="productgpu">GPU</label>
      </div>
      <div class="form-floating mb-3">
          <input type="text" class="form-control" name="productmobo" id="productmobo"
              placeholder="" value="<?php echo $viewproduct["ProductMobo"];?>">
          <label for="productmobo">Motherboard</label>
      </div>
      <div class="form-floating mb-3">
          <input type="text" class="form-control" name="productram" id="productram"
              placeholder="" value="<?php echo $viewproduct["ProductRAM"];?>">
          <label for="productram">RAM</label>
      </div>
      <div class="form-floating mb-3">
          <input type="text" class="form-control" name="productssd" id="productssd"
              placeholder="" value="<?php echo $viewproduct["ProductSSD"];?>">
          <label for="productssd">SSD</label>
      </div>
      <div class="form-floating mb-3">
          <input type="text" class="form-control" name="productpsu" id="productpsu"
              placeholder="" value="<?php echo $viewproduct["ProductPSU"];?>">
          <label for="productpsu">Power Supply Unit</label>
      </div>
      <div class="form-floating mb-3">
          <input type="text" class="form-control" name="productcasing" id="productcasing"
              placeholder="" value="<?php echo $viewproduct["ProductCasing"];?>">
          <label for="productcasing">Casing</label>
      </div>
      <div class="form-floating mb-3">
          <input type="text" class="form-control" name="productother" id="productother"
              placeholder="" value="<?php echo $viewproduct["ProductOther"];?>">
          <label for="productother">Other Additional Items</label>
      </div>
      <div class="form-floating mb-3">
          <input type="text" class="form-control" name="productcsgo" id="productcsgo"
              placeholder="" value="<?php echo $viewproduct["ProductCSGO"];?>">
          <label for="productcsgo">CSGO FPS</label>
      </div>
      <div class="form-floating mb-3">
          <input type="text" class="form-control" name="productfortnite" id="productfortnite"
              placeholder="" value="<?php echo $viewproduct["ProductFortnite"];?>">
          <label for="productfortnite">Fortnite FPS</label>
      </div>
      <div class="form-floating mb-3">
          <input type="text" class="form-control" name="productgtav" id="productgtav"
              placeholder="" value="<?php echo $viewproduct["ProductGTAV"];?>">
          <label for="productgtav">GTAV FPS</label>
      </div>
      <div class="form-floating mb-3">
          <input type="text" class="form-control" name="productcyberpunk" id="productcyberpunk"
              placeholder="" value="<?php echo $viewproduct["ProductCyberpunk"];?>">
          <label for="productcyberpunk">Cyberpunk FPS</label>
      </div>
      <div class="form-floating mb-3">
          <input type="text" class="form-control" name="product3dmark" id="product3dmark"
              placeholder="" value="<?php echo $viewproduct["Product3DMark"];?>">
          <label for="product3dmark">3D Mark (CPU Score)</label>
      </div>
      <div class="form-floating mb-3">
          <input type="text" class="form-control" name="productgeekbench" id="productgeekbench"
              placeholder="" value="<?php echo $viewproduct["ProductGeekbench"];?>">
          <label for="productgeekbench">GeekBench (Multi Score)</label>
      </div>
      <div class="form-floating mb-3">
          <input type="text" class="form-control" name="createdon" id="createdon"
              placeholder="" value="<?php echo $viewproduct["CreatedOn"];?>" readonly>
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

       <input type="hidden" class="form-control" name="productid" id="productid" value="<?php echo $viewproduct["ProductId"];?>">  </input>
        <button type="submit" class="btn btn-primary" >Update Product</button>
        <button type="reset" class="btn btn-outline-info m-2" > Reset Changes</button>

        </form>
      </div>
  </div>
</div>
</div>
