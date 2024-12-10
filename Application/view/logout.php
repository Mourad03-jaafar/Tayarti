<?php
include('../model/usersclass.php');

$user = new User();
$User= $user->log_out();

header('Location: login.php');
?>