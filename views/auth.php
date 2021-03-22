<?php require_once 'header.php'; 
if(!empty($_SESSION['user'])){
		header('Location: profile.php');
	}
?>

<div class="container">
	<div class="row">
		<div class="col text-center">
			<h3 style="margin-top: 20px;">Форма авторизации:</h3><br/>
			<form action="verification.php" method="post" enctype="multipart/form-data">

				<label for="login">Your login:</label>
				<input type="text" class="form-control" name="login" id="login" placeholder="Enter your login"><br/>

				<label for="password">Your password:</label>
				<input type="password" class="form-control" name="password" id="password" placeholder="Enter your password"><br/>

				<label for="register"></label>
				<input type="submit" class="form-control btn btn-secondary" name="auth" id="auth" value="Авторизоваться">

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