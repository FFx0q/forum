<?php 
	require_once(__DIR__.'/vendor/autoload.php');
	require_once(__DIR__.'/config/app.php');

	session_start();

	$date = new DateTime();
	$controller = new App\Controller\UserController();

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$username = isset($_POST['username']) ? $_POST['username'] : " ";
		$password = password_hash(isset($_POST['password']) ? $_POST['password'] : " ", PASSWORD_DEFAULT);
		$email = isset($_POST['email']) ? $_POST['email'] : " ";
			
		if($controller->usernameExists($username) == FALSE)
		{
			$controller->CreateAction(2, $username, $password, $email, $date->getTimestamp(), "avatar.jpg");
		}
	}


