<?php

spotify();

function spotify() {
    $client_id = "0dbd9ed628d6423aa3afed12f96c88a1";
    $client_secret = "34f08fd7f63d40f7b0ae08683d772f17";




$credentials = base64_encode($client_id . ':' . $client_secret);


$ch = curl_init();


curl_setopt($ch, CURLOPT_URL, "https://accounts.spotify.com/api/token");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Basic ' . $credentials,
    'Content-Type: application/x-www-form-urlencoded'
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'grant_type' => 'client_credentials'
]));


$response = curl_exec($ch);
$token_info = json_decode($response, true);




curl_close($ch);




    $url = 'https://api.spotify.com/v1/users/iperborea/playlists';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token_info['access_token'])); 
    $res=curl_exec($ch);
    curl_close($ch);

    echo $res;


}

?>