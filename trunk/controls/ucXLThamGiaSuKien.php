<?php
		//kiểm tra quyền truy xuất
		/*$_SESSION['Privilege'] = 'NguoiBan';
		if ($_SESSION['Privilege'] != 'NguoiBan' || $_SESSION['IsLogin'] === 0)
		{
			header('Location:index.php');
			return;
		}
		*/
		require_once('../class/SuKienDAO.php');
		require_once('../class/LikesDAO.php');
		
		$strSQL ="";			
		if (isset($_REQUEST['id']) && isset($_REQUEST['user']) &&
			isset($_REQUEST['page'])&& isset($_REQUEST['t']))
		{			
			$strRes = "";
			$id = $_REQUEST['id'];
			$user = $_REQUEST['user'];
			// kiểm tra người dùng tham gia hay không tham gia sự kiện
			$nguoiDungThamGia = LikesDAO::LayDanhSachLikeTheoMaDT_MaNguoiDung($_REQUEST['id'], $_REQUEST['user']);
			$res = false;
			$txtButtnThamGia = "";
			if (is_null($nguoiDungThamGia))
			{
				// thêm likes
				$likeDto = new LikesDTO();
				$likeDto->MaDoiTuong = $id;
				$likeDto->MaNguoiDung = $user;
				$likeDto->SoSao = '0';
				
				$res = LikesDAO::ThemLike($likeDto);
				$txtButtnThamGia = "Hủy tham gia sự kiện";
			}
			else
			{
				//Xóa likes
				$res = LikesDAO::XoaLike($id, $user);
				$txtButtnThamGia = "Tham gia sự kiện";
			}
			if ($res)
			{				
				// lấy ds likes
				$dsLikes = LikesDAO::LayDanhSachLikeTheoMaDoiTuong($id);
				$soNguoiThamGia = count($dsLikes);				
				// kết quả trả về
				if ($_REQUEST['page'] === 'chitietSK')
				{
					$funcThamGia = "funcThamGiaSuKien('".$id."', '".$user."','chitietSK')";
					$strRes ='<td>'.$soNguoiThamGia.' người đã tham gia  </td>                    	
							  <td>
							  	<span style="text-align:right;cursor:pointer;">
									<span onclick="'.$funcThamGia.'"  class="text-color-bold-1" >'.$txtButtnThamGia.'</span>
								</span>
							</td>';					
				}
			}	
			echo $strRes;		
		}
		
?>