<?php
  include_once 'lib/binance.php';
    include_once 'lib/Telegram.php';
    include_once 'jdf.php';
// 1345678516 robot hamidreza.dehghan

function sendMessages($chatID ,$text ,$key){
    
  $token='1060705772:AAHSpDm0SZf39bO0neRN1WYoY1DXQaySJuU';
    
     $url = 'https://api.telegram.org/bot'.$token.'/sendMessage?chat_id='.$chatID.'&text='.urlencode($text);
     file_get_contents($url);
}
  function textlist(){
    // 
    $file = 'data/per.txt';
        $content =fopen($file, "r");
        $str =fgets($content);
        fclose($content);
    $per=$str;
     $file = 'data/askUSD.txt';
        $content =fopen($file, "r");
        $str =fgets($content);
        fclose($content);
    $askUSD=$ask=$str;
    $file = 'data/bidUSD.txt';
        $content =fopen($file, "r");
        $str =fgets($content);
        fclose($content);
    $bidUSD=$bid=$str;
    
     $askUSD= $askUSD*$per;
      $bidUSD= $bidUSD*(2-$per);
        $time=jdate('Y/n/j');

$textlist='
      '.$time.'
     
    📉 اتریوم (ETH)‏  $'.number_format(askETH(),2,'.',',').'
    🔸 خرید:     '.number_format(askETH()*$bidUSD,0,'.',',').' تومان  
    🔹 فروش:   '.number_format(askETH()*$askUSD,0,'.',',').' تومان  
    
    📉 اتریوم کلاسیک (ETC)‏  $'.number_format(askETC(),2,'.',',').'
    🔸 خرید:    '.number_format(askETC()*$bidUSD,0,'.',',').' تومان 
    🔹 فروش:  '.number_format(askETC()*$askUSD,0,'.',',').' تومان 
    
    📉 بیت‌کوین (BTC)‏  $'.number_format(askBTC(),2,'.',',').'
    🔸 خرید:    '.number_format(askBTC()*$bidUSD,0,'.',',').' تومان 
    🔹 فروش:  '. number_format($askUSD*askBTC(),0,'.',',').' تومان 
    
    📉 بیتکوین کش (BCH)‏  $'.number_format(askBCH(),2,'.',',').'
    🔸 خرید:   '.number_format(askBCH()*$bidUSD,0,'.',',').' تومان 
    🔹 فروش: '.number_format(askBCH()*$askUSD,0,'.',',').' تومان 
    
    📉 ترون (TRX)‏  $'.number_format(askTRX(),7,'.',',').'
    🔸 خرید:    '.number_format(askTRX()*$bidUSD,1,'.',',').' تومان 
    🔹 فروش:  '.number_format(askTRX()*$askUSD,1,'.',',').' تومان 
    
    📉 ریپل (XRP)‏  $'.number_format(askXRP(),7,'.',',').'
    🔸 خرید:    '.number_format(askXRP()*$bidUSD,1,'.',',').' تومان 
    🔹 فروش:  '.number_format(askXRP()*$askUSD,1,'.',',').' تومان 
    
    📉 دوج (DOGE)‏  $'.number_format(askDOGE(),7,'.',',').'
    🔸 خرید:    '.number_format(askDOGE()*$bidUSD,1,'.',',').' تومان 
    🔹 فروش:  '.number_format(askDOGE()*$askUSD,1,'.',',').' تومان 
    
    📉 کاردانو (ADA)‏  $'.number_format(askADA(),7,'.',',').'
    🔸 خرید:    '.number_format(askADA()*$bidUSD,1,'.',',').' تومان 
    🔹 فروش:  '.number_format(askADA()*$askUSD,1,'.',',').' تومان 
    
    📉 لایت کوین (LTC)‏  $'.number_format(askLTC(),2,'.',',').'
    🔸 خرید:    '.number_format(askLTC()*$bidUSD,0,'.',',').' تومان 
    🔹 فروش:  '.number_format(askLTC()*$askUSD,0,'.',',').' تومان 

🔰 دلار تتر (USDT)  ‏ $1 
🔸 خرید:    '.$bid.' تومان 
🔹 فروش:  '.$ask.' تومان 

نرخ ها صرفاً جهت اطلاع است و هرگونه خرید و فروش، با استعلام  از ما و نرخ همان لحظه ميباشد.

ارتباط با ما :
🆔 @Bitsolex
 لینک کانال تلگرام :
🌐 https://t.me/bit_solexchange

آدرس صفحه اینستاگرام :
📱https://www.instagram.com/Bit_solexchange

💰 @bitsolexchangebot';
return $textlist;
}
// sendMessages('@aliarj98',textlist(),false);

        sendMessages(-1001345678516,textlist(),false);

?>