0

<?
	$fh = fopen ("counter.php", "r+");
	flock ($fh, LOCK_EX);
        $page = explode ("\n", file_get_contents (glob ("counter.php")[0]));
        $page[0] = $page[0] + 1;
	fwrite ($fh, implode("\n",$page));
	flock ($fh, LOCK_UN);
	fclose ($fh);
?>
