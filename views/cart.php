<?php require_once 'header.php'; 


?>
<div class="container">
	<div class="row">
		<div class="col text-center">

			<?php foreach ($rsProduct as $item): ?>
				<?php $_SESSION['titleForProduct'] = $item['title']; ?>
				<h3>Вы выбрали: <?=$item['title']?></h3>
			<?php endforeach;?>

			<form action="verification.php?id=<?=$_GET['id']?>" method="POST" class="form text-center">

				<label for="name">Your name:</label>
				<input type="text" class="form-control" name="name" id="name" value="" placeholder="Please, enter your name"><br/>

				<label for="surname">Your surname:</label>
				<input type="text" class="form-control" name="surname" id="surname" placeholder="Please, enter your surname"><br/>

				<label for="phone">Your phone number:</label>
				<input type="tel" class="form-control" name="phone" id="phone" placeholder="Please, enter your phone number"><br/>

				<label for="address">Enter your full address:</label>
				<input type="text" class="form-control" name="address" id="address" placeholder="Please, enter your full address"><br/>

				<label for="comment">Maybe you want to leave a comment to the courier?</label>
				<input type="text" class="form-control" name="comment" id="comment" placeholder="leave a comment"><br/>

				<!-- <label for="delivery">Please select type of delivery:</label><br/>
				Самовывоз<input type="radio" class="form-control" name="delivery" id="delivery"><br>
				Курьер<input type="radio" class="form-control" name="delivery" id="delivery" checked><br/> -->

				<input type="submit" name="buy" id="buy" class="form-control btn btn-success" value="Приобрести">

						<?php 
							if(isset($_SESSION['message'])){
								echo '<p class="message">' . $_SESSION['message'] . '</p>';
							}
							unset($_SESSION['message']);
						?>

			</form>

		</div>
	</div>
</div>

<?php require_once 'footer.php'; ?>