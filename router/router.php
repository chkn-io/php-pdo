<?php
require_once('../classes/class.users.php');
$users = new Users;
if($_GET['ind'] == 'register'){
    echo $users->register($_POST);
}
if($_GET['ind'] == 'login'){
    echo $users->login($_POST);
}