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
    <form class="form">
      <h1 class="form__title">Форма</h1>
      <div class="form__group input-group">
        <label for="username">Имя</label>
        <input class="input-group__text-input" name="username" id="username" type="text">
      </div>
      <div class="form__group input-group">
        <label for="email">E-mail</label>
        <input class="input-group__text-input" name="email" id="email" type="text">
      </div>
      <div class="form__group input-group">
        <label for="birthYear">Год рождения</label>
        <select class="input-group__select" name="birthYear" id="birthYear">
          <?php for ($year = 2010; $year > 1900; $year--): ?>
            <option value="<?= $year ?>"><?= $year ?></option>
          <?php endfor; ?>
        </select>
      </div>
      <div class="form__group input-group input-group--row">
        <label for="genderMale">Пол</label>
        <div class="input-group__radios">
          <div class="input-group__radio">
            <label for="genderMale">Мужской</label>
            <input name="gender" id="genderMale" type="radio" value="Мужской">
          </div>
          <div class="input-group__radio">
            <label for="genderFemale">Женский</label>
            <input name="gender" id="genderFemale" type="radio" value="Женский">
          </div>
        </div>
      </div>
      <div class="form__group input-group">
        <label for="subject">Тема обращения</label>
        <input class="input-group__text-input" name="subject" id="subject" type="text">
      </div>
      <div class="form__group input-group">
        <label for="text">Суть вопроса</label>
        <textarea name="text" id="text"></textarea>
      </div>
      <div class="form__group input-group">
        <label for="agree">С контрактом ознакомлен</label>
        <input class="input-group__check" name="agree" id="agree" type="checkbox" value="agree" >
      </div>
      <input class="form__send" type="submit" value="Отправить">
    </form>
  </div>
</body>
</html>