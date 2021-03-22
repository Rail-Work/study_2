<?php require_once 'header.php';
	if(!empty($_SESSION['user'])){
		header('Location: profile.php');
	}
 ?>

<div class="container">
	<div class="row">
		<div class="col text-center">
			<h3 style="margin-top: 20px;">Форма регистрации:</h3><br/>
			<form action="verification.php" method="post" enctype="multipart/form-data">
				
				<label for="name">Your name:</label>
				<input type="text" class="form-control" name="name" id="name" placeholder="Enter your name"><br/>

				<label for="surname">Your surname:</label>
				<input type="text" class="form-control" name="surname" id="surname" placeholder="Enter your surname"><br/>

				<label for="login">Your login:</label>
				<input type="text" class="form-control" name="login" id="login" placeholder="Enter your login"><br/>

				<label for="userPhone">Your phone number:</label>
				<input type="text" class="form-control" name="userPhone" id="userPhone" placeholder="Enter your phone number"><br/>

				<label for="email">Your email:</label>
				<input type="email" class="form-control" name="email" id="email" placeholder="Enter your email"><br/>

				<label for="password">Your password:</label>
				<input type="password" class="form-control" name="password" id="password" placeholder="Enter your password"><br/>

				<label for="password_repeat">Repeat your password:</label>
				<input type="password" class="form-control" name="password_repeat" id="password_repeat" placeholder="Repeat the password"><br/>

				<label for="image">Please download the photo:</label>
				<input type="file" name="image" id="image"><br/>

				<label for="register"></label>
				<input type="submit" class="form-control btn btn-secondary" name="register" id="register" value="Зарегистрироваться">

				<?php if(isset($_SESSION['message'])){
					echo '<p class="message">' . $_SESSION['message'] . '</p>';
				}
				unset($_SESSION['message']);

				?>

			</form>
		</div>
	</div>
</div>

<?php require_once 'footer.php'; ?>