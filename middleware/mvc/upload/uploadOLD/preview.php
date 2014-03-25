<?php
session_start();
	if(!isset($_SESSION['ooyala']))
	header("Location: ../index.php?section=login");
?>

<script src='//player.ooyala.com/v3/<?php echo $_GET['playerid'] ?>'></script>
<div id='ooyalaplayer' style='width:1024px;height:576px'>
</div><script>OO.ready(function() { OO.Player.create('ooyalaplayer', '<?php echo $_GET['embed_code'] ?>'); });</script>
<noscript>

<div>Please enable Javascript to watch this video</div></noscript>