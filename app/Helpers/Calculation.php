<?php

use App\Payment;

if (!function_exists('amountReceived')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function amountReceived($id,$amount)
    {
    	$payment = Payment::find($id);
        $add = $payment->rate * $amount;
        $result = $amount + $add;

        return $result;
    }
}

if (!function_exists('uniqAmount')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function uniqAmount($amount)
    {
        $sub    = substr($amount,-3);
        $sub2   = substr($amount,-2);
        $sub3   = substr($amount,-1);

        $total  = rand(100,999);
        $total2 = rand(10,99);
        $total3 = rand(1,9);

        if ($sub == 0){
            $result =  $amount + $total; 
        }elseif ($sub2 == 0){
            $result = $amount + $total2; 
        }elseif ($sub3 == 0){
            $result = $amount + $total3; 
        }else{
            $result = $amount;
        }

        return $result;
    }
}
