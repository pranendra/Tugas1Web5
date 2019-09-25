<!DOCTYPE html>
<html>
<head>
	<title>Hapus Data</title>
</head>
<style type="text/css">
	.sukses {
		color: #00822b;
	}
	.error {
		color: #FF0000;
	}
</style>
<body>

<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = "DELETE FROM user WHERE id = $id";
$delete = mysqli_query($connect, $query);
if ($delete) {
	echo "<h3 class=\"sukses\">* Berhasil dihapus</h3><br>Please Wait...";
	echo "<script>var timer = setTimeout(function(){window.location='index.php'}, 3000); </script>";
} else {
	echo "<h3 class=\"error\">* Gagal dihapus</h3><br>Please Wait...";
	echo "<script>var timer = setTimeout(function(){window.location='index.php'}, 3000); </script>";
}
?>

</body>
</html>