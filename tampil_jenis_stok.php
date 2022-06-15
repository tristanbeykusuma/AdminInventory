<?php
  include 'koneksi.php';

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
                <th>Jenis</th>
                <th>Kategori</th>
                <th>Stok</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $query = "SELECT * FROM jenis_kategori_stok;";
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
                  <?php echo $result['nama_kategori'];?>
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
    </div>
  </body>
</html>