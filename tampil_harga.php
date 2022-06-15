<?php
	include	'koneksi.php';

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
				<form method="POST" action="">
					<div class="mb-3 row">
    				<label for="atas" class="col-sm-2 mb-3">Batas Atas</label>
    					<div class="col-sm-10">
     					 <input type="text" name="atas" id="atas">
    					</div>
    				<label for="bawah" class="col-sm-2 ">Batas Bawah</label>
    					<div class="col-sm-10">
     					 <input type="text" name="bawah" id="bawah">
    					</div>
  				</div>
  				<button type="submit" name="submit" type="button" class="btn btn-primary">
							Cari
					</button>
  			</form>
			<div class="table-responsive mt-2">
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
				      </tr>
				    </thead>
				    <tbody>
				    	<?php
				    		$query = "SELECT * FROM hp;";
								$sql = mysqli_query($conn, $query);
								$no = 0;

								if (isset($_POST['submit'])) {
									$atas = $_POST['atas'];
									$bawah = $_POST['bawah'];

								if (!empty($atas) && !empty($bawah)) {
								  $sql = mysqli_query($conn, "SELECT * FROM hp WHERE harga_jual BETWEEN $bawah AND $atas ORDER BY harga_jual DESC"); 
								 } else {
								  $sql = mysqli_query($conn, "SELECT * FROM hp"); 
								 }
								 
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
				      </tr>
				      <?php
				      		}
				      ?>
				    </tbody>
				  </table>
				</div>
				<?php 
				$query=mysqli_query($conn,"SELECT MAX(harga_jual) AS harga_tertinggi FROM hp HAVING harga_tertinggi != 0") or die (mysqli_error($conn));
				$data=mysqli_fetch_array($query);

				echo "<br>";
				echo "Harga Jual Tertinggi: $data[harga_tertinggi]";
				?>
    </div>
  </body>
</html>