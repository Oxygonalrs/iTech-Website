<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
    header("Expires: 0");
    include("./dbconnection.php");

	// following files need to be included
	require_once("./PaytmKit/lib/config_paytm.php");
	require_once("./PaytmKit/lib/encdec_paytm.php");

	$ORDER_ID = "";
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
<!--Start Navigation-->
<?php
        include('./mainInclude/header.php');
    ?>
<!-- End Navigation -->

<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./image/book.jpg" alt="courses" style="height:500px; width:100%; object-fit:cover; box-shadow:10px ">
    </div>
</div>

<!-- Start Main COntent -->
<div class="container">
    <h2 class="text-center my-4">Payment Status</h2>
    <form action="" method="post">
        <div class="form-group row">
            <label class="offset-sm-4 col-form-label">Order ID: </label>
            <div>
                <input type="text" name="ORDER_ID"class="form-control mx-3">
            </div>
            <div>
                <input type="submit" class="btn btn-primary mx-4" value="View">
            </div>
        </div>
    </form>
</div>
<div class="container">
		<?php
		if (isset($responseParamList) && count($responseParamList)>0 )
		{ 
		?>
            <div class="row justify-content-center">
                <div class="col-auto">
                    <h2 class="text-center">Payment Receipt</h2>
                    <table class="table table-bordered">
                        <tbody>
                            <?php
                                foreach($responseParamList as $paramName => $paramValue) {
                                    if(($paramName == "TXNID")|| ($paramName == "ORDERID")
                                     || ($paramName == "TXNAMOUNT") || ($paramName == "STATUS"))
                                     {
                            ?>
                            <tr >
                                <td><label><?php echo $paramName?></label></td>
                                <td><?php echo $paramValue?></td>
                            </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                <button class="btn btn-primary d-print-none" onclick="javascript:window.print();">Print</button>
                </div>

            </div>
</div>
		<?php
        }
        
		?>
	

<br><hr>
<!-- Start Contact us -->
<?php
        include('./contact.php');
    ?>
    <!-- End Contact Form -->
</div>
</div>
<!-- Footer-->
<?php
    include('./mainInclude/footer.php');
?>