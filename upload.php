<!DOCTYPE HTML>
<html>
<head>
<title>Reza's Remote Uploader</title>
<style>
	body{text-align:center;}
	
	input{
		width:50%;
		height:3vw;
		margin-bottom:5px;
		}
	
	input::placeholder{font-size:2vw;}
		
	button{
		background-color:#000000;
		color:#ffffff;
		height:5vw;
		font-size:2vw;
		}
</style>

<script>
	console.log("%c%s","color: #ffffff; background: #000000; font-size: 5vw;","Reza's Remote Uploader");
</script>
</head>
<body>
<h1>Reza's Remote Uploader</h1>
	<form method="POST">
		<input name="fileurl" placeholder="Enter URL" /><br>
		<button name="submit" type="submit">Upload</button>
	</form>
</body>
</html>
<?php

set_time_limit (24 * 60 * 60);
if (!isset($_POST['submit'])) die();
$URL = $_POST['fileurl'];
$filename = basename($URL);
$file = fopen ($URL, "rb");
if ($file) {
  $newfile = fopen ($filename, "wb");
  if ($newfile)
  while(!feof($file)) {
    fwrite($newfile, fread($file, 1024 * 8 ), 1024 * 8 );
  }
}
if ($file) {
  fclose($file);
}
if ($newfile) {
  fclose($newfile);
}

?>
