<?php
$errors = '';
$myemail = '';//<-----Put Your email address here.
if(empty($_POST['first_name'])  ||
   empty($_POST['email']))
{
    $errors .= "\n Error: all fields are required";
}
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email_address = $_POST['email'];
$mobile_number = $_POST['mobile'];
$landline_number = $_POST['landline'];
$uniform_type = $_POST['uniform_type'];
$comment = $_POST['comment'];

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Error: Invalid email address";
    header('Location: ../Webpages/contact-form-error.html');

}
if(!isset($_POST['uniform_type']))
{
$errors .= "<li>You forgot to select the type of the Uniform you require!</li>";
header('Location: ../Webpages/contact-form-selecterror.html');
}

if( empty($errors))
{
$to = $myemail;
$email_subject = "Contact form submission: $name";
$email_body = "You have received a new message. ".
" Here are the details:\n Name: $first_name $last_name \n ".
"Email: $email_address\n Mobile No.: $mobile_number \n Landline No.: $landline_number \n Type of Uniforms required : $uniform_type \n Comment : $comment";
$headers = "From: $myemail\n";
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
//redirect to the 'thank you' page
header('Location: ../Webpages/contact-form-thankyou.html');
}
?>
