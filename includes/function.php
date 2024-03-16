<?php
function convert_string($action, $string)
{
	$output = '';
	$encrypt_method = 'AES-256-CBC';
	$secret_key = 'eaiYYkYTysia2lnHiw0N0vx7t7a3kEJVLfbTKoQIx5o=';
	$secret_iv = 'eaiYYkYTysia2lnHiw0n0';
	$key = hash('sha256', $secret_key);
	$initialization_vector = substr(hash('sha256', $secret_iv), 0, 16);
	
	if($string != '')
	{
		if($action == 'encrypt')
		{
			$output = openssl_encrypt($string, $encrypt_method, $key, 0, $initialization_vector);
			$output = base64_encode($output);
		}
		if($action == 'decrypt')
		{
			$output = base64_decode($string);
			$output = openssl_decrypt($output, $encrypt_method, $key, 0, $initialization_vector);
		}
	}
	return $output;
}

//if (isset($_POST['as'])) {
//	
//	echo convert_string('encrypt', $_POST["b1"]);
//	echo "<br>";
//	echo convert_string('encrypt', $_POST["b2"]);
//	$ax1 = convert_string('encrypt', $_POST["b1"]);
//	$ax2 = convert_string('encrypt', $_POST["b2"]);
//	echo "<br>";
//	$sub_array = array();
//	$sub_array[] = convert_string('decrypt', $ax1);
//	$sub_array[] = convert_string('decrypt', $ax2);
//	print_r ($sub_array[0]);
//	echo "<br>";
//	print_r ($sub_array[1]);
//}
?> 