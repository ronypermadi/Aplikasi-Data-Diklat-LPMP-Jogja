<?php
require_once "../core/init.php";

	if (isset($_GET['id_hasil'])) {
	if (delete_transaksi($_GET['id_hasil'])){
		header('Location: transaksi.php');
	}
	else echo 'gagal menghapus data';
}
?>
