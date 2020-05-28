<?php
require "db.php";



$data = $_POST;
if ( isset($data ['do_signup']) )
{
	//Регистрируем

	$errors = array();
	if (trim($data ['login']) == '' )
	{
		$errors[] = 'Введите логин!' ;
	} 

	if (trim($data ['email']) == '' )
	{
		$errors[] = 'Введите Email!' ;
	} 

	if ( $data ['password'] == '' )
	{
		$errors[] = 'Введите пароль!';
	} 

	if ( $data ['password_2'] != $data ['password'] )
	{
		$errors[] = 'Повторный пароль введён не верно!';
	} 

	if ( R::count('users', "login = ?", array($data['login'])) > 0 )
	{
		$errors[] = 'Пользователь с таким логином уже существует!';
	} 

	if ( R::count('users', "email = ?", array($data['email'])) > 0 )
	{
		$errors[] = 'Пользователь с таким Email уже существует!';
	} 

	if( empty($errors) )
	{
		//всё хорошо, регистрируем
		$user = R::dispense ('users');
		$user->login = $data['login'];
		$user->email = $data['email'];
		$user->password = password_hash($data['password'],PASSWORD_DEFAULT);
		R::store($user);
		echo '<div style="color: green;">Вы успешно зарегистрированны</div><hr>';

	} else
	{
		echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
	}
} 

?>  

<form action="/signup.php" method="POST">
	
	<div id="center">
<p>
	<p><strong>Ваш логин</strong>:</p>
	<input type="text" name="login" value="<?php echo @$data['login']; ?>">
</p>

<p>
	<p><strong>Ваш Email</strong>:</p>
	<input type="email" name="email" value="<?php echo @$data['email']; ?>" >
</p>


<p>
	<p><strong>Ваш пароль</strong>:</p>
	<input type="password" name="password" value="<?php echo @$data['password']; ?>" >
</p>

<p>
	<p><strong>Ваш пароль ещё раз</strong>:</p>
	<input type="password" name="password_2" value="<?php echo @$data['password_2']; ?>" >
</p>

<p>
	<button type="submit" name="do_signup">
		Зарегистироваться
	</button>	
</p>
</div>

</form>