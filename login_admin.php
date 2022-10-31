<html>
<head>
	<title>Login Admin</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
        elseif ($_GET['pesan'] == "logout") {
            echo "<div class='alert'>Log Out !</div>";
        } elseif ($_GET['pesan'] == "belum_login") {
            echo "<div class='alert'>Login Untuk Mengakses Halamn ini !</div>";
        }
	}
	?>
 
	<div class="kotak_login">
		<p class="tulisan_login">Admin Login</p>
 
		<form action="login_admin_aksi.php" method="post">
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username .." required="required">
 
			<label>Password</label>
			<input type="password" name="password" class="form_login" placeholder="Password .." required="required">
 
			<input type="submit" class="tombol_login" value="LOGIN"><br><br>
            <a href="login_pegawai.php">Login Sebagai Pegawai</a>
 
			<br/>
			<br/>
		</form>
		
	</div>
</body>
</html>

