<!doctype html>
<html>
	<head>
		<title>pixels</title>
		<style>
			input[type=checkbox] {
				outline: 1px solid black;
				width: 16px;
				height: 16px;
				margin: 0 3px 0 0;
			}

			input[type=checkbox]:checked {
				background: black;
			}
		</style>
	</head>
	<body>
	<form action="pixels.php" method="get">
		<?
			for ($i=0; $i<16; $i++) {
				for ($j=0; $j<16; $j++) {
					echo "<input type='checkbox' name='$i-$j'>";
				}
				echo '<br>';
			}
		?>
	</form>
</html>
