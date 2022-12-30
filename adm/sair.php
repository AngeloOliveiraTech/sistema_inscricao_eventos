<?php

include '../_app/conexao.php';

session_start();

unset($_SESSION['Ped']);

header("Location: ../index.php");
?>