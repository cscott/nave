<?php
// create a new cURL resource
$ch = curl_init();
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
curl_setopt($ch, CURLOPT_TIMEOUT, 120);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
#curl_setopt($ch, CURLOPT_ENCODING, '');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);

// set URL and other appropriate options
for ($i=1; $i<$argc; ) {
    $text = $argv[$i++];
    #error_log($text);
    if ($text === '-H') {
        curl_setopt($ch, CURLOPT_USERAGENT, $argv[$i++]);
    } elseif ($text === '-#Lf') {
        /* ignore */
    } else {
        curl_setopt($ch, CURLOPT_URL, $text);
    }
}

// grab URL and pass it to the browser
curl_exec($ch);

// close cURL resource, and free up system resources
curl_close($ch);
