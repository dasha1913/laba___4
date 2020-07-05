<?php
session_start();
require_once ('../user_data.php');
$temp1=$_GET['temp'];
$temp2=0;
if($_POST['id']!=0){
    $_SESSION['id']=$_POST['id'];
    $_SESSION['name']=$_POST['name'];
    $_SESSION['surname']=$_POST['surname'];
    $_SESSION['login']=$_POST['login'];
    $_SESSION['password']=$_POST['password'];
    $_SESSION['lang']=$_POST['lang'];
    $sql = $connect->prepare("UPDATE `users` SET `name`= ?, `surname`= ?, `login`= ?, `password`= ?, `language`= ?, `role`= ? WHERE `users`.`id`= ?");
    $sql->bind_param("ssssssi", $_SESSION['name'],$_SESSION['surname'], $_SESSION['login'], $_SESSION['password'], $_SESSION['lang'], $_SESSION['role'], $_SESSION['id']);
    $sql->execute();
    $temp1=0;
    $temp2=0;
}
if($temp1!=0){$temp2=1;}
?>
    Имя :
    <br><form method="post">
    <input name='id' type="hidden" <?php if($temp2==0){ ?>disabled<?php } ?> value="<?=$_SESSION['id']?>"/>
    <input name='name' type="text" <?php if($temp2==0){ ?>disabled<?php } ?> value="<?=$_SESSION['name']?>"/>
    <br>
    Фамилия :
    <br>
    <input name='surname' type="text" <?php if($temp2==0){ ?>disabled<?php } ?> value="<?=$_SESSION['surname']?>"/>
    <br>
    Логин :
    <br>
    <input name='login' type="text" <?php if($temp2==0){ ?>disabled<?php } ?> value="<?=$_SESSION['login']?>"/>
    <br>
    Пароль :
    <br>
    <input name='password' type="password" <?php if($temp2==0){ ?>disabled<?php } ?> value="<?=$_SESSION['password']?>"/>
    <br>
    Язык :
    <br>
    <input name='lang' type="text" <?php if($temp2==0){ ?>disabled<?php } ?> value="<?=$_SESSION['lang']?>"/>
    <br>
    <?php if($temp2!=0){ ?><a href="personal_edit.php"><input type="submit" val='send!'/></a><?php } ?>
</form>
    <br>
<?php if($temp2==0){ ?><a href="personal_edit.php?temp=1">Изменить</a><?php } ?>
<br>
<a href="../index.php">Выход</a>
