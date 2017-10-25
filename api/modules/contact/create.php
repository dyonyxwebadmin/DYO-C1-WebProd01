<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

composer();
require_class("contact.php");


$template_path = $_SERVER['DOCUMENT_ROOT']."/sites/_system/v1/messages/mail/mail.html";
$template = file_get_contents($template_path, true);

$template_path = $_SERVER['DOCUMENT_ROOT']."/sites/_system/v1/messages/mail/mail_row.html";
$template_row = file_get_contents($template_path, true);

$data = $_POST['data'];

//print_r($data);

$c = new Contact();
$c->site = $site;
$c->create();

////////////////////////////////////////////////////////////////////////////////////
//
//	Form Data
//
////////////////////////////////////////////////////////////////////////////////////

$data = $_POST['data'];
$data_row = "";

foreach ($data as $items) {
	$c->kv($items["name"], $items["value"]);
    $data_row .= str_replace("%key%", ucwords($items["name"]), $template_row);
    $data_row = str_replace("%value%", ucwords($items["value"]), $data_row);
}

$message = str_replace("%row%", $data_row, $template);

////////////////////////////////////////////////////////////////////////////////////
//
//	Session Details
//
////////////////////////////////////////////////////////////////////////////////////

$entery_url = $_SESSION['ENTERY_URI'];
$referer = $_SESSION['HTTP_REFERER'];
$remote_addr = $_SESSION['REMOTE_ADDR'];
$remote_host = $_SESSION['REMOTE_HOST'];
$session_start_time = $_SESSION['REQUEST_TIME'];
$path = $_SESSION['SESSION_PATH'];
    
$c->kv("entery_url", $entery_url);
$c->kv("referer", $referer);
$c->kv("remote_addr", $remote_addr);
$c->kv("remote_host", $remote_host);
$c->kv("session_start_time", $session_start_time);
$c->kv("path", json_encode($path));

$message = str_replace("%entery_url%", $entery_url, $message);
$message = str_replace("%referer%", $referer, $message);
$message = str_replace("%remote_addr%", $remote_addr, $message);
$message = str_replace("%remote_host%", $remote_host, $message);
$message = str_replace("%session_start_time%", $session_start_time, $message);

////////////////////////////////////////////////////////////////////////////////////
//
//	Broswer Details
//
////////////////////////////////////////////////////////////////////////////////////

$user_browser = get_browser(null, true);
$browser =  $user_browser['browser'];
$version =  $user_browser['version'];
$platform =  $user_browser['platform_description'];
$platform_maker =  $user_browser['platform_maker'];
$device_type =  $user_browser['device_type'];

$c->kv("browser", $browser);
$c->kv("version", $version);
$c->kv("remote_addr", $remote_addr);
$c->kv("platform", $platform);
$c->kv("platform_maker", $platform_maker);
$c->kv("device_type", $device_type);

$message = str_replace("%browser%", $browser, $message);
$message = str_replace("%version%", $version, $message);
$message = str_replace("%platform%", $platform, $message);
$message = str_replace("%platform_maker%", $platform_maker, $message);
$message = str_replace("%device_type%", $device_type, $message);

////////////////////////////////////////////////////////////////////////////////////
//
//	Get To from Config file
//
////////////////////////////////////////////////////////////////////////////////////

$config = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/sites/$site/config.json"), true);
$To = $config['Site']['Config']['Notifications'];

////////////////////////////////////////////////////////////////////////////////////
//
//	PHPMailer 
//
////////////////////////////////////////////////////////////////////////////////////

$mail = new PHPMailer(true);   
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.1and1.com';  // Specify main and backup SMTP servers
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'ryan@block2150.com';                 // SMTP username
    $mail->Password = 'L1f3isg00d';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('no-reply@block2150.com', 'Lead Contact Form');
    $mail->addAddress('block2150@gmail.com', 'Ryan Riley');     // Add a recipient
    $mail->addAddress($To);     // Add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'A New Lead From Your Website - ID# ' . rand(1000, 9999);


    $template = file_get_contents($template_path, true);

    $mail->Body    = $message;
    $mail->AltBody = 'Someone just submitted an form from your website';

    $mail->send();
	echo '{"status":"200","message":"Thank you for your information.  We will contact you shortly."}';
} catch (Exception $e) {
	echo '{"status":"500","message":"'.$mail->ErrorInfo.'"}';
}
exit;

