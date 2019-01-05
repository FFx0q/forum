<?php 
	require_once(__DIR__.'/vendor/autoload.php');
	$date = new DateTime();
	$controller = new App\Controller\UserController();
	$em = $controller->getManager();

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$username = $_POST['username'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$email = $_POST['email'];
			
		if($controller->usernameExists($username) == FALSE)
		{
			$controller->create($username, $password, $email, $date->getTimestamp());
		}
	}


