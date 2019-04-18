<?php
require "session.php";
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
                        <div class="main-wrap">
                            <div class="wrapper">
                                <div class="wrap-content">
                                    <div class="content">
                                        <?php if (isset($_SESSION['logged_user'])) : ?>
                                        Поздравляем, успешная авторизация!<br>
                                        <a href="/logout.php">Выход</a>
                                        <?php else : ?>
                                        <div class="sign-in reg">
                                            <a href="/login.php">Войти в систему</a>
                                        </div>
                                        <div class="Registration reg">
                                            <a href="/signup.php">Зарегистрироваться</a>
                                        </div>
                                        <?php endif; ?>
                                    </div>
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