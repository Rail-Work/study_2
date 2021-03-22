<?php require_once 'header.php'; ?>

<div class="container text-center products-index">
	<div class="row">
<?php foreach ($rsProducts as $item): ?>
		<div class="col-4">
			<a href="product.php?id=<?=$item['id']?>">
			<img src="products/<?=$item['image']?>" alt=""><br>
			<?=$item['title']?><br>
			Цвет: <?=$item['color']?><br>
			</a>
			<?=$item['price']?> Руб.
		</div>
<?php endforeach; ?>
	</div>
</div>

<?php require_once 'footer.php'; ?>