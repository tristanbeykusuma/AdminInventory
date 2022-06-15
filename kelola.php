<!DOCTYPE html>
<?php
	include	'koneksi.php';

			session_start();

			session_destroy();
			$jenis = '';
			$kategori = '';
			$supplier = '';
			$jual = '';
			$beli = '';
			$stok = '';

		if(isset($_GET['ubah'])){
			$id_hp = $_GET['ubah'];

			$query = "SELECT * FROM hp WHERE id_hp = '$id_hp';";
			$sql = mysqli_query($conn, $query);

			$result = mysqli_fetch_assoc($sql);

			$jenis = $result['jenis_hp'];
			$kategori = $result['nama_kategori'];
			$supplier = $result['nama_supplier'];
			$jual = $result['harga_jual'];
			$beli = $result['harga_beli'];
			$stok = $result['stok'];
		}
?>

<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="admin.js"></script>

    <title>Dashboard</title>
  </head>
  <body>
	  <?php include 'navbar.php'; ?>
	  <div class="row no-gutters mt-5">
	  <?php include 'aside_bar.php'; ?>
		<div class="col-md-10 p-5">
			<div class="continer">
					<form method="POST" action="proses.php" enctype="multipard/form-data">
						<input type="hidden" value="<?php echo $id_hp?>" name="id_hp">
							<div class="mb-3 row">
					    	<label for="jenis" class="col-sm-1 col-form-label">Jenis HP</label>
					    	<div class="col-sm-10">
					      	<input required type="text" name="jenis" class="form-control" id="jenisHPKelola" placeholder="Jenis HP..." value="<?php echo $jenis?>">
					    	</div>
							</div>
							<div class="mb-3 row">
					    	<label for="kategori" class="col-sm-1 col-form-label">Kategori</label>
					    	<div class="col-sm-10">
					      	<input required type="text" class="form-control" id="kategoriKelola"  name="kategori" placeholder="123..." value="<?php echo $kategori?>">
					    	</div>
							</div>
							<div class="mb-3 row">
					    	<label for="supplier" class="col-sm-1 col-form-label">Supplier</label>
					    	<div class="col-sm-10">
					      	<input required type="text" name="supplier" class="form-control" id="supplierKelola" placeholder="123..." value="<?php echo $supplier?>">
					    	</div>
							</div>
							<div class="mb-3 row">
					    	<label for="jual" class="col-sm-1 col-form-label">Harga Beli</label>
					    	<div class="col-sm-10">
					      	<input required type="text" name="jual" class="form-control" id="jualKelola" placeholder="1000000..." value="<?php echo $jual?>">
					    	</div>
							</div>
							<div class="mb-3 row">
					    	<label for="beli" class="col-sm-1 col-form-label">Harga Jual</label>
					    	<div class="col-sm-10">
					      	<input required type="text" name="beli" class="form-control" id="beliKelola" placeholder="1000000..." value="<?php echo $beli?>">
					    	</div>
							</div>
							<div class="mb-3 row">
					    	<label for="stok" class="col-sm-1 col-form-label">Stok</label>
					    	<div class="col-sm-10">
					      	<input required type="text" name="stok" class="form-control" id="stokKelola" placeholder="Stok..." value="<?php echo $stok?>">
					    	</div>
							</div>
							<div class="mb-3 row mt-4">
					    	<div class="col">
					    		<?php
					    				if(isset($_GET['ubah'])){
					    		?>
								    	<button type="submit" name="aksi" value="edit" href="" type="button" class="btn btn-primary">
								    		Simpan Perubahan
								    	</button>
						    	<?php
						    			} else {
						    	?>
								    	<button type="submit" name="aksi" value="add" href="" type="button" class="btn btn-primary">
								    		Tambahkan
								    	</button>
						    	<?php
						    			}
						    	?>
						    	<a href="index.php" type="button" class="btn btn-danger">
						    		Batal
						    	</a>
						    	</div>
							</div>
					</form>
				</div>
		</div>
  </body>
</html>