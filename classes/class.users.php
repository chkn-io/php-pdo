<?php
class Users{
    public function login(){
       
    }

    public function register($data){
        ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
        $pdo = new PDO('mysql:host=localhost;dbname=chatroom','root','');

        $query = 'INSERT INTO accounts(username,password,name) VALUES(:username,:password,:name)';

        $stmt = $pdo->prepare($query);
        $stmt->bindValue('username',$data['username']);
        $stmt->bindValue('password',$data['password']);
        $stmt->bindValue('name',$data['name']);

        $stmt->execute();

        return true;
    }
}