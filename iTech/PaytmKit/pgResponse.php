<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
include('../dbconnection.php');
// session_start();

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
		if(isset($_POST['ORDERID'])&& isset($_POST['TXNAMOUNT']))
		{
			$order_id = $_POST['ORDERID'];
			$status = $_POST['STATUS'];
			$respmsg = $_POST['RESPMSG'];
			$amount = $_POST['TXNAMOUNT'];
			$date = $_POST['TXNDATE'];
			$sql = "UPDATE courseorder SET status1 = '$status', order_date = '$date', respmsg = '$respmsg' WHERE order_id ='$order_id'";
			// $sql = "INSERT INTO courseorder(order_id, stu_email, course_id, status1, respmsg,amount,
			// order_date) VALUES ('$order_id','$stu_email','$course_id','$status','$respmsg','$amount','$order_id','$date')";
			if($conn->query($sql))
			{
				//echo 'Redirecting to My Profile....';
				echo "<script> setTimeout(()=>{window.location.href = '../student/mycourse.php';}, 1500);</script>";
			}
		}
	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";

		// $order_id = $_POST['ORDERID'];
		// $txn_id = $_POST['TXNID'];
		// $txn_amount = $_POST['TXNAMOUNT'];
		// $payment_mode = $_POST['PAYMENTMODE'];
		// $txn_date = $_POST['TXNDATE'];
		// $status = $_POST['STATUS'];
		// $sql = "INSERT INTO payment(order_id,txn_id,txn_amount,payment_mode,txn_date,status) VALUES
		// ('".$order_id."','".$txn_id."','".$txn_amount."','".$payment_mode."','".$txn_date."','".$status."')";
		// $result = $conn->query($sql);
		// if($result == TRUE)
		// {
		// 	echo "<script>location.href = '../index.php';</script>";;
		// }
		/* $sql = "UPDATE user SET user_active=1 WHERE user_mo ='".$user_mobile."'";
        $result = $conn->query($sql);
		if($result == TRUE)
		{
			echo '<script> location.href = subscriberprofile.php</script>';
		} */
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		foreach($_POST as $paramName => $paramValue) {
			echo "<br/>" . $paramName . " = " . $paramValue;
		} 
	}
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>