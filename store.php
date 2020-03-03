<?php
  include 'index.php';


    function storedata($obj){  // save dta to other file for calc past 
        
        $filename='data/log.json';
        ///// is empty
        if($obj){
            if(file_get_contents($filename)){
                   $myfile = fopen($filename, 'a');
                   fwrite($myfile,','.$obj);
                   fclose($myfile);
                
            }else{
                   $myfile = fopen($filename, 'a');
                   fwrite($myfile,$obj);
                   fclose($myfile); 
            }
        }

    }
///// chek list coin
    function find($data){
        global $chatID;
        $chatIDold=0;$max=0;
        $json  =file_get_contents('data/log.json');
        $obj = json_decode('['.$json.']',true);

        while(1){
            if(isset($obj[$max]['update_id']))
              $max++;
            else
            break;
        }

        $sw=0;
        $max--;
                // $myfile = fopen('data/x.txt', 'a');
                // fwrite($myfile,' max='.$max);
                // fclose($myfile);
        for($i=$max ;$i >=0 ; $i--){
           
            if(isset($obj[$i]['callback_query'])){
                $chatIDold=$obj[$i]['callback_query']['from']['id'];
                if($chatID == $chatIDold){
                    $temp =$obj[$i]['callback_query']['data'];
                //     $myfile = fopen('data/x.txt', 'a');
                // fwrite($myfile,' data='.$temp);
                // fclose($myfile);
                    
                    if($temp == $data){  // /hordersellMoney or /hordersellAmount ..buy
                        $sw=$obj[$i]['callback_query']['message']['message_id'];       // retun msgid
                        // $myfile = fopen('data/x.txt', 'a');
                        // fwrite($myfile,' yes is true= '.$sw);
                        // fclose($myfile);
                        break;
                    }
                    if($temp=='/startedit'){
                        break;
                    }
                    
                }
            }else{
                $chatIDold=$obj[$i]['message']['from']['id'];
                if($chatID == $chatIDold){
                    $temp =$obj[$i]['message']['text'];
                    if($temp=='/start')
                       break;
                }
                
            }
        }
        //     $myfile = fopen('data/x.txt', 'a');
        //         fwrite($myfile,' sw ='.$sw);
        //         fclose($myfile);
        if($max>=500){
            unlink('data/log.json');
        }
        if($sw==0)
          return false;
        return $sw;
    }
    function helpfind(){
        global $chatID;
        
        if(find('/coinBTC'))
            return '/coinBTC';
        if(find('/coinETH'))
            return '/coinETH';
        if(find('/coinETC'))
            return '/coinETC';
        if(find('/coinLTC'))
            return '/coinLTC';
        if(find('/coinBCH'))
            return '/coinBCH';
        if(find('/coinTRX'))
            return '/coinTRX';
        if(find('/coinDOGE'))
            return '/coinDOGE';
        if(find('/coinXRP'))
            return '/coinXRP';
        if(find('/coinADA'))
            return '/coinADA';
        
    }
    ///// store and get Msg    
    function listcoin($data){
        global $coin;
        $list=['/coinBTC','/coinLTC','/coinBCH','/coinTRX','/coinXRP','/coinETC','/coinETH','/coinADA','/coinDOGE'];
        for( $i=0 ;$i<9 ;$i++){
             
            if($list[$i]==$data){
                
               $coin=$data;
               $myfile = fopen('data/x.txt', 'a');
                        fwrite($myfile,' coinned '.$coin);
                        fclose($myfile);
                return true;
            }
        }
        return false;
    }
    function coinnamepersian($coin){
        switch ($coin) {
            case '/coinBTC':
                return ' بیت کوین';
                break;
            case '/coinETH':
                return ' اتریوم';
            break;
            case '/coinETC':
                return ' اتریوم کلاسیک';
                break;
            case '/coinBCH':
                return 'بیتکوین کش';
                break;    
            case '/coinXRP':
            return ' ریپل';
                break;
            case '/coinTRX':
                return ' ترون';
                break;    
            case '/coinDOGE':
                return ' دوج';
                break;
            case '/coinLTC':
                return ' لایت کوین';
                break;    
            case '/coinADA':
                return ' کاردانو';
                break;
        }
    }
    function convert($string) {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١','٠'];

        $num = range(0, 9);
        $convertedPersianNums = str_replace($persian, $num, $string);
        $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

        return $englishNumbersOnly;
    }

    function getPER(){
        global   $per;
        $file = 'data/per.txt';
        $content =fopen($file, "r");
        $str =fgets($content);
        fclose($content);
        $per=number_format($str,3);
    }
    function setPER($data){
        global   $per;
        getUSD();
        $lenght=strlen($data);
        echo 'size '.$lenght;
        if($lenght==3){
            $int=number_format($data[2],3);
            // echo $int;
            $int=$int/100;
            $per=number_format(1+$int,3);
        }else
        if($lenght==5){
            $int=number_format(($data[2])/100,3);
            $int2=number_format(($data[4])/1000,3);
            $int=1+$int+$int2;
        //   $myfile = fopen('data/x.txt', 'a');
        //   fwrite($myfile,'per='.$int);
        //   fclose($myfile);
            $per=number_format($int,3);
        }
            $file = 'data/per.txt';
        // $content = json_encode($per);
        file_put_contents($file, '');
        file_put_contents($file, $per);
        // echo $per;
    }
    function getUSD(){
        global   $askUSD ,$bidUSD,$per;
        $file = 'data/askUSD.txt';
        $content =fopen($file, "r");
        $str =fgets($content);
        fclose($content);
        $askUSD=$str;
        $askUSD=$askUSD*$per;
 
        $file = 'data/bidUSD.txt';
        $content =fopen($file, "r");
        $str =fgets($content);
        fclose($content);
        $bidUSD=$str;
        $temp=2-$per;
        $bidUSD=$bidUSD*$temp;
    }
    function setUSD($data){
        global   $askUSD ,$bidUSD,$per;
        
        $sum=0;
        for($i =1;$i<6;$i++)
            $sum=number_format($data[$i])+($sum*10);
        
        $file = 'data/askUSD.txt';
        $content = json_encode($sum);
        file_put_contents($file, '');
        file_put_contents($file, $content);
         $askUSD=$sum;
        $askUSD=$askUSD*$per;
        
        
        $sum=0;
        for($i =7;$i<12;$i++)
            $sum=number_format($data[$i])+($sum*10);
        
        $file = 'data/bidUSD.txt';
        $content = json_encode($sum);
        file_put_contents($file, '');
        file_put_contents($file, $content);
       $bidUSD=$sum;
        $temp=2-$per;
        $bidUSD=$bidUSD*$temp;
        
    }
?>