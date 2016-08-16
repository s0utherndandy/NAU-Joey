<html>
    <?php
 
if(isset($_POST['eMail'])) {
  
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "toppyv@gmail.com";
    $email_subject = "New Lead - NAU Canada Online";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['firstName']) ||
        !isset($_POST['lastName']) ||
        !isset($_POST['eMail']) ||
        !isset($_POST['phoneNumber']) ||
		!isset($_POST['postalCode']) ||
		!isset($_POST['program'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
    $first_name = $_POST['firstName']; // required
    $last_name = $_POST['lastName']; // required
    $email_from = $_POST['eMail']; // required
    $telephone = $_POST['phoneNumber']; // not required
	$postalCode = $_POST['postalCode']; // not required
	
	$program = $_POST['program']; // not required
     $thankyou = "thankyou.html"; // thank you page

 

 
    $email_message = "Information request.\n\n";
 
     
 
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
 
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
	
	$email_message .= "postalCode: ".clean_string($postalCode)."\n";
	
	$email_message .= "Program: ".clean_string($program)."\n";
	
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
     header("Location: $thankyou");

 ?>
 
 <script>location.replace('<?php echo $thankyou;?>')</script>
 
<?php
 
}
 
?>
</html>
    
  