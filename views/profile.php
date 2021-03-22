<?php require_once 'header.php';?>
<?php if(!$_SESSION['user']){
	header('Location: auth.php');
} ?>

	<div class="container">
		<div class="row">
			<div class="col text-center" style="margin-top: 40px;">

				<form action="verification.php?id=<?=$_SESSION['user']['id']?>" method="post" class="form" enctype="multipart/form-data">

				<img src="<?=$_SESSION['user']['image']?>" width="300	" alt=""><br/>

				<h3><label for="name">Ваше имя</label>
					<input type="text" name="name" id="name" value="<?=$_SESSION['user']['name']?>"><br/>
				</h3>

				<h3><label for="surname">Ваша фамилия:</label>
					<input type="text" name="surname" id="surname" value="<?=$_SESSION['user']['surname']?>"><br/>
				</h3>

				<h3><label for="login">Ваш логин:</label>
					<input type="text" name="login" id="login" value="<?=$_SESSION['user']['login']?>"><br/>
				</h3>

				<h3><label for="userPhone">Номер вашего телефона:</label>
					<input type="tel" name="userPhone" id="userPhone" value="<?=$_SESSION['user']['userPhone']?>"><br/>
				</h3>

				<h3><label for="email">Ваша электронная почта:</label>
					<input type="email" name="email" id="email" value="<?=$_SESSION['user']['email']?>"><br/>
				</h3>

				<h3><label for="new_password">Введите новый пароль:</label>
					<input type="password" name="new_password" id="new_password">
				</h3>

				<h3><label for="password">Подтвердите старый пароль:</label>
					<input type="password" name="password" id="password"><br/>
				</h3>

					<p><input type="submit" class="btn btn-success form-control" name="changeData" id="changeData" value="Изменить данные"><br/></p>

					<?php if(isset($_SESSION['message'])){
						echo '<p class="message">' . $_SESSION['message'] . '</p>';
					}
					unset($_SESSION['message']);
					?>

				</form><br/>

				<a href="logout.php" class="form-control btn btn-success">Выйти</a>

			</div>
		</div>
	</div>

	

<?php require_once 'footer.php'; ?>