<?php
require_once "db.php";

$data = $_POST;
if (isset($data['do_signup'])) {
    $errors = array();
    if (trim($data['login']) == '') {
        $errors[] = 'Введите логин';
    }
    if ($data['password'] == '') {
        $errors[] = 'Введите пароль';
    }
    if ($data['password_2'] != $data['password']) {
        $errors[] = 'Эти пароли не совпадают. Попробуйте снова.';
    }
    if (R::count('users', "login = ?", array($data['login'])) > 0) {
        $errors[] = 'Пользователь с таким логином существует.';
    }
    if (trim($data['email']) == '') 
    {
        $errors[] = 'Введите Email';
    }
    if (R::count('users', "email = ?", array($data['email'])) > 0) {
        $errors[] = 'Пользователь с таким адресом электронной почты существует.';
    }


    if (empty($errors)) {
        $user = R::dispense('users');
        $user->login = $data['login'];
        $user->email = $data['email'];
        $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
        R::store($user);
        echo '<div class="successful-registration">Успешная регистрация</div><hr>';
    } else {
        echo '<div class="error">' . array_shift($errors) . '</div><hr>';
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
                                    <form action="/signup.php" method="POST">
                                    <a href="/index.php">главная</a>
                                        <p>
                                            <p>Email</p>
                                            <input type="email" name="email" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                        </p>
                                        <p>
                                            <p>Логин</p>
                                            <input type="login" name="login" value="<?php echo isset($data['login']) ? $data['login'] : '' ; ?>" class="form-control" placeholder="Login">
                                        </p>
                                        <p>
                                            <p>Пароль</p>
                                            <input type="password" name="password" value="<?php echo isset($data['password']) ? $data['password'] : '' ;?>" class="form-control" id="exampleInputPassword" placeholder="Password">
                                        </p>
                                        <p>
                                            <p>Повторите пароль</p>
                                            <input type="password" name="password_2" value="<?php echo isset($data['password_2']) ? $data['password_2'] : '' ;?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                        </p>
                                        <button type="submit" name="do_signup">Cоздать учетную запись</button>
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