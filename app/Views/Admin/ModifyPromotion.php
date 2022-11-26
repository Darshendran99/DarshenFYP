<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4" style="justify-content: center;">
<div class="col-sm-12 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4" style="text-align: center;">View Promotion</h6>

        <form class="" action="/UpdateModPromotion" method="post" enctype="multipart/form-data">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="promotionname" id="promotionname"
                placeholder="" value="<?php echo $viewpromotion["PromotionName"];?>">
            <label for="promotionname">Promotion's Name</label>
        </div>
        <div class="form-floating mb-3">
          <select class="form-select mb-3" aria-label="Default select example" name="promotionstatus" id="promotionstatus">
              <option value="<?php echo $viewpromotion["PromotionStatus"];?>"><?php echo $viewpromotion["PromotionStatus"];?></option>
              <option value="ready">Ready</option>
              <option value="notReady">Not Ready</option>
          </select>
          <label for="promotionname">Promotion Status</label>
        </div>
        <div class="form-floating mb-3">
          <div class="mb-3">
          <label for="promotionimage" class="form-label">Image of Promotion</label>
          <input class="form-control bg-dark" type="file" name="promotionimage" id="promotionimage">
          <img class="productDetailsImage" src="data:image/png;base64,<?php echo base64_encode($viewpromotion["PromotionImage"]); ?>" alt="" style="height: 100px; width: 100px;">
        </div>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="promotionoriprice" id="promotionoriprice"
                placeholder="" value="<?php echo $viewpromotion["PromotionOriPrice"];?>">
            <label for="promotionoriprice">Original Promotion's Price</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="promotionprice" id="promotionprice"
                placeholder="" value="<?php echo $viewpromotion["PromotionPrice"];?>">
            <label for="promotionprice">Promotion's Price</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="promotioncpu" id="promotioncpu"
                placeholder="" value="<?php echo $viewpromotion["PromotionCPU"];?>">
            <label for="promotioncpu">CPU</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="promotiongpu" id="promotiongpu"
                placeholder="" value="<?php echo $viewpromotion["PromotionGPU"];?>">
            <label for="promotiongpu">GPU</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="promotionmobo" id="promotionmobo"
                placeholder="" value="<?php echo $viewpromotion["PromotionMobo"];?>">
            <label for="promotionmobo">Motherboard</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="promotionram" id="promotionram"
                placeholder="" value="<?php echo $viewpromotion["PromotionRAM"];?>">
            <label for="promotionram">RAM</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="promotionssd" id="promotionssd"
                placeholder="" value="<?php echo $viewpromotion["PromotionSSD"];?>">
            <label for="promotionssd">SSD</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="promotionpsu" id="promotionpsu"
                placeholder="" value="<?php echo $viewpromotion["PromotionPSU"];?>">
            <label for="promotionpsu">Power Supply Unit</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="promotioncasing" id="promotioncasing"
                placeholder="" value="<?php echo $viewpromotion["PromotionCasing"];?>">
            <label for="promotioncasing">Casing</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="promotionother" id="promotionother"
                placeholder="" value="<?php echo $viewpromotion["PromotionOther"];?>">
            <label for="promotionother">Other Additional Items</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="nonpcdetails" id="nonpcdetails"
                placeholder="" value="<?php echo $viewpromotion["NonPCDetails"];?>">
            <label for="nonpcdetails">Non PC Details</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="promotiondetail1" id="promotiondetail1"
                placeholder="" value="<?php echo $viewpromotion["PromotionDetail1"];?>">
            <label for="promotiondetail1">Detail 1</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="promotiondetail2" id="promotiondetail2"
                placeholder="" value="<?php echo $viewpromotion["PromotionDetail2"];?>">
            <label for="promotiondetail2">Detail 2</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="promotiondetail3" id="promotiondetail3"
                placeholder="" value="<?php echo $viewpromotion["PromotionDetail3"];?>">
            <label for="promotiondetail3">Detail 3</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="promotiondetail4" id="promotiondetail4"
                placeholder="" value="<?php echo $viewpromotion["PromotionDetail4"];?>">
            <label for="promotiondetail4">Detail 4</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="createdon" id="createdon"
                placeholder="" value="<?php echo $viewpromotion["PromoCreatedOn"];?>" readonly>
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

       <input type="hidden" class="form-control" name="promotionid" id="promotionid" value="<?php echo $viewpromotion["PromotionId"];?>">  </input>
        <button type="submit" class="btn btn-primary" >Update Promotion</button>
        <button type="reset" class="btn btn-outline-info m-2" > Reset Changes</button>
        </form>
      </div>
  </div>
</div>
</div>
