<?php
	require_once('../class/BinhLuanDAO.php');
	require_once('../class/DoiTuongDAO.php');
	require_once('../class/NguoiDungDAO.php');
	
	if (isset($_REQUEST['noiDungBL']) && isset($_REQUEST['id']) && isset($_REQUEST['user']) &&
		isset($_REQUEST['kq']) && isset($_REQUEST['page']) && isset($_REQUEST['t']))
	{
		
		$maDoiTuong = $_REQUEST['id'];
		$noiDungBL = $_REQUEST['noiDungBL'];	
		$nguoiBL = NguoiDungDAO::LayThongTinNguoiDungTheoMa($_REQUEST['user']);
		
		// tạo đối tượng
		$maBL = DoiTuongDAO::ThemDoiTuong('Binh luan');
		if ($maBL > 0)
		{
			// nếu tạo tối tượng thành công --> thêm bình luận
			$binhLuan = new BinhLuanDTO();
			$binhLuan->MaBL = $maBL;
			$binhLuan->NoiDungBL = $noiDungBL;
			$binhLuan->NguoiBL = $nguoiBL->MaNguoiDung;
			$binhLuan->DaXoa = 0;
			$binhLuan->DoiTuongBL = $maDoiTuong;
			$binhLuan->NgayBL = date('Y-m-d');
			if (BinhLuanDAO::ThemBL($binhLuan))
			{				
				// nếu thêm thành công
				$binhLuanDto = BinhLuanDAO::LayBinhLuanTheoMaBL($maBL);
				
				$thoiGianBL = date_create($binhLuanDto->NgayBL);
				$gioBL= $thoiGianBL->format('H:i');
				$ngayBL = $thoiGianBL->format('d-m-Y');
				
				$soNguoiLike = 0;				
				  
				 if ($_REQUEST['page'] == "BinhLuan_SP")
				 {
					$idKQ_Like_BL = "kq_like_binhluan_sp_".$binhLuanDto->MaBL;
					$funcLikeBL ="funcLike('".$binhLuanDto->MaBL."','".$nguoiBL->MaNguoiDung."','".$idKQ_Like_BL."','BinhLuanSP')";
				 }
				 if ($_REQUEST['page'] == "BinhLuan_SK")
				 {
					$idKQ_Like_BL = "kq_like_binhluan_sk_".$binhLuanDto->MaBL;
					$funcLikeBL ="funcLike('".$binhLuanDto->MaBL."','".$nguoiBL->MaNguoiDung."','".$idKQ_Like_BL."','BinhLuanSP')";
				 }
				echo "				
				<div class='comment-wrapper'>                       	  	
					<div class='avatar'><img src='$nguoiBL->AnhDaiDien' width='1280' height='1024' /></div>
					<div class='content'>
						 <div class='title-comment'>
							<span class='text-color-normal-1'>
								<a href='trang_ca_nhan.php?id=$nguoiBL->MaNguoiDung'>".$nguoiBL->UserName."</a>
							</span> bình luận lúc $gioBL ngày $ngayBL.
						 </div>
						 <div class='primary-comment'>
								$binhLuanDto->NoiDungBL
						 </div>
						 <div class='action' id='$idKQ_Like_BL'>
							0 người thích <span class='text-color-normal-1 likes' onclick=$funcLikeBL > Like </span>
						 </div>
						 
					</div>                            
					<!--end .content-->
					<div class='button'>
						<span class='remove ui-icon ui-icon-close' title='Xóa'>&nbsp;</span>
					</div>
				</div>
				<!--end .comment-wrapper-->";
			}
		}
	}
?>