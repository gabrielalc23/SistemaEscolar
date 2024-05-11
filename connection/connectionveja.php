<?php

    $host       = "localhost";
    $database   = "cadastro";
    $user       = "root";
    $senha      = "root";

    $conn = new pdo("mysql:host=$host;dbname=$database",$user,$senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    