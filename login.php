<?php
require_once "db.php";

$data = $_POST;
if (isset($data['do_login'])) {
    $user = R::findOne('users', 'login =?', array($data['login']));
    if ($user)
    {
        if (password_verify($data['password'], $user->password)) {
            $_SESSION['logged_user'] = $user;
            echo '<div class="successful-registration">Поздравляю, вы авторизованы!</div><hr>';
        } 
        else {
            $errors[] = 'Введен неверный пароль';
        } 
    }
    else {
        $errors[] = 'Пользователь с таким логином не существует';
    }
    if (!empty($errors)) {
        {
            echo '<div class="error">' . array_shift($errors) . '</div><hr>';
        }
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/otherComponents/bootstrap-reboot.css">
    <link rel="stylesheet" href="css/otherComponents/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <section>
        <div class="container">
            <div class="row ">
                <div class="col-12">
                    <main class="d-flex justify-content-center">
                        <div class="wrapper">
                            <div class="wrap-content">
                                <div class="content">
                                    <form action="/login.php" method="POST">
                                        <?php if (isset($_SESSION['logged_user'])) : ?>
                                        Поздравляем, успешная авторизация!<br>
                                        <a href="/logout.php">Выход</a>
                                        <?php else : ?>
                                        <a href="/signup.php">Регистрация</a>
                                        <p>
                                            <p>Логин</p>
                                            <input type="login" name="login" value="<?php echo $data['login']; ?>" class="form-control" placeholder="Login">
                                        </p>
                                        <p>
                                            <p>Пароль</p>
                                            <input type="password" name="password" value="<?php echo $data['password']; ?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                        </p>
                                        <button type="submit" name="do_login">Войти в систему</button>
                                        <?php endif; ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </section>

</body>

</html> 