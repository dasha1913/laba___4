<?php
require_once "user_class.php";
require_once "user_data.php";
$login = $_POST['login'];
$password = $_POST['password'];
if (!empty($login) && !empty($password))
{
foreach ($users as $user)
{
    if ($login == $user['login'] && $password == $user['password'])
    {
                $admin = new $roles[$user['role']]($user);
                $_SESSION['id'] = $user['id'];
                $_SESSION['lang'] = $user['language'];
                $_SESSION['login']=$user['login'];
                $_SESSION['password']=$user['password'];
                $_SESSION['role']=$user['role'];
                $_SESSION['name']=$user['name'];
                $_SESSION['surname']=$user['surname'];
                break;
    }
}
}
    if ($admin){
    $admin->Get();
} else
    {
        echo "Данные не верны.";
        ?>
        <br>
        <a href="index.php">Вернуться назад</a>
        <?php
    }
    ?>