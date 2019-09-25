<!DOCTYPE html>
<html>
<head>
	<title>Tugas Web 1</title>
</head>
<style type="text/css">
	.table{
		border-collapse: collapse;
	}

	table.table th th , table.table tr td{
		padding: 10px 20px	;
	}
</style>
<body>

<h1>CRUD dengan PHP dan database MySql</h1>

<a href="tambah.php">+ Tambah Data Baru</a>
<br>

<h2>Data Tersimpan</h2>
<table border="1" class="table">
	<tr>
		<th>Nama</th>
		<th>Username</th>
		<th>Password</th>
		<th>Email</th>
		<th>Aksi</th>		
	</tr>
<?php 
include 'koneksi.php';
$query = "SELECT * FROM user";
$sql = mysqli_query($connect, $query);
while ($data = mysqli_fetch_array($sql)) {
?>
	<tr>
		<td><?php echo $data['nama']; ?></td>
		<td><?php echo $data['username']; ?></td>
		<td><?php echo $data['password']; ?></td>
		<td><?php echo $data['email']; ?></td>
		<td>
			<a class="edit" href="ubah.php?id=<?php echo $data['id']; ?>">Edit</a> |
			<a class="hapus" href="hapus.php?id=<?php echo $data['id']; ?>">Hapus</a>				
		</td>
	</tr>
<?php } ?>
</table>

</body>
</html>