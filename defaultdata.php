<?php
  include 'index.php';
  include 'store.php';

///// key creator
function key1($text,$data){
    $opt =[
        'text'=>$text,
        'callback_data'=>$data
    ];
    return $opt;
}
function inline(array $opt){
    $reply =[
        'inline_keyboard'=>$opt
    ];			
    $final_reply =json_encode($reply,TRUE); 
    return $final_reply;
}

function step1(){
    $step1 =array(
        array(
            key1('نرخ‌لحظه‌ای','/list'),key1('مقررات','/laws'),key1('فروش','/ordersell'),key1('خرید','/orderbuy')
        ),
    );
    return $step1;
}
function step2(){
    $step2 =array(
        array(
            key1('خانه','/startedit')
        )
    );
    return $step2;
}
    ///// buy
function step3(){
    $step3 =array(
        array(
            key1(' مقدار ارز دیجیتال','/orderbuyAmount'),key1(' تومانی','/orderbuyMoney')
        ),
        array(
            key1('خانه','/startedit')
        )
    );
    return $step3;
}
    //// sell
function step4(){
    $step4 =array(
        array(
            key1(' مقدار ارز دیجیتال ','/ordersellAmount'),key1(' تومانی','/ordersellMoney')
        ),
        array(
            key1('خانه','/startedit')
        )                          
    );
    return $step4;
}
    ///// coins
    function step5(){
    $step5 =array(
        array(
            key1('ETH-اتریوم','/coinETH'),key1('ETC-اتریوم‌کلاسیک','/coinETC'),key1('BTC-بیتکوین','/coinBTC')
        ),
        array(
            key1('BCH-بیتکوین‌کش','/coinBCH'),key1('TRX-ترون','/coinTRX'),key1('XRP-ریپل','/coinXRP')
        ),
        array(
            key1('DOGE-دوج','/coinDOGE'),key1('ADA-کاردانو','/coinADA'),key1('LTC-لایت‌کوین','/coinLTC')
        ),
        array(
            key1('خانه','/startedit')
        )
    );
     return $step5;
}
    function step6(){
    $step6 =array(
        array(
            key1('بروز رسانی','/list')
        ),
        array(
            key1('خانه','/startedit')
        )
    );
    return $step6;
}

////// text
   function text1(){
$text1='لطفا جهت ثبت معامله و پیگیری با آیدی  Bitsolex@ در ارتباط باشید .

🆔 : @Bitsolex';

       return $text1;
   }
   function textlist(){
    global $askUSD,$bidUSD,$per;
    getUSD();
    // 
     $file = 'data/askUSD.txt';
        $content =fopen($file, "r");
        $str =fgets($content);
        fclose($content);
    $ask=$str;
    $file = 'data/bidUSD.txt';
        $content =fopen($file, "r");
        $str =fgets($content);
        fclose($content);
    $bid=$str;
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
function getLaws(){
   $text=file_get_contents('data/laws.txt');
   
   return $text;
}
function setLaws($text){
   file_put_contents('data/laws.txt',$text);
}

?>
