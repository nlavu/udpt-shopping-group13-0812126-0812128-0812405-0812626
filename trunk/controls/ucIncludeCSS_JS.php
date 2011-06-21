<!--attach css-->
<link href="css/style-default.css" rel="stylesheet" type="text/css"  />
<link href="css/style-shop.css" rel="stylesheet" type="text/css"  />

<link type="text/css" href="./plugin/jquery-ui-1.8.13.custom/css/no-theme/jquery-ui-1.8.13.custom.css" rel="stylesheet" />	
<link type="text/css" href="./plugin/jquery-validation-form-and-hints/css/errors.css" rel="stylesheet" />	
<!--end attach css-->

<script type="text/javascript" src="./plugin/jquery-ui-1.8.13.custom/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="./plugin/jquery-ui-1.8.13.custom/js/jquery-ui-1.8.13.custom.min.js"></script>

<script src="./plugin/reflection-jquery/js/reflection.js" ></script>
<script src="./plugin/jquery-validation-form-and-hints/js/jquery.form-validation-and-hints.js" ></script>
<script src="./plugin/number.fmt-money/fmt-money.js" ></script>

<script src="./javascript/script_DangNhap_GianHang.js" type="text/javascript" ></script>
<script src="./javascript/script_DangKy.js" type="text/javascript" ></script>
<script src="./javascript/script_Shop.js" type="text/javascript" ></script>
<script src="./javascript/script_SanPham.js" type="text/javascript" ></script>
<!--end attach js-->
<?php
// hàm chuyển đổi định dạng kí tự tiền
	function formatMoney($number, $fractional=false) {
		if ($fractional) {
			$number = sprintf('%.2f', $number);
		}
		while (true) {
			$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
			if ($replaced != $number) {
				$number = $replaced;
			} else {
				break;
			}
		}
		return $number;
	} 
// hàm tính toán sự khác biệt ngày giờ
	function dateTimeDiff($data_ref)
	{
		// Get the current date
		$current_date = date('Y-m-d H:i:s');
		
		// Extract from $current_date
		$current_year = substr($current_date,0,4);
		$current_month = substr($current_date,5,2);
		$current_day = substr($current_date,8,2);
		
		// Extract from $data_ref
		$ref_year = substr($data_ref,0,4);
		$ref_month = substr($data_ref,5,2);
		$ref_day = substr($data_ref,8,2);
		
		// create a string yyyymmdd 20071021
		$tempMaxDate = $current_year . $current_month . $current_day;
		$tempDataRef = $ref_year . $ref_month . $ref_day;
		
		$tempDifference = $tempMaxDate-$tempDataRef;
		
		// If the difference is GT 10 days show the date
		if($tempDifference >= 10)
		{
			echo $data_ref;
		} 
		else 
		{
		
			// Extract $current_date H:m:ss
			$current_hour = substr($current_date,11,2);
			$current_min = substr($current_date,14,2);
			$current_seconds = substr($current_date,17,2);
			
			// Extract $data_ref Date H:m:ss
			$ref_hour = substr($data_ref,11,2);
			$ref_min = substr($data_ref,14,2);
			$ref_seconds = substr($data_ref,17,2);
			
			$hDf = $current_hour-$ref_hour;
			$mDf = $current_min-$ref_min;
			$sDf = $current_seconds-$ref_seconds;
			// If the difference is GT 10 days show the date
			if($tempDifference >= 10)
			{
				echo $data_ref;
			} 
			else 
			{
			
				// Extract $current_date H:m:ss
				$current_hour = substr($current_date,11,2);
				$current_min = substr($current_date,14,2);
				$current_seconds = substr($current_date,17,2);
				
				// Extract $data_ref Date H:m:ss
				$ref_hour = substr($data_ref,11,2);
				$ref_min = substr($data_ref,14,2);
				$ref_seconds = substr($data_ref,17,2);
				
				$hDf = $current_hour-$ref_hour;
				$mDf = $current_min-$ref_min;
				$sDf = $current_seconds-$ref_seconds;
				$dDf = 0;
				// Show time difference ex: 2 min 54 sec ago.
				if($dDf<1)
				{
					if($hDf>0)
					{
						if($mDf<0)
						{
							$mDf = 60 + $mDf;
							$hDf = $hDf - 1;
							echo $mDf . ' phút';
						} 
						else 
						{
							echo $hDf. ' giờ ' . $mDf . ' phút';
						}
					} 
					else 
					{
						if($mDf>0)
						{
							echo $mDf . ' phút ' . $sDf . ' giây ';
						} 
						else 
						{
							echo $sDf . ' giây ';
						}
					}
				} 
				else 
				{
					echo $dDf . ' ngày ';
				}
			}
		}
	}

?>