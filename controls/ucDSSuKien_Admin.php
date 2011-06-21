<?php 	
	//kiểm tra quyền truy xuất
	if ($_SESSION['Authentication'] != 2)
	{
		header('Location:index.php');
		return;
	}
	else
	{
		if (isset($_REQUEST['maGianHang']) && is_numeric($_REQUEST['maGianHang']))
		{			
			require_once('class/SuKienDAO.php');
			require_once('class/GianHangDAO.php');
			//kiểm tra gian hàng có tồn tại hay không
			$gianHang = GianHangDAO::LayGianHangTheoMa($maGH,0);
			if (is_null($gianHang))
			{
				header('Location:index.php');
				return;
			}
			else
			{				
				$dsSuKien = SuKienDAO::LayDanhSachSuKienTheoGianHang($_REQUEST['maGianHang']);
			}
		}
		else
		{
			header('Location:index.php');
			return;
		}		
	}	
?>
<div class="toolbox" id="kq_xuly">
</div>

<div class="toolbox text-normal-1">
	<p>
	Xem sự kiện từ ngày  
    <input name='dtpNgayBD_SK' type='text' id='dtpNgayBD_SK' size='15'>
    đến ngày
    <input name='dtpNgayKT_SK' type='text' id='dtpNgayKT_SK' size='15'> 
    <input type="button" name="btnXemSuKienTheoNgay" id="btnXemSuKienTheoNgay" value="Xem" />
	</p>   
</div>
<!--end .toolbox | chế độ xem: sự kiện đã xóa/ chưa xóa/ tất cả, từ ngày đến ngày-->
<div class="toolbox">
	<div class="paging">
      <div class="item">                
          <a href="#" class="item current">1</a> 
          <a href="#" class="item">2</a>
      </div>
    </div>
    <!--end .paging -->
    <div class="button">
    	<a href="tao_su_kien.php"> + Tạo sự kiện</a>
    </div>
</div>
<div class="list-product" id="ketqua_xuly_SuKien">               	  
<table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
          	<th width="4%">
            	<input name="chkAll" id="idChkAll_1" type="checkbox" value="0" onclick ="return checkAll_SuKien('idChkAll_1')"/>
            </th>
            <th width="5%">STT</th>
            <th width="23%" align="left">Tên sự kiện</th>
            <th width="13%">Ngày bắt đầu</th>
            <th width="13%">Ngày kết thúc</th>
            <th width="13%">Ngày tạo</th>
            <th width="11%">Xem chi tiết</th>
            <th width="11%">Cập nhật</th>
            <th width="7%">Xóa</th>
          </tr>
<?php
	$dem = 0;
	$strOuput = "";
	foreach($dsSuKien as $suKienDto)
	{
		$dem = $dem + 1;
		$tenSK = $suKienDto->TenSuKien;
		if (strlen($tenSK) > 30)
			$tenSK = substr($tenSK,0,30).'...';
			
		$ngayBD = date_create($suKienDto->NgayBatDau);
		$ngayBD = $ngayBD->format('d-m-Y');
		
		$ngayKT = date_create($suKienDto->NgayKetThuc);
		$ngayKT = $ngayKT->format('d-m-Y');
		
		$ngayTao = date_create($suKienDto->NgayTao);
		$ngayTao = $ngayTao->format('d-m-Y');		
        $strOuput .="<tr id='view_row_SuKien_".$suKienDto->MaSuKien."'>
            <td>
                <input  onclick='return updateList_SuKien()' type='checkbox' name='chkSuKien' value='".$suKienDto->MaSuKien."' />
            </td>
            <td>$dem</td>
            <td style='text-align: left;' >$tenSK</td>
            <td>$ngayBD</td>
            <td>$ngayKT</td>
            <td>$ngayTao</td>
            <td>
            	<a href='chi_tiet_su_kien.php?maGianHang=$gianHang->MaGianHang&id=$suKienDto->MaSuKien'>Xem chi tiết</a>
            </td>
            <td>
                <form action='' method='post'>
                  <input name='btnCapNhatSK' type='button' value='Cập nhật' />
                </form>
            </td>
            <td>";                
		if ($suKienDto->DaXoa == 0)
		{
			$func = "funcXoaSuKien('".$suKienDto->MaSuKien."')";
			$strOuput .= "<input name='btnXoaSK' type='button' value='Xóa' onclick=$func id='kq_maSK_$suKienDto->MaSuKien'/>   
            </td>
          </tr></div>";
		}
		else
		{
			$strOuput .= "<input name='btnXoaSK' type='button' value='Xóa' disabled='disabled' />
            </td>
          </tr></div>";
		}
	}
	echo $strOuput;
?>                  
          <tr>
          	<td >
            	<input name="chkAll" id="idChkAll_2" type="checkbox" value="0" onclick ="return checkAll_SuKien('idChkAll_2')"/>
            </td>
            <td>&nbsp;</td>
            <td style="text-align:left;">            	
                  <input type="button" name="btnXoaNhieuSK" id="btnXoaNhieuSK" value="Xóa" onclick="funcXoaNhieuSuKien()" />
                  <input type="hidden" name="hidListMaSK" id="hidListMaSK" />
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
                 
       
</div>
<!--end .list-product-->   
<div class="paging">
    <div class="item">                
      <a href="#" class="item current">1</a> 
      <a href="#" class="item">2</a>
    </div>
</div>
<!--end .paging -->  