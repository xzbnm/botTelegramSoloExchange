<?php
  include_once 'calc.php';
  include_once 'store.php';
  include_once 'msg.php';
  include_once 'defaultdata.php';
  include_once 'lib/binance.php';
  include('jdf.php');
  $token='?';
  $telegram = new Telegram($token);
    $orderHow;
  ///////////////
  $askUSD=0; $bidUSD=0;$per=0.0;getPER(); getUSD();
  $sw=true;
  //////////////////////
  $data;$chatID;$messageID;$coin;$obj;
 
 ///// main{}
    $stepa=inline(step1());
    $stepb=inline(step2());
    $stepbuy=inline(step3());
    $stepsell=inline(step4());
    $stepcoin=inline(step5());
    $stepaa=inline(step6());
 
 
  $update = file_get_contents('php://input');
  $old = file_get_contents('data/latesttime.txt');
  
  file_put_contents('bot.txt',$update);

  if(isset($update[0]['update_id'])){
            
    }else{
     
     storedata($update);
     $obj = json_decode($update,TRUE);
    //  
    }
  ////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////
    if (isset($obj['callback_query'])){
        $data = $obj['callback_query']['data'];
        $messageID = $obj['callback_query']['message']['message_id'];
        $chatID = $obj['callback_query']['from']['id'];
    }else{
        $data= $obj['message']['text'];
        $messageID = $obj['message']['message_id'];
        $chatID = $obj['message']['from']['id'];
    }
    if($data =='/start'){
        delete($messageID); 
        sendMessages($chatID,text1(),$stepa);
         hel();
    }else
        if($data =='/startedit')
            edit($chatID,$messageID,text1(),$stepa);
        else
////////////////////////////////////////////////////////////////////////     list.price
    if($data =='/list'){
        edit($chatID,$messageID,'در حال دریافت قیمت ارز ها',false);
        edit($chatID,$messageID,textlist(),$stepaa);
    }else
////////////////////////////////////////////////////////////////////////     ghavanin
    if($data =='/laws'){
        edit($chatID,$messageID,getLaws(),$stepb);
    }else
///////////////////////////////////////////////////////////////////////      selected.coin     
        
    if($data =='/orderbuy' || $data =='/ordersell')
        edit($chatID,$messageID,'ارز دیجیتال مورد نظر را انتخاب کنید :',$stepcoin);
    else
    
////////////////////////////////////////////////////////////////////////        amount or money
         
    if(listcoin($data) && find('/orderbuy')){
        edit($chatID,$messageID,'نحوه محاسبه :
(با انتخاب گزینه تومانی مقدار قابل خرید ارز دیجیتال براساس میزان پول وارد شده محاسبه می گردد.
با انتخاب گزینه مقدار ارز دیجیتال مقدار قابل خرید براساس میزان ارز دیجیتال وارد شده محاسبه می گردد)',$stepbuy);
    }else
        if(listcoin($data) && find('/ordersell') )
             edit($chatID,$messageID,'نحوه محاسبه :
(با انتخاب گزینه تومانی مقدار قابل فروش ارز دیجیتال براساس پول وارد شده محاسبه می گردد.
با انتخاب گزینه مقدار ارز دیجیتال مقدار قابل فروش برساس میزان ارز دیجیتال وارد شده محاسبه می گردد)
',$stepsell);
        else
        
/////////////////////////////////////////////////////////////////////////    how order
    
    //// buy
    if($data =='/orderbuyAmount'){
        edit($chatID,$messageID,'مقدار ارز دیجیتال مورد نظر خود را وارد کنید:',false);
    }
    else
        if($data =='/orderbuyMoney'){
            edit($chatID,$messageID,'میزان خرید خود را وارد کنید(تومانی) :',false);
        }else
    
    //// sell
    if($data =='/ordersellAmount'){
        edit($chatID,$messageID,'مقدار ارز دیجیتال مورد نظر خود را وارد کنید:',false);
    }else
        if($data =='/ordersellMoney'){
            edit($chatID,$messageID,'میزان فروش خود را وارد کنید(تومانی) :',false);
        }else
        
///////////////////////////////////////////////////////////////////////// get number
    if($data != ''){
        delete($messageID);  //remove message personall
        if( $data[0] =='a' && $data[6] == 's'){//example price change in robot a15000b14700
            setUSD($data);
            $msgid=find('/list');
            edit($chatID,$msgid,textlist(),$stepaa);
        }
        else
            if( $data[0] =='p' && $data[1] == 'r'){//example price change in robot a15000b14700
                setPER($data);
                $msgid=find('/list');
                edit($chatID,$msgid,textlist(),$stepaa);
            } 
            else
            if( $data[0] =='g' && $data[1] == 'h'){//example price change in robot a15000b14700
                
                $data=ltrim($data, 'gh');
                file_put_contents('data/laws.txt',$data);
            }
            else{
            /////////// buymoney and buyamount
                if(find('/orderbuyAmount')){
                        $msgid=find('/orderbuyAmount');
                        $sum=convert($data);
                        $sum= buy('/orderbuyAmount', $sum);
                        $coin=helpfind();
                        $text=' '.$data.' '.coinnamepersian($coin).'
'.number_format($sum,0).' تومان
در صورت تمایل مقدار جدید را وارد کنید :';
                
                        $str =str_replace('/',' ',$coin);
                        edit($chatID,$msgid,$text,$stepb);
                }else
                    if(find('/orderbuyMoney')){
                        $msgid=find('/orderbuyMoney');
                        $sum2=$sum=convert($data);
                        $sum= buy('/orderbuyMoney',$sum);
                        $text=number_format($sum2,0,'.',',').' تومان
'.number_format($sum, 8).''.coinnamepersian($coin).'
در صورت تمایل مقدار جدید را وارد کنید :';
                        edit($chatID,$msgid,$text,$stepb);
                    }else
                    
            /////////// sellamount and sellmoney
                if(find('/ordersellAmount')){
                    $msgid=find('/ordersellAmount');
                    $sum=convert($data);
                    $sum= sell('/ordersellAmount', $sum);
                    $coin=helpfind();  
                    $text=' '.$data.' '.coinnamepersian($coin).'
'.number_format($sum,0).' تومان
در صورت تمایل مقدار جدید را وارد کنید :';
                    edit($chatID,$msgid,$text,$stepb);
                }else
                    if(find('/ordersellMoney')){
                        $msgid=find('/ordersellMoney');
                        $sum=convert($data);
                        $sum2=$sum= sell('/ordersellMoney',$sum);
                        $coin=helpfind();
                        $text=number_format($sum2,0,'.',',').' تومان
'.number_format($sum, 8).''.coinnamepersian($coin).'
در صورت تمایل مقدار جدید را وارد کنید :';
                        edit($chatID,$msgid,$text,$stepb); 
                    }
            /////////// error
                else{
                    edit($chatID,$messageID,'error 404',$stepb);

                }
        }
    }
// }///////////////////////////////////////////////////////////////////////////////////////end new old request
   
?>
