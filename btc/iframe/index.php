<?php 
// getting the top videos
$topVideos = file_get_contents('http://api.ooyala.com/v2/syndications/2f4b0f9af8e14af89c5226bae424b377/feed?pcode=1ubnYxOoF99_CT3iaac5njeBKs9U');
$topVideos = preg_replace('/&[^; ]{0,6}.?/e', "((substr('\\0',-1) == ';') ? '\\0' : '&amp;'.substr('\\0',1))", $topVideos);
$topVideos =simplexml_load_string($topVideos);

$nextVideos = file_get_contents('http://api.ooyala.com/v2/syndications/83389123953649d9965065e2607ff806/feed?pcode=1ubnYxOoF99_CT3iaac5njeBKs9U');
$nextVideos = preg_replace('/&[^; ]{0,6}.?/e', "((substr('\\0',-1) == ';') ? '\\0' : '&amp;'.substr('\\0',1))", $nextVideos);
$nextVideos =simplexml_load_string($nextVideos);

//Setting URLs
$urls=array();
$urls[0]=array()

// echo "<pre>";
// print_r($topVideos);
// print_r($nextVideos);
// echo "</pre>";
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>BTC</title>
	</head>
	<body>

	<!-- begin BTC iframe -->
		<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	    <link rel="stylesheet" type="text/css" href="css/BTCstyle.css" />
	    <link href='http://fonts.googleapis.com/css?family=Permanent+Marker' rel='stylesheet' type='text/css'>
		<div class="container">
			<div class="header">
				<div class="social">
					<div class="fb"></div>
					<div class="tweeter"></div>
					<div class="follow">Follow</div>
				</div>
			</div>
			<div class="top">
				<?php for ($i=0; $i<=1; $i++) { ?>
				<div class="videoTop">
					<div class="picT">
						<img src="<?php echo $topVideos->item[$i]->preview; ?>" width="315">
					</div>
					<div class="descT">
						<span class="Torange"><?php echo $topVideos->item[$i]->title; ?></span><br>
						<span class="Tblack"><?php echo $topVideos->item[$i]->description; ?></span>
					</div>
				</div>
				<?php } ?>

			</div>
			<div class="middle">
				<div class="videoM">
					<div class="picM">
						<img src="<?php echo $nextVideos->item[0]->preview; ?>" width="220">
					</div>
					<div class="descM">
						<span class="Torange"><?php echo $nextVideos->item[0]->title; ?></span><br>
						<span class="Tblack"><?php echo $nextVideos->item[0]->description; ?></span>
					</div>
				</div>
				<div class="videoM">
				</div>
				<div class="videoM">
					<div class="picM">
						<img src="<?php echo $nextVideos->item[1]->preview; ?>" width="220">
					</div>
					<div class="descM">
						<span class="Torange"><?php echo $nextVideos->item[1]->title; ?></span><br>
						<span class="Tblack"><?php echo $nextVideos->item[1]->description; ?></span>
					</div>
				</div>
			</div>
			<div class="bottom">
				<?php for ($i=2; $i<=7; $i++) { ?>
				<div class="videoB">
					<div class="picB">
						<img src="<?php echo $nextVideos->item[$i]->preview; ?>" width="220">
					</div>
					<div class="descB">
						<span class="Torange"><?php echo $nextVideos->item[$i]->title; ?></span><br>
						<span class="Tblack"><?php echo $nextVideos->item[$i]->description; ?></span>
					</div>
				</div>
				<?php } ?>
			</div>
			
		</div>
	<!-- End BTC Widget -->


	</body>
</html>