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
			<div class="table-responsive mt-2">
				  <table class="table align-middle table-bordered table-hover">
				    <thead>
				      <tr>
				        <th>No</th>
				        <th>Jenis HP</th>
				        <th>Harga Beli</th>
				        <th>Harga Jual</th>
						<th>Laba</th>
				      </tr>
				    </thead>
				    <tbody>
				    	<?php
				    		$query = "SELECT *,(harga_jual-harga_beli) AS selisih FROM hp;";
								$sql = mysqli_query($conn, $query);
								$no = 0;

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
				        	<?php echo $result['harga_beli'];?>
				        </td>
				        <td>
				        	<?php echo $result['harga_jual'];?>
				        </td>
						<td>
				        	<?php echo $result['selisih'];?>
				        </td>
				      </tr>
				      <?php
				      		}
				      ?>
				    </tbody>
				  </table>
				</div>
				<?php 
				$query=mysqli_query($conn,"SELECT SUM(harga_jual-harga_beli) AS laba FROM hp") or die (mysqli_error($conn));
				$data=mysqli_fetch_array($query);

				echo "<br>";
				echo "Total Laba: $data[laba]";
				?>
    </div>
  </body>
</html>