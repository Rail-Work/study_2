<?php require_once 'header.php'; ?>

<div class="container text-center">
	<div class="row">
		<?php foreach ($rsProduct as $item): ?>
			<div class="col">
			<h3><?=$item['title']?></h3><br/>
			<img src="products/<?=$item['image']?>" width="400" alt=""><br/>
			Описание: <?=$item['description']?><br/>
			Цвет: <?=$item['color']?><br/>
			Цена: <?=$item['price']?><br/>
			<a href="cart.php?id=<?=$item['id']?>" class="btn btn-success">Купить</a>
			</div>
		<?php endforeach; ?>
	</div>
</div>

<?php require_once 'footer.php'; ?>