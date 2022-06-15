<?php
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$db = 'db_inven_hp';
		$conn = mysqli_connect($host, $user, $pass, $db);

		mysqli_select_db($conn, $db);
		if ($conn){
			//echo "<b> Koneksi Berhasil </b>";
		} else {
			die ("<b> Koneksi Gagal </b>");
		}		
?>