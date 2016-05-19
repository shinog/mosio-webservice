<?php

App::uses('Paypal', 'Paypal.Lib');

public function beforeFilter(){
  $this->Paypal = new Paypal(
    array(
      'sandboxMode' => PAYPAL_SANDBOX,
      'nvpUsername' => PAYPAL_USERNAME,
      'nvpPassword' => PAYPAL_PASSWORD,
      'nvpSignature' => PAYPAL_SIGNATURE
    )
  );
}

$data = array(
  'description' => 'Paypalに表示する説明文',
  'currency' => 'JPY',
  'return' => '/paypal/return',
  'cancel' => '/paypal/cancel',
  'items' => array(  // 商品内容（複数可）
    0 => array(
      'name' => '商品名',
      'description' => '説明文',
      'tax' => '400',
      'shipping' => '0',
      'subtotal' => '5000',
    ),
  )
);
if ($express_checkout_url = $this->Paypal->setExpressCheckout($data)) {
  // Paypalにジャンプする
  $this->redirect($express_checkout_url);
}

// 決済OK時
if ($getDetail = $this->Paypal->getExpressCheckoutDetails($this->params['url']['token'])) {
  if ($getDetail['PAYMENTREQUESTINFO_0_ERRORCODE'] != '0') {
    // ErrorCodeが0以外の時は、Paypal決済エラー
    // エラー処理が入る
  }
  if ($doPayment = $this->Paypal->doExpressCheckoutPayment($data, $this->params['url']['token'], $getDetail['PAYERID'])) {
    // 決済番号
    $transactionid = $doPayment['PAYMENTINFO_0_TRANSACTIONID'];
  }
}