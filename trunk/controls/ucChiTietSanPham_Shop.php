<!--
	//MÔ tả cách hoạt động của uc
    
-->
<div class="product-detail">
  <div class="row">
  <script type="text/javascript" language="javascript">
  	
  </script>
<?php	
	//include class
	require_once ('class/SanPhamDAO.php');
	require_once ('class/BinhLuanDAO.php');
	require_once ('class/NguoiDungDAO.php');
	require_once ('class/GianHangDAO.php');
	require_once ('class/LikesDAO.php');
	
	// biến toàn cục
	$gInfo ="";
	$gAddCart ="";
	$gInfoDetail ="";
	$gBinhLuan ="";
	$gSoBinhLuan ="0";
	$gBinhLuanMoi ="";
	//kiểm tra tham số trên link
	$URLRedirect = "";
	
	if (!isset($_REQUEST['maGianHang']))
	{
		$URLRedirect = "index.php";
		if (!isset($_REQUEST['maSanPham']))
		{			
			//header("Location: $URLRedirect");
		}
	}
	else
	{
		$URLRedirect= "ds_san_pham.php?maGianHang=".$_REQUEST['maGianHang'];	
		if (!isset($_REQUEST['maSanPham']))
		{	
			//header("Location:$URLRedirect");
		}
	}
	
	// lấy thông tin sản phẩm
	$maSanPham = $_REQUEST['maSanPham'];
	$sanPham = SanPhamDAO::LaySanPhamTheoMa($maSanPham,0);
	$maGH = SanPhamDAO::LayMaGianHangCuaSanPham($maSanPham);
	$gianHang = GianHangDAO::LayGianHangTheoMa($maGH,0);	
/******************************************/
/*KIỂM TRA SẢN PHẨM CÓ TỒN TẠI HAY KHÔNG? */
if (is_null($sanPham))
{	
	/*KHÔNG TỒN TẠI*/
		if (is_null($gianHang) || $maGH != $_REQUEST['maGianHang'])
		{
			// thông báo 
			$gInfo = "Sản phẩm và gian hàng không tồn tại";	
		}
		else
		{
			$gInfo = "Sản phẩm không tồn tại";			
		}
}
else if(!is_null($gianHang))
{
	/*TỒN TẠI*/	
	// cập nhật lượt xem sản phẩm
	if ($_SESSION['IsLogin'] == 1)
	{
		$luotXemSP = $_SESSION['LuotXemSanPham'];
		if (!in_array($maSanPham,$luotXemSP))
		{	
			array_push($luotXemSP, $maSanPham);
		}	
		$_SESSION['LuotXemSanPham'] = $luotXemSP;
	}
	
	$nguoiUpSP = NguoiDungDAO::LayThongTinNguoiDungTheoMa($gianHang->MaNguoiDung); 
	// tính số sao
	$soSao = LikesDAO::TinhSoSaoTBCuaMotDoiTuong($sanPham->Ma);
	//format
	$ngayDangSP = date_create($sanPham->NgayDang);
	$ngayDangSP = $ngayDangSP->format('h:m:s d-m-Y');
	
	$donGiaBan = formatMoney($sanPham->DonGiaBan);
	$donGiaGoc = formatMoney($sanPham->DonGiaGoc);
	//like sản phẩm
	$lstlikes = LikesDAO::LayDanhSachLikesTheoMaDoiTuong($maSanPham);	
	$soNguoiLike = count($lstlikes);
	if ($_SESSION['IsLogin'] == 1)
	{		
		$nowUserLike = LikesDAO::LayDanhSachLikesTheoMaDT_MaNguoiDung($maSanPham, $_SESSION['IdUser']);
		if(is_null($nowUserLike))
			$like = "Like";
		else $like = "Unlike";
	}
	else
	{
		$like = "Like";
	}
	
	$funcDanhGiaSP = 'funcDanhGiaSP("'.$sanPham->Ma.'", "'.$_SESSION['IdUser'].'","kq_danhgia_sp", "ChiTietSP")';
	/***************************************************/
	$gInfo = 
		"<div class='product-image'>
            <img src='$sanPham->HinhAnh' width='200' height='167' /><br />
            <a href=''> Xem hình phóng to </a>
        </div>
        <div class='info'>                    	
            <div class='name'>$sanPham->TenSanPham</div>
            <div class='new-price' >$donGiaBan VND
				<input type='hidden' id= 'idDonGiaBan' value='$sanPham->DonGiaBan'/>
			</div>
            <div class='old-price'>$donGiaGoc VND</div>                        
            <div class='views'>$sanPham->LuotXem lượt xem</div>                           
            <div class='stars' id='kq_danhgia_sp' >                       		
                $soSao sao | 
				<span class='text-color-bold-1' id='btnDanhGiaSP' style='cursor:pointer;'>Đánh giá</span>
            </div>				
            <div class='time-upload'>
				Đăng bởi <a href='trang_ca_nhan.php' > $nguoiUpSP->UserName </a> lúc $ngayDangSP
			</div>
        </div>
        <!--end .info-->";
	/***************************************************/
	// add cart
	$gAddCart ="
		<div class='add-cart'>	
			<h2>Đặt mua</h2>
				<div class='line'>
					<label for='txtSoLuongSPThemVaoSoGio'>Số lượng:</label><input name='txtSoLuongSPThemVaoSoGio' id='txtSoLuongSPThemVaoSoGio' type='text' size='10' style='text-align:right;' onchange='updateThanhTien(this.id)' />                    
					<input type='hidden' id='hidMaSanPham' name= 'hidMaSanPham' value='$maSanPham'/>
				</div>
				<div class='line'>
					<label>Thành tiền: <span class='new-price'><span id='idThanhTien'>0</span> VND </span></label>
				</div>
				<div class='line'>
					<input name='btnThemVaoGioHang' type='submit' class='button ui-state-default ui-button-text-icon-primary' value='Thêm vào giỏ hàng' onclick='funcThemVaoGioHang()' />                                   
				</div>			
        </div>
        <!--end .add-cart-->";
	/***************************************************/
	//thông tin chi tiết
	$gInfoDetail = "<div class='content'>$sanPham->DacDiemSP</div>
        <!--end .content-->";
	/***************************************************/
	// BÌNH LUẬN SẢN PHẨM
	
	$lstBinhLuan = BinhLuanDAO::LayDSBL_TheoMaDoiTuong($maSanPham,0);
  	$gSoBinhLuan = count($lstBinhLuan);
	if ($_SESSION['IsLogin'] == 0)
	{
		$gBinhLuan = "Bạn phải đăng nhập mới được quyền xem bình luận";	
	}
	else 
	{
		$nguoiDung = NguoiDungDAO::LayThongTinNguoiDungTheoMa($_SESSION['IdUser']);
		// ds các bình luận
		if ( $gSoBinhLuan > 0)
		{
			foreach($lstBinhLuan as $binhLuanDto)
			{
				  $nguoiDungBL = NguoiDungDAO::LayThongTinNguoiDungTheoMa($binhLuanDto->NguoiBL);
				  $thoiGianBL = date_create($binhLuanDto->NgayBL);
				  $gioBL= $thoiGianBL->format('H:i');
				  $ngayBL = $thoiGianBL->format('d-m-Y');
				  $dsLikes = LikesDAO::LayDanhSachLikesTheoMaDoiTuong($binhLuanDto->MaBL);
				  $soNguoiLike = count($dsLikes);
				  
				  $nguoiDungLikeBL = LikesDAO::LayDanhSachLikesTheoMaDT_MaNguoiDung($binhLuanDto->MaBL, $nguoiDung->MaNguoiDung);
				  
				  $idKQ_Like_BL = "kq_like_binhluan_sp_".$binhLuanDto->MaBL;
				  $funcLikeBL ="funcLike('".$binhLuanDto->MaBL."','".$nguoiDung->MaNguoiDung."','".$idKQ_Like_BL."','BinhLuanSP')";
				  if (is_null($nguoiDungLikeBL))
				  {
						$txtLikeBL = "Like";
				  }
				  else
				  {
						$txtLikeBL = "Unlike";
				  }
				  
				$gBinhLuan .="
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
						 <div class='action' id='kq_like_binhluan_sp_$binhLuanDto->MaBL'>
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
		// bình luận mới
		$funcThemBinhLuan = 'funcThemBinhLuan("txtNoiDungBL_SP", "'.$sanPham->Ma.'", "'.$_SESSION['IdUser'].'","kq_binhluan_sp", "BinhLuan_SP")';
		$gBinhLuanMoi="
		<div id='kq_binhluan_sp'>
		</div>
		<div class='comment-wrapper'>                       	  	
			<div class='avatar'><img src='$nguoiDung->AnhDaiDien' width='1280' height='1024' /></div>
			<div class='content'>
				<div class='title-comment'>
					<span class='text-color-normal-1'>
						<a href='trang_ca_nhan.php?id=$nguoiDung->MaNguoiDung'>".$_SESSION['UserName']."</a>
					</span>
				</div>
					<textarea name='txtNoiDungBL_SP' id= 'txtNoiDungBL_SP' cols='80' rows='5'></textarea><br /> 
					<input name='btnBinhLuan' type='button' value='Bình luận' class='ui-state-default ui-state-hover ui-button-text-only' onclick='".$funcThemBinhLuan."' />
				 </form>
			</div>                            
			<!--end .content-->                           
		</div>
		<!--end .comment-wrapper || đăng bình luận-->";
	}
}
/* END KIỂM TRA SẢN PHẨM CÓ TỒN TẠI HAY KHÔNG? */
/******************************************/

?>
<div class="product-detail">
  <div class="row">
        <?php echo $gInfo; ?>
        <!--end .info-->
       	<?php echo $gAddCart; ?>
        <!--end .add-cart-->
  </div>
  <!--end row thông tin chung-->
  <div class="row">
        <div class="title">
            Thông tin chi tiết sản phẩm
        </div>
        <!--end title-->
        <?php echo $gInfoDetail; ?>
        <!--end .content-->
  </div>
  <!--end row đặc điểm sp-->
  <div class="row">
    <div class="title">
            Bình luận sản phẩm (<?php echo $gSoBinhLuan; ?> lượt bình luận)
    </div>
        <!--end title-->                    
        <div class="comment">            
            <?php echo $gBinhLuan; ?>
            <!--end .comment-wrapper-->
            <?php echo $gBinhLuanMoi; ?>
            <!--end .comment-wrapper || đăng bình luận-->
        </div>
        <!--end .comment-->
        <div class="paging">
            <div class="item">                
              <a href="#" class="item current">1</a> 
              <a href="#" class="item">2</a>
            </div>
        </div>
        <!--end .paging -->
  </div>
  <!--end row bình luận -->
</div>
<!--end .product-detail-->
<div id="idFormDanhGiaSP" class="text-color-normal-1 rate" style="display:none;" >
	<?php
	if ($_SESSION['IsLogin'] == 1)
	{
		echo "Chọn số sao đánh giá cho sản phẩm:
		<select name='selDanhGiaSP'>
			<option value='1'>1</option>
			<option value='2'>2</option>
			<option value='3'>3</option>
			<option value='4'>4</option>
			<option value='5'>5</option>
		</select>
		sao.";
		echo "<input name='btnLuuDanhGiaSP' type='button' value='Lưu' onclick='".$funcDanhGiaSP."' />";
	}
	else
	{
		echo "Bạn phải đăng nhập hoặc đăng ký thành viên mới được đánh giá sản phẩm !!!";
	}
	?>
</div>