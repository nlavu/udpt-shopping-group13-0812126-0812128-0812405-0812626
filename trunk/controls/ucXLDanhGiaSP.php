<?php
		require_once('../session.inc');
		//kiểm tra quyền truy xuất
		/*
		if ($_SESSION['IsLogin'] === 0)
		{
			header('Location:index.php');
			return;
		}
		*/
		require_once('../class/SanPhamDAO.php');
		require_once('../class/LikesDAO.php');
		
		$strSQL ="";			
		if (isset($_REQUEST['sosao']) && isset($_REQUEST['id']) && isset($_REQUEST['user']) &&
			isset($_REQUEST['page'])&& isset($_REQUEST['kq']) && isset($_REQUEST['t']))
		{	
			$soSao = $_REQUEST['sosao'];
			$maDoiTuong = $_REQUEST['id'];
			$maNguoiDung = $_REQUEST['user'];
			$page = $_REQUEST['page'];
			$strRes = "";
			// kiểm tra người dùng đã đánh giá hay chưa
			$nguoiDungDanhGia = LikesDAO::LayDanhSachLikesTheoMaDT_MaNguoiDung($maDoiTuong, $maNguoiDung);
			$res = false;
			$txtLike = "";
			if (is_null($nguoiDungDanhGia))
			{
				// thêm đánh giá
				$likeDto = new LikesDTO();
				$likeDto->MaDoiTuong = $maDoiTuong;
				$likeDto->MaNguoiDung = $maNguoiDung;
				$likeDto->SoSao = $soSao;
				
				$res = LikesDAO::ThemLike($likeDto);
				//$txtLike = "Unlike";
			}
			else
			{
				//Cập nhật đánh giá
				$res = LikesDAO::CapNhatLike($maDoiTuong, $maNguoiDung, $soSao);
				//$txtLike = "Like";
			}
			if ($res)
			{
				// kết quả trả về
				if ($page ==='ChiTietSP')
				{
					$SoSaoTB = LikesDAO::TinhSoSaoTBCuaMotDoiTuong($maDoiTuong);
					$strRes = $SoSaoTB.' sao | 
					<span class="text-color-bold-1" id="btnDanhGiaSP" style="cursor:pointer;">Đánh giá</span>';
				}
				
			}	
			echo $strRes;		
		}
		
?>