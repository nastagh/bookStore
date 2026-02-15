<?php

require_once 'app/core/Config.php';



$c = $_GET["c"] ?? null;
$a = $_GET['a'] ?? null;

if ($c && $a) {
    $controllerPath = __DIR__ . '/app/controllers/' . $c . 'Controller.php';
    if (file_exists($controllerPath)) {
        require_once $controllerPath;
        $controllerName = $c . 'Controller';
        if (class_exists($controllerName) && method_exists($controllerName, $a)) {
            $controllerName::$a();
        } else {
            echo "Method or Controller not found.";
        }
    } else {
        echo "Controller file not found.";
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/assets/css/style.scss">
    <link rel="stylesheet" href="REST/public/assets/css/styleBooks.scss">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+NZ+Basic:wght@100..400&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Titan+One&display=swap" rel="stylesheet">
    <title>BookStore</title>
</head>

<body>
    <?php include 'app/views/layout/header.php'; ?>
    <section class="header_section">
        <div class="header_text">
            From timeless classics to modern masterpieces — discover books that inspire, educate, and entertain.
        </div>
        <div class="main_img_cantainer">
            <img src="public/assets/images/books_header.png" alt="book_header">
        </div>
    </section>
    <?php include 'REST/books.php'; ?>
</body>

</html>