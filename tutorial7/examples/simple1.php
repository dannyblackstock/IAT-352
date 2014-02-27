<?php 
                                                                        
	$xml = simplexml_load_file("example1.xml");                                           

	print_r($xml); 
	$login = $xml->login; 

	echo "<br/>";
	echo "Login name: " . $login; 

?> 