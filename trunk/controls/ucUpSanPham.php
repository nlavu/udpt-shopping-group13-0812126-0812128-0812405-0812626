<div class="up-product">
	<h3>Upload Sản Phẩm</h3>
  <div class="content">
  		<div class="separator">
        </div>
  		<form action="" method="post">        	
        	<div class="row">
            	<div class="leftcol" >
                	<label for="txtTenSanPham" >
            		Tên sản phẩm:
                    </label>
                </div>
                <div class="rightcol">
                    <input name="txtTenSanPham" type="text" size="30" maxlength="100" />
                </div>
            </div>
            <!--end .row-->
            <div class="row">
            	<div class="leftcol">
            		Chọn loại sản phẩm:  
                 </div>
                 <div class="rightcol" >
                    <select name="selectDanhMucSanPham">
                      <option>-Chọn loại sản phẩm-</option>
                    </select>
                    <input name="btnThemLoaiSP" type="button" value="Thêm loại sản phẩm" />
                </div>
            </div>
            <!--end .row-->
            <div class="row">
            	<div class="leftcol" >
                	<label for="txtDonGia" >
            		Đơn giá:
                    </label>
                </div>
                <div class="rightcol">
                   <input name="txtDonGia" type="text" size="20" maxlength="100" />
                </div>
            </div>
            <!--end .row-->
            <div class="row" >
            	<div class="leftcol" >
            		<label for="txtSoLuongSP">
                    Số lượng:
                    </label>
                </div>
                <div class="rightcol">
                   <input name="txtSoLuongSP" type="text" size="20" maxlength="100" />
                </div>
            </div>
            <!--end .row-->
            <div class="row">
            	<div class="leftcol">
            		<label for="fileAnhSanPham">
                    Hình ảnh:
                    </label>
                </div>
                <div class="rightcol">
                   <input name="fileAnhSanPham" type="file" size="30" />
                </div>
            </div>
            <!--end .row-->
            <div class="row">
            	<div class="leftcol">
            		<label for="txtDacDiemSanPham">
                    Đặc điểm sản phẩm:
                    </label>
                </div>
                <div class="rightcol">
                    <textarea name="txtDacDiemSanPham" cols="50" rows="5" wrap="hard"></textarea>
              	</div>
            </div>
            <!--end .row-->
            <div class="separator">
            </div>
        <div class="row"        >
            	<input name="btnThemSanPham" type="submit" value="Đăng sản phẩm" />
            <input name="btnHuy" type="button" value="Hủy đăng" id="btnHuy" />
          </div>
            <!--end .row-->
        </form>
  </div>
</div>
<!--end .up-product-->