<?php

$method = $_SERVER['REQUEST_METHOD'];

//Script Foreach
$c = true;

	$project_name = 'roeirubin';
	$admin_email  = 'akumuliation@gmail.com';
	$form_subject = 'Contact';

	foreach ( $_GET as $key => $value ) {
		if ($value != "") {
			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
			<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
			<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
		</tr>
		";
		}
	}

$message = "<table style='width: 100%;'>$message</table>";

function adopt($text) {
	return '=?UTF-8?B?'.base64_encode($text).'?=';
}

$headers = "MIME-Version: 1.0" . PHP_EOL .
"Content-Type: text/html; charset=utf-8" . PHP_EOL .
'From: '.adopt($project_name).' <'.$admin_email.'>' . PHP_EOL .
'Reply-To: '.$admin_email.'' . PHP_EOL;

if(mail($admin_email, adopt($form_subject), $message, $headers )) {
	echo 1;
};
