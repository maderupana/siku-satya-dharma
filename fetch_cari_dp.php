<?php
$connect = mysqli_connect("localhost", "root", "mademadot@", "dbsisiput");
//fetch.php
if (isset($_POST["nim"])) {

	$nim = substr($_POST['nim'], 0, 2);
	$query = "SELECT harga FROM tbsett_harga WHERE angkatan LIKE '%" . $nim . "%'" and nama_harga = 'Pembayaran diawal';
	$result = mysqli_query($connect, $query);
	while ($row = mysqli_fetch_array($result)) {
		$data["harga"] = $row["harga"];
	}

	echo json_encode($data);

}
?>