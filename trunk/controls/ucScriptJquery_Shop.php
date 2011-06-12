<!--SCRIPT JWUERY-->
     <script>
	 	//13/6/2011
		//view giỏ hàng trong trang gian hàng
		$('#navViewGioHang').click(function(){	
			var state = $('#idCart_Shop').css('display');
			//alert(state);
				
			if (state === 'none')
			{
				var pos_left = $(this).position().left;						
				pos_left = pos_left - 180;
				//alert(pos_left);	
				var pos_top = $(this).position().top;
				pos_top = 	pos_top + 15;
				//alert(pos_top);						
				$('#idCart_Shop').css({'display':'block','left':pos_left,'top':pos_top,'position': 'absolute'});		
				$('#navViewGioHang > img').attr("src", "image/button_close.png");
			}
			else
			{
				//alert(state);
				$('#idCart_Shop').css({'display':'none'});				
				$('#navViewGioHang > img').attr("src", "image/button_open.png");	
			}
					
		});	
			
	 	//12/6
		// ẩn hiện tab tìm kiếm mở rộng sản phẩm
		$('#idTimMoRongSP').click(function(){
			var state = $('.option').css('display');			
			if (state === 'none')
			{
				$('.option').css('display','block');
				$('#idTimMoRongSP > img').attr("src", "image/button_close.png");				
			}
			else
			{
				$('.option').css('display','none');
				$('#idTimMoRongSP > img').attr("src", "image/button_open.png");	
			}
		});
	 	// hiện tab lay out // trước đó có bước insert tên gian hàng hay xử lý ....
		$('#btnRegisterShop').click(function(){
			$('#idLayoutGianHang').show('blind');
			$('#idTaoGianHang_ThongTin').hide();
		});
	 	// ẩn hiện các tab thông tin cơ bản và lay out
		$(function(){
			$('#idLayoutGianHang').hide();
			$('#idTaoGianHang_ThongTin').show('blind');
		});
		//kiểm tra tên tài khoản có tồn tại hay không // chưa làm được
		$('#idKiemTraTonTai').click(function(){
			alert("ton tai");
			$('.div .check-available').css("background","url(../image/accept_16.png)");
		});
	 	// datetime picker - form đăng ký
		$(function() {
			$( "#dtpNgaySinh" ).datepicker({
				changeMonth: true,
				changeYear: true
			});
			$("#dtpNgayBD_SK" ).datepicker({
				changeMonth: true,
				changeYear: true
			});
			$("#dtpNgayKT_SK" ).datepicker({
				changeMonth: true,
				changeYear: true
			});
		});
	 	//ẩn các tab profile
		$(function(){
			$('.profile-orders').hide();
			$('.profile-shop-favorite').hide();
			$('.profile-activity').hide();
			$('.profile-mess').hide();
		});
		// script show/hide các thông tin trang profile
			$('#liThongTinCaNhan').click(function(){				
				$('.profile-info').show('blind');
				$('.profile-orders').hide();
				$('.profile-shop-favorite').hide();
				$('.profile-activity').hide();
				$('.profile-mess').hide();
			});
			$('#liDonDatHang').click(function(){				
				$('.profile-orders').show('blind');
				$('.profile-info').hide();
				$('.profile-shop-favorite').hide();
				$('.profile-activity').hide();
				$('.profile-mess').hide();
			});
			$('#liGianHangYeuThich').click(function(){				
				$('.profile-orders').hide();
				$('.profile-info').hide();
				$('.profile-shop-favorite').show('blind');
				$('.profile-activity').hide();
				$('.profile-mess').hide();
			});
			$('#liHoatDong').click(function(){				
				$('.profile-orders').hide();
				$('.profile-info').hide();
				$('.profile-shop-favorite').hide();
				$('.profile-activity').show('blind');
				$('.profile-mess').hide();
			});
			$('#liTinNhan').click(function(){				
				$('.profile-orders').hide();
				$('.profile-info').hide();
				$('.profile-shop-favorite').hide();
				$('.profile-activity').hide();
				$('.profile-mess').show('blind');
			});
	 	//script show/hide form đăng nhập
			$('#btnViewDangNhap').hover(
				function(){	
					var pos_left = $(this).position().left;					
					pos_left = pos_left - 140;							
					$('.login-wrapper').css({'display':'block','left':pos_left});
				},
				function(){					
				}
			);	
			
			$('.login-wrapper').hover(
				function(){
				$(this).css("display", "block");
				},
				function(){
				$(this).css("display", "none");
				}
			);
		// script show/hide from tài khoản
			$('#btnViewTaiKhoan').hover(
				function(){	
					var pos_left = $(this).position().left;						
					pos_left = pos_left - 90;							
					$('.account-wrapper').css({'display':'block','left':pos_left});		
				},
				function(){
					
				}
			);	
			
			$('.account-wrapper').hover(
				function(){
				$(this).css("display", "block");
				},
				function(){
				$(this).css("display", "none");
				}
			);
		
		//script show/hide chi tiết giỏ hàng
		$('div#idViewDetail').click(function(){
			if ($(this).hasClass('view-detail'))
			{
				$(this).toggleClass('close-detail', true);
				$(this).toggleClass('view-detail', false);
				$('.item-box-right-sidebar .cart-detail').css("display", "inline");
			}
			else
			{
				$(this).toggleClass('close-detail', false);
				$(this).toggleClass('view-detail', true);
				$('.item-box-right-sidebar .cart-detail').css("display", "none");
			}
		});
		// mở 1 dialog		
		// CHƯA LÀM ĐUỌC
	 	// script hiệu ứng đổ bóng ảnh (list gian hàng)	
		// script đổ bóng để dưới cùng			     
		document.ready(function() {
			var options = { opacity: 0.75 };
			$('.reflect').reflect(options);	
		  });
	</script>
<!--END SCRIPT JWUERY-->