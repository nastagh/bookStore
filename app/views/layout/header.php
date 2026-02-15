<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/header.scss">
</head>

<body>
    <header>
        <div class="logo_container">
            <img src="<?= BASE_URL ?>public/assets/images/logo.svg" class="logo_img" alt="logo">
            <h1 class="logo">
                <a href="<?= BASE_URL ?>index.php">BookStore</a>
            </h1>
        </div>
        <nav>
            <ul>
                <li><a href="<?= BASE_URL ?>index.php">Home</a></li>
                <li><a href="<?= BASE_URL ?>blog.php">Blog</a></li>
                <li class="account_container"
                    onclick="window.location.href = '<?= BASE_URL ?>app/views/layout/login.php'"><img
                        src="<?= BASE_URL ?>public/assets/images/account.svg" alt="account" title="account"></li>
            </ul>
        </nav>
    </header>
</body>

</html>