<?php
class Users{
    public function login($data){
        session_start();
        ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
        $pdo = new PDO('mysql:host=localhost;dbname=chatroom','root','');

        $query = 'SELECT * FROM accounts WHERE username=:username and password=:password';

        $check = $pdo->prepare($query);
        $check->bindValue('username',$data['login_username']);
        $check->bindValue('password',$data['login_password']);
        $check->execute();

        $records = $check->fetchAll();
        if(count($records) == 0){
            // Invalid
            echo 'Invalid Username or Password';
        }else{
            $_SESSION['auth'] = $records;
            echo 'success';
        }
    }

    public function register($data){
        ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
        $pdo = new PDO('mysql:host=localhost;dbname=chatroom','root','');

        $query = 'SELECT * FROM accounts WHERE username=:username';

        $check = $pdo->prepare($query);
        $check->bindValue('username',$data['username']);
        $check->execute();

        $records = $check->fetchAll();
        if(count($records) == 0){
             $query = 'INSERT INTO accounts(username,password,name) VALUES(:username,:password,:name)';
            $stmt = $pdo->prepare($query);
            $stmt->bindValue('username',$data['username']);
            $stmt->bindValue('password',$data['password']);
            $stmt->bindValue('name',$data['name']);

            $stmt->execute();

            return 'success';
        }else{
            return 'username already exist';
        }
       
    }
}