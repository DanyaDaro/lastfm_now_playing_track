<?php
    $apiKey = ""; // insert here your apikey
    $user = "detma";
    $url = "http://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=".$user."&api_key=".$apiKey."&format=json";
    if ($curl = curl_init()) {
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $request = curl_exec($curl);
        curl_close($curl);
    }
    $recentTracks = json_decode($request, true);
    $now = $recentTracks['recenttracks']['track'][0]['@attr']['nowplaying'];
    $artist = $recentTracks['recenttracks']['track'][0]['artist']['#text'];
    $song = $recentTracks['recenttracks']['track'][0]['name'];
    if ($now) {
        echo "<img src=\"music.gif\">".$artist." - ".$song;
    }
?>
