<?php
require __DIR__ . '/../includes/db.php';

if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        if($pdo->query("DELETE FROM categories WHERE id = '$id'")){
            $_SESSION['success'] = "успешно!";
            header("location:  list.php");
            exit();
        }
    }

}
$_SESSION['error'] = "Неверные данные";
header("location:  list.php");
exit();