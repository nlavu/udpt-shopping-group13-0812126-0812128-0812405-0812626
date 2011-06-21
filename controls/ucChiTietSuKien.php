<?php 	
	//kiểm tra quyền truy xuất
	/*
	if ($_SESSION['IsLogin'] === 0)
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
	
	$gChiTietSK = "";
	$gBinhLuanSK ="";
	$gBinhLuanMoi ="";
	if (!isset($_REQUEST['id']))
	{
		header("Location:ds_su_kien.php");
		
	}
	else
	{			
		$suKienDto = SuKienDAO::LaySuKienTheoMaSuKien($_REQUEST['id']);
		if (is_null($suKienDto))
		{
			header("Location:ds_su_kien.php?maGianHang=".$_REQUEST['maGianHang']);
			return;
		}
		else
		{
			$gianHangDto = GianHangDAO::LayGianHangTheoMa($suKienDto->MaGianHang, 0);					
			
			$dsBinhLuan = BinhLuanDAO::LayDSBL_TheoMaDoiTuong($suKienDto->MaSuKien, 0);
			
			$dsLikes = LikesDAO::LayDanhSachLikesTheoMaDoiTuong($suKienDto->MaSuKien);					
			$soNguoiThamGia = count($dsLikes);
			
			$ngayBD = date_create($suKienDto->NgayBatDau);
			$ngayBD = $ngayBD->format('d-m-Y');
			
			$ngayKT = date_create($suKienDto->NgayKetThuc);
			$ngayKT = $ngayKT->format('d-m-Y');
			
			$func = "funcXoaSuKien('".$suKienDto->MaSuKien."')";
			
			// nếu chưa tham gia --> hiện nút tham gia
			$nguoiDungThamGiaSK = LikesDAO::LayDanhSachLikesTheoMaDT_MaNguoiDung($suKienDto->MaSuKien, $_SESSION['IdUser']);
			if (is_null($nguoiDungThamGiaSK))
				$txtButtonThamGia = "Tham gia sự kiện";
			else
				// ngược lại thì không tham gia 
				$txtButtonThamGia = "Hủy tham gia sự kiện";
			
			$funcThamGia = "funcThamGiaSuKien('".$suKienDto->MaSuKien."','".$_SESSION['IdUser']."','chitietSK')";
			
			/**********************************************************/
			// Chi tiết Sự kiện 
			$gChiTietSK ="
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
									<td  class='text-color-normal-1'><a href='gian_hang.php?maGianHang=$gianHangDto->MaGianHang'>$gianHangDto->TenGianHang</a></td>
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
					if ($_SESSION['IdUser'] == $gianHangDto->MaNguoiDung)
					{
					
					$gChiTietSK .="
								   <tr>
									<td>&nbsp;</td>                    	
									<td>
										<a href='cap_nhat_su_kien?
										maGianHang=$gianHangDto->MaGianHang&
										id=$suKienDto->MaSuKien'>
										<input type='button' class='ui-state-default ui-state-hover ui-button-text-only' value='Cập nhật'></input>
										</a>
										
										<input name='btnXoaSK' type='button' value='Xóa' class='ui-state-default ui-state-hover' onclick=$func id='kq_maSK_$suKienDto->MaSuKien'/>   
										
									</td>
								  </tr>";
					}
					$gChiTietSK.="
								</table>
							<!--end .content-->            
						</div>
						<!--end .info-->        
				  </div>
				  <!--end row thông tin chung-->";
				  // chi tiết sự kiện
				  $gChiTietSK .="				  
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
				  /**********************************************************/
				  // ds bình luận sự kiện				 	
				  $gBinhLuanSK .="
				  <div class='row'>
					<div class='title'>
							Bình luận sự kiện
					</div>
						<!--end title-->                    
						<div class='comment'>";
				   //kiểm tra đăng nhập hay chưa
				  if ($_SESSION['IsLogin'] == 0)
				  {
					  $gBinhLuanSK .="Bạn phải đăng nhập hoặc đăng ký thành viên mới được phép xem bình luận.";
				  }
				  else
				  {
					  if(!is_null($dsBinhLuan))
					  {					 
						  foreach($dsBinhLuan as $binhLuanDto)
						  {
							  
							  $nguoiDungBL = NguoiDungDAO::LayThongTinNguoiDungTheoMa($binhLuanDto->NguoiBL);
							  $thoiGianBL = date_create($binhLuanDto->NgayBL);
							  $gioBL= $thoiGianBL->format('H:i');
							  $ngayBL = $thoiGianBL->format('d-m-Y');
							  $dsLikes = LikesDAO::LayDanhSachLikesTheoMaDoiTuong($binhLuanDto->MaBL);
							  $soNguoiLike = count($dsLikes);
							  
							  $nguoiDungLikeBL = LikesDAO::LayDanhSachLikesTheoMaDT_MaNguoiDung($binhLuanDto->MaBL, $_SESSION['IdUser']);
							  
							  $idKQ_Like_BL = "kq_like_binhluan_sk_".$binhLuanDto->MaBL;
							  $funcLikeBL ="funcLike('".$binhLuanDto->MaBL."','".$_SESSION['IdUser']."','".$idKQ_Like_BL."','BinhLuan_SK')";
							  if (is_null($nguoiDungLikeBL))
							  {
								  $txtLikeBL = "Like";
							  }
							  else
							  {
								  $txtLikeBL = "Unlike";
							  }
							  
							  $gBinhLuanSK .="
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
					  else
					  {
						  $gBinhLuanSK.="Không có bình luận nào.";
					  }
					 /**********************************************************/
					// bình luận mới
					$curUser = NguoiDungDAO::LayThongTinNguoiDungTheoMa($_SESSION['IdUser']);
					$funcThemBinhLuan = 'funcThemBinhLuan("txtNoiDungBinhLuan_SK", "'.$suKienDto->MaSuKien.'", "'.$_SESSION['IdUser'].'","kq_binhluan_sk", "BinhLuan_SK")';
					  $gBinhLuanMoi .="
								 <div id='kq_binhluan_sk'>
								 </div>
								 <div class='comment-wrapper'>                       	  	
									<div class='avatar'><img src='$curUser->AnhDaiDien' width='1280' height='1024' /></div>
									<div class='content'>
										<div class='title-comment'>
											<span class='text-color-normal-1'>
												<a href='trang_ca_nhan.php?id=$curUser->MaNguoiDung'>".$curUser->UserName."</a>
											</span>
										</div>									
											<textarea id='txtNoiDungBinhLuan_SK' name='txtNoiDungBinhLuan_SK' cols='80' rows='5'></textarea><br />                       				<input name='btnBinhLuan' type='button' value='Bình luận' class='ui-state-default ui-state-hover ui-button-text-only' onclick='".$funcThemBinhLuan."'  />
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
			}				
			
			echo $gChiTietSK.$gBinhLuanSK.$gBinhLuanMoi;
			
		}
	}
	
	
?>
