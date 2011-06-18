<div class="search-product-wrapper">
    <div class="search-product">
        <form id="frmTimKiemSanPham" name="frmTimKiemSanPham" method="post" action="">
            <div class="content">                      
                <label for="txtTenSanPham_TimKiem">Tên sản phẩm:</label><input name="txtTenSanPham_TimKiem" type="text" value="Tên sản phẩm" size="20" maxlength="50" />
                <select name="selectDanhMucSanPham">
                    <option>Tất cả danh mục</option>
                </select>
                <label for="txtGiaSPTu">Giá sản phẩm từ:</label><input name="txtGiaSPTu" type="text" value="0" size="10" maxlength="20" />
                 <label for="txtGiaSPDen">đến:</label><input name="txtGiaSPDen" type="text" value="0" size="10" maxlength="20" />
                 <input name="txtTimKiemSP" type="submit" value="Tìm kiếm" class="ui-state-default ui-state-hover" />
         
            </div>
            <div class="option">
                <table width="100%" border="0" cellspacing="0" cellpadding="5">
                  <tr>
                    <td width="30%" align="right"><label for="txtTuNgay">Ngày đăng từ ngày:</label></td>
                    <td width="70%">
                        <input name="txtTuNgay" type="text" value="0" size="20" maxlength="20" />
                        <label for="txtDenNgay">đến ngày:</label><input name="txtDenNgay" type="text" value="0" size="20" maxlength="20" />
                    </td>
                  </tr>
                  <tr>
                    <td align="right"><label for="txtGiamGiaTu">Được giảm giá từ:</label></td>
                    <td><input name="txtGiamGiaTu" type="text" value="0" size="15" maxlength="20" />
                    <label for="txtGiamGiaDen">đến :</label><input name="txtGiamGiaDen" type="text" value="0" size="15" maxlength="20" /></td>
                  </tr>
                  <tr align="center">
                    <td colspan="2">                             
                        <input name="txtTimKiemMoRongSP" type="submit" value="Tìm kiếm mở rộng" class="ui-state-default ui-state-hover" />
                    </td>
                  </tr>
                </table>
            </div>
         </form>
        <div class="footer">
            <a href="#" id="idTimMoRongSP">Tìm mở rộng <img src="image/button_open.png" width="10" height="10" /></a>
            </div>
    </div>
    <!--end .search-product-->
</div>