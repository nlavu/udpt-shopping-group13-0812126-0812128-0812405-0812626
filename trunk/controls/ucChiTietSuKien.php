<?php 	
	//kiểm tra quyền truy xuất
	/*$_SESSION['Privilege'] = 'NguoiBan';
	if ($_SESSION['Privilege'] != 'NguoiBan' || $_SESSION['IsLogin'] === 0)
	{
		header('Location:index.php');
		return;
	}
	*/
	
	require_once('class/SuKienDAO.php');
	require_once('class/GianHangDAO.php');
	require_once('class/BinhLuanDAO.php');
	require_once('class/NguoiDungDAO.php');
	require_once('class/LikesDAO.php');
	
	if (!isset($_REQUEST['id']))
	{
		header("Location:ds_su_kien.php");
		
	}
	else
	{
		// tạo user hiện tại
		$nguoiDung = NguoiDungDAO::LayThongTinNguoiDungTheoMa('1');
		$suKienDto = SuKienDAO::LaySuKienTheoMaSuKien($_REQUEST['id']);
		if (is_null($suKienDto))
		{
			echo "không có";
			header("Location:ds_su_kien.php");
			return;
		}
		else
		{
			$gianHangDto = new GianHangDTO();
			$gianHangDto = GianHangDAO::LayGianHangTheoMa($suKienDto->MaGianHang);					
			
			$dsBinhLuan = BinhLuanDAO::LayDSBL_TheoMaDoiTuong($suKienDto->MaSuKien);
			
			$dsLikes = LikesDAO::LayDanhSachLikeTheoMaDoiTuong($suKienDto->MaSuKien);					
			$soNguoiThamGia = count($dsLikes);
			
			$ngayBD = date_create($suKienDto->NgayBatDau);
			$ngayBD = $ngayBD->format('d-m-Y');
			
			$ngayKT = date_create($suKienDto->NgayKetThuc);
			$ngayKT = $ngayKT->format('d-m-Y');
			
			$func = "funcXoaSuKien('".$suKienDto->MaSuKien."')";
			
			// nếu chưa tham gia --> hiện nút gia
			// ngược lại thì không tham gia 
			$txtButtonThamGia = "Hủy tham gia sự kiện";
			$nguoiDungThamGia = LikesDAO::LayDanhSachLikeTheoMaDT_MaNguoiDung($suKienDto->MaSuKien, $nguoiDung->MaNguoiDung);	
			if(is_null($nguoiDungThamGia))
			{
				$txtButtonThamGia = "Tham gia sự kiện";
			}
			$funcThamGia = "funcThamGiaSuKien('".$suKienDto->MaSuKien."','".$nguoiDung->MaNguoiDung."','chitietSK')";
			
			$strOutput ="
			<div class='toolbox' id='kq_xuly'>
				<div class='event-detail'>
				  <div class='row'>
						<div class='event-image'>
								<img src='$suKienDto->HinhAnh' width='340' height='290' /><br />
						</div>
						<div class='info'>                    	
							<div class='title'>
								$suKienDto->TenSuKien
							</div>
							<div class='content'>
								<table width='100%' border='0' cellspacing='0' cellpadding='5' class='event-table'>
								  <tr>
									<td width='28%' class='first'>Thời gian</td>
									<td width='72%'>Từ ngày $ngayBD đến ngày $ngayKT</td>
								  </tr>
								  <tr>
									<td class='first'>Gian hàng tổ chức</td>
									<td  class='text-color-normal-1'><a href='gian_hang.php?id=$gianHangDto->MaGianHang'>$gianHangDto->TenGianHang</a></td>
								  </tr>
								  <tr>
									<td class='first'>Nội dung chi tiết</td>
									<td>$suKienDto->NoiDungSuKien</td>
								  </tr>
								  <tr id='kq_thamgia_sukien'>
									<td> $soNguoiThamGia người đã tham gia  </td>                    	
									<td>
										<span class='text-color-bold-1' style='text-align:right;cursor:pointer;' onclick=$funcThamGia >$txtButtonThamGia</span>
									</td>
								  </tr>";
					// chỉ chủ gian hàng mới thấy 2 nút này
					// if (....)
					$strOutput .="
								   <tr>
									<td>&nbsp;</td>                    	
									<td>
										<a href='cap_nhat_su_kien?id=$suKienDto->MaSuKien'><input type='button' class='ui-state-default ui-state-hover ui-button-text-only' value='Cập nhật'></input></a>
										
										<input name='btnXoaSK' type='button' value='Xóa' class='ui-state-default ui-state-hover' onclick=$func id='kq_maSK_$suKienDto->MaSuKien'/>   
										
									</td>
								  </tr>";
					$strOutput.="
								</table>
							<!--end .content-->            
						</div>
						<!--end .info-->        
				  </div>
				  <!--end row thông tin chung-->";
				  // chi tiết sự kiện
				  $strOutput .="				  
				  <div class='row'>
					<div class='title'>
							Chi tiết sự kiện
					</div>
					<!--end title-->  
					<div class='event-products'>
							ds sản phẩm thuộc sự kiện khuyến mãi này nếu có 
					</div>
					<!--end .event-products-->
				  </div>
				  <!--end row chi tiết sự kiện-->";
				  // bình luận sự kiện				 	
				  $strOutput .="
				  <div class='row'>
					<div class='title'>
							Bình luận sự kiện
					</div>
						<!--end title-->                    
						<div class='comment'>";
				  if(!is_null($dsBinhLuan))
				  {					 
					  foreach($dsBinhLuan as $binhLuanDto)
					  {
						  
						  $nguoiDungBL = NguoiDungDAO::LayThongTinNguoiDungTheoMa($binhLuanDto->NguoiBL);
						  $thoiGianBL = date_create($binhLuanDto->NgayBL);
						  $gioBL= $thoiGianBL->format('H:i');
						  $ngayBL = $thoiGianBL->format('d-m-Y');
						  $dsLikes = LikesDAO::LayDanhSachLikeTheoMaDoiTuong($binhLuanDto->MaBL);
						  $soNguoiLike = count($dsLikes);
						  
						  $nguoiDungLikeBL = LikesDAO::LayDanhSachLikeTheoMaDT_MaNguoiDung($binhLuanDto->MaBL, $nguoiDung->MaNguoiDung);
						  
						  $idKQ_Like_BL = "kq_like_binhluan_sk_".$binhLuanDto->MaBL;
						  $funcLikeBL ="funcLike('".$binhLuanDto->MaBL."','".$nguoiDung->MaNguoiDung."','".$idKQ_Like_BL."','BinhLuan_SK')";
						  if (is_null($nguoiDungLikeBL))
						  {
							  $txtLikeBL = "Like";
						  }
						  else
						  {
							  $txtLikeBL = "Unlike";
						  }
						  
							$strOutput .="
								<div class='comment-wrapper'>                       	  	
									<div class='avatar'><img src='$nguoiDungBL->AnhDaiDien' width='1280' height='1024' /></div>
									<div class='content'>
										 <div class='title-comment'>
											<span class='text-color-normal-1'>
												<a href='trang_ca_nhan.php?id=$nguoiDungBL->MaNguoiDung'>".$nguoiDungBL->UserName."</a>
											</span> bình luận lúc $gioBL ngày $ngayBL.
										 </div>
										 <div class='primary-comment'>
										 		$binhLuanDto->NoiDungBL
										 </div>
										 <div class='action' id='kq_like_binhluan_sk_$binhLuanDto->MaBL'>
											$soNguoiLike người thích <span class='text-color-normal-1 likes' onclick=$funcLikeBL >$txtLikeBL</span>
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
				  $strOutput .="
							 <div class='comment-wrapper'>                       	  	
								<div class='avatar'><img src='$nguoiDung->AnhDaiDien' width='1280' height='1024' /></div>
								<div class='content'>
									<div class='title-comment'>
										<span class='text-color-normal-1'>
											<a href='trang_ca_nhan.php?id=$nguoiDung->MaNguoiDung'>".$nguoiDung->UserName."</a>
										</span>
									</div>
									 <form action='' method='get' name='frmDangBinhLuan'>
									    <textarea name='txtNoiDungBinhLuan' cols='80' rows='5'></textarea><br />                       				<input name='btnBinhLuan' type='submit' value='Bình luận' class='ui-state-default ui-state-hover ui-button-text-only'  />
									 </form>
								</div>                            
								<!--end .content-->                           
							</div>
							<!--end .comment-wrapper || đăng bình luận-->
						</div>
						<!--end .comment-->
						<div class='paging'>
							<div class='item'>                
							  <a href='#' class='item current'>1</a> 
							  <a href='#' class='item'>2</a>
							</div>
						</div>
						<!--end .paging -->
				  </div>
				  <!--end row bình luận -->
				</div>
				<!--end .event-detail-->
			</div>
			<!--end #kq_xuly-->";
			
			echo $strOutput;
			
		}
	}
	
	
?>
