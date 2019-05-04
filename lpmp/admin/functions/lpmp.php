<?php

//Fungsi Tambahan -->
function list_tanggal($nilai)
{
$tahun = substr($nilai,0,4);
$bulan = substr($nilai,5,2);
$tanggal = substr($nilai,8,2);

if($bulan == '01')
	$bul = 'Januari';
if($bulan == '02')
	$bul = 'Februari';
if($bulan == '03')
	$bul = 'Maret';
if($bulan == '04')
	$bul = 'April';
if($bulan == '05')
	$bul = 'Mei';
if($bulan == '06')
	$bul = 'Juni';
if($bulan == '07')
	$bul = 'Juli';
if($bulan == '08')
	$bul = 'Agustus';
if($bulan == '09')
	$bul = 'September';
if($bulan == '10')
	$bul = 'Oktober';
if($bulan == '11')
	$bul = 'November';
if($bulan == '12')
	$bul = 'Desember';

$tanggalnya = $tanggal." ".$bul." ".$tahun;

	return $tanggalnya;
}

function list_jk($jk)
{
	if($jk == '1')
		$ket = 'Laki-laki';
	if($jk == '2')
		$ket = 'Perempuan';
	return ($ket);

}

function list_pend($pend)
{
	if($pend == '1')
		$ket = 'SD';
	if($pend == '2')
		$ket = 'SMP/MTS';
	if($pend == '3')
		$ket = 'SMA/SMK/MA/MAK';
	if($pend == '4')
		$ket = 'D1';
	if($pend == '5')
		$ket = 'D2';
	if($pend == '6')
		$ket = 'D3';
	if($pend == '7')
		$ket = 'S1';
	if($pend == '8')
		$ket = 'S2';
	if($pend == '9')
		$ket = 'S3';
	return ($ket);

}

function list_agama($agama)
{
	if($agama == '1')
		$ket = 'Islam';
	if($agama == '2')
		$ket = 'Kristen';
	if($agama == '3')
		$ket = 'Katolik';
	if($agama == '4')
		$ket = 'Hindu';
	if($agama == '5')
		$ket = 'Budha';
	if($agama == '6')
		$ket = 'Konghucu';
	return ($ket);
}

function list_stat_nikah($stat_nikah)
{
	if($stat_nikah == '1')
		$ket = 'Menikah';
	if($stat_nikah == '2')
		$ket = 'Belum Menikah';
	if($stat_nikah == '3')
		$ket = 'Duda';
	if($stat_nikah == '4')
		$ket = 'Janda';
	return ($ket);
}

//Fungsi Tambahan -->


//Lihat Data -->
function show_biodata(){
	global $link;

	$query = "SELECT * FROM biodata";
	$result = mysqli_query($link, $query) or die('gagal menampilkan data');

	return $result;
}

function show_detail(){
	global $link;
    $no_induk=$_REQUEST['no_induk'];
	$query = "SELECT * FROM biodata where no_induk=$no_induk";
	$result = mysqli_query($link, $query) or die('gagal menampilkan data');

	return $result;
}

function show_diklat(){
	global $link;

	$query = "SELECT * FROM diklat";
	$result = mysqli_query($link, $query) or die('gagal menampilkan data');

	return $result;
}

function show_pengajar(){
	global $link;

	$query = "SELECT * FROM pengajar";
	$result = mysqli_query($link, $query) or die('gagal menampilkan data');

	return $result;
}

function show_admin(){
	global $link;

	$query = "SELECT * FROM tb_login order by kode_user";
	$result = mysqli_query($link, $query) or die('gagal menampilkan data');

	return $result;
}

function show_transaksi(){
	global $link;

	$query = "SELECT biodata.nm_pes,biodata.nuptk,biodata.nip,biodata.unit_kepeg, diklat.nm_diklat from biodata STRAIGHT_JOIN hasil ON biodata.no_induk=hasil.no_induk STRAIGHT_JOIN diklat on hasil.kode_diklat=diklat.kode_diklat";
	$result = mysqli_query($link, $query) or die('gagal menampilkan data');

	return $result;
}

function load_mulai(){
	global $link;

	$query = "SELECT mulai FROM diklat where kode_diklat='".$_POST["diklat"]."'";
	$result = mysqli_query($link, $query) or die('gagal menampilkan data');

	return $result;
}

function load_diklat(){
	global $link;

	$query = "SELECT * from hasil where kode_diklat=$id_diklat";
	$query1 = "SELECT biodata.nm_pes,biodata.nuptk,biodata.nip,biodata.unit_kepeg, diklat.nm_diklat from biodata STRAIGHT_JOIN hasil ON biodata.no_induk=hasil.no_induk STRAIGHT_JOIN diklat on hasil.kode_diklat=diklat.kode_diklat";
	$query2 = $query.$query1;
	$result = mysqli_query($link, $query2) or die('Data gagal ditampilkan');

	return $result;
}

function load_selesai(){
	global $link;

	$query = "SELECT selesai FROM diklat where kode_diklat='".$_POST["diklat"]."'";
	$result = mysqli_query($link, $query) or die('gagal menampilkan data');

	return $result;
}
//Lihat Data -->
function run($query){
	global $link;

	if(mysqli_query($link, $query)) return true;

	else return false;
}

//Hapus Data -->
function delete_admin($kode_user){

	$kode_user=$_REQUEST['kode_user'];
	$query = "DELETE FROM tb_login WHERE kode_user=$kode_user";
	return run($query);
}

function delete_biodata($no_induk){

	$no_induk=$_REQUEST['no_induk'];
	$query = "DELETE FROM biodata WHERE no_induk=$no_induk";
	return run($query);
}

function delete_diklat($kode_diklat){

	$kode_diklat=$_REQUEST['kode_diklat'];
	$query = "DELETE FROM diklat WHERE kode_diklat=$kode_diklat";
	return run($query);
}

function delete_pengajar($kode_wi){

	$kode_wi=$_REQUEST['kode_wi'];
	$query = "DELETE FROM pengajar WHERE kode_wi=$kode_wi";
	return run($query);
}

function delete_transaksi($id_hasil){

	$id_hasil=$_REQUEST['id_hasil'];
	$query = "DELETE FROM hasil WHERE id_hasil='$id_hasil'";
	return run($query);
}

//Hapus Data -->

//Tambah Data -->
function add_biodata($no_induk, $nm_pes, $nuptk, $nip, $t_lahir, $tgl_lahir, $jk, $agama, $stat_nikah, $alt_rmh, $telp_rmh, $pend, $jurusan, $th_lulus, $univ, $stat_kepeg, $pagol, $jabatan, $unit_kepeg, $alt_unitker, $telp_unitker, $masa_ker){
	$query = "INSERT INTO biodata (no_induk,nm_pes,nuptk,nip,t_lahir,tgl_lahir,jk,agama,stat_nikah,alt_rmh,telp_rmh,pend,jurusan,th_lulus,univ,stat_kepeg,pagol,jabatan,unit_kepeg,alt_unitker,telp_unitker,masa_ker) VALUES ('$no_induk','$nm_pes','$nuptk','$nip','$t_lahir','$tgl_lahir','$jk','$agama','$stat_nikah','$alt_rmh','$telp_rmh','$pend','$jurusan','$th_lulus','$univ','$stat_kepeg','$pagol','$jabatan','$unit_kepeg','$alt_unitker','$telp_unitker','$masa_ker')";
	return run($query);
}

function add_admin($nama, $username, $password, $level){
	$query = "INSERT INTO tb_login SET username = '$username', password = '$password', nama = '$nama', level = '$level'";
	return run($query);
}

function add_pengajar($kode_wi, $nama_wi, $mapel){
	$query = "INSERT INTO pengajar (kode_wi, nama_wi, mapel) VALUES('$kode_wi', '$nama_wi', '$mapel')";
	return run($query);
}

function add_diklat($kode_diklat, $nm_diklat, $jam, $mulai, $selesai){
	$query = "INSERT INTO diklat (kode_diklat, nm_diklat, jam, mulai, selesai) VALUES('$kode_diklat', '$nm_diklat', '$jam', '$mulai', '$selesai')";
	return run($query);
}

function add_transaksi($no_induk, $kode_diklat){
	$query = "INSERT INTO hasil (no_induk, kode_diklat) VALUES('$no_induk','$kode_diklat')";
	return run($query);
}

//Tambah Data -->

//Edit Data -->
function edit_diklat($kode_diklat, $nm_diklat, $jam, $mulai, $selesai){

	$query = "UPDATE diklat SET kode_diklat='$kode_diklat', nm_diklat='$nm_diklat', jam='$jam', mulai='$mulai', selesai='$selesai' WHERE kode_diklat=$kode_diklat";
	return run($query);
}

function edit_biodata($no_induk, $nm_pes, $nuptk, $nip, $t_lahir, $tgl_lahir, $jk, $agama, $stat_nikah, $alt_rmh, $telp_rmh, $pend, $jurusan, $th_lulus, $univ, $stat_kepeg, $pagol, $jabatan, $unit_kepeg, $alt_unitker, $telp_unitker, $masa_ker){

	$query = "UPDATE biodata SET no_induk='$no_induk', nm_pes='$nm_pes', nuptk='$nuptk', nip='$nip', t_lahir='$t_lahir', tgl_lahir='$tgl_lahir', jk='$jk', agama='$agama', stat_nikah='$stat_nikah', alt_rmh='$alt_rmh', telp_rmh='$telp_rmh', pend='$pend', jurusan='$jurusan', th_lulus='$th_lulus', univ='$univ', stat_kepeg='$stat_kepeg', pagol='$pagol', jabatan='$jabatan', unit_kepeg='$unit_kepeg', alt_unitker='$alt_unitker', telp_unitker='$telp_unitker', masa_ker='$masa_ker' where no_induk=$no_induk";
	return run($query);
}

function edit_pengajar($kode_wi, $nama_wi, $mapel){

	$query = "UPDATE pengajar SET kode_wi='$kode_wi', nama_wi='$nama_wi', mapel='$mapel' WHERE kode_wi=$kode_wi";
	return run($query);
}

function edit_admin($nama, $username, $password, $level){

	$query = "UPDATE tb_login SET nama='$nama', username='$username', password='$password', level='$level' WHERE nama='$nama' ";
	return run($query);
}
//Edit Data -->

//Lihat Data Per ID -->
function diklat_id($kode_diklat){
	global $link;

	$query = "SELECT * FROM diklat where kode_diklat=$kode_diklat";
	$result = mysqli_query($link, $query) or die('gagal menampilkan data');

	return $result;
}

function biodata_id($no_induk){
	global $link;

	$query = "SELECT * FROM biodata where no_induk=$no_induk";
	$result = mysqli_query($link, $query) or die('gagal menampilkan data');

	return $result;
}

function pengajar_id($kode_wi){
	global $link;

	$query = "SELECT * FROM pengajar where kode_wi=$kode_wi";
	$result = mysqli_query($link, $query) or die('gagal menampilkan data');

	return $result;
}

function admin_id($kode_user){
	global $link;

	$query = "SELECT * FROM tb_login where kode_user=$kode_user";
	$result = mysqli_query($link, $query) or die('gagal menampilkan data');

	return $result;
}
//Lihat Data Per ID -->

?>
