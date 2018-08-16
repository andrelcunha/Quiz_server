<?php

//$url = "https://api.expresso.pr.gov.br/Login";

$name =  '"'."luiscunha".'"';
$password = '"'."An3wl3v3l".'"' ;
$string = 'id=1&params={"user":' . $name . ',"password":' . $password . '}';
echo $string;
function nxs_cURLTest($url, $msg, $testText){  
    $ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_WHATEVER);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER, TRUE); // --data-binary
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Accept: application/json"));
    curl_setopt($ch, CURLOPT_POSTFIELDS,  $string);
    $verbose = fopen('php://temp', 'w+');
    $result = curl_exec($ch);
    $errmsg = curl_error($ch); 
    $cInfo = curl_getinfo($ch); 
    curl_close($ch); 
    echo "<br />Testing ... ".$url." - ".$cInfo['url']."<br />";
    if (stripos($result, $testText)!==false) 
      echo "....".$msg." - OK<br />"; 
    else 
    { 
        echo "....<b style='color:red;'>".$msg." - Problem</b><br /><pre>"; 
        print_r($errmsg); 
        print_r($cInfo); 
        print_r(htmlentities($result)); 
        echo "</pre>There is a problem with cURL. You need to contact your server admin or hosting provider.<br />";
      }
      rewind($verbose);
    $verboseLog = stream_get_contents($verbose);
    echo "<br />Verbose output:</br />";
    echo "<pre>", htmlspecialchars($verboseLog), "</pre>";    
}
nxs_cURLTest("https://api.expresso.pr.gov.br/Login", "teste", "teste 123");

?>