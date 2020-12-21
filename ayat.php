<?php

$tmp = $_GET['id'];
$url = 'https://al-quran-8d642.firebaseio.com/surat/'.$tmp.'.json?print=pretty';

	$opts = array(
		'http'=>array(
	  		'method'=>"GET"
		)
	);
	$context = stream_context_create($opts);
	$file = file_get_contents($url, false, $context);
	$parsedata = json_decode($file, TRUE);
	foreach ($parsedata as $data) {
		echo '

			<p><strong>'.$data['nomor'].' </strong> '.$data['ar'].'</p>
			<p>'.$data['tr'].'</p>
			<p>Arti : '.$data['id'].'</p><br>
			

			';
	}

?>
