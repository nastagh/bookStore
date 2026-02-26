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
        <?php if (empty($ordersWithItems)): ?>
            <p>You have no orders yet.</p>
        <?php else: ?>
            <ul style="list-style: none; padding: 0;">
                <?php foreach ($ordersWithItems as $row): 
                    $order = $row['order'];
                    $items = $row['items'];
                    $orderId = $order['id_order'];
                ?>
                    <li style="border: 1px solid #ddd; padding: 1rem; margin-bottom: 0.5rem;">
                        <strong>Order №<?= htmlspecialchars($orderId) ?></strong>
                        — Date: <?= htmlspecialchars($order['created_at'] ?? '') ?>
                        — Total: $<?= htmlspecialchars($order['total_price'] ?? '') ?>
                        <ul style="margin-top: 0.5rem; padding-left: 1.5rem;">
                            <?php foreach ($items as $item): ?>
                                <li>Book #<?= htmlspecialchars($item['book']['title'])  ?> <?= htmlspecialchars($item['book']['author'])  ?>— Qty: <?= htmlspecialchars($item['quantity']) ?> — $<?= htmlspecialchars($item['price']) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </main>
    <?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
