

<?php
// Panggil koneksi database
require_once "config/database.php";

if (isset($_GET['id'])) {

	$nim = $_GET['id'];
	
	// perintah query untuk menghapus data pada tabel mhs
	$query = mysqli_query($db, "DELETE FROM mhs WHERE nim='$nim'");

	// cek hasil query
	if ($query) {
		// jika berhasil tampilkan pesan berhasil delete data
		header('location: home.php?alert=4');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: home.php?alert=1');
	}	
}							
?>