<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "mail@vedaayurvedaclinic.com,rhlrjn2202@gmail.com";
    $email_subject = "New Enquiry/Quotation From Aenon Technologies";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        died();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['form_name']) ||
        !isset($_POST['form_email']) ||
        !isset($_POST['date']) ||
        !isset($_POST['time']) ||
        !isset($_POST['selectmenu']) ||
        !isset($_POST['form_phone']))
        !isset($_POST['form_message']) ||
         {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $form_name = $_POST['form_name']; // required
    $form_email = $_POST['form_email']; // required
    $date = $_POST['date']; // required
    $time = $_POST['time']; // not required
    $selectmenu = $_POST['selectmenu']; // required
    $form_phone = $_POST['form_phone']; // required
    $form_message = $_POST['form_message']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Your Name: ".clean_string($form_name)."\n";
    $email_message .= "Your Email: ".clean_string($form_email)."\n";
    $email_message .= "Date: ".clean_string($date)."\n";
    $email_message .= "Time: ".clean_string($time)."\n";
    $email_message .= "Select Service: ".clean_string($selectmenu)."\n";
    $email_message .= "Phone: ".clean_string($form_phone)."\n";
    $email_message .= "Your Message: ".clean_string($form_message)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 
Thank you for contacting us. We will be in touch with you very soon.
 
<?php
 
}
?>
