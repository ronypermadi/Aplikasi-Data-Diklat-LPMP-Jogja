<?php
require_once "../core/init.php";

	if (isset($_GET['kode_wi'])) {
	if (delete_pengajar($_GET['kode_wi'])){
		header('Location: lihat_pengajar.php');
	}
	else echo 'gagal menghapus data';
}
?>
