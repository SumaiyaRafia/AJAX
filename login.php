<?php 
	require 'dbRead.php';
	$userName = $password = "";
	$isValid = true;
	$userNameErr = $passwordErr = "";
	$successfulMessage = $errorMessage = "";
	if($_SERVER['REQUEST_METHOD'] === "POST") {
		$userName = $_POST['username'];
		$password = $_POST['password'];
		if(empty($userName)) {
			$userNameErr = "Required!";
			$isValid = false;
		}
		if(empty($password)) {
			$passwordErr = "Required!";
			$isValid = false;
		}
		if($isValid) {
			$userName = test_input($userName);
			$password = test_input($password);

			$response = login($userName,$password);
			if($response) {
				$successfulMessage = "Successfully saved.";
			}
			else {
				$errorMessage = "Error while saving.";
			}
		}
	}
	function write($content) {
			$resource = fopen(filepath, "a");
			$fw = fwrite($resource, $content . "\n");
			fclose($resource);
			return $fw;
	}
	function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LOGIN</title>
</head>
<body>

	<h1>LOG IN</h1>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<fieldset>
			<legend>Log in</legend>

			<label for="username">Username:</label>
			<input type="text" name="username" id="username">
			<span style="color:red"><?php echo $userNameErr; ?></span>

			<br><br>

			<label for="password">Password:</label>
			<input type="password" name="password" id="password">
			<span style="color:red"><?php echo $passwordErr; ?></span>

			<br><br>

			<input type="submit" name="submit" value="LOGIN">
			
		</fieldset>
	</form>

	<p style="color:green;"><?php echo $successfulMessage; ?></p>
	<p style="color:red;"><?php echo $errorMessage; ?></p>

	<br>


</body>
</html>