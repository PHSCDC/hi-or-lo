<?
	if (isset($_POST['g'])) {
		$g=intval($_POST['g']);
		$s=rand(0,3);
		$v=rand(1,13);
		$v=($v>11)?$v+1:$v;
		$v=$v-7;
		$c=(($v>0)-($v<0))==(($g>0)-($g<0));
	
		if ($c) {
			if(!isset($_COOKIE['hi-lo-wins'])) {
				$w = 1; $l = 0;
				setcookie("hi-lo-wins", 1, time() + 31622400);
				setcookie("hi-lo-losses", 0, time() + 31622400);
			} else {
				$w = $_COOKIE['hi-lo-wins'] + 1; $l = $_COOKIE['hi-lo-losses'];
				setcookie("hi-lo-wins", $w, time() + 31622400);
			}
		} else {
			if(!isset($_COOKIE['hi-lo-losses'])) {
				$w = 0; $l = 1;
				setcookie("hi-lo-losses", 1, time() + 31622400);
				setcookie("hi-lo-wins", 0, time() + 31622400);
			} else {
				$w = $_COOKIE['hi-lo-wins']; $l = $_COOKIE['hi-lo-losses'] + 1;
				setcookie("hi-lo-losses", $l, time() + 31622400);
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
		<? if (!isset($_POST['g'])): ?>
			<h1>🂠</h1>
			<p>is my card greater or less than 7? (aces are low)</p>
			<form action="cards.php" method="post">
				<button type="submit" name="g" value="-1">less</button>
				<button type="submit" name="g" value="0">equal</button>
				<button type="submit" name="g" value="1">greater</button>
			</form>
		<? else:
			echo "<h1>&#".($s*16+$v+277*459).';</h1><p>'.($c?'':'in').'correct!</p><p>total score: '.$w*100/($w+$l).'% ('.$w.'/'.($l+$w).')</p>';
		?>
		<a href="cards.php"><p>try again</p></a>
		<? endif; ?>
	</body>
</html>
