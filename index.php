<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="style.css">
	<title>Форма</title>

</head>

<form action="index.php" method="POST">
  <label>Ваше имя</label>
  <input name="fio" type="text">
  <br>

  <label>Ваш email</label>
  <input name="email" type="email">
  <br>

	<p>Ваш го рождения</p>
  <select name="bd">
  <?php for($i = 1900; $i < 2021; $i++) {?>
  	<option value="<?php print $i; ?>"><?= $i; ?></option>
  	<?php }?>
  </select>
  <br>



  <p>Ваш пол</p>
  <label class="radio">
		<input type="radio" name="sex" value="M" checked>
		M
  </label>
  <label class="radio">
		<input type="radio" name="sex" value="F">
		Ж
  </label>
  <br>

  <p>Количество конечностей</p>
  <label class="radio">
		<input type="radio" name="limbs" value="2" checked>
		2
  </label>
  <label class="radio">
		<input type="radio" name="limbs" value="4">
		4
  </label>
  <label class="radio">
		<input type="radio" name="limbs" value="6">
		6
  </label>
  <label class="radio">
		<input type="radio" name="limbs" value="8">
		8
  </label>
  <label class="radio">
		<input type="radio" name="limbs" value="10">
		10
  </label>
  <br>
  <br>

  <select name="abilities[]" multiple="multiple">
  	<option value="1">Бессмертие</option>
  	<option value="2">Прохождение сквозь стен</option>
  	<option value="3">Левитация</option>
  	<option value="4">Невидимость</option>
  </select>
  <br>

  <p>Ваша биография</p>
  <textarea name="bio" placeholder="Your biography" rows=10 cols=30></textarea>
  <br>

  <input type="checkbox" name="accept" value="1">Принять
  <br>
  <input type="submit" value="Отправить">
</form>

