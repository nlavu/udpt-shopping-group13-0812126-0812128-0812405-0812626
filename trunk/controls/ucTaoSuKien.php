<div class="up-product">
	<h3>Tạo sự kiện</h3>
  <div class="content">
  		<div class="separator">
        </div>
  		<form action="" method="post">        	
        	<div class="row">
            	<div class="leftcol" >
                	<label for="txtTenSuKien" >
            		Tên sự kiện:
                    </label>
                </div>
                <div class="rightcol">
                    <input name="txtTenSuKien" type="text" size="30" maxlength="100" />
                </div>
            </div>
            <!--end .row-->           
            <div class="row">
            	<div class="leftcol" >
                	<label for="datepicker" >
            		Thời gian diễn ra từ ngày:
                    </label>
                </div>
                <div class="rightcol">
                   <input name="datepicker" type="text" id="dtpNgayBD_SK" size="20">
                   đến ngày
                   <input name="datepicker" type="text" id="dtpNgayKT_SK" size="20">    
                </div>
            </div>
            <!--end .row-->           
            <div class="row">
            	<div class="leftcol">
            		<label for="fileAnhSuKien">
                    Hình ảnh:
                    </label>
                </div>
                <div class="rightcol">
                   <input name="fileAnhSuKien" type="file" size="30" />
                </div>
            </div>
            <!--end .row-->
            <div class="row">
            	<div class="leftcol">
            		<label for="txtNoiDungSuKien">
                    Nội dung sự kiện:
                    </label>
                </div>
                <div class="rightcol">
                    <textarea name="txtNoiDungSuKien" cols="60" rows="8" wrap="hard"></textarea>
              	</div>
            </div>
            <!--end .row-->
            <div class="separator">
            </div>
            <div class="row">
                <h3 align="left">Chọn sản phẩm</h3>
            </div>
            <!--end .row sản phẩm liên quan sự kiện-->
            <div class="separator">
            </div>
            <div class="row"        >
                <input name="btnThemSuKien" type="submit" value="Thêm sự kiện" />
                <input name="btnHuy" type="button" value="Hủy đăng" id="btnHuy" />
             </div>
             <!--end .row-->
        </form>
  </div>
</div>
<!--end .up-product-->