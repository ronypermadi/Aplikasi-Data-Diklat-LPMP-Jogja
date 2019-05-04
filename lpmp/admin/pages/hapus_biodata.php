<?php
require_once "../core/init.php";

	if (isset($_GET['no_induk'])) {
	if (delete_biodata($_GET['no_induk'])){
		header('Location: lihat_biodata.php');
	}
	else echo 'gagal menghapus data';
}
?>
