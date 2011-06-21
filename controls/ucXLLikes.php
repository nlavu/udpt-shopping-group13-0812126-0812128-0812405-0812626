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
		require_once('../class/SuKienDAO.php');
		require_once('../class/BinhLuanDAO.php');
		require_once('../class/SanPhamDAO.php');
		require_once('../class/GianHangDAO.php');
		require_once('../class/LikesDAO.php');
		
		$strSQL ="";			
		if (isset($_REQUEST['id']) && isset($_REQUEST['user']) &&
			isset($_REQUEST['page'])&& isset($_REQUEST['kq']) && isset($_REQUEST['t']))
		{			
			$maDoiTuong = $_REQUEST['id'];
			$maNguoiDung = $_REQUEST['user'];
			$page = $_REQUEST['page'];
			$strRes = "";
			// kiểm tra người dùng đã like hay chưa
			$nguoiDungLike = LikesDAO::LayDanhSachLikesTheoMaDT_MaNguoiDung($maDoiTuong, $maNguoiDung);
			$res = false;
			$txtLike = "";
			if (is_null($nguoiDungLike))
			{
				// thêm likes
				$likeDto = new LikesDTO();
				$likeDto->MaDoiTuong = $maDoiTuong;
				$likeDto->MaNguoiDung = $maNguoiDung;
				$likeDto->SoSao = '0';
				
				$res = LikesDAO::ThemLike($likeDto);
				$txtLike = "Unlike";
				
			}
			else
			{
				//Xóa likes
				$res = LikesDAO::XoaLike($maDoiTuong, $maNguoiDung);
				$txtLike = "Like";				
			}
			
			if ($res)
			{				
				// lấy ds likes
				$dsLikes = LikesDAO::LayDanhSachLikesTheoMaDoiTuong($maDoiTuong);
				$soNguoiLike = count($dsLikes);				
				// kết quả trả về
				$funcLikeBL ="funcLike('".$maDoiTuong."','".$maNguoiDung."','".$_REQUEST['kq']."', '".$page."')";
				if ($page == 'BinhLuan_SK')
				{
					$strRes = $soNguoiLike.' người thích <span class="text-color-normal-1 likes" onclick="'.$funcLikeBL.'" >'.$txtLike.'</span>';								
				}
				//like sản phẩm
				if ($page == 'ChiTietSP')
				{				
					
					$strRes = $soNguoiLike.' người thích <span style="cursor:pointer;" class="text-color-bold-1" onclick="'.$funcLikeSP.'" >'.$txtLike.'</span>';				
					
				}
				//like bình luận sản phẩm
				if ($page == 'BinhLuanSP')
				{
					
					$strRes = $soNguoiLike.' người thích <span class="text-color-normal-1 likes" onclick="'.$funcLikeBL.'" >'.$txtLike.'</span>';
				}
			}	
			echo $strRes;		
		}
		
?>