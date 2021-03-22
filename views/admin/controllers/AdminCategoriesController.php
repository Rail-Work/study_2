<?php
require_once 'db.php';

require_once 'models/AdminCategoriesModel.php';
require_once 'models/AdminProductsModel.php';

$rsAdminCategories = getAllMainCatsWithChildren();