<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
//
// ajax call to: /api/contact/add
//


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

composer();
require_class("contact.php");


$template_path = $_SERVER['DOCUMENT_ROOT']."/sites/$site/messages/mail/mail_contact.html";
$template_path_row = $_SERVER['DOCUMENT_ROOT']."/sites/$site/messages/mail/mail_contact_row.html";

if (!file_exists($template_path)) {
    $template_path = $_SERVER['DOCUMENT_ROOT']."/sites/_system/v1/messages/mail/mail_contact.html";
    $template_path_row = $_SERVER['DOCUMENT_ROOT']."/sites/_system/v1/messages/mail/mail_contact_row.html";
}

$template = file_get_contents($template_path, true);

$template_row = "";
if (file_exists($template_path)) {
    $template_row = file_get_contents($template_path_row, true);
}

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

if(isset($_POST['g-recaptcha-response']))
{
	$captcha = $_POST['g-recaptcha-response'];
	if("" == trim($captcha))
	{
		echo '{"status":"500","message":"Please check the the captcha form"}';
		exit;
	}

	$secretKey = $config['Site']['reCAPTCHA']['secret']; //This must be read from config file
	$ip = $_SERVER['REMOTE_ADDR'];
	$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
	$responseKeys = json_decode($response,true);
	if(intval($responseKeys["success"]) !== 1)
	{
		//This user was not verified by recaptcha.
		echo '{"status":"500","message":"Please check the the captcha form"}';
		exit;
	}
}



$data = $_POST['data'];
$data_row = "";

//TODO: Find better way!
foreach ($data as $items) {
	$c->kv($items["name"], $items["value"]);

	if(empty(trim($items["value"]))) continue;

	if($items["name"] == 'name' || 
		$items["name"] == 'email' || 
		$items["name"] == 'phone' ||
		$items["name"] == 'tellusaboutyou' || 
		$items["name"] == 'solution' || 
		$items["name"] == 'services' || 
		$items["name"] == 'zip' ||
		$items["name"] == 'liketohelp')
	{
		$data_row .= str_replace("%key%", ucwords($items["name"]), $template_row);
		$data_row = str_replace("%value%", ucwords($items["value"]), $data_row);
	}
}

$message = str_replace("%row%", $data_row, $template);

////////////////////////////////////////////////////////////////////////////////////
//
//	Session Details
//
////////////////////////////////////////////////////////////////////////////////////

$entery_url = $_SESSION['ENTERY_URI'];
$referer = $_SESSION['HTTP_REFERER'];

$remote_addr = '';
if ($_SERVER['HTTP_CLIENT_IP'])
    $remote_addr = $_SERVER['HTTP_CLIENT_IP'];
else if($_SERVER['HTTP_X_FORWARDED_FOR'])
    $remote_addr = $_SERVER['HTTP_X_FORWARDED_FOR'];
else if($_SERVER['HTTP_X_FORWARDED'])
    $remote_addr = $_SERVER['HTTP_X_FORWARDED'];
else if($_SERVER['HTTP_FORWARDED_FOR'])
    $remote_addr = $_SERVER['HTTP_FORWARDED_FOR'];
else if($_SERVER['HTTP_FORWARDED'])
    $remote_addr = $_SERVER['HTTP_FORWARDED'];
else if($_SERVER['REMOTE_ADDR'])
    $remote_addr = $_SERVER['REMOTE_ADDR'];
else
    $remote_addr = 'UNKNOWN';
 

//$remote_addr = $_SESSION['REMOTE_ADDR'];
$remote_host = $_SESSION['REMOTE_HOST'];
$http_host = $_SERVER['HTTP_HOST'];
$session_start_time = $_SESSION['REQUEST_TIME'];
$path = $_SESSION['SESSION_PATH'];
    
$c->kv("entery_url", $entery_url);
$c->kv("referer", $referer);
$c->kv("remote_addr", $remote_addr);
$c->kv("remote_host", $remote_host);
$c->kv("session_start_time", $session_start_time);
$c->kv("path", json_encode($path));

$notification_to_address = "";

//TODO: Find better way!
foreach ($data as $items) 
{
	if($items["name"] == 'name' || 
		$items["name"] == 'email' || 
		$items["name"] == 'phone' || 
		$items["name"] == 'subject' || 
		$items["name"] == 'message' ||
		$items["name"] == 'notification_to_address')
	{
		if($items["name"] == 'email') 
		{
			$contact_email = ucwords($items["value"]);
		}

		if($items["name"] == 'notification_to_address') 
		{
			$notification_to_address = ucwords($items["value"]);
		}

		if(!empty(trim($items["value"])))
		{
			$message = str_replace('%'. $items["name"] . '_c%', 'show', $message);
		}
		
		$message = str_replace('%'.$items["name"].'%', ucwords($items["value"]), $message);
	}
}

$message = str_replace('%phone_c%', 'display: none;', $message);
$message = str_replace('%subject_c%', 'display: none;', $message);


/*$message = str_replace("%name%", $data["name"], $message);
$message = str_replace("%email%", $data["email"], $message);
$message = str_replace("%phone%", $data["phone"], $message);
$message = str_replace("%subject%", $data["subject"], $message);
$message = str_replace("%message%", $data["message"], $message);*/

$existing_contact = 'visited-no-corporate';
//check kv_emailpivot for email exists or not
if($c->kv_emailpivot($contact_email) > 1)
{
	$existing_contact = 'visited-yes-corporate';
}
$message = str_replace("%existing_contact%", $existing_contact, $message);



$message = str_replace("%entery_url%", $entery_url, $message);
$message = str_replace("%referer%", $referer, $message);
$message = str_replace("%remote_addr%", $remote_addr, $message);
$message = str_replace("%remote_host%", $remote_host, $message);
$message = str_replace("%http_host%", $http_host, $message);
$message = str_replace("%session_start_time%", $session_start_time, $message);

////////////////////////////////////////////////////////////////////////////////////
//	Geo Location based on IP Address
//  http://www.splessons.com/geo-location-based-on-ip-address-with-php-jquery/
//
////////////////////////////////////////////////////////////////////////////////////
$location = json_decode(file_get_contents('http://freegeoip.net/json/'.$remote_addr));
$return_values = array();
 
$return_values["ip"]=$location->ip;
$return_values["country_code"]=$location->country_code;
$return_values["country_name"]=$location->country_name;
$return_values["region_code"]=$location->region_code;
$return_values["region_name"]=$location->region_name;
 
$return_values["city"]=$location->city;
$return_values["zipcode"]=$location->zipcode;
 
$return_values["latitude"]=$location->latitude;
$return_values["longitude"]=$location->longitude;
$return_values["metro_code"]=$location->metro_code;
$return_values["area_code"]=$location->area_code;

$message = str_replace("%latitude%", $return_values["latitude"], $message);
$message = str_replace("%longitude%", $return_values["longitude"], $message);
$message = str_replace("%city%", $return_values["city"], $message);
$message = str_replace("%region_name%", $return_values["region_name"], $message);

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
$message = str_replace("%sitename%", $config['Site']['SiteName'], $message);
////////////////////////////////////////////////////////////////////////////////////
//
//	Get To from Config file
//
////////////////////////////////////////////////////////////////////////////////////

$config = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/sites/$site/config.json"), true);

$to_addresses = explode(';', $config['Site']['Config']['Notifications']);



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
    $mail->Host = 'smtp.sendgrid.net';  // Specify main and backup SMTP servers
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'apikey';               // SMTP username
    $mail->Password = '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';                         // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('no-reply@block2150.com', 'Lead Contact Form');
    
    $mail->addAddress('block2150@gmail.com', 'Ryan Riley');     // Add a recipient
    foreach ($to_addresses as $to) {
        $mail->AddAddress($to);
    }

	if(strlen($notification_to_address) > 0) {
		$mail->AddAddress($notification_to_address);
	}

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

