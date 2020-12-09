<!--halaman login-->

<!DOCTYPE html>
<html>
<head>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
	<!-- favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png">
     <title>LOGIN</title>
</head>
<body>
	<div class="division">
		<form name="reg" action="cek_login.php" method="post">
			<table  cellpadding="5" align="center">
			<tr>
				<td><input type="text" name="username" placeholder="Username" required/></td> 
			</tr>
			<tr>
				<td><input type="password" name="password" placeholder="Password" required/></td>
			</tr>
			<tr>
				<td><input type="submit" class="btn btn-info more" value="login" name="login" ></td>
			</tr>
			</table>
			
		</form>
	</div>
</body>
</html>


