<?php
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
	$ipaddress = 'UNKNOWN';

    echo $preopen = '<pre>';
    echo $textip = 'Your IP is:  ';
    echo $ipaddress;
    echo "<br><br>";

    $ptr = gethostbyaddr($ipaddress);
    echo $textptr = 'Your PTR is: ';
    echo $ptr;
    echo "<br><br>";

    echo $linklist = '<a href="http://ip.v4.sapia.cc">IPv4 only</a> | <a href="http://ip.v6.sapia.cc">IPv6 only</a> | <a href="http://ip.sapia.cc">Both</a>';
    echo $preclose = '</pre>';
?>
