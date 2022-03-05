<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Товары</title>
  <link rel="stylesheet" href="<?= PUBLIC_PATH ?>/css/index.css">
</head>
<body>
  <div class="layout">
    <main>
      <h1><?= $data['category']['label'] ?></h1>
      <p><?= $data['category']['teaser_text'] ?></p>

      <div class="products-list">
        <?php foreach ($data['products'] as $product): ?>
          <div class="card-product">
            <a class="card-product__link" href="<?= ROOT_FOLDER . '/?id=' . $product['id'] ?>"></a>
            <div class="card-product__image">
              <img src="<?= PUBLIC_PATH . $product['file_path'] ?>" alt="<?= $product['alt'] ?>">
            </div>
            <h3 class="card-product__title"><?= $product['label'] ?></h3>
            <p class="card-product__category"><?= $product['category'] ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </main>
  </div>
</body>
</html>