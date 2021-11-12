<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
    header("Expires: 0");
    include("../dbconnection.php");
    include("./admininclude/header.php");

	// following files need to be included
	require_once("../PaytmKit/lib/config_paytm.php");
	require_once("../PaytmKit/lib/encdec_paytm.php");

	$ORDER_ID = "ORDS82116336";
	$requestParamList = array();
	$responseParamList = array();

	if (isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"] != "") {

		// In Test Page, we are taking parameters from POST request. In actual implementation these can be collected from session or DB. 
		$ORDER_ID = $_POST["ORDER_ID"];

		// Create an array having all required parameters for status query.
		$requestParamList = array("MID" => PAYTM_MERCHANT_MID , "ORDERID" => $ORDER_ID);  
		
		$StatusCheckSum = getChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY);
		
		$requestParamList['CHECKSUMHASH'] = $StatusCheckSum;

		// Call the PG's getTxnStatusNew() function for verifying the transaction status.
		$responseParamList = getTxnStatusNew($requestParamList);
	}

?>


    <div class="container col-sm-8 d-inline"> 
	<h2 class="text-center my-4">Transaction status</h2>
    <form method="post" action="">
    <div class="form-group row">
        <label for="ORDER_ID" class="offset-sm-3 col-form-label">ORDER ID: </label>
        <div>
            <input type="text" class="form-control mx-3" id="ORDER_ID" name="ORDER_ID"
            tabindex="1" maxlength="20" size="20" autocomplete="off" value="<?php echo $ORDER_ID;?>">
        </div>
        <div>
            <input type="submit" class="btn btn-primary mx-4" value="View">
        </div>
        <!-- </div> -->
        <form>
        <!-- </div> -->
		
		<br/></br/>
		<?php
		if (isset($responseParamList) && count($responseParamList)>0 )
		{ 
		?>

            <div class="justify-content-center">
                <div class="col-auto offset-sm-3">
                    <h2 class="text-center">Payment Receipt</h2>
                    <table class="table table-bordered">
                        <tbody>
                            <?php
                                foreach($responseParamList as $paramName => $paramValue) {
                            ?>
                            <tr >
                                <td><label><?php echo $paramName?></label></td>
                                <td><?php echo $paramValue?></td>
                            </tr>
                            <?php
                                }
                            ?>
                            
                        </tbody>
                    </table>
                    <button class="btn btn-primary" onclick="javascript:window.print();">Print</button>

                </div>
            </div>
  
		<?php
        }
        
		?>
    
    <?php
    include("./admininclude/footer.php");
     ?>
</body>
</html>