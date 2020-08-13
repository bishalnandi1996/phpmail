<?php

$message=$_POST['frmMsg'];

#sending the mail
$boundary = md5(time());
$to = 'bishalnandi1996@gmail.com'; #update the mail where you want to send the mail
$subject = 'PHP Mail Script';
$headers = 'From: '.$_POST['frmEmail']. "\r\n" ;
$headers.= 'Reply-To: '.$_POST['frmEmail'] . "\r\n" ;
$headers.= "CC: \r\n";
$headers.= "BCC: \r\n";
$headers.= 'X-Mailer: PHP/' . phpversion()."\n";
$headers.= "MIME-Version: 1.0\r\n";
$headers.= "Content-Type: multipart/mixed; boundary = $boundary\r\n"; 
$headers.="X-Priority: 3";

$body = "--$boundary\r\n";
$body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
$body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
$body .= chunk_split(base64_encode($message));


$encoded_content='';
if(isset(_FILES['frmZipFile'])) {
	$attachments = $_FILES['frmZipFile'];

	//get file info
	$file_name = $attachments['name'];
	$file_size = $attachments['size'];
	$file_type = $attachments['type'];


	//read file 
	$handle = fopen($attachments['tmp_name'], "r");
	$content = fread($handle, $file_size);
	fclose($handle);
	$encoded_content = chunk_split(base64_encode($content));
}

$body .= "--$boundary\r\n";
$body .="Content-Type: $file_type; name=".$file_name."\r\n";
$body .="Content-Disposition: attachment; filename=".$file_name."\r\n";
$body .="Content-Transfer-Encoding: base64\r\n";
$body .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n"; 
$body .= $encoded_content;

mail($to, $subject, $body, $headers);


#page redirection
$url="Location: index.php?status=1";
header($url,true,301);

?>
