<?php

// # Authorize Payment using PayPal as payment method
// This sample code demonstrates how you can process a 
// PayPal Account based Payment.
// API used: /v1/payments/payment
// As you can see, there is only one difference between creating a payment using PayPal with sale or authorize as intent.
// You need to set the proper intent in the request, and the remaining data would be the same

require __DIR__ . '/../bootstrap.php';
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

	//Mainly we need 5 variables from an item, Item Name, Item Desc, Item Price, Item Number and Item Quantity.
	$ItemName = $_POST["itemname"]; //Item Name
	$ItemDesc = $_POST["itemdesc"]; //Item Desc
	$ItemPrice = $_POST["itemprice"]; //Item Price
	$ItemNumber = $_POST["itemnumber"]; //Item Number
	$ItemQty = $_POST["itemQty"]; // Item Quantity
	$ItemTotalPrice = $ItemPrice*$ItemQty; //(Item Price x Quantity = Total) Get total amount of product; 

$ItemName=htmlspecialchars($ItemName);
$ItemDesc=htmlspecialchars($ItemDesc);
$ItemPrice=htmlspecialchars($ItemPrice);
$ItemNumber=htmlspecialchars($ItemNumber);
$ItemQty=htmlspecialchars($ItemQty);
$ItemTotalPrice=htmlspecialchars($ItemTotalPrice);

// ### Payer
// A resource representing a Payer that funds a payment
// For paypal account payments, set payment method
// to 'paypal'.
$payer = new Payer();
$payer->setPaymentMethod("paypal");

// ### Itemized information
// (Optional) Lets you specify item wise
// information
$item1 = new Item();
$item1->setName($ItemName)
    ->setCurrency('JPY')
    ->setQuantity($ItemQty)
    ->setPrice($ItemPrice);

$itemList = new ItemList();
$itemList->setItems(array($item1));

// ### Additional payment details
// Use this optional field to set additional
// payment information such as tax, shipping
// charges etc.
$details = new Details();
$details->setShipping(0)
    ->setTax(0)
    ->setSubtotal(0);

// ### Amount
// Lets you specify a payment amount.
// You can also specify additional details
// such as shipping, tax.
$amount = new Amount();
$amount->setCurrency("JPY")
    ->setTotal($ItemTotalPrice)
    ->setDetails($details);

// ### Transaction
// A transaction defines the contract of a
// payment - what is the payment for and who
// is fulfilling it. 
$transaction = new Transaction();
$transaction->setAmount($amount)
    ->setItemList($itemList)
    ->setDescription("Payment description")
    ->setInvoiceNumber(uniqid());

// ### Redirect urls
// Set the urls that the buyer must be redirected to after 
// payment approval/ cancellation.
$baseUrl = getBaseUrl();
$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl("$baseUrl/ExecutePayment.php?success=true")
    ->setCancelUrl("$baseUrl/ExecutePayment.php?success=false");

// ### Payment
// A Payment Resource; create one using
// the above types and intent set to 'sale'
$payment = new Payment();
$payment->setIntent("authorize")
    ->setPayer($payer)
    ->setRedirectUrls($redirectUrls)
    ->setTransactions(array($transaction));


// For Sample Purposes Only.
$request = clone $payment;

// ### Create Payment
// Create a payment by calling the 'create' method
// passing it a valid apiContext.
// (See bootstrap.php for more on `ApiContext`)
// The return object contains the state and the
// url to which the buyer must be redirected to
// for payment approval
try {
    $payment->create($apiContext);
} catch (Exception $ex) {
    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
 	ResultPrinter::printError("Created Payment Authorization Using PayPal. Please visit the URL to Authorize.", "Payment", null, $request, $ex);
    exit(1);
}

// ### Get redirect url
// The API response provides the url that you must redirect
// the buyer to. Retrieve the url from the $payment->getLinks()
// method
$approvalUrl = $payment->getApprovalLink();

// NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
 ResultPrinter::printResult("Created Payment Authorization Using PayPal. Please visit the URL to Authorize.", "Payment", "<a href='$approvalUrl' >$approvalUrl</a>", $request, $payment);

return $payment;
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title> FALCA決済</title>
</head>
<body>

</body>
</html>