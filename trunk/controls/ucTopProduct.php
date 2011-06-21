<div class="top-product">	
   		<div class="top-list-product-wrapper">
       	  <div class="top-list-product-title">
				Top sản phẩm có view cao
          </div>
          <!--end .top-list-product-title-->
          <div class="top-list-product-content">  
              <div class="top-list-product-item-back">
              </div>
              <!--end .top-list-product-item-back-->                
                <?php					
					require_once ('class/SanPhamDAO.php');
					$dsTopSanPham = SanPhamDAO::LayDanhSachSanPham(5);
					$strOutput = "";
					if (count($dsTopSanPham) == 0)
					{
						$strOutput = "<p><i>Website chưa có sản phẩm nào.</i></p>";
					}
					else
					{
						for($i = 0; $i< count($dsTopSanPham); $i++)
						{
							$sanPham = $dsTopSanPham[$i];
							$maGH = SanPhamDAO::LayMaGianHangCuaSanPham($sanPham->Ma);
							$donGiaBan = formatMoney($sanPham->DonGiaBan);
							$donGiaGoc = formatMoney($sanPham->DonGiaGoc);
							$soSao = LikesDAO::TinhSoSaoTBCuaMotDoiTuong($sanPham->Ma);
							$ngayDangSP = date_create($sanPham->NgayDang);
							$ngayDangSP = $ngayDangSP->format('H:i:s d-m-Y ');
							
							$strOutput .= 
							"<div class='top-list-product-item'>
								<a href='chi_tiet_san_pham?maSanPham=$sanPham->Ma&maGianHang=$maGH'>
									<img src='$sanPham->HinhAnh' width='350' height='350' />
								</a>
								<div class='name'>
								<a  href='chi_tiet_san_pham?maSanPham=$sanPham->Ma&maGianHang=$maGH'>
									$sanPham->TenSanPham
								</a>
								</div>";
							//kiểm tra giá bán có thấp hơn so với giá gốc hay không
							if ($donGiaBan < $donGiaGoc)
							{
								$strOutput .= "<div class='new-price'>$donGiaBan VND</div>
										<div class='old-price'>$donGiaGoc VND</div>";
							}
							else
							{
								$strOutput .= "<div class='new-price'>$donGiaGoc VND</div>";
							}
								
							$strOutput .= "
								<div class='top-list-product-item-info'>
								  <a href='#'><div class='views'>$sanPham->LuotXem</div></a>
								   
								  <a href='#'><div class='stars'>$soSao</div></a>
								</div>
								 <div class='top-list-product-item-info'> ";
							$strOutput .=" <a href='#'><div class='time-upload'>$ngayDangSP</div></a>
								</div>
							</div>";
						}					
					}
					echo $strOutput;
				?>
              
              <!--end .top-list-product-item-->
              <div class="top-list-product-item-next">
              </div>
              <!--end .top-list-product-item-next-->
          </div>
          <!--end .top-list-product-content-->
   		</div>
        <!--end .top-list-product-wrapper-->
      </div>