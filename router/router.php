<?php
require_once('../classes/class.users.php');
require_once('../classes/class.chats.php');
$users = new Users;
if($_GET['ind'] == 'register'){
    echo $users->register($_POST);
}
if($_GET['ind'] == 'login'){
    echo $users->login($_POST);
}

if($_GET['ind'] == 'send'){
    $chats = new Chats;
    $chats->send($_POST);
}

if($_GET['ind'] == 'collect'){
    $chats = new Chats;
    echo ($chats->collect());
}