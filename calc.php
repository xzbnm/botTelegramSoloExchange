<?php
//   include 'lib/binance.php';
//   include_once 'store.php';
  include 'index.php';

///// buy clac

  function buy($how,$sum){
        global $askUSD,$coin;
          
        $coin=helpfind();
        askETH();
        
        if($how =='/orderbuyMoney'){
        if($coin =='/coinBTC'){
        $sum=(float)($sum/(askBTC()*$askUSD));
        }
        else
        if($coin =='/coinETH')
        $sum=(float)($sum/(askETH()*$askUSD));
        else
        if($coin =='/coinETC')
        $sum=(float)($sum/(askETC()*$askUSD));
        else
        if($coin =='/coinLTC')
        $sum=(float)($sum/(askLTC()*$askUSD));
        else
        if($coin =='/coinBCH')
        $sum=(float)($sum/(askBCH()*$askUSD));
        else
        if($coin =='/coinXRP')
        $sum=(float)($sum/(askXRP()*$askUSD));
        else
        if($coin =='/coinTRX')
        $sum=(float)($sum/(askTRX()*$askUSD));
        else
        if($coin =='/coinADA')
            $sum=(float)($sum/(askADA()*$askUSD));
            else
                if($coin =='/coinDOGE')
                    $sum=(float)($sum/(askDOGE()*$askUSD));
        }else// orderbuyAmount
        {
        if($coin =='/coinBTC')
        $sum=askBTC()*$askUSD*$sum;
        else
        if($coin =='/coinETH')
        $sum=askETH()*$askUSD*$sum;
        else
        if($coin =='/coinETC')
        $sum=askETC()*$askUSD*$sum;
        else
        if($coin =='/coinLTC')
        $sum=askLTC()*$askUSD*$sum;
        else
        if($coin =='/coinBCH')
        $sum=askBCH()*$askUSD*$sum;
        else
        if($coin =='/coinXRP')
        $sum=askXRP()*$askUSD*$sum;
        else
        if($coin =='/coinTRX')
        $sum=askTRX()*$askUSD*$sum;
        else
        if($coin =='/coinADA')
        $sum=askADA()*$askUSD*$sum;
        else
        if($coin =='/coinDOGE')
        $sum=askDOGE()*$askUSD*$sum;
        
        }
        return $sum;
}
///// sell clac
function sell($how,$sum){
global $bidUSD;
$coin=helpfind();
askETH();
if($how =='/ordersellMoney'){

if($coin =='/coinBTC')
   $sum=(float)($sum/(askBTC()*$bidUSD));
else
   if($coin =='/coinETH')
       $sum=(float)($sum/(askETH()*$bidUSD));
   else
       if($coin =='/coinETC')
           $sum=(float)($sum/(askETC()*$bidUSD));
           else
               if($coin =='/coinLTC')
                   $sum=(float)($sum/(askLTC()*$bidUSD));
                   else
                       if($coin =='/coinBCH')
                           $sum=(float)($sum/(askBCH()*$bidUSD));
                           else
                               if($coin =='/coinXRP')
                                   $sum=(float)($sum/(askXRP()*$bidUSD));
                                   else
                                       if($coin =='/coinTRX')
                                           $sum=(float)($sum/(askTRX()*$bidUSD));
                                           else
                                               if($coin =='/coinADA')
                                                   $sum=(float)($sum/(askADA()*$bidUSD));
                                                   else
                                                       if($coin =='/coinDOGE')
                                                           $sum=(float)($sum/(askDOGE()*$bidUSD));
}else// ordersellAmount
{
   if($coin =='/coinBTC')
    $sum=askBTC()*$bidUSD*$sum;
   else
      if($coin =='/coinETH')
        $sum=askETH()*$bidUSD*$sum;
        else
            if($coin =='/coinETC')
               $sum=askETC()*$bidUSD*$sum;
               else
                  if($coin =='/coinLTC')
                    $sum=askLTC()*$bidUSD*$sum;
                    else
                        if($coin =='/coinBCH')
                           $sum=askBCH()*$bidUSD*$sum;
                           else
                              if($coin =='/coinXRP')
                                $sum=askXRP()*$bidUSD*$sum;
                                else
                                    if($coin =='/coinTRX')
                                       $sum=askTRX()*$bidUSD*$sum;
                                       else
                                          if($coin =='/coinADA')
                                            $sum=askADA()*$bidUSD*$sum;
                                            else
                                                if($coin =='/coinDOGE')
                                                $sum=askDOGE()*$bidUSD*$sum;
     
}
return $sum;
}
?>