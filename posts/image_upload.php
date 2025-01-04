<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../includes/head.php"; ?>
</head>
<body>
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
?>


<h1 class="max-w-full mb-4 mt-5 text-3xl font-extrabold tracking-tight leading-none md:text-5xl dark:text-white text-center">Загрузить картинку</h1>

<?php include "../includes/flash.php"; ?>
<div class="max-w-2xl mx-auto">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <a href="show.php?id=<?= $post["id"]?>" class="mb-5 font-medium text-sm inline-flex items-center text-blue-500 hover:text-blue-800">
            <svg class="mr-1 -ml-1 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
            </svg>
         <?= $post["title"] ?>
        </a>
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Текущая картинка
                </h3>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-4">
                   <?php if($post["image"]): ?>
                    <div>
                        <img src="<?= $post["image"] ?>" class="w-[50%] mx-auto" alt="">
                    </div>
                    <?php endif; ?>
                    <div class="my-7">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Загрузить картинку</label>
                        <input name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 dark:focus:ring-yellow-900">
                    <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Загрузить
                </button>
            </form>
        </div>
    </div>
</div>

<script src="https://happyhaha.github.io/css/dist/flowbite.min.js"></script>

</body>
</html>


<?php
function generateRandomName($filename)
{
    return date("YmdHis") ."_".  rand(0, 20) . "_". $filename ;
}
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $filename =  generateRandomName($_FILES["image"]["name"]);

    $types = ["image/jpeg", "image/jpg", "image/png"];

    if(!in_array($_FILES["image"]["type"], $types)){
        $_SESSION["error"] = "неверный тип";
        header("Location: image_upload.php?id=$_GET[id]");
        exit();
    }
    if(move_uploaded_file($_FILES["image"]["tmp_name"], __DIR__ . "/../uploads/" . $filename)){
        $pdo->query("UPDATE posts SET image = '/uploads/$filename' WHERE id = '$_GET[id]'");
        $_SESSION["success"] = "успешно";
        header("Location: show.php?id=$_GET[id]");
        exit();
    }


}
?>