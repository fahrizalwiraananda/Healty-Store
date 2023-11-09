<?php
//koneksi DB
$conn=mysqli_connect("localhost:3306","root","","health_store");

function query($query){
	global $conn;
	$result=mysqli_query($conn,$query);
	$rows=[];
	while($row=mysqli_fetch_assoc($result)){
		$rows[]=$row;
	}
	return $rows;
}

function registrasi($data){
	global $conn;

	$nama = stripcslashes($data["nama"]);
	$telepon = strtolower(stripcslashes($data["telepon"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);
	$email   = strtolower(stripcslashes($data["email"]));

	//cek leberadaan username
	$result = mysqli_query($conn, "select 
	nama from pelanggan where nama = '$nama'");

	if(mysqli_fetch_assoc($result)) {
		echo"<script>
				alert('Nama sudah pernah terdaftar !');
			</script>";
			return false;
	}

	//cek leberadaan telepon
	$result = mysqli_query($conn, "select telepon from pelanggan where telepon = '$telepon'");

	if(mysqli_fetch_assoc($result)) {
		echo"<script>
				alert('Telepon sudah pernah terdaftar !');
			</script>";
			return false;
	}

	//cek leberadaan email
	$result = mysqli_query($conn, "select email from pelanggan where email = '$email'");

	if(mysqli_fetch_assoc($result)) {
		echo"<script>
				alert('Email sudah pernah terdaftar !');
			</script>";
			return false;
	}

	//konfirmasi
	if ($password !== $password2) {
		echo"<script>
			alert('Password Tidak Sama !');
		</script>";
		return false;
	} 
		
	//enkripsi
	$password = password_hash($password, PASSWORD_DEFAULT);

	//insert database
	mysqli_query($conn, "insert into pelanggan values('', '$nama', '$telepon', '$email', '$password')");
	return mysqli_affected_rows($conn);
}

function cari($kunci){
	$query="select * from produk where nama_produk like '%$kunci%'";
	return query($query);
}

?>