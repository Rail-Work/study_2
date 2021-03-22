<?php require_once 'header.php'; 

/**
*Проверка введённых данных для приобритения продукта >>>>>>>>>>>>>
**/
if(isset($_POST['buy'])){

$id = $_GET['id'];
$id = intval($id);

$name 		= filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$surname	= filter_var(trim($_POST['surname']), FILTER_SANITIZE_STRING);
$phone 		= filter_var(trim($_POST['phone']), FILTER_SANITIZE_STRING);
$address 	= filter_var(trim($_POST['address']), FILTER_SANITIZE_STRING);
$comment 	= filter_var(trim($_POST['comment']), FILTER_SANITIZE_STRING);

$name 		= htmlspecialchars(mysqli_real_escape_string($db, $name));
$surname 	= htmlspecialchars(mysqli_real_escape_string($db, $surname));
$phone 		= htmlspecialchars(mysqli_real_escape_string($db, $phone));
$address 	= htmlspecialchars(mysqli_real_escape_string($db, $address));
$comment 	= htmlspecialchars(mysqli_real_escape_string($db, $comment));

if(mb_strlen($name) < 1 || mb_strlen($name) > 20){
	$_SESSION['message'] = 'Введите корректные данные';
	header('Location: cart.php?id=' . $id);
}
elseif(mb_strlen($surname) < 2 || mb_strlen($surname) > 30){
	$_SESSION['message'] = 'Заполните поле ввода фамилии';
	header('Location: cart.php?id=' . $id);
}
elseif(mb_strlen($phone) < 10 || mb_strlen($phone) > 12){
	$_SESSION['message'] = 'Введите ваш действуеющий номер телефона';
	header('Location: cart.php?id=' . $id);
}elseif(mb_strlen($address) < 10 || mb_strlen($address) > 100){
	$_SESSION['message'] = 'Необходимо ввести ваш адрес для доставки';
	header('Location: cart.php?id=' . $id);
}else{

$create = mysqli_query($db, "INSERT INTO `orders` (`product_id`, `name`, `surname`, `phone`, `address`, `comment`, `delivery`)
			VALUES ('$id', '$name', '$surname', '$phone', '$address', '$comment', '$delivery')");
			$_SESSION['message'] = 'Вы приобрели продукт ' . $_SESSION['titleForProduct'];
			header('Location: cart.php?id=' . $id);

}

/**
*Проверка введённых данных для приобритения продукта <<<<<<<<<<<<<
**/

// ***************************************************************************************************************************************************************************************************

/**
*Регистрация пользователей, проверка данных >>>>>>>>>>>>>
**/

}elseif(isset($_POST['register'])){

	$name		 	 = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
	$surname 		 = filter_var(trim($_POST['surname']), FILTER_SANITIZE_STRING);
	$login			 = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
	$userPhone		 = filter_var(trim($_POST['userPhone']), FILTER_SANITIZE_STRING);
	$email 			 = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
	$password 		 = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
	$password_repeat = filter_var(trim($_POST['password_repeat']), FILTER_SANITIZE_STRING);

	$name			 = htmlspecialchars(mysqli_real_escape_string($db, $name));
	$surname 		 = htmlspecialchars(mysqli_real_escape_string($db, $surname));
	$login			 = htmlspecialchars(mysqli_real_escape_string($db, $login));
	$userPhone		 = htmlspecialchars(mysqli_real_escape_string($db, $userPhone));
	$email 			 = htmlspecialchars(mysqli_real_escape_string($db, $email));
	$password 		 = htmlspecialchars(mysqli_real_escape_string($db, $password));
	$password_repeat = htmlspecialchars(mysqli_real_escape_string($db, $password_repeat));

	if(mb_strlen($name) < 1 || mb_strlen($name) > 20){
		$_SESSION['message'] = 'Необходимо ввести ваше имя';
		header('Location: register.php');
	}elseif(mb_strlen($surname) < 2 || mb_strlen($surname) > 20){
		$_SESSION['message'] = 'Введите вашу фамилию';
		header('Location: register.php');
	}elseif(mb_strlen($login) < 4 || mb_strlen($login) > 15){
		$_SESSION['message'] = 'Придумайте логин(от 4 до 15 символов)';
		header('Location: register.php');
	}elseif(mb_strlen($userPhone) < 10 || mb_strlen($userPhone) > 12){
		$_SESSION['message'] = 'Введите номер телефона(пример: 79009872215)';
		header('Location: register.php');
	}elseif(mb_strlen($email) < 2 || mb_strlen($email) > 20){
		$_SESSION['message'] = 'Введите вашу действуеющую электронную почту';
		header('Location: register.php');
	}elseif(mb_strlen($password) < 4 || mb_strlen($password) > 15){
		$_SESSION['message'] = 'Пароль должен состоять от 4 до 15 символов';
		header('Location: register.php');
	}elseif($password !== $password_repeat){
		$_SESSION['message'] = 'Повторно введённый пароль не верный';
		header('Location: register.php');
	}else{

		$image = 'users/' . time() . $_FILES['image']['name'];
		if(!move_uploaded_file($_FILES['image']['tmp_name'], $image)){
			$_SESSION['message'] = 'Ошибка при загрузке сообщения';
		header('Location: ../register.php');
	}{

	$registerNewUser = mysqli_query($db, "INSERT INTO `users` 
						   (`name`, `surname`, `login`, `userPhone`, `email`, `password`, `image`) 
					VALUES ('$name', '$surname', '$login', '$userPhone', '$email', '$password', '$image')");

		$_SESSION['message'] = 'Регистрация прошла успешно';
		header('Location: auth.php?id='.$_SESSION['user']['id']);
}

}

/**
*Регистрация пользователей, проверка данных <<<<<<<<<<<<<
**/

// ***************************************************************************************************************************************************************************************************

/**
*Авторизация пользователей, проверка данных <<<<<<<<<<<<<
**/

}elseif(isset($_POST['auth'])){

	$login 		= filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
	$password 	= filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

	$login		= htmlspecialchars(mysqli_real_escape_string($db, $login));
	$password 	= htmlspecialchars(mysqli_real_escape_string($db, $password));

	if(!empty($login) && !empty($password)){
		$auth = mysqli_query($db, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");

		$user = mysqli_fetch_assoc($auth);

		if(mysqli_num_rows($auth)){
			$_SESSION['user'] = [
				"id" => $user['id'],
				"name" => $user['name'],
				"surname" => $user['surname'],
				"login" => $user['login'],
				"userPhone" => $user['userPhone'],
				"email" => $user['email'],
				"image" => $user['image'],
				"password" => $user['password'],
                "status" => $user['status'],
			];
			// $_SESSION['message'] = 'Вы успешно авторизовались ' . $_SESSION['user']['name'];
			header('Location: profile.php?id='.$_SESSION['user']['id']);

		}else{
			$_SESSION['message'] = 'Неверный логин или пароль';
			header('Location: auth.php');
		}

	}else{
		$_SESSION['message'] = 'Введите логин и пароль';
		header('Location: auth.php');
	}


/**
*Авторизация пользователей, проверка данных <<<<<<<<<<<<<
**/

// ***************************************************************************************************************************************************************************************************

/**
*Обновление данных пользователя >>>>>>>>>>>>>
**/

}elseif(isset($_POST['changeData'])){

	$id = $_GET['id'];

	$name 			= filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
	$surname 		= filter_var(trim($_POST['surname']), FILTER_SANITIZE_STRING);
	$login 			= filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
	$userPhone 		= filter_var(trim($_POST['userPhone']), FILTER_SANITIZE_STRING);
	$email 			= filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
	$newPassword	= filter_var(trim($_POST['new_password']), FILTER_SANITIZE_STRING);
	$password 		= filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

	$name 			= htmlspecialchars(mysqli_real_escape_string($db, $name));
	$surname 		= htmlspecialchars(mysqli_real_escape_string($db, $surname));
	$login 			= htmlspecialchars(mysqli_real_escape_string($db, $login));
	$userPhone	 	= htmlspecialchars(mysqli_real_escape_string($db, $userPhone));
	$email 			= htmlspecialchars(mysqli_real_escape_string($db, $email));
	$password	 	= htmlspecialchars(mysqli_real_escape_string($db, $password));

	if(mb_strlen($name) < 1 || mb_strlen($name) > 20){
		$_SESSION['message'] = 'Необходимо ввести ваше имя';
		header('Location: profile.php');
	}elseif(mb_strlen($surname) < 2 || mb_strlen($surname) > 20){
		$_SESSION['message'] = 'Введите вашу фамилию';
		header('Location: profile.php');
	}elseif(mb_strlen($login) < 4 || mb_strlen($login) > 15){
		$_SESSION['message'] = 'Придумайте логин(от 4 до 15 символов)';
		header('Location: profile.php');
	}elseif(mb_strlen($userPhone) < 10 || mb_strlen($userPhone) > 12){
		$_SESSION['message'] = 'Введите номер телефона(пример: 79009872215)';
		header('Location: profile.php');
	}elseif(mb_strlen($email) < 2 || mb_strlen($email) > 20){
		$_SESSION['message'] = 'Введите вашу действуеющую электронную почту';
		header('Location: profile.php');
	}else{

		$searchUser = mysqli_query($db, "SELECT * FROM `users` WHERE `id` = '$id' AND `password` = '$password'");

		$result = mysqli_fetch_assoc($searchUser);

		if(!empty($result)){
			$updateDataUser = mysqli_query($db, "UPDATE `users` 
				SET `name` = '$name', 
					`surname` = '$surname', 
					`login` = '$login',
					`userPhone` = '$userPhone',
					`email` = '$email',
					`password` = '$newPassword' WHERE `id` = '$id' AND `password` = '$password'");


			$_SESSION['message'] = 'Ваши данные успешно изменены, войдите снова в систему';
			header('Location: logout.php');
	}else{
		$_SESSION['message'] = 'Пароль введён неверно';
		header('Location: profile.php?id='.$_SESSION['user']['id']);
	}


/**
*Обновление данных пользователя <<<<<<<<<<<<<
**/

// ***************************************************************************************************************************************************************************************************
}
}





