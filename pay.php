<?php
// write by javad edalat
      $amount = $_GET['amount']*10;
      $domin = 'domin.net'; // put your domain 
// ---------- { Payment } ---------- //
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment');
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array(
      'order_id' => 1,
      'amount' => $amount, // put amount or use amount parameter (difficult)
      'name' => "", // name of user
      'phone' => "", // number of user
      'desc' => '', // description of pay
      'callback' => 'https://'.$domin.'/back.php?amount='.$_GET['amount'],
      )));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
      'X-API-KEY: 000', // put your API KEY instead of 000
      'X-SANDBOX: 0'
      ));
      $result = curl_exec($ch);
      curl_close($ch);
      echo ($result);
?>