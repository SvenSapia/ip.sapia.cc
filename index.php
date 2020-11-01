<?php
	/*Get ip address from HTTP header */
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

    	/*Lookup ptr record*/
	$ptr = gethostbyaddr($ipaddress);
	if ($ptr == $ipaddress)
		$ptr = 'not configured';
	else if (empty($ptr))
		$ptr = 'unknown';

	/*Print a readable output for curl/wget requests*/	
	if (isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/^(curl|wget)/i', $_SERVER['HTTP_USER_AGENT'])) {
		echo 'Your IP is: ';
		echo $ipaddress;
		echo ' and your PTR: ';
		echo $ptr;
		echo  "\n";
	}

	/*Print a nicer output for normal browsers*/
	else {
    		echo '<pre>';
	    	echo 'Your IP is:  ';
	    	echo $ipaddress;
	    	echo "<br><br>";
	
	    	echo 'Your PTR is: ';
	    	echo $ptr;
	    	echo "<br><br>";

	    	echo  '<a href="http://ip.v4.sapia.cc">IPv4 only</a> | <a href="http://ip.v6.sapia.cc">IPv6 only</a> | <a href="http://ip.sapia.cc">Both</a>';
	    	echo  '</pre>';
	}
?>
