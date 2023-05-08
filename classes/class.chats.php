<?php

class Chats{
    public function send($data){
        session_start();

        $id = $_SESSION['auth'][0]['id'];
        ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
        $pdo = new PDO('mysql:host=localhost;dbname=chatroom','root','');

        $query = 'INSERT INTO chats(account_id,message) VALUES(:account_id,:message)';
        $insert = $pdo->prepare($query);
        $insert->bindValue('account_id',$id);
        $insert->bindValue('message',$data['message']);
        $insert->execute();

        echo 'success';
    }

    public function collect(){
        session_start();

        $id = $_SESSION['auth'][0]['id'];
        $pdo = new PDO('mysql:host=localhost;dbname=chatroom','root','');

        $stmt = $pdo->prepare('
                    SELECT a.id,a.name,ch.message FROM chats as ch
                        INNER JOIN accounts as a ON a.id = ch.account_id
                        ORDER BY ch.timestamp ASC
                    ');
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $html = '';
        foreach($data as $message){
            if($id == $message['id']){
                $html.='<div>
                <div class="col-md-4 bg-primary p-1 float-end mb-2">
                    <p class="text-white">You</p>
                    <p>'.$message['message'].'</p>
                </div>
            </div>';
            }else{
                $html.='
                <div>
                    <div class="col-md-4 bg-warning p-1 mb-2">
                        <p class="text-muted">'.$message['name'].'</p>
                        <p>'.$message['message'].'</p>
                    </div>
                </div>';
            }
            
        }
        echo $html;
    }
}