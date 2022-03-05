<?php 
  $parentId = $data['main']['category_id'];
  $page = 1;
  
  if (isset($_GET['page'])) {
    $page = intval($_GET['page']);
  }

  if (isset($_GET['parent'])) {
    $guessId = intval($_GET['parent']);
    
    if ($guessId == $parentId ) {
      $parentId = $guessId;
    } else {
      foreach ($data['categories'] as $category) {
        if ($category['id'] == $guessId) {
          $parentId = $guessId;
        }
      } 
    }
  }
?>


<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Страница товара</title>
  <link rel="stylesheet" href="<?= PUBLIC_PATH ?>/css/index.css">
</head>
<body>
  <div class="layout">
    <button class="custom-btn">
      <a href="<?= ROOT_FOLDER . '/?cat_id=' . $parentId . '&page=' . $page ?>">Назад</a>
    </button>
    <div class="product">
      <div class="product__preview">
        <div class="product__gallery">
          <div class="product__images">
            <img class="product__image" src="<?= PUBLIC_PATH . $data['main']['file_path'] ?>" alt="<?= $data['main']['alt'] ?>">
            <?php foreach ($data['images'] as $image): ?>
              <img class="product__image" src="<?= PUBLIC_PATH . $image['file_path'] ?>" alt="<?= $image['alt'] ?>">
            <?php endforeach; ?>
          </div>
          <button>
            <img src="<?= PUBLIC_PATH ?>/img/icons/chevron-down-icon.png" alt="Иконка стрелки вниз">
          </button>
        </div>
        <div class="product__main-image">
          <img class="product__image--full" src="<?= PUBLIC_PATH . $data['main']['file_path'] ?>" alt="<?= $data['main']['alt'] ?>">
        </div>
      </div>
      <div class="product__description">
        <h2><?= $data['main']['label'] ?></h2>
        <div class="product__categories">
          <a href="<?= ROOT_FOLDER . '?cat_id=' . $data['main']['category_id'] ?>"><?= $data['main']['category'] ?></a>
          <?php foreach ($data['categories'] as $category): ?>
            <a href="<?= ROOT_FOLDER . '?cat_id=' . $category['id'] ?>">
              <?= $category['label'] ?>
            </a>
          <?php endforeach; ?>
        </div>
        <div class="product__price">
          <div class="product__price-actual">
            <span class="product__price-old"><?= $data['main']['original_price'] ?></span>
            <span class="product__price-current price"><?= $data['main']['price'] ?></span>
          </div>
          <div class="product__price-discount">
            <span class="product__discount-value price price--discount"><?= $data['main']['promo_price'] ?></span>
          </div>
        </div>
        <div class="product__info">
          <div class="product__info-item">
            <img src="<?= PUBLIC_PATH ?>/img/icons/check-icon.png" alt="Иконка галочки">
            <span>В наличии в магазине <a href="#">Lamoda</a></span>    
          </div>
          <div class="product__info-item">
            <img src="<?= PUBLIC_PATH ?>/img/icons/truck-icon.png" alt="Иконка грузовика">
            <span>Бесплатная доставка</span>
          </div>
        </div>
        <div class="product__actions">
          <div class="product__buy">
            <div class="product__counter counter">
              <button class="counter__btn counter__minus" disabled>-</button>
              <span class="counter__value">1</span>
              <button class="counter__btn counter__plus">+</butt>
            </div>
            <button id="buy-btn" class="custom-btn custom-btn--blue">Купить</button>
          </div>
          <button class="custom-btn">В избранное</button>
        </div>
        <div class="product__text">
          <p>
            <?= $data['main']['description'] ?>
          </p>
        </div>
        <div class="product__share">
          <span class="product__share-title">Поделиться:</span>
          <div class="product__share-list">
            <a href="#">
              <img src="<?= PUBLIC_PATH ?>/img/icons/vk-icon.png" alt="vk иконка">
            </a>
            <a href="#">
              <img src="<?= PUBLIC_PATH ?>/img/icons/google-plus-icon.png" alt="google plus иконка">
            </a>
            <a href="#">
              <img src="<?= PUBLIC_PATH ?>/img/icons/facebook-icon.png" alt="facebook иконка">
            </a>
            <a href="#">
              <img src="<?= PUBLIC_PATH ?>/img/icons/twitter-icon.png" alt="twitter иконка">
            </a>
          </div>
          <span class="product__share-count">123</span>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="<?= PUBLIC_PATH ?>/js/notify.min.js"></script>
  <script src="<?= PUBLIC_PATH ?>/js/index.js"></script>
</body>
</html>