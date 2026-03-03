<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/header.scss">
</head>

<body>
    <header data-base-url="<?= htmlspecialchars(BASE_URL) ?>">
        <div class="logo_container">
            <img src="<?= BASE_URL ?>public/assets/images/logo.svg" class="logo_img" alt="logo">
            <h1 class="logo">
                <a href="<?= BASE_URL ?>index.php">BookStore</a>
            </h1>
        </div>
        <nav>
            <ul>
                <li><a href="<?= BASE_URL ?>index.php">Home</a></li>
                <li><a href="<?= BASE_URL ?>app/views/layout/blog.php">Blog</a></li>
                <li class="catalog_container">Catalog</li>
                <li class="basket_container">
                    <img src="<?= BASE_URL ?>public/assets/images/basket.svg" alt="basket" title="basket" class="basket_icon" id="basketIcon">
                </li>

                <li class="account_container">
                    <img src="<?= BASE_URL ?>public/assets/images/account.svg" alt="account" title="Account" class="account_icon" id="accountIcon">
                    <span id="accountName" class="account_name"></span>
                </li>
            </ul>
        </nav>
    </header>
    <script src="<?= BASE_URL ?>public/assets/js/header.js"></script>
</body>

</html>