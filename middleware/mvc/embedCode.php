<?php
extract($_GET);


$listAux=explode(",",$playlists);
$count=count($listAux);
$list="";
for($i=0; $i<$count-1; $i++) {
	$list.='"'.$listAux[$i].'",';
}
$list.='"'.$listAux[$count-1].'"';


echo htmlentities("<div id=\"playerContainer\" ></div>")."<br>";
echo htmlentities("<script type=\"text/javascript\" src=\"https://player.ooyala.com/v3/$player\"></script>")."<br>";
echo htmlentities("<script type=\"text/javascript\">")."<br>";
echo htmlentities("var ooyalaPlayer;")."<br>";

echo htmlentities("OO.ready(function() {")."<br>";
    echo htmlentities("var playerConfiguration = {")."<br>";
    if($playlists!="null") {
    	echo htmlentities("playlistsPlugin: {\"data\":[".$list."]},")."<br>";
    }

    echo htmlentities("height: '".$height."',")."<br>";
    echo htmlentities("width: '".$width."'")."<br>";
    echo htmlentities("};")."<br>";

    echo htmlentities("ooyalaPlayer = OO.Player.create('playerContainer', '".$embed_code."', playerConfiguration);")."<br>";
 echo htmlentities("});")."<br>";

echo htmlentities("</script>")."<br>";
?>