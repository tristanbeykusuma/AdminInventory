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
                <th>Type</th>
                <th>Nama</th>
                <th>Kota</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $query = "SELECT 'Supplier' AS Type, nama_supplier AS nama, kota FROM supplier
                          UNION
                          SELECT 'Customer', nama_customer AS ama, kota FROM customer;";
                $sql = mysqli_query($conn, $query);
                $no = 0;

              while($result = mysqli_fetch_assoc($sql)){
              ?>
              <tr>
                <td><center>
                  <?php echo ++$no;?>.
                </center></td>
                <td>
                  <?php echo $result['Type'];?>
                </td>
                <td>
                  <?php echo $result['nama'];?>
                </td>
                <td>
                  <?php echo $result['kota'];?>
                </td>
              </tr>
              <?php
                  }
              ?>
            </tbody>
          </table>
          <a href="tampil_kota_indonesia.php" type="button" class="btn btn-success mt-2 mb-4"> Tampilkan Supplier dan Customer Indonesia Saja </a>
        </div>
    </div>
  </body>


</html>