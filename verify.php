<?php

$data = json_decode(file_get_contents("php://input"), true);

$userId = $data["userId"];
$zoneId = $data["zoneId"];

$member_code = "M260310AKFYICJ4JF";
$secret_key = "f746cf23b9391e7556ea2669fb95399a";

/* generate signature */

$sign = md5($member_code.$userId.$zoneId.$secret_key);

/* Lio API */

$url = "https://api.liogames.com/v1/verify";

$post = [

"member_code"=>$member_code,
"user_id"=>$userId,
"zone_id"=>$zoneId,
"sign"=>$sign

];

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_POSTFIELDS,$post);

$response = curl_exec($ch);

echo $response;

?>