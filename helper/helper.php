<?php


function baseUrl(){
    return "https://b24-wng29g.bitrix24.com.br/rest/1/ebr4zj3vud07gvdp";
} 

function doRequest($queryUrl, $queryData){


    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $queryUrl,
        CURLOPT_POSTFIELDS => $queryData,
    ));


    $result = curl_exec($curl);
    curl_close($curl);

    if($result)
        return $result;

 }
?>