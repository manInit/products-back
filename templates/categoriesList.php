<?php
  require_once 'utils/productWordForm.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Категории</title>
  <link rel="stylesheet" href="<?= PUBLIC_PATH ?>/css/index.css">
</head>
<body>
  <div class="layout">
    <main>
      <h1>Категории</h1>
      <div class="categories">
        <?php foreach($data as $category): ?>
          <div class="card-category">
            <a class="card-category__link" href="<?= ROOT_FOLDER . '/?cat_id=' . $category['id'] ?>"></a>
            <h2 class="card-category__title"><?= $category['label'] ?></h2>
            <p class="card-category__count">
              <?= $category['product_count'] . ' ' . productWordForm($category['product_count']) ?>
            </p>
          </div>
        <?php endforeach; ?>
      </div>  
    </main>
  </div>
</body>
</html>