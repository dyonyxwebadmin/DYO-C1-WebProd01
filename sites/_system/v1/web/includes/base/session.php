<?php
session_start();

if(isset($_COOKIE['PHPSESSID'])) {
    //echo 'Session is active!';
} else {
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['sponsor']);
    session_destroy();	
    header("location: /");
}
?>

<script>
	var profile_image = "/user/<?php echo $_SESSION["user_id"]; ?>/profile";
	
		
    SESSION = { 
			"id": "<?php echo $_SESSION["user_id"]; ?>",
			"username": "<?php echo $_SESSION["user_username"]; ?>",
			"fullname": "<?php echo $_SESSION["user_full_name"]; ?>",
			"first_name": "<?php echo $_SESSION["user_first_name"]; ?>",
			"last_name": "<?php echo $_SESSION["user_last_name"]; ?>",
			"profile_image": profile_image,
			"type_id": "<?php echo $_SESSION["user_type"]; ?>",
			"type": "<?php echo $_SESSION["user_type_name"]; ?>",
			"status": "<?php echo $_SESSION["user_status"]; ?>"
    };
	

	if (SESSION.id == "")
	{
		window.location = "/login";	
	}
	
</script>