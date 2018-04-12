<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "couch.samantha03@gmail.com";
    $email_subject = "RKirk-Contact Us";
	
	function died($error) 
    {
		echo "Sorry, but there were error(s) found with the form you submitted. ";
		echo "These errors appear below.<br /><br />";
		echo $error."<br /><br />";
		echo "Please go back and fix these errors.<br /><br />";
		die();
	}
	
	if(!isset($_POST['fname']) ||
       !isset($_POST['lname']) ||
		!isset($_POST['email']) ||
		!isset($_POST['phone']) ||
		!isset($_POST['message']) || 
		!isset($_POST['AntiSpam'])		
		) 
    {
		died('Sorry, there appears to be a problem with your form submission.');		
	}
	
	$fname = $_POST['fname']; // required
    $lname = $_POST['lname']; // required
	$email = $_POST['email']; // required
	$phone = $_POST['phone']; // not required
	$message = $_POST['message']; // required
	$antispam = $_POST['AntiSpam']; // required
	
	$error_message = "";
	
	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(preg_match($email_exp,$email)==0) {
  	$error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
  if(strlen($fname) < 2) {
  	$error_message .= 'Your Name does not appear to be valid.<br />';
  }
  if(strlen($message) < 2) {
  	$error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  
  if($antispam <> $antispam_answer) {
	$error_message .= 'The Anti-Spam answer you entered is not correct.<br />';
  }
  
  if(strlen($error_message) > 0) {
  	died($error_message);
  }
	$email_message = "Form details below.\r\n";
	
	function clean_string($string) {
	  $bad = array("content-type","bcc:","to:","cc:");
	  return str_replace($bad,"",$string);
	}
	
	$email_message .= "First Name: ".clean_string($fname)."\r\n";
    $email_message .= "Last Name: ".clean_string($lname)."\r\n";
	$email_message .= "Email: ".clean_string($email)."\r\n";
	$email_message .= "Telephone: ".clean_string($phone)."\r\n";
	$email_message .= "Message: ".clean_string($message)."\r\n";
	
// create email headers
$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 
Thank you for contacting us. We will be in touch with you very soon.
 
<?php
}

?>