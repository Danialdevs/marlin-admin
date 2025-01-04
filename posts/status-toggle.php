    <?php
require __DIR__ . '/../includes/db.php';
require __DIR__ . '/../includes/auth.php';

if(!isset($_GET["id"])){
    header("Location: ./list.php");
    exit();
}
$post = $pdo->query("SELECT * FROM posts where id = '$_GET[id]'")->fetch();
if(!$post){
    header("Location: ./list.php");
    exit();
}

$status = $post["status"] == "active" ? "draft" : "active";
    $pdo->query("UPDATE posts SET status = '$status'  where id = '$_GET[id]'");
    header("Location: show.php?id=$post[id]");
    exit();
?>
