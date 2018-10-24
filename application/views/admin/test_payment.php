<?php
 //fee). i wrote small script to do it

/**
 * Calculate stripe fee from amount
 * so you can charge stripe fee to customers
 * lafif <hello@lafif.me>
 */



function  calcFee($amount,$currency) 
{
    $fees = array('USD'=>array('Percent'=> 2.9, 'Fixed'=> 0.30),
                'GBP'=>array('Percent'=> 2.4, 'Fixed'=> 0.20),
                'EUR'=>array('Percent'=> 2.4, 'Fixed'=> 0.24) ,
                'CAD'=>array('Percent'=> 2.9, 'Fixed'=> 0.30) ,
                'AUD'=>array('Percent'=> 2.9, 'Fixed'=> 0.30) ,
                'NOK'=>array('Percent'=> 2.9, 'Fixed'=> 2) ,
                'DKK'=>array('Percent'=> 2.9, 'Fixed'=> 1.8) ,
                'SEK'=>array('Percent'=> 2.9, 'Fixed'=> 1.8),
                'JPY'=>array('Percent'=> 3.6, 'Fixed'=> 0) ,
                'MXN'=>array('Percent'=> 3.6, 'Fixed'=> 3) 
); 

     $fee = $fees[$currency];
     // print_r($fee);
    $amount = number_format($amount,2);
    $total = ($amount + $fee['Fixed']) / (1 - $fee['Percent'] / 100);
    $cal_fee = $total - $amount;
    $val=array('amount'=>$amount,'cal_fee'=>number_format($cal_fee,2),'total'=>number_format($total,2));
    return $val;
    
}

$charge_data = calcFee(27.14, 'USD');
print_r($charge_data);
// alert('You should ask=> ' + charge_data.total + ' to customer, to cover ' + charge_data.fee + ' fee from ' + charge_data.amount );
// console.log(charge_data);
$number=(0.5 * 27)/100;

    echo number_format((float)$number, 2, '.', '');

?>