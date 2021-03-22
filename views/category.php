<?php require_once 'header.php'; ?>

<h1 class="text-center">Товары категории <?=$rsCategory['name']?></h1>
<div class="container text-center">
    <div class="row">
        
            <?php if($rsProductsByCat or $rsChildCats): ?>
                <?php foreach ($rsProductsByCat as $item): ?>
                    <div class="col-4">
                    <div>
                        <a href="/product.php?id=<?=$item['id']?>">
                        <img src="/products/<?=$item['image']?>" width="165">
                        </a><br>
                        <a href="/product.php?id=<?=$item['id']?>"><?=$item['title']?></a>
                    </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col">
                <h2 style="color:red; margin-top: 50px;">Товаров нет!</h2>
                </div>
            <?php endif; ?>
        
    </div>
</div>

<?php require_once 'footer.php'; ?>