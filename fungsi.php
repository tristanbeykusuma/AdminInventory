<?php
	include	'koneksi.php';

	function tambah_data($data){

		$jenis = $data['jenis'];
		$kategori = $data['kategori'];
		$supplier = $data['supplier'];
		$jual = $data['jual'];
		$beli = $data['beli'];
		$stok = $data['stok'];

		$query = "INSERT INTO hp VALUES(null, '$kategori', '$supplier', '$jenis', '$beli', '$jual', '$stok');";
		$sql = mysqli_query($GLOBALS['conn'], $query);

		return true;
	}

	function ubah_data($data){

		$id_hp = $data['id_hp'];
		$jenis = $data['jenis'];
		$kategori = $data['kategori'];
		$supplier = $data['supplier'];
		$jual = $data['jual'];
		$beli = $data['beli'];
		$stok = $data['stok'];

		$query = "UPDATE hp SET nama_kategori='$kategori', nama_supplier='$supplier', jenis_hp='$jenis', harga_beli='$beli', harga_jual='$jual', stok='$stok' WHERE id_hp='$id_hp';";
		$sql = mysqli_query($GLOBALS['conn'], $query);

		return true;
	}

	function hapus_data($data){

		$id_hp = $data['hapus'];
		$query = "DELETE FROM hp WHERE id_hp = '$id_hp';";
		$sql = mysqli_query($GLOBALS['conn'], $query);

		return true;
	}
?>