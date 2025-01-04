<!doctype html>
<html lang="en">
<?php include 'includes/head.php'; ?>

<body class="flex h-screen items-center justify-center">

    <div class="mt-28 flex justify-center mt-12">
        <div class="flex flex-col gap-2 rounded border bg-white p-8 ">
            <form class="flex flex-col gap-2" action="login-action.php" method="post">
                <div class="w-64">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Логин</label>
                    <input type="text" name="login" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Введите название статьи" required="">
                </div>
                <div class="w-64">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Пароль</label>
                    <input type="text" name="password" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Введите название статьи" required="">
                </div>
                <button class="bg-blue-700 rounded-lg group relative mt-2 inline-flex h-10 items-center justify-center gap-1  text-white  px-5 py-1" type="submit">
                    Кіру</button>
            </form>
        </div>
    </div>

</body>
</html>
