 <?php
    $lsCall = 'https://api.openweathermap.org/data/2.5/weather?q=London,uk&appid=c8d6ec670cc55b560282dcadbcd402cd';
    $laData = array(
        "nom" => "Kane",
        "prenom" => "Abdou",
        "ecole" => array('Dakar' => 'Lycéé Lamine Gueye',
                        "Thies"  => 'Ut'));
    var_dump($laData['ecole']['Dakar']);
    
    $loCurl = curl_init();
    curl_setopt($loCurl, CURLOPT_URL, $lsCall);
    curl_setopt($loCurl, CURLOPT_POST, true);
    curl_setopt($loCurl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($loCurl, CURLOPT_COOKIESESSION, true);
    $lsResponse = curl_exec($loCurl);
 //var_dump($lsResponse);
    if (preg_match("/200/", $lsResponse)) {
        $lsOk = 'ok';
        $laData = json_decode($lsResponse,true);
    }else  if (preg_match("/401/", $lsResponse)){
        $lsOk = 'Error';
    }else {
        $lsOk = 'ko';
    }
 //var_dump($laData['main']['temp']);
    curl_close($loCurl);

 ?>