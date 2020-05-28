<?php

require "db.php";
?>  

<?php if (isset ($_SESSION['logged_user']) ) : ?>
Авторизован!<br>
Привет, <?php echo $_SESSION['logged_user']->login; ?>!
<hr>
<a href="/logout.php">Выйти</a>
<?php else : ?>
<!DOCTYPE html>
<html>
<head>
  <title>Регистрация</title>
</head>


<div class="center">
<a href="/login.php">Авторизоваться</a><br>
<a href="/signup.php">Регистрация</a>
</div>


</html>
<link rel="stylesheet" type="text/css" href="style.css?<?echo time();?>">

<?php endif; ?>