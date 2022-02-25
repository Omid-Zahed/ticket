<?php
$url="http://91.98.102.14:11103/iranavlapi/Payment/paymentOk?uUserName=omid&uSerial=1234&uTransaction=1111111&uMobile=09350814171&uCardNumber=12345678978945612&uCardType=1111111&uFactorNumber=1111111&uAmount=1111111";

echo file_get_contents($url);
