<?php

$a = '4 rue de la Vacquerie, Paris';

$url = 'http://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($a);

$json = file_get_contents($url);

$array = json_decode($json, true);

$lat = $array['results'][0]['geometry']['location']['lat'];
$lng = $array['results'][0]['geometry']['location']['lng'];

?>


<h3>Latitude : <?=$lat?></h3>
<h3>Longitude : <?=$lng?></h3>
