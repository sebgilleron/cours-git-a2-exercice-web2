<?php session_start();
require('config/config.php');
require('model/functions.fn.php');

/********************************
			PROCESS
********************************/
 

if(isset($_POST['email']) && !empty($_POST['email']) && isset ($_POST['username']) && !empty ($_POST['username']) && isset ($_POST['password']) && !empty ($_POST['password'])) {

    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password';
	/* isEmailAvailable
		return :
			true if available
			false if not available
		$db -> 				database object
		$email -> 			field value : email
	*/
       
    
	$email_ok = isEmailAvailable($db,$email);

	/* isUsernameAvailable
		return :
			true if available
			false if not available
		$db -> 				database object
		$username -> 			field value : username
	*/
          
    
    
	$username_ok = isUsernameAvailable($db,$username);


	if ($email_ok && $username_ok) {
		/* userRegistration
			return :
				true for registration OK
				false for fail
			$db -> 				database object
			$username -> 		field value : username
			$email -> 			field value : email
			$password -> 		field value : password
		*/
        
        $db = db;
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password';
        
		userRegistration($db, $username, $email, $password);
		header('Location: login.php');
	}

	if (!$email_ok) {
		$error = "Email déjà pris";
	}

	if (!$username_ok) {
		$error = "Nom d'utilisateur déjà pris";
	}

}

/******************************** 
			VIEW 
********************************/

include 'view/_header.php';
include 'view/register.php';
include 'view/_footer.php';
