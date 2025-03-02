<?php
$email = $_REQUEST['email'];
$message = $_REQUEST['msg'];

$to = "vrushabhpatel464@gmail.com";
$cc = "";
// $to = "vrushabhpatel464@gmail.com";
// $cc = "vrushabhpatel363@gmail.com";

// the message
$msg = "Email: " . $email . "\n";
$msg = $msg . "Message: " . $message;
// $msg = $msg . "\n";
// $msg = $msg . "Thank you for contacting us.";
// $msg = $msg . "We will get back to you as soon as possible.";
// $msg = $msg . "Stay tuned for more updates.";
// $msg = $msg . "Thank you.";
// $msg = $msg . "Regards,";
// $msg = $msg . "Team Coza Store";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg, 70);

$subject = "Conatct Us";

// send email
//$flag = mail("vrushabhpatel464@gmail.com", "Test Cron", $msg);
$headers = ""; //"To: " .$to . "\r\n" . "CC: " . $cc;

$flag = mail($to, $subject, $msg, $headers);
if ($_REQUEST) {
  if ($_REQUEST['requested_url']) {
    $url = $_REQUEST['requested_url'];
  } else {
    $url = "index.php";
  }
}
if ($flag) {
  echo "Mail sent successfully";
  header('Location: ' . $url);
  die();
} else {
  echo "Mail not sent";
  header('Location: ' . $url);
  die();
}
// var_dump($flag);

/* $file = 'cron.txt';
  // Open the file to get existing content
  $current = file_get_contents($file);
  // Append a new person to the file
  $current .= "<br/>Run on " . date('Y-m-d H:i:s') . "\n";
  // Write the contents back to the file
  file_put_contents($file, $current);
  echo $current; */
?>