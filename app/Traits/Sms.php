<?php

namespace App\Traits;

use SoapClient;

trait Sms
{
//
//    public function send($number, $text)
//    {
//        ini_set("soap.wsdl_cache_enabled", "0");
//        try {
//            $wsdl_url = "http://ippanel.com/class/sms/wsdlservice/server.php?wsdl";
//            $client = new SoapClient($wsdl_url);
//            $user = "makaveli";
//            $pass = "19171363";
//            $fromNum = "3000505";
//            $toNum = $number;
//            $messageContent = $text;
//            $op = "send";
//            $time = Carbon::now();
//
//            $result = $client->SendSMS($fromNum, $toNum, $messageContent, $user, $pass, $time, $op);
////			echo $result;
//        } catch (SoapFault $ex) {
////			echo $ex->faultstring;
//        }
//    }


    public function sentWithPattern($number, $pattern_code, $input_data)
    {
        ini_set("soap.wsdl_cache_enabled", "0");
        try {
            $wsdl_url = "http://ippanel.com/class/sms/wsdlservice/server.php?wsdl";
            $client = new SoapClient($wsdl_url);
//            $user = "09122495701";
//            $pass = "faraz0063408147";
//            $fromNum = "3000505";

            $user = "makaveli";
            $pass = "19171363";
            $fromNum = "3000505";
            $toNum = $number;

         $result = $client->sendPatternSms($fromNum, $toNum, $user, $pass, $pattern_code, $input_data);
	//	 echo $result;
        } catch (SoapFault $ex) {
//			 echo $ex->faultstring;
        }
    }



}