<?php

 function price(){
   global $file;
   $json = 'https://api.binance.com/api/v3/ticker/price';
   $file = json_decode(file_get_contents($json),true);
   return json_decode(file_get_contents($json),true);
 }
 function askBTC(){
     global $file;
     return $file[11]["price"];
 }
  function askETH(){
     global $file;
     return price()[12]["price"];
 }
  function askXRP(){
     global $file;
     return $file[308]["price"];
 }
  function askLTC(){
     global $file;
     return $file[190]["price"];
 }
  function askADA(){
     global $file;
     return $file[298]["price"];
 }
  function askTRX(){
     global $file;
     return $file[353]["price"];
 }
  function askDOGE(){
     global $file;
     return $file[564]["price"];
 }
  function askETC(){
     global $file;
     return $file[354]["price"];
 }
  function askBCH(){
     global $file;
     return $file[668]["price"];
 }
//  $ch = curl_init();
//  curl_setopt($ch, CURLOPT_URL, 'https://api.bkex.com/v1/q/depth?&precision=2&pair=BTC_USDT');
//  $result = curl_exec($ch);
//  curl_close($ch);
//  $BTC = json_decode($result);
?>
