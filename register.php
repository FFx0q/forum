<?php 
	require_once(__DIR__.'/vendor/autoload.php');

	   if($_SERVER["REQUEST_METHOD"] == "POST")
	   {
			$user = new App\Entity\User();
			$date = new DateTime();
			$controller = new App\Base\Controller();
			$em = $controller->getManager();

			$username = $_POST['username'];
		   	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		   	$email = $_POST['email'];

			$user->setName($username);
			$user->setPassword($password);
			$user->setEmail($email);
			$user->setJoinDate($date->getTimestamp());
			$em->persist($user);
			$em->flush();

			App\Base\Route::redirect('index/index');
		}


