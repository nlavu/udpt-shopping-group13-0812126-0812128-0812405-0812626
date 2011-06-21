<div class="top-shop">
    <div class="top-shop-wrapper">       	  
	  <?php
      require_once ('class/GianHangDAO.php');
      require_once ('class/SanPhamDAO.php');
      require_once ('class/LikesDAO.php');
      
      $dsGianHang = GianHangDAO::LayTatCaGianHangTheoNgayTao(8);
      
      if (count($dsGianHang) == 0 || is_null($dsGianHang))
      {
		  $topShop ="<p><br>Chưa có gian hàng nào được tạo.<p>";
      }
      else
      {          
		  $gianHangViewCaoNhat = $dsGianHang[0];
		  $dsLikeGianHang = LikesDAO::LayDanhSachLikesTheoMaDoiTuong($gianHangViewCaoNhat->MaGianHang);	
		  $soNguoiLikeGH = count($dsLikeGianHang);
		  $topShop = "
		  		<div class='top-shop-image'>
		  		<a href='#'><img src='$gianHangViewCaoNhat->Theme' width='300' height='250' /></a>
				</div>
			  <!--end .top-shop-image-->
			  <div class='top-shop-info'>
				<div class='top-shop-info-line'>
					<div class='name'>
						<a href='gian_hang.php?maGianHang=$gianHangViewCaoNhat->MaGianHang'>
							$gianHangViewCaoNhat->TenGianHang
						</a>
					</div>           		
				</div>
				<!--end .top-shop-info-line || name-->
				<div class='top-shop-info-line'>            	
					<div class='slogan'>Content for  class 'top-shop-slogan' Goes Here Content for  class 'top-shop-slogan' Goes Here 
					</div>
				</div>
				<!--end .top-shop-info-line | slogan--> 
				<div class='top-shop-info-line'>            	
					<div class='views'>$gianHangViewCaoNhat->LuotXem lượt xem </div>
					
					<div class='likes'>
						<a href='#'><img src='image/add_to_favorites_24.png' width='24' height='24' /></a>
						$soNguoiLikeGH bình chọn
					</div>               
				</div>
            <!--end .top-shop-info-line | view - bình chọn--> 
			<div class='top-shop-info-line'>  
            	<div class='recieve-email'>
                	<a href='#'><img src='image/yellow_mail_receive_24.png' width='24' height='24'/>
					Đăng ký nhận email</a>
                </div>				
            </div>
            <!--end .top-shop-info-line || subcribe-->     
			<div class='top-shop-info-line'>            	
					<div class='view-shop'>
						<a href='gian_hang.php?maGianHang=$gianHangViewCaoNhat->MaGianHang'>
							Xem chi tiết >>
						</a>
					</div>
				</div>            
				<!--end .top-shop-info-line | xem chi tiết--> 
			  </div>
			  <!--end .top-shop-info-->";
	}
	echo $topShop;
	?>
		  
	</div>
	<!--end .top-shop-wrapper-->
    <div class="list-top-shop-wrapper">
	<?php         
	 // ds những gian hàng còn lại
	 $topOtherShop ="";
	 if (count($dsGianHang) <= 1)
	 {
		$topOtherShop .= "";
	 }
	 else
	 {
		  for($i = 1; $i<count($dsGianHang); $i++)
		  {
			  $otherShop = $dsGianHang[$i];
			  $topOtherShop .= "
						<div class='list-top-shop-item'>
							<a href='gian_hang.php?maGianHang=$otherShop->MaGianHang'>
								<img src='$otherShop->Theme' width='80' height='80' class='reflect' />
							</a>
						</div>
						<!--end .list-top-shop-item-->";
		  }
	 }
	 echo $topOtherShop;
	 ?>
         
    </div>
    <!--end .list-top-shop-wrapper-->
</div>