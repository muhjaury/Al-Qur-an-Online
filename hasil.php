<?php

$tmp = $_GET['id'];
$url = 'https://al-quran-8d642.firebaseio.com/data.json?print=pretty';

	$opts = array(
		'http'=>array(
	  		'method'=>"GET"
		)
	);
	$context = stream_context_create($opts);
	$file = file_get_contents($url, false, $context);
	$parsedata = json_decode($file, TRUE);
	foreach ($parsedata as $data) {
		if ($data['nomor'] == $tmp) {
			echo '

			<h5>'.$data['nama'].'</h5>
			<h5>Jumlah Ayat : '.$data['ayat'].'</h5>
			<p>Keterangan : '.$data['keterangan'].'</p>
			<br><audio src="'.$data['audio'].'" controls autoplay><br>
			

			';
		}
	}

?>
