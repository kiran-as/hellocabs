<?php
include('../application/conn.php');
$name = $_POST['contanctname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$journeydate = date('Y-m-d',strtotime($_POST['journeydate']));
$localtime = $_POST['localtime'];
 
mysql_query("Insert into tbl_contactus (name,email,phone,area,address,journeydate,servicefor)
	 VALUES('".$name."','".$email."','".$phone."','".$phone."','".$address."','".$journeydate."','Outstation')");
	
			
$xml_data ='<?xml version="1.0"?><smslist><sms><user>ashokks</user><password>123456</password>
<message>Outstation Request by '.$name.' and their phone no is '.$phone.'</message>
<mobiles>9538130954</mobiles>
<senderid>HLCabs</senderid>
</sms></smslist>'; 
$URL = "http://sms.jootoor.com/sendsms.jsp?"; 

			$ch = curl_init($URL);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
			curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$output = curl_exec($ch);
			print_r($output);
			curl_close($ch); 

$xml_data ='<?xml version="1.0"?><smslist><sms><user>ashokks</user><password>123456</password>
<message>Outstation Request by '.$name.' and their phone no is '.$phone.'</message>
<mobiles>9611116888</mobiles>
<senderid>HLCabs</senderid>
</sms></smslist>';  
$URL = "http://sms.jootoor.com/sendsms.jsp?"; 

			$ch = curl_init($URL);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
			curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$output = curl_exec($ch);
			print_r($output);
			curl_close($ch); 
			
$xml_data ='<?xml version="1.0"?><smslist><sms><user>ashokks</user><password>123456</password>
<message>Outstation Request by '.$name.' and their phone no is '.$phone.'</message>
<mobiles>8050055544</mobiles>
<senderid>HLCabs</senderid>
</sms></smslist>';   
//echo $xml_data;
$URL = "http://sms.jootoor.com/sendsms.jsp?"; 

			$ch = curl_init($URL);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
			curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$output = curl_exec($ch);
			print_r($output);
			curl_close($ch); 

?>