<?php

  $form = [
    'username' => $_COOKIE['username'] ?? '',
    'email' => $_COOKIE['email'] ?? '',
    'subject' => '',
    'text' => '',
    'agree' => '',
    'gender' => $_COOKIE['gender'] ?? 'Мужской',
    'birthYear' => $_COOKIE['birthYear'] ?? 2000
  ];

  $err = [
    'username' => '',
    'email' => '',
    'subject' => '',
    'text' => '',
    'agree' => ''
  ];

  if (isset($data['form'])) {
    $form = $data['form'];

    $err['username'] = $data['err']['username'] ?? '';
    $err['email'] = $data['err']['email'] ?? '';
    $err['subject'] = $data['err']['subject'] ?? '';
    $err['text'] = $data['err']['text'] ?? '';
    $err['agree'] = $data['err']['agree'] ?? '';
  }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Форма</title>
  <link rel="stylesheet" href="<?= PUBLIC_PATH ?>/css/form.css">
</head>
<body>
  <div class="layout">
    <form class="form" method="POST" action="">
      <h1 class="form__title">Форма</h1>
      <div class="form__group input-group">
        <label for="username">Имя</label>
        <input 
          class="
            input-group__text-input
            <?= $err['username'] ? 'input-group__text-input--danger' : '' ?>  
          " 
          name="username" 
          id="username" 
          type="text"
          value="<?= htmlspecialchars($form['username']) ?? '' ?>"
        >
        <?php if ($err['username']): ?>
          <span class="input-group__err"><?= $err['username'] ?></span>
        <?php endif; ?>
      </div>
      <div class="form__group input-group">
        <label for="email">E-mail</label>
        <input 
          class="
            input-group__text-input
            <?= $err['email'] ? 'input-group__text-input--danger' : '' ?>  
          " 
          name="email" 
          id="email" 
          type="text"
          value="<?= htmlspecialchars($form['email']) ?? '' ?>"  
        >
        <?php if ($err['email']): ?>
          <span class="input-group__err"><?= $err['email'] ?></span>
        <?php endif; ?>
      </div>
      <div class="form__group input-group">
        <label for="birthYear">Год рождения</label>
        <select class="input-group__select" name="birthYear" id="birthYear">
          <?php for ($year = 2010; $year > 1900; $year--): ?>
            <option value="<?= $year ?>" <?= $year == $form['birthYear'] ? 'selected' : '' ?>><?=  $year ?></option>
          <?php endfor; ?>
        </select>
      </div>
      <div class="form__group input-group input-group--row">
        <label for="genderMale">Пол</label>
        <div class="input-group__radios">
          <div class="input-group__radio">
            <label for="genderMale">Мужской</label>
            <input 
              name="gender" 
              id="genderMale" 
              type="radio" 
              value="Мужской" 
              <?= $form['gender'] == 'Мужской' ? 'checked' : '' ?>>
          </div>
          <div class="input-group__radio">
            <label for="genderFemale">Женский</label>
            <input 
            name="gender" 
            id="genderFemale" 
            type="radio" 
            value="Женский"
            <?= $form['gender'] == 'Женский' ? 'checked' : '' ?>>
          </div>
        </div>
      </div>
      <div class="form__group input-group">
        <label for="subject">Тема обращения</label>
        <input 
          class="input-group__text-input
            <?= $err['subject'] ? 'input-group__text-input--danger' : '' ?>" 
          name="subject" 
          id="subject" 
          type="text"
          value="<?= htmlspecialchars($form['subject']) ?? '' ?>"
         >
        <?php if ($err['subject']): ?>
          <span class="input-group__err"><?= $err['subject'] ?></span>
        <?php endif; ?>
      </div>
      <div class="form__group input-group">
        <label for="text">Суть вопроса</label>
        <textarea 
          name="text" 
          id="text"
          class="
            input-group__text-input
            input-group__text-input--area
            <?= $err['text'] ? 'input-group__text-input--danger' : '' ?>"><?=  htmlspecialchars($form['text']) ?? ''?></textarea>
        <?php if ($err['text']): ?>
          <span class="input-group__err"><?= $err['text'] ?></span>
        <?php endif; ?>
      </div>
      <div class="form__group input-group">
        <label for="agree" class="input-group__check <?= $err['agree'] ? 'input-group__check--err' : '' ?>">
          
          <input name="agree" id="agree" type="checkbox" value="true"
            <?= $form['agree'] ? 'checked' : '' ?>>
          <span>С контрактом ознакомлен</span>
        </label>
      </div>
      <input class="form__send" type="submit" value="Отправить">
    </form>
  </div>
</body>
</html>