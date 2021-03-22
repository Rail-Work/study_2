<?php
require_once '../controllers/CategoryController.php';
require_once '../controllers/IndexController.php';
require_once '../controllers/ProductController.php';

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
<!-- подключение css-файла -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" 
integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">


<!-- подключение нужной версии jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>

<!-- подключение popper.js, необходимого для корректной работы некоторых плагинов Bootstrap 4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" 
integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
   
<!-- подключение js-файла -->
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" 
integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous">
</script>


	<title>Document</title>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Интернет-магазин</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

      <!--     <form class="form-inline my-2 my-md-0">
            <input class="form-control" type="text" placeholder="Search" aria-label="Search">
          </form> -->

            <?php foreach($rsCategories as $item): ?>
          <div class="dropdown open">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?=$item['name']?>
            </button>

            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
               <?php if(isset($item['children'])): ?>
            <?php foreach($item['children'] as $itemChild): ?>
              <a class="dropdown-item" href="/category.php?id=<?=$itemChild['id']?>"><?=$itemChild['name']?></a>
            <?php endforeach; ?>
            <?php endif; ?>

          </div>
        </div>
        <?php endforeach; ?>

        <?php if(empty($_SESSION['user'])): ?>
            <p><a class="navber nav-item btn btn-secondary" style="margin-top: 14px;" href="auth.php">Авторизоваться</a></p>

            <p><a class="navber nav-item btn btn-secondary" style="margin-top: 14px;" href="register.php">Зарегистрироваться</a></p>
        <?php else: ?>
            <p><a class="navber nav-item btn btn-secondary" style="margin-top: 14px;" href="profile.php?id=<?=$_SESSION['user']['id']?>">Мой профиль</a></p>
        <?php endif; ?>
      </div>
    </nav>
	