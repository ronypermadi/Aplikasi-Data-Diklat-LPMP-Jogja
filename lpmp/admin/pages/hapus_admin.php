<?php
require_once "../core/init.php";

	if (isset($_GET['kode_user'])) {
	if (delete_admin($_GET['kode_user'])){
		header('Location: lihat_admin.php');
	}
	else echo 'gagal menghapus data';
}
?>
