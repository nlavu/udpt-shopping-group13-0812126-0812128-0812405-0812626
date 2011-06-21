<?php
	require_once('class/SuKienDAO.php');	
	require_once('class/GianHangDAO.php');	
	
	$strOutput = "";
	
	if (isset($_REQUEST['maGianHang']) && is_numeric($_REQUEST['maGianHang']))
	{
		$gianHangDto = GianHangDAO::LayGianHangTheoMa($_REQUEST['maGianHang']);
		if (is_null($gianHangDto))
		{
			//gian hàng không tồn tại
			header("Location:gian_hang.php");
		}
		else
		{
			$dsSuKien = SuKienDAO::LayDanhSachSuKienTheoGianHang($_REQUEST['maGianHang']);
			if (is_null($dsSuKien))
			{
				$strOutput .= "<tr valign='top'><td colspan='3'>Shop chưa có chương trình khuyến mãi nào.<br></td></tr>";
			}
			else
			{
				foreach($dsSuKien as $suKienDto)
				{
					$ngayBD = date_create($suKienDto->NgayBatDau);
					$ngayBD = $ngayBD->format('d-m-Y');
					
					$ngayKT = date_create($suKienDto->NgayKetThuc);
					$ngayKT = $ngayKT->format('d-m-Y');
					
					$noiDungSK = $suKienDto->NoiDungSuKien;
					if (strlen($noiDungSK) > 100)
						$noiDungSK = substr($noiDungSK,0,100).'...';
					
					$strOutput .="
					  <tr valign='top'>
						<td width='21%'>
							<a href='chi_tiet_su_kien.php?maGianHang=$gianHangDto->MaGianHang&id=$suKienDto->MaSuKien'>
							<img src='$suKienDto->HinhAnh' width='150' height='167' />
							</a>
						</td>
						<td width='76%'>
							<div class='text-color-normal-1'>
								<a href='chi_tiet_su_kien.php?maGianHang=$gianHangDto->MaGianHang&id=$suKienDto->MaSuKien'>".$suKienDto->TenSuKien."</a>
							</div>
							<div class='text-normal-2' >
								<br />Thời gian từ ngày ".$ngayBD." đến ngày ".$ngayKT.".
							</div>
							<div class='text-normal-1' >
								<br />".$noiDungSK."
							</div>
							<div class='text-normal-2'>
								<br /><a href='chi_tiet_su_kien.php?maGianHang=$gianHangDto->MaGianHang&id=$suKienDto->MaSuKien'>Xem chi tiết >></a>
							</div>
						</td>
						<td width='3%'>&nbsp;</td>
					  </tr>";
				}
			}			
		}
	}
	else
	{
		header("Location:gian_hang.php");
	}
	
	
?>
<div class="list-event">
  <div class="title">Các sự kiện khuyến mãi giảm giá </div>
	
	<table width="100%" border="0" cellspacing="0" cellpadding="10" class="event-table">
		<?php echo $strOutput; ?>      
    </table>

</div>
<!--end .list-event-->   
<div class="paging">
    <div class="item">                
      <a href="#" class="item current">1</a> 
      <a href="#" class="item">2</a>
    </div>
</div>
<!--end .paging -->  