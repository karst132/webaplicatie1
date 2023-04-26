<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="menukaart.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Inlogen</h1>
    </header>
    <main>
        <div class="col">
            <?php
            if(isset($_POST['login'])){
                $dsn = 'mysql:dbname=test;host=127.0.0.1';
                $user = 'root';
                $password = '';
                try{
                    $connectie = new PDO($dsn, $user, $password);
                }
                catch (PDOException $e)
                {
                    echo "gefaalt" . $e;
                }
                
                $resultSet = $connectie->prepare("SELECT * FROM `users` WHERE `username` = ? AND `password` = ?");
                $resultSet->execute([$_POST['username'], $_POST['password']]);

                if ($resultSet->rowCount() == 1){
                    echo "klopt";
                    $_SESSION['naam'] = $_POST['username'];
                }
                else{
                    echo "klopt niet";
                }
            }
            ?>
            <form method="post">
                username: <input type="text" name="username">
                password:  <input type="text" name="password">
                <input type="submit" name="login" value="Inloggen">
            </form>
            <a href="index.php" class="blue-text">Terug</a>
        </div>
    <main>
</body>
</html>