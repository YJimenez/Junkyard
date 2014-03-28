<?php 
// getting the top videos
$topVideos = file_get_contents('http://api.ooyala.com/v2/syndications/2f4b0f9af8e14af89c5226bae424b377/feed?pcode=1ubnYxOoF99_CT3iaac5njeBKs9U');
$topVideos = preg_replace('/&[^; ]{0,6}.?/e', "((substr('\\0',-1) == ';') ? '\\0' : '&amp;'.substr('\\0',1))", $topVideos);
$topVideos =simplexml_load_string($topVideos);

$nextVideos = file_get_contents('http://api.ooyala.com/v2/syndications/83389123953649d9965065e2607ff806/feed?pcode=1ubnYxOoF99_CT3iaac5njeBKs9U');
$nextVideos = preg_replace('/&[^; ]{0,6}.?/e', "((substr('\\0',-1) == ';') ? '\\0' : '&amp;'.substr('\\0',1))", $nextVideos);
$nextVideos =simplexml_load_string($nextVideos);

//settings urls
//url top
for($i=0; $i<=1; $i++) {
	$urlTop[$i]=preg_replace("/[^A-Za-z0-9 ]/", "", $topVideos->item[$i]->title);
	$urlTop[$i]=preg_replace("/ /", "-", $urlTop[$i]);
	$urlTop[$i]="/beyond-the-comics-".strtolower($urlTop[$i]);
}
//url Next
for($i=0; $i<=7; $i++) {
	$urlNext[$i]=preg_replace("/[^A-Za-z0-9 ]/", "", $nextVideos->item[$i]->title);
	$urlNext[$i]=preg_replace("/ /", "-", $urlNext[$i]);
	$urlNext[$i]="/beyond-the-comics-".strtolower($urlNext[$i]);
}

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
		<script type="text/javascript">
			function MM_jumpMenu(targ,selObj,restore){ //v3.0
			  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
			  if (restore) selObj.selectedIndex=0;
			}
		</script>
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
				<div class="browse">
					<select class="menuA" id="menuA" onchange="MM_jumpMenu('parent',this,0)">
						<option>Browse</option>
						<?php for ($i=0; $i<=1; $i++) { ?>
						<option value="<?php echo $urlTop[$i]; ?>"><?php echo $topVideos->item[$i]->title; ?></option>
						<?php } ?>
						<?php for ($i=0; $i<=7; $i++) { ?>
						<option value="<?php echo $urlNext[$i]; ?>"><?php echo $nextVideos->item[$i]->title; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="top">
				<?php for ($i=0; $i<=1; $i++) { ?>
				<div class="videoTop">
					<div class="picT">
						<a href="<?php echo $urlTop[$i]; ?>">
							<img src="<?php echo $topVideos->item[$i]->preview; ?>" width="315">
						</a>
					</div>
					<div class="descT">
						<a href="<?php echo $urlTop[$i]; ?>">
							<span class="Torange"><?php echo $topVideos->item[$i]->title; ?></span><br>
							<span class="Tblack"><?php echo $topVideos->item[$i]->description; ?></span>
						</a>
					</div>
				</div>
				<?php } ?>

			</div>
			<div class="middle">
				<div class="videoM">
					<div class="picM">
						<a href="<?php echo $urlNext[0]; ?>">
							<img src="<?php echo $nextVideos->item[0]->preview; ?>" width="220">
						</a>
					</div>
					<div class="descM">
						<a href="<?php echo $urlNext[0]; ?>">
							<span class="Torange"><?php echo $nextVideos->item[0]->title; ?></span><br>
							<span class="Tblack"><?php echo $nextVideos->item[0]->description; ?></span>
						</a>
					</div>
				</div>
				<div class="videoM">
				</div>
				<div class="videoM">
					<div class="picM">
						<a href="<?php echo $urlNext[1]; ?>">
							<img src="<?php echo $nextVideos->item[1]->preview; ?>" width="220">
						</a>
					</div>
					<div class="descM">
						<a href="<?php echo $urlNext[1]; ?>">
							<span class="Torange"><?php echo $nextVideos->item[1]->title; ?></span><br>
							<span class="Tblack"><?php echo $nextVideos->item[1]->description; ?></span>
						</a>
					</div>
				</div>
			</div>
			<div class="bottom">
				<?php for ($i=2; $i<=7; $i++) { ?>
				<div class="videoB">
					<div class="picB">
						<a href="<?php echo $urlNext[$i]; ?>">
							<img src="<?php echo $nextVideos->item[$i]->preview; ?>" width="220">
						</a>
					</div>
					<div class="descB">
						<a href="<?php echo $urlNext[$i]; ?>">
							<span class="Torange"><?php echo $nextVideos->item[$i]->title; ?></span><br>
							<span class="Tblack"><?php echo $nextVideos->item[$i]->description; ?></span>
						</a>
					</div>
				</div>
				<?php } ?>
			</div>
			<div class="footer">
				<div class="browse">
					<select class="menuB" id="menuB" onchange="MM_jumpMenu('parent',this,0)">
						<option>Browse All</option>
						<?php for ($i=0; $i<=1; $i++) { ?>
						<option value="<?php echo $urlTop[$i]; ?>"><?php echo $topVideos->item[$i]->title; ?></option>
						<?php } ?>
						<?php for ($i=0; $i<=7; $i++) { ?>
						<option value="<?php echo $urlNext[$i]; ?>"><?php echo $nextVideos->item[$i]->title; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="copy">
					<span>copyright © 2014 Beyond the Comics</span>
				</div>
			</div>
			
		</div>
	<!-- End BTC Widget -->


	</body>
</html>