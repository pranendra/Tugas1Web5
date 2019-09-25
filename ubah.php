<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data</title>
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

<h1>Ubah Data</h1>

<?php
include 'koneksi.php';

$id = $_GET['id'];
$idsql = "SELECT * FROM user WHERE id = '$id'";
$sqlser = mysqli_query($connect, $idsql);
$data = mysqli_fetch_array($sqlser);

if (isset($_POST['save'])) {
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

if(empty($nama) || empty($username) || empty($password) || empty($email)){
	echo "<h3 class=\"error\">* Data belum lengkap, silahkan lengkapi data anda</h3>";
	echo "<script>var timer = setTimeout(function(){window.location='ubah.php?id=".$data['id']."'}, 3000); </script>";
}elseif(!preg_match("/^[a-zA-Z ]*$/",$nama)){
	echo "<h3 class=\"error\">* Nama hanya boleh menggunakan huruf dan spasi saja</h3>";
	echo "<script>var timer = setTimeout(function(){window.location='ubah.php?id=".$data['id']."'}, 3000); </script>";
}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	echo "<h3 class=\"error\">* Email anda tidak valid contoh : evanfauzi@gmail.com</h3>";
	echo "<script>var timer = setTimeout(function(){window.location='ubah.php?id=".$data['id']."'}, 3000); </script>";
}elseif (!preg_match("/^[a-zA-Z]*$/",$username)) {
	echo "<h3 class=\"error\">* Pastikan kombinasi username hanya huruf tanpa spasi</h3>";
	echo "<script>var timer = setTimeout(function(){window.location='ubah.php?id=".$data['id']."'}, 3000); </script>";
}elseif (!preg_match("/^[a-zA-Z0-9]*$/",$password)){
	echo "<h3 class=\"error\">* Pastikan kombinasi password hanya huruf dan angka tanpa spasi</h3>";
	echo "<script>var timer = setTimeout(function(){window.location='ubah.php?id=".$data['id']."'}, 3000); </script>";
}else{
	$query = "UPDATE user SET nama = '$nama', email = '$username', password = '$password', email = '$email' WHERE id = '$id'";
	$save = mysqli_query($connect, $query);
	if($save){
		echo "<br><h3 class=\"sukses\">* Data \"$nama\" berhasil di ubah</h3>";
		echo "<script>var timer = setTimeout(function(){window.location='index.php'}, 3000); </script>";
	}else{
		echo "<br><h3 class=\"error\">* Gagal di ubah</h3>";
		echo "<script>var timer = setTimeout(function(){window.location='ubah.php?id=".$data['id']."'}, 3000); </script>";
	}
}
}

?>

<form method="post" action="">
	<label>Masukan Nama :</label><br>
	<input type="text" name="nama" value="<?php echo $data['nama']; ?>"><br>

	<label>Masukan Username :</label><br>
	<input type="text" name="username" value="<?php echo $data['username']; ?>"><br>

	<label>Masukan Password :</label><br>
	<input type="password" name="password" value="<?php echo $data['password']; ?>"><br>

	<label>Masukan Email :</label><br>
	<input type="text" name="email" value="<?php echo $data['email']; ?>"><br>

	<input type="submit" value="Simpan" name="save">
	<input type="button" value="Kembali" onclick="window.location= 'index.php';">
</form>

</body>
</html>