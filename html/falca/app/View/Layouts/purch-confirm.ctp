<?php echo $this->element('header'); ?>

<?php

	$ItemName = $_POST["itemname"]; //Item Name
	$ItemDesc = $_POST["itemdesc"]; //Item Desc
	$ItemPrice = $_POST["itemprice"]; //Item Price
	$ItemNumber = $_POST["datenumber"];
	$ItemNumber2 = $_POST["itemnumber"]; //Item Number
	$ItemQty = $_POST["itemQty"]; // Item Quantity
	$ItemTotalPrice = $ItemPrice*$ItemQty; //(Item Price x Quantity = Total) Get total amount of product; 

$ItemName=htmlspecialchars($ItemName);
$ItemDesc=htmlspecialchars($ItemDesc);
$ItemPrice=htmlspecialchars($ItemPrice);
$ItemNumber=htmlspecialchars($ItemNumber);
$ItemNumber2=htmlspecialchars($ItemNumber2);
$ItemQty=htmlspecialchars($ItemQty);
$ItemTotalPrice=htmlspecialchars($ItemTotalPrice);

?>

 <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h2 class="text-center">レッスン購入の確認</h2>
    </div>
  </div>
  <hr>

 <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h4 class="text-center">レッスン名: <?php echo $ItemName; ?></h4>
    </div>
  </div>
  
 <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h4 class="text-center">価格: <?php echo $ItemPrice; ?>円</h4>
    </div>
  </div>
  
   <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h4 class="text-center">枚数: <?php echo $ItemQty; ?></h4>
    </div>
  </div>

 <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h4 class="text-center">合計: <?php echo $ItemTotalPrice; ?>円</h4>
    </div>
  </div>
  

<div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h3 class="text-center">
<form method="post" action="http://www.mosio.me/PayPal-PHP-SDK/paypal/rest-api-sdk-php/sample/payments/CreatePaymentUsingPayPal.php">
<input type="hidden" name="itemname" value="<?php echo $ItemName; ?>" />
<input type="hidden" name="itemdesc" value="<?php echo $ItemDesc; ?>" />
<input type="hidden" name="datenumber" value="<?php echo $ItemNumber; ?>" />
<input type="hidden" name="itemnumber" value="<?php echo $ItemNumber2; ?>" />
<input type="hidden" name="itemprice" value="<?php echo $ItemPrice; ?>" />
<input type="hidden" name="itemQty" value="<?php echo $ItemQty; ?>" />


<br><input class="btn btn-lg btn-default" type="submit" name="submit" value="PayPal決済へ進む" />
</form>
      </h3>
    </div>
  </div>

<?php echo $this->element('footer'); ?>




