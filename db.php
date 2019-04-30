<?php

require_once "libs/rb-mysql.php";
R::setup(
        'mysql:host=localhost;dbname=registration',
        'root',
        ''
);

session_start();
