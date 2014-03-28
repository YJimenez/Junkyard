<?php
echo $_GET["callback"];
$xml = file_get_contents('http://api.ooyala.com/v2/syndications/bcc93d2c8b1b44bb957be581492a84bb/feed?pcode=1ubnYxOoF99_CT3iaac5njeBKs9U');
$xml = preg_replace('/(<fullname>.+?)+(<\/fullname>)/i', '', $xml); 
$xml = preg_replace('/(<name>.+?)+(<\/name>)/i', '', $xml); 
$xml=simplexml_load_string($xml);

$tamano=sizeof($xml)-1;

$numero=rand(0,$tamano);

?>
(
{
    "dato": "<?php echo $xml->item[$numero]->title;?>",
    "embed": "<?php echo $xml->item[$numero]->embedCode;?>",
    "preview": "<?php echo $xml->item[$numero]->preview;?>"
}
);