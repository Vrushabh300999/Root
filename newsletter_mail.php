<?php
$email = $_REQUEST['email'];

$to = "vrushabhpatel464@gmail.com";
$cc = "";
// $to = "vrushabhpatel464@gmail.com";
// $cc = "vrushabhpatel363@gmail.com";

// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg, 70);

$subject = "Beta test mail";

// send email
//$flag = mail("vrushabhpatel464@gmail.com", "Test Cron", $msg);
$headers = $email . "\r\n" . "CC: " . $cc;

$flag = mail($to, $subject, $msg, $headers);
if ($flag) {
  echo "Mail sent successfully";
  header("Location:index.php");
} else {
  echo "Mail not sent";
  header("Location:index.php");
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