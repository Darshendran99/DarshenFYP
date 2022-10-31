<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4" style="justify-content: center;">
<div class="col-sm-12 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4" style="text-align: center;">Add New Promotion</h6>
        <form class="" action="/AddPromotion" method="post" enctype="multipart/form-data">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="promotionname" id="promotionname"
                placeholder="" value="<?= set_value('promotionname') ?>">
            <label for="promotionname">Promotion's Name</label>
        </div>
        <div class="form-floating mb-3">
          <select class="form-select mb-3" aria-label="Default select example" name="promotionstatus" id="promotionstatus">

              <option value="ready">Ready</option>
              <option value="notReady">Not Ready</option>
          </select>
          <label for="promotionname">Promotion Status</label>
        </div>
        <div class="form-floating mb-3">
          <div class="mb-3">
          <label for="promotionimage" class="form-label">Image of Promotion</label>
          <input class="form-control bg-dark" type="file" name="promotionimage" id="promotionimage">
        </div>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="promotionoriprice" id="promotionoriprice"
                placeholder="" value="<?= set_value('promotionoriprice') ?>">
            <label for="promotionoriprice">Original Promotion's Price</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="promotionprice" id="promotionprice"
                placeholder="" value="<?= set_value('promotionprice') ?>">
            <label for="promotionprice">Promotion's Price</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="promotioncpu" id="promotioncpu"
                placeholder="" value="<?= set_value('promotioncpu') ?>">
            <label for="promotioncpu">CPU</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="promotiongpu" id="promotiongpu"
                placeholder="" value="<?= set_value('promotiongpu') ?>">
            <label for="promotiongpu">GPU</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="promotionmobo" id="promotionmobo"
                placeholder="" value="<?= set_value('promotionmobo') ?>">
            <label for="promotionmobo">Motherboard</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="promotionram" id="promotionram"
                placeholder="" value="<?= set_value('promotionram') ?>">
            <label for="promotionram">RAM</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="promotionssd" id="promotionssd"
                placeholder="" value="<?= set_value('promotionssd') ?>">
            <label for="promotionssd">SSD</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="promotionpsu" id="promotionpsu"
                placeholder="" value="<?= set_value('promotionpsu') ?>">
            <label for="promotionpsu">Power Supply Unit</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="promotioncasing" id="promotioncasing"
                placeholder="" value="<?= set_value('promotioncasing') ?>">
            <label for="promotioncasing">Casing</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="promotionother" id="promotionother"
                placeholder="" value="<?= set_value('promotionother') ?>">
            <label for="promotionother">Other Additional Items</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="nonpcdetails" id="nonpcdetails"
                placeholder="" value="<?= set_value('nonpcdetails') ?>">
            <label for="nonpcdetails">Non PC Details</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="promotiondetail1" id="promotiondetail1"
                placeholder="" value="<?= set_value('promotiondetail1') ?>">
            <label for="promotiondetail1">Detail 1</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="promotiondetail2" id="promotiondetail2"
                placeholder="" value="<?= set_value('promotiondetail2') ?>">
            <label for="promotiondetail2">Detail 1</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="promotiondetail3" id="promotiondetail3"
                placeholder="" value="<?= set_value('promotiondetail3') ?>">
            <label for="promotiondetail3">Detail 2</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="promotiondetail4" id="promotiondetail4"
                placeholder="" value="<?= set_value('promotiondetail4') ?>">
            <label for="promotiondetail4">Detail 3</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="productgeekbench" id="productgeekbench"
                placeholder="" value="<?= set_value('productgeekbench') ?>">
            <label for="productgeekbench">Detail 4</label>
        </div>

        <?php if (isset($validation)): ?>
         <div class="col-12">
           <div class="alert alert-primary" role="alert">
             <?= $validation->listErrors() ?>
           </div>
         </div>
       <?php endif; ?>

        <button type="submit" class="btn btn-primary" >Add Promotion</button>
        </form>
      </div>
  </div>
</div>
</div>
