<?php
      error_reporting(0);
      $amount = $_GET['amount'];
      $id = $_POST['id'];
      $_amount = $_GET['amount'];
// ---------- { check } ---------- //
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment/verify');
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array(
        'id' => $id,
        'order_id' => '1',
      )));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        "X-API-KEY: 000", // put your API KEY instead of 000
      ));
      $result = json_decode(curl_exec($ch));
      curl_close($ch);
// ---------- { show result } ---------- //
      if($result->status == '100'){
      echo '<h1 style="text-align: center">✅ پرداخت موفقیت آمیز بود</h1>';
      } else {
      echo '<h1 style="text-align: center">❌ پرداخت با خطا مواجه شد</h1>';
}
?>