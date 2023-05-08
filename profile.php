<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        footer{
            position:fixed;
            bottom:0;   
            width:100%;
        }
    </style>
</head>
<body>
    <?php
        session_start();

        if(!isset($_SESSION['auth'])){
            header('login.php');
        }
    ?>
    <header class="bg-success">
        <div class="container">
            <h1 class="text-center text-white pt-2">Public Chat Room</h1>
            <a class="text-white" href="">Log Out</a>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="row pt-2" id="messages">
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <input type="text" id="message" class="form-control">
    </footer>



    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/messaging.js"></script>
</body>
</html>