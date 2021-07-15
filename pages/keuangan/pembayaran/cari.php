<?php
$conn = mysqli_connect('localhost', 'root', 'mademadot@', 'dbsisiput');
$nim = substr($_POST['nim'], 0, 2); // Ambil data NIS yang dikirim lewat AJAX
$cek = mysqli_query($conn, "SELECT * FROM tbsett_harga WHERE angkatan LIKE '%$nim%' AND nama_Harga = 'Pembayaran diawal' ");
$row = mysqli_num_rows($cek);
if($row > 0){ // Jika data lebih dari 0
  $data = mysqli_fetch_assoc($cek); // ambil data siswa tersebut
  
  // BUat sebuah array
  $callback = array(
    'status' => 'success', // Set array status dengan success
    'hargadp' => $data['harga']
  );
}else{
  $callback = array('status' => 'failed'); // set array status dengan failed
}
echo json_encode($callback); // konversi varibael $callback menjadi JSON
?>