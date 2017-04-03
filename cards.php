<? // we must do calculations before any html if we are to set any cookies.
   // this is because cookies are sent with the header,
   // and anything in the html tag is, by definition, NOT in the header.
	if (isset($_POST['guess'])) {
		$guess = intval($_POST['guess']);
		$suit = rand(0,3);
		$value = rand(1,13);
		if ($value > 11) { $value++; } // unicode includes a nonstandard "knight" card that we must skip over
		$value = $value - 7;
		$correct = (($value > 0) - ($value < 0)) == (($guess > 0) - ($guess < 0)); // check that signs are the same
	
		if ($correct) {
			if(!isset($_COOKIE['hi-lo-wins'])) {
				$win = 1;
				$lose = 0;
				setcookie("hi-lo-wins", 1, time() + 31622400); // set the score cookies;
				setcookie("hi-lo-losses", 0, time() + 31622400); // they expire after 1 leap year.
			} else {
				$win = $_COOKIE['hi-lo-wins'] + 1;
				$lose = $_COOKIE['hi-lo-losses'];
				setcookie("hi-lo-wins", $win, time() + 31622400);
			}
		} else {
			if(!isset($_COOKIE['hi-lo-losses'])) {
				$win = 0;
				$lose = 1;
				setcookie("hi-lo-losses", 1, time() + 31622400);
				setcookie("hi-lo-wins", 0, time() + 31622400);
			} else {
				$win = $_COOKIE['hi-lo-wins'];
				$lose = $_COOKIE['hi-lo-losses'] + 1;
				setcookie("hi-lo-losses", $lose, time() + 31622400);
			}
		}
	}
?>

<!doctype html>
<html>
	<head>
		<style>
			*{font-size:24pt;}
			h1{font-size:200pt;font-weight:400;margin:0;}
		</style>
	</head>
	<body>
		<? if (!isset($_POST['guess'])): ?>
			<h1>🂠</h1>
			<p>is my card greater or less than 7? (aces are low)</p>
			<form action="cards.php" method="post">
				<button type="submit" name="guess" value="-1">less</button>
				<button type="submit" name="guess" value="0">equal</button>
				<button type="submit" name="guess" value="1">greater</button>
			</form>
		<? else:
			echo "<h1>&#" . ($suit * 16 + $value + 127143) . ';</h1>'; // display card
			echo '<p>' . ($correct ? '' : 'in') . 'correct!</p>';
			echo '<p>total score: ' . $win * 100 / ($win + $lose) . '% (' . $win . '/' . ($lose + $win) . ')</p>';
		?>
		<a href="cards.php"><p>try again</p></a>
		<? endif; ?>
	</body>
</html>
