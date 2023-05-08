<?php
require_once('../classes/class.users.php');
$users = new Users;
if($_GET['ind'] == 'register'){
    if($users->register($_POST)){
        echo 'success';
    }
}