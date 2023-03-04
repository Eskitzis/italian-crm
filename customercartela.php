<!DOCTYPE html>
<html>
<head>
	<title>Other Page</title>
</head>
<body>
	<h1>Welcome to the other page!</h1>

	<?php
		if(isset($_GET['id'])) {
			$id = $_GET['id'];
			echo "<p>ID: $id</p>";
		}
	?>
</body>
</html>