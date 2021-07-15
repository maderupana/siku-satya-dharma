<?php 
require 'http://localhost/sistie/config/+konfigurasi.php';
require 'http://localhost/sistie/config/koneksi.php';
require 'http://localhost/sistie/pages/functions/functions.php';

if(isset($_POST['tambah_rincianharga']))
{

$nama = $_POST['namaharga'];
$harga = $_POST['harga'];
$id = $_GET['idsett'];

$query = "SELECT * FROM tb_rincianspp WHERE id_settharga = $id AND nama_rincian = '$nama'";
$result = mysqli_query($conn,$query) or die(mysqli_error($result));
$num_row = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);

if( $num_row >=1 ) {

echo "Nama Harga : $nama Sudah di tambahkan"; // log in


}else {

    mysqli_query($conn,"INSERT INTO tb_rincianspp VALUES('', '$id','$nama', '$harga')") or die(mysqli_error($result) );
    echo "berhasil";

    } 
}