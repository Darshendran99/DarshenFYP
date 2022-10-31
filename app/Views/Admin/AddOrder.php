<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4" style="justify-content: center;">
<div class="col-sm-12 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4" style="text-align: center;">Add New Order</h6>

        <form class="" action="/AddOrder" method="post" enctype="multipart/form-data">

        <div class="form-floating mb-3">
          <select class="form-select mb-3" aria-label="Default select example" name="orderusrid" id="orderusrid">
              <option value="0"></option>
            <?php foreach ($useridData as $useridData): ?>
              <option value="<?php echo $useridData["id"]; ?>"><?php echo $useridData["id"]; ?></option>
            <?php endforeach; ?>
          </select>
          <label for="orderusrid">User ID</label>
        </div>

        <div class="form-floating mb-3">
          <select class="form-select mb-3" aria-label="Default select example" name="orderpaymntid" id="orderpaymntid">
              <option value="0"></option>
            <?php foreach ($paymntidData as $paymntidData): ?>
              <option value="<?php echo $paymntidData["PaymentId"]; ?>"><?php echo $paymntidData["PaymentId"]; ?></option>
            <?php endforeach; ?>
          </select>
          <label for="orderpaymntid">Payment ID</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="shippingadd" id="shippingadd"
                placeholder="" value="<?= set_value('shippingadd') ?>">
            <label for="shippingadd">Shipping Address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="itemordr" id="itemordr"
                placeholder="" value="<?= set_value('itemordr') ?>">
            <label for="itemordr">Items Ordered</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="itemtotal" id="itemtotal"
                placeholder="" value="<?= set_value('itemtotal') ?>">
            <label for="itemtotal">Grand Total</label>
        </div>

        <div class="form-floating mb-3">
          <select class="form-select mb-3" aria-label="Default select example" name="orderstatus" id="orderstatus">

              <option value="0">Processing</option>
              <option value="1">Odrer Confirmed</option>
              <option value="2">Shipping</option>
              <option value="3">Order Received</option>
          </select>
          <label for="orderstatus">Order Status</label>
        </div>

        <?php if (isset($validation)): ?>
         <div class="col-12">
           <div class="alert alert-primary" role="alert">
             <?= $validation->listErrors() ?>
           </div>
         </div>
       <?php endif; ?>

        <button type="submit" class="btn btn-primary" >Add Order</button>
        </form>
      </div>
  </div>
</div>
</div>
