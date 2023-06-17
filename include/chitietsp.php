
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- <script>
        $(document).ready(function(){
            $("#guibinhluan").click(function(){
            var url_string = window.location.href;
            var url = new URL(url_string);
            var idtin = url.searchParams.get("id");
            var txt = $("#noidungbinhluan").val();
            $.post("xulybinhluan.php",{
            noidung :txt,
            idtin :idtin},
             function(result){
                $("#dsbinhluan").append('<br>'+txt);
            });
        });
    });
    </script> -->
</head>
<body>




<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{		
		$id = '';
	}
	$sql_chitiet = mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE sanpham_id='$id'"); 
?>
<!-- page -->	
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.php">Trang chủ</a>
						<i>|</i>
					</li>
					<li>Single Product 1</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<?php
	while($row_chitiet = mysqli_fetch_array($sql_chitiet)){ 
	?>
	<!-- Single Page -->
	<div class="banner-bootom-w3-agileits py-5">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			
			<!-- //tittle heading -->
			<div class="row">
				<div class="col-lg-5 col-md-8 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							<ul class="slides">
								<li data-thumb="images/<?php echo $row_chitiet['sanpham_image'] ?>">
									<div class="thumb-image">
										<img src="images/<?php echo $row_chitiet['sanpham_image'] ?>" data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>
							
								
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="col-lg-7 single-right-left simpleCart_shelfItem">
					<h3 class="mb-3"><?php echo $row_chitiet['sanpham_name'] ?></h3>
					<!-- <p class="mb-3">
						<span class="item_price"><?php echo ($row_chitiet['sanpham_giakhuyenmai']) ?></span>
						<del class="mx-2 font-weight-light"><?php echo ($row_chitiet['sanpham_gia']) ?></del> -->
						<!-- <label>Miễn phí vận chuyển</label> -->
					</p>
					
					<div class="product-single-w3l">
						<p><?php echo $row_chitiet['sanpham_chitiet'] ?></p><br><br>
						<!-- <p><?php echo $row_chitiet['sanpham_mota'] ?></p> -->
						<img src="images/<?php echo $row_chitiet['sanpham_mota'] ?>" alt="">
						<p><?php echo $row_chitiet['sanpham_chitiet'] ?></p><br><br>
					</div>
					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
							<form action="?quanly=giohang" method="post">
								<fieldset>
									<input type="hidden" name="tensanpham" value="<?php echo $row_chitiet['sanpham_name'] ?>" />
									<input type="hidden" name="sanpham_id" value="<?php echo $row_chitiet['sanpham_id'] ?>" />
									<input type="hidden" name="giasanpham" value="<?php echo $row_chitiet['sanpham_gia'] ?>" />
									<input type="hidden" name="hinhanh" value="<?php echo $row_chitiet['sanpham_image'] ?>" />
									<input type="hidden" name="soluong" value="1" />			
									<input type="submit" name="themgiohang" value="Thêm mục yêu thích" class="button" />
								
							</form>
						</div>
					</div>

				</div>
			</div>
		
	<!-- //Single Page -->
	<?php
	} 
	?>
	</div>

		<?php
                $sql2 = "SELECT quanlytaikhoan.username, binhluan_baiviet.noidungbinhluan FROM binhluan_baiviet LEFT JOIN quanlytaikhoan ON quanlytaikhoan.iduser=binhluan_baiviet.id_user WHERE binhluan_baiviet.id_baiviet =$id";
                
                $ketqua2 = mysqli_query($con,$sql2);
                while($dong = mysqli_fetch_assoc($ketqua2)){ 
            ?>
                <div class="media border p-2 mt-2">
                    <img src="https://png.pngtree.com/png-vector/20190909/ourmid/pngtree-outline-user-icon-png-image_1727916.jpg" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                    <div class="media-body">
                        <h5> <?php echo $dong['username'] ?> </h5>
                        <p style="font-size: 14px;"><?php echo $dong['noidungbinhluan'] ?></p>
                    </div>
                </div>
            <?php } ?>
            <div class="media border p-2 mt-2" >
                <img src="https://png.pngtree.com/png-vector/20190909/ourmid/pngtree-outline-user-icon-png-image_1727916.jpg" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                <div class="media-body">
                    <h5><?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?></h5>
                    <p id="dsbinhluan"></p><br>


						 <?php
						    if ($_SERVER["REQUEST_METHOD"] == "POST") {
							    $conn = mysqli_connect("localhost","root","","game");
								$noidung = $_POST['noidungbinhluan'];
							    $idtin = $id;

							    // $iduser= $_SESSION['iduser']; (có trang đăng nhập thì thêm dòng này vào)
							    // Khi mà đăng nhập ở trang login, lưu session user vào biến  $_SESSION['iduser'], rồi thay chữ số 0 ở dưới bằng cái $iduser; ok anh...cảm mơn a thén nhiều :v okeeeee
						   


							    $sql = "INSERT INTO binhluan_baiviet(id_baiviet,id_user,noidungbinhluan) 
							    		VALUES ('$idtin',0,'$noidung')";
							    $ketqua = mysqli_query($conn,$sql);
														    }
						 ?>

                    <form method="POST">
                    	 <textarea class="form-control" rows="2" style="width: 300px;float:left;" name="noidungbinhluan" id="noidungbinhluan"></textarea><br>
                    	<button type="submit" class="btn btn-primary" id="guibinhluan" style="padding: 5px 10px; margin-top:-10px ;margin-left:10px;">Gửi</button>
                    </form>
                  
                </div>
            </div>
		
	</div>
</body>
</html>