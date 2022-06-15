<?php
	include	'koneksi.php';
	session_start();

	$query = "SELECT * FROM hp;";
	$sql = mysqli_query($conn, $query);
	$count = mysqli_num_rows($sql);
	$no = 0;
?>

<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="datatables/datatables.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="admin.js"></script>
    <script type="text/javascript" src="datatables/datatables.js"></script>

    <title>Dashboard</title>
  </head>
  <body>
  	<?php include 'navbar.php'; ?>
	  <div class="row no-gutters mt-5">
	  <?php include 'aside_bar.php'; ?>
		<div class="col-md-10 p-5">
			<h3>INVENTORY</h3><hr>
				<div class ="card bg-primary text-white"><h1>Total Barang: <b><?php echo $count; ?></b></h1></div>
				<a href="kelola.php" type="button" class="btn btn-success mt-2 mb-4"><i class="fa-solid fa-plus text-white mr-2"></i>TAMBAH DATA HP</a>
				<?php 
					if(isset($_SESSION['eksekusi'])):
				?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
	  				<strong>
	  					<?php
	  						echo $_SESSION['eksekusi'];
	  					?>
	  				</strong>
	  				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				<?php
					session_destroy();
					endif;
				?>
				<div class="mb-3 row">
				<form method="GET" action="">
					<div class="mb-3 row">
    				<label for="Cari" class="col-sm-1 ">Cari</label>
    					<div class="col-sm-10">
     					 <input type="text" name="cari">
    					</div>
  					</div>
				</form>
				<div class="table-responsive">
				  <table class="table align-middle table-bordered table-hover">
				    <thead>
				      <tr>
				        <th>No</th>
				        <th>Jenis HP</th>
				        <th>Kategori</th>
				        <th>Supplier</th>
				        <th>Harga Beli</th>
				        <th>Harga Jual</th>
				        <th>Stok</th>
				        <th>Aksi</th>
				      </tr>
				    </thead>
				    <tbody>
				    	<?php
				    		if(isset($_GET['cari'])){
								$cari = $_GET['cari'];
								$query = "SELECT * FROM hp WHERE jenis_hp LIKE '%".$cari."%';";
								$sql = mysqli_query($conn, $query);
								}


				    			while($result = mysqli_fetch_assoc($sql)){
				    	?>
				      <tr>
				        <td><center>
				        	<?php echo ++$no;?>.
				        </center></td>
				        <td>
				        	<?php echo $result['jenis_hp'];?>
				        </td>
				        <td>
				        	<?php echo $result['nama_kategori'];?>
				        </td>
				        <td>
				        	<?php echo $result['nama_supplier'];?>
				        </td>
				        <td>
				        	<?php echo $result['harga_beli'];?>
				        </td>
				        <td>
				        	<?php echo $result['harga_jual'];?>
				        </td>
				        <td>
				        	<?php echo $result['stok'];?>
				        </td>
				        <td><center>
				        	<a href="kelola.php?ubah=<?php echo $result['id_hp'];?>" type="button" class="btn btn-sm">
				        		<i class="fa-solid fa-pen-to-square bg-warning p-2 text-white rounded"></i>
				        	</a>
				        	<a href="proses.php?hapus=<?php echo $result['id_hp'];?>" type="button" class="btn btn-sm" onClick="return confirm('Yakin hapus?')">
				        		<i class="fa-solid fa-trash bg-danger p-2 text-white rounded"></i>
				        	</a>
				        </td>
				      </tr>
				      <?php
				      		}
				      ?>
				    </tbody>
				  </table>
				</div>
			  </div>
    </div>
  </body>
</html>