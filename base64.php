<!doctype html>
<html>
	<head>
    <title>base64 encoder/decoder</title>
	</head>
	<body>
		<?
      if (isset($_GET['encode'])) {
			  echo htmlspecialchars($_GET['encode']) . "<br>&darr;</br>" . base64_encode($_GET['encode']);
		  } else if (isset($_GET['decode'])) {
        echo htmlspecialchars($_GET['decode']) . "<br>&darr;</br>" . base64_decode($_GET['decode']);
      }
		?>
    <form action="base64.php" method="get">
      <input type="text" name="encode">
      <input type="submit" value="encode!">
    </form>
    <br>
    <form action="base64.php" method="get">
      <input type="text" name="decode">
      <input type="submit" value="decode!">
    </form>
	</body>
</html>
