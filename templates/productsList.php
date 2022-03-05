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
    <main class="products-list">
      <button class="custom-btn">
        <a href="<?= ROOT_FOLDER ?>">Назад</a>
      </button>

      <h1 class="products-list__title"><?= $data['category']['label'] ?></h1>
      <p class="products-list__description"><?= $data['category']['teaser_text'] ?></p>

      <div class="products-list__container">
        <?php foreach ($data['products']['data'] as $product): ?>
          <div class="card-product">
            <a class="card-product__link" 
              href="<?= ROOT_FOLDER . '/?id=' . $product['id'] . '&parent=' . $data['category']['id'] . '&page=' . $data['page'] ?>">
            </a>
            <div class="card-product__image">
              <img src="<?= PUBLIC_PATH . $product['file_path'] ?>" alt="<?= $product['alt'] ?>">
            </div>
            <h3 class="card-product__title"><?= $product['label'] ?></h3>
            <p class="card-product__category"><?= $product['category'] ?></p>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="products-list__pagination pagination">
        <button class="pagination__btn <?=  $data['page'] == 1 ? 'pagination__btn--disable' : '' ?>">
          <a <?= $data['page'] != 1 ? 
            'href="' . ROOT_FOLDER . '/?cat_id=' . $data['cat_id'] . '&page=' . ($data['page'] - 1) . '"' :
            '' ?>>
            <img src="<?= PUBLIC_PATH ?>/img/icons/cherovn-left-icon.png" alt="Стрелочка влево">
          </a>
        </button>
        <?php for ($i = 1; $i <= $data['products']['pageCount']; $i++ ): ?>
          <button class="pagination__btn <?= $data['page'] == $i ? 'pagination__btn--active' : '' ?>">
            <a href="<?= ROOT_FOLDER . '/?cat_id=' . $data['cat_id'] . '&page=' . $i ?>">
              <?= $i ?>
            </a>
          </button>
        <?php endfor; ?>
        <button class="pagination__btn <?=  $data['page'] == $data['products']['pageCount'] ? 'pagination__btn--disable' : '' ?>">
          <a <?=  $data['page'] != $data['products']['pageCount'] ? 
            'href="' . ROOT_FOLDER . '/?cat_id=' . $data['cat_id'] . '&page=' . ($data['page'] + 1) . '"'  :
            '' ?>>
            <img src="<?= PUBLIC_PATH ?>/img/icons/cherovn-right-icon.png" alt="Стрелочка право">
          </a>
        </button>
      </div>

    </main>
  </div>
</body>
</html>