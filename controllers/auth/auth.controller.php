<?php

	session_start();
	//User authentication controller
	// Login a user and create a user

	//print_r($_POST);

	if ( isset($_POST["login"]) ) {
		
		//login a user
		//We use the user manager
		include_once('../../models/auth/auth-manager.class.php');
		
		$authManager = new AuthManager();
		//die();
		$result = $authManager->loginUser($_POST["username"], $_POST["password"]);

		print_r( $result );
		
		//Switch result data
		if ( $result['type'] == "errors" ) {


			$_SESSION['auth_errors']['login']['username'] = $result["data"]["username"];
			$_SESSION['auth_errors']['login']['password'] = $result["data"]["password"];

			header("Location: http://" . $_SERVER['HTTP_HOST'] . "/app/bookoob/controllers/auth/auth.controller.php");

		}else if ( $result['type'] == "success" ){

			$_SESSION['auth']["logged"] = true;
			$_SESSION['auth']["username"] = $result["data"]['username'];
			$_SESSION['auth']["user-image"] = $result["data"]['image'];
			$_SESSION['auth']["fullname"] = $result["data"]['fullname'];
			$_SESSION['auth']["user_id"] = $result["data"]['user_id'];


			header("Location: http://" . $_SERVER['HTTP_HOST'] . "/app/bookoob/controllers/user/users.controller.php?action=dashboard");
		}


			//print_r($books);

		//include_once('../../views/books/books-list.html.php');
	}else if ( isset($_POST["register"]) ) {

		//Get the registration data from the post
		$password = (string) $_POST['password'];
		$confirm_password = (string) $_POST['confirm-password'];

		//Check the password and th e confirm password
		if ( $password != $confirm_password) {
			//echo "Password not much";

			$_SESSION['auth_errors']["register"]["password"] = "Les mots de passe ne correspondent pas";


			header("Location: http://" . $_SERVER['HTTP_HOST'] . "/app/bookoob/controllers/auth/auth.controller.php?action=register");
		}else {

			//Set data to the mangaer to save the user
			$user = array(
				"fullname" => (string) $_POST['fullname'],
				"username" => (string) $_POST['username'],
				"sexe" => (string) $_POST['sexe'],
				"password" => (string) $_POST['password'],
				"birthday" => $_POST['birthday'],
			);


			//login a user
			//We use the user manager
			include_once('../../models/auth/auth-manager.class.php');
			
			$authManager = new AuthManager();
			$result = $authManager->registerUser($user);


			if ( $result["type"] == "errors" ) {

				$_SESSION['auth_errors']["register"]["fullname"] = $result["data"]["fullname"];
				$_SESSION['auth_errors']["register"]["username"] = $result["data"]["fullname"];


				header("Location: http://" . $_SERVER['HTTP_HOST'] . "/app/bookoob/controllers/auth/auth.controller.php?action=register");

			}else if ( $result["type"] == "success" ) {

				//We have a user
				header("Location: http://" . $_SERVER['HTTP_HOST'] . "/app/bookoob/controllers/auth/auth.controller.php?action=login");

			}

		}

	}else if ( isset($_GET["action"] ) AND $_GET["action"] == "logout")  {

		//Logout a user

		session_start();
		session_destroy();
		header("Location: http://" . $_SERVER['HTTP_HOST'] . "/app/bookoob/");


		echo "Action";


	}else if ( isset($_GET["action"] ) AND $_GET["action"] == "register" ) {

		include_once('../../views/auth/register.html.php');

	}else if ( isset($_GET["action"] ) AND $_GET["action"] == "login" ) {

		include_once('../../views/auth/login.html.php');

	}else {

		include_once('../../views/auth/login.html.php');

	}

