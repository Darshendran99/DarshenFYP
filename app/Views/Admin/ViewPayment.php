<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4" style="justify-content: center;">
<div class="col-sm-12 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4" style="text-align: center;">View Payment</h6>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="userid" id="userid"
                placeholder="" value="<?php echo $viewpayment["userid"];?>">
            <label for="userid">User ID</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="payername" id="payername"
                placeholder="" value="<?php echo $viewpayment["Name"];?>">
            <label for="payername">Name of Payer</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="paymntemail" id="paymntemail"
                placeholder="" value="<?php echo $viewpayment["PaymentEmail"];?>">
            <label for="paymntemail">Payment Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="paymntaddress" id="paymntaddress"
                placeholder="" value="<?php echo $viewpayment["PaymentAddress"];?>">
            <label for="paymntaddress">Payment Address</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="pymnttotal" id="pymnttotal"
                placeholder="" value="<?php echo $viewpayment["PaymentTotal"];?>">
            <label for="pymnttotal">Total Payment</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="paiditems" id="paiditems"
                placeholder="" value="<?php echo $viewpayment["PaidItems"];?>">
            <label for="paiditems">Paid Items</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="paymttime" id="paymttime"
                placeholder="" value="<?php echo $viewpayment["paymentTime"];?>" readonly>
            <label for="paymttime">Payment Made on</label>
        </div>
        <form class="" action="/Deletepayment" method="post">
         <input type="hidden" class="form-control" name="PaymentId" id="PaymentId" value="<?php echo $viewpayment["PaymentId"];?>">  </input>
          <button type="submit" class="btn btn-outline-warning m-2" >Delete Payment</button>
        </form>




      </div>
  </div>
</div>
</div>
