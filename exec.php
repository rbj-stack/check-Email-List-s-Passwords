<?php

require "vendor/autoload.php";
use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version2X;
$version = new Version2X( "http://192.168.33.10:3000" );
$client = new Client($version);



if( isset($_POST['emails']) && !empty( $_POST['emails'] ) ){ 
    $emails =$_POST['emails']; 
    $emails = trim( preg_replace( '/(\r\n)|\n|\r/', ',', $emails ) );

    $result = popen("python /var/www/html/share/checkEmail_node/python/p.py $emails ", "r");
    while($b = fgets($result, 2048)) { 
    // echo $b."<br>\n"; 
    $client->initialize();
    $client->emit( "message" , [ "msg" => $b ] );
    $client->close();

    ob_flush();
    flush(); 
    } 
    pclose($result);
}
