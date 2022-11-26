<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4" style="justify-content: center;">
<div class="col-sm-12 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4" style="text-align: center;">Add New Product</h6>
        <form class="" action="/AddProduct" method="post" enctype="multipart/form-data">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="productname" id="productname"
                placeholder="" value="<?= set_value('productname') ?>">
            <label for="productname">Product's Name</label>
        </div>
        <div class="form-floating mb-3">
          <div class="mb-3">
          <label for="productimage" class="form-label">Image of Product</label>
          <input class="form-control bg-dark" type="file" name="productimage" id="productimage">
        </div>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="productprice" id="productprice"
                placeholder="" value="<?= set_value('productprice') ?>">
            <label for="productprice">Product's Price</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="productLink" id="productLink"
                placeholder="" value="<?= set_value('productLink') ?>">
            <label for="productcpu">Product's Youtube Link</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="productcpu" id="productcpu"
                placeholder="" value="<?= set_value('productcpu') ?>">
            <label for="productcpu">CPU</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="productgpu" id="productgpu"
                placeholder="" value="<?= set_value('productgpu') ?>">
            <label for="productgpu">GPU</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="productmobo" id="productmobo"
                placeholder="" value="<?= set_value('productmobo') ?>">
            <label for="productmobo">Motherboard</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="productram" id="productram"
                placeholder="" value="<?= set_value('productram') ?>">
            <label for="productram">RAM</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="productssd" id="productssd"
                placeholder="" value="<?= set_value('productssd') ?>">
            <label for="productssd">SSD</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="productpsu" id="productpsu"
                placeholder="" value="<?= set_value('productpsu') ?>">
            <label for="productpsu">Power Supply Unit</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="productcasing" id="productcasing"
                placeholder="" value="<?= set_value('productcasing') ?>">
            <label for="productcasing">Casing</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="productother" id="productother"
                placeholder="" value="<?= set_value('productother') ?>">
            <label for="productother">Other Additional Items</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="productcsgo" id="productcsgo"
                placeholder="" value="<?= set_value('productcsgo') ?>">
            <label for="productcsgo">CSGO FPS</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="productfortnite" id="productfortnite"
                placeholder="" value="<?= set_value('productfortnite') ?>">
            <label for="productfortnite">Fortnite FPS</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="productgtav" id="productgtav"
                placeholder="" value="<?= set_value('productgtav') ?>">
            <label for="productgtav">GTAV FPS</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="productcyberpunk" id="productcyberpunk"
                placeholder="" value="<?= set_value('productcyberpunk') ?>">
            <label for="productcyberpunk">Cyberpunk FPS</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="product3dmark" id="product3dmark"
                placeholder="" value="<?= set_value('product3dmark') ?>">
            <label for="product3dmark">3D Mark (CPU Score)</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="productgeekbench" id="productgeekbench"
                placeholder="" value="<?= set_value('productgeekbench') ?>">
            <label for="productgeekbench">GeekBench (Multi Score)</label>
        </div>

        <?php if (isset($validation)): ?>
         <div class="col-12">
           <div class="alert alert-primary" role="alert">
             <?= $validation->listErrors() ?>
           </div>
         </div>
       <?php endif; ?>

        <button type="submit" class="btn btn-primary" >Add Product</button>
        </form>
      </div>
  </div>
</div>
</div>
