<?php
require_once __DIR__ . '/../../core/Config.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/header.scss">
    <title>My Orders - BookStore</title>
</head>
<body>
    <?php include __DIR__ . '/header.php'; ?>
    <main class="main_container" style="padding: 2rem; max-width: 900px; margin: 0 auto;">
        <h1>My Orders</h1>
        <?php if (empty($orders)): ?>
            <p>You have no orders yet.</p>
        <?php else: ?>
            <ul style="list-style: none; padding: 0;">
                <?php foreach ($orders as $order): ?>
                    <li style="border: 1px solid #ddd; padding: 1rem; margin-bottom: 0.5rem;">
                        Order #<?= htmlspecialchars($order['id_order'] ?? $order['id'] ?? '') ?>
                        — <?= htmlspecialchars($order['created_at'] ?? '') ?>
                        — $<?= htmlspecialchars($order['total_price'] ?? '') ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </main>
    <?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
