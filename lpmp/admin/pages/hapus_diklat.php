<?php
require_once "../core/init.php";

	if (isset($_GET['kode_diklat'])) {
	if (delete_diklat($_GET['kode_diklat'])){
		header('Location: lihat_diklat.php');
	}
	else echo 'gagal menghapus data';
}
?>
