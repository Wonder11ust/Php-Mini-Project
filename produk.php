<?php 
session_start();
include 'config.php';
$idUser = $_SESSION['id'];
$id = $_GET['id'];
$qty = $_POST['qty'];
//kalo belum ada order id
if(isset($_POST['addprod'])){
	if(!isset($_SESSION['log'])){
		header('location:login.php');
	}else{
$cekBrg = mysqli_query($conn,"SELECT * FROM cart2 WHERE iduser='$idUser' AND status='cart'");
	$cek1 = mysqli_num_rows($cekBrg);
	$q = mysqli_fetch_assoc($cekBrg);
	$orId = $q['orderid'];

	if($cek1 > 0){
		//cek barang yang sama
		$sama = mysqli_query($conn,"SELECT * FROM detailorder WHERE id_brg='$id' AND orderid = '$orId'");
		$brgSama = mysqli_num_rows($sama);
		$b = mysqli_fetch_array($sama);
		$jumlah = $b['qty'];

		if($brgSama > 0){
		
			$baru = $jumlah + $qty;

			$update = mysqli_query($conn,"UPDATE detailorder SET qty='$baru' WHERE orderid = '$orId' AND id_brg='$id'");

			if($update){
				echo " <div class='alert alert-success'>
				Barang sudah pernah dimasukkan ke keranjang, jumlah akan ditambahkan
			  </div>
			  <meta http-equiv='refresh' content='1; url= produk.php?id=".$id."'/>";
			}else{
				echo "<div class='alert alert-warning'>
				Gagal menambahkan ke keranjang
			  </div>
			  <meta http-equiv='refresh' content='1; url= produk.php?idp=".$id."'/>";
			}
		}else{
			$tambahData = mysqli_query($conn,"INSERT into detailorder(orderid,id_brg,qty) VALUES('$orId','$id','$qty')");
			if($tambahData){
				echo " <div class='alert alert-success'>
								Berhasil menambahkan ke keranjang
							  </div>
							<meta http-equiv='refresh' content='1; url= produk.php?id=".$id."'/>  ";
			}else{
				echo " <div class='alert alert-warning'>
								Gagal menambahkan ke keranjang
							  </div>
							<meta http-equiv='refresh' content='1; url= produk.php?id=".$id."'/>  ";
			}
		}
	}else{

	


	$oi = crypt(rand(22,999),time());
	$createCart = mysqli_query($conn,"INSERT INTO cart2(orderid,iduser,status) VALUES('$oi','$idUser','cart')");
	if($createCart){
		$insertDetail = mysqli_query($conn,"INSERT INTO detailorder(orderid,id_brg,qty) VALUES('$oi','$id','$qty')");
		if($insertDetail){
		echo " <div class='alert alert-success'>
		Berhasil menambahkan ke keranjang
	  </div>
	<meta http-equiv='refresh' content='1; url= produk.php?id=".$id."'/>  ";
	}else { echo "<div class='alert alert-warning'>
		Gagal menambahkan ke keranjang
	  </div>
	 <meta http-equiv='refresh' content='1; url= produk.php?id=".$id."'/> ";
	}
}else{
	echo 'gagal';
}
}
}
}
$lihat = mysqli_query($conn,"SELECT * FROM produk WHERE idbrg=$id");
if(mysqli_num_rows($lihat)>0){

  include 'header.php';
?>

<	<div class="products">
		<div class="container">
			<div class="agileinfo_single">
				   
      <?php  $p=mysqli_fetch_array($lihat); ?>
	  <form action="" method="post">
				<div class="col-md-4 agileinfo_single_left">
					<img id="example" src="<?php echo $p['gambar_brg']?>" alt=" " class="img-responsive">
				</div>
				<div class="col-md-8 agileinfo_single_right">
				<h2><?php echo $p['nama_brg'] ?></h2>

					<div class="w3agile_description">
						<h4>Stock Barang :</h4>
						<p><?php echo $p['stock_brg'] ?></p>
					</div>
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
							<h4 class="m-sing">Harga:</h4>
							<p>Rp<?php echo number_format($p['harga_brg']) ?></p>
						</div>
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
							<h4 class="m-sing">Jumlah:</h4>
							<p><input type="number" name="qty" min="1" value="1"></p>
						</div>
          
						<div class="snipcart-details agileinfo_single_right_details">
				
								<fieldset>
									<input type="hidden" name="idprod" value="<?php echo $id ?>">
									<input type="submit" name="addprod" value="Add to cart" class="button">
								</fieldset>
							</form>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

          
</div>
       


<?php 
  
}
?>
</body>
</html>