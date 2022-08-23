<?php
header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (!empty($_GET['save'])) {
    print('Спасибо, результаты сохранены.');
  }
  include('form.php');
  exit();
}

$errors = FALSE;

if (empty($_POST['fio'])) {
    print('Заполните имя.<br>');
    $errors = TRUE;
}


//email
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    print('Проверьте правильность ввода email<br>');
    $errors = TRUE;
}

//year
if (empty($_POST['bd'])) {
    print('Заполните год.<br>');
    $errors = TRUE;
}
else {
    $year = $_POST['bd'];
    if (!(is_numeric($year) && intval($year) >= 1900 && intval($year) < 2020)) {
        print("Укажите корректный год.<br>");
        $errors = TRUE;
    }
}



//abilities
$ability_data = ['immort', 'wall', 'levit', 'invis'];
if (empty($_POST['abilities'])) {
    print('Выберите способность<br>');
    $errors = TRUE;
}


if (empty($_POST['accept'])) {
    print("Вы не приняли соглашение!<br>");
    $errors = TRUE;
}

if ($errors) {
  exit();
}

$user = 'u40077';
$pass = '3053723';
$db = new PDO('mysql:host=localhost;dbname=u40077', $user, $pass, array(PDO::ATTR_PERSISTENT => true));

try {
    $db->beginTransaction();
  $stmt = $db->prepare("INSERT INTO formtab SET fio = ?, email = ?, bd = ?, sex = ?, limbs = ?, bio = ?");
  $stmt -> execute([$_POST['fio'], $_POST['email'], $_POST['bd'], $_POST['sex'], intval($_POST['limbs']), $_POST['bio']]);
 $stmt2 = $db->prepare("INSERT INTO usertab SET form_id = ?, abid = ?");
  $id = $db->lastInsertId();
  foreach ($_POST['abilities'] as $s){
   $stmt2 -> execute([$id, intval($s)]);
  }
    $db->commit();
}

catch(PDOException $e) {
    $db->rollBack();
    print('Error : ' . $e->getMessage());
    exit();
}


header('Location: ?save=1');

