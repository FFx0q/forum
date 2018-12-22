<?php 
	require_once(__DIR__.'/vendor/autoload.php');
	$user = new App\Entity\User();
	$date = new DateTime();
	$controller = new App\Base\Controller();
	$em = $controller->getManager();

	   if($_SERVER["REQUEST_METHOD"] == "POST")
	   {
			$username = $_POST['username'];
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$email = $_POST['email'];
			
			$query = $em->createQuery("SELECT u.name FROM App\Entity\User as u WHERE u.name = :uname");
			$query->setParameters([
				'uname'     => $username
			]);
			$login = $query->getResult()[0];
			if(!empty($login)){
				\App\Base\Route::redirect('user/register');
				return;
			}
			$user->setName($username);
			$user->setPassword($password);
			$user->setEmail($email);
			$user->setJoinDate($date->getTimestamp());
			$em->persist($user);
			$em->flush();

			App\Base\Route::redirect('index/index');
		}


