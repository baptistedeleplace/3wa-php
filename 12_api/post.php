<?php

$url = 'http://5inq.fr/3wa/chatroom/api/addMessage.php';

$ch = curl_init();

$fields = array(
	'nickname' => 'test',
	'message' => 'mcspam',
);

$postfields = '';
foreach($fields as $key=>$value) { $postfields .= $key.'='.$value.'&'; }

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, count($fields));
curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

print "curl response is : " . $response;

curl_close ($ch);


