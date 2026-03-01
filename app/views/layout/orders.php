<?php
require_once __DIR__ . '/../../core/Config.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/orders.scss">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+NZ+Basic:wght@100..400&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Titan+One&display=swap" rel="stylesheet">
</head>

<body class="orders_body">
    <?php include 'header.php'; ?>
    <h1 class="orders_title">My Orders</h1>
    <main class="main_container">
        <?php if (empty($ordersWithItems)): ?>
            <p>You have no orders yet.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title, Author</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ordersWithItems as $row):
                        $order = $row['order'];
                        $items = $row['items'];
                        $orderId = $order['id_order'];
                    ?>
                        <?php foreach ($items as $item): ?>
                            <tr>
                                <td><img class="order_image" src="<?= BASE_URL ?>REST/public/assets/images/books/<?= htmlspecialchars($item['book']['image']) ?>" alt="<?= htmlspecialchars($item['book']['title']) ?>"></td>
                                <td><?= htmlspecialchars($item['book']['title'])  ?>, <?= htmlspecialchars($item['book']['author'])  ?></td>
                                <td class="quantity_column">
                                    <button class="decrease_quantity quantity_button" data-quantity="<?= htmlspecialchars($item['quantity']) ?>" data-id-order="<?= htmlspecialchars($item['id_order']) ?>" data-id-book="<?= htmlspecialchars($item['id_book']) ?>" data-price="<?= htmlspecialchars($item['price']) ?>">-</button>
                                    <span class="quantity_value" data-id-book="<?= htmlspecialchars($item['id_book']) ?>"><?= htmlspecialchars($item['quantity']) ?></span>
                                    <button class="increase_quantity quantity_button" data-quantity="<?= htmlspecialchars($item['quantity']) ?>" data-id-order="<?= htmlspecialchars($item['id_order']) ?>" data-id-book="<?= htmlspecialchars($item['id_book']) ?>" data-price="<?= htmlspecialchars($item['price']) ?>">+</button>
                                </td>
                                <td class="price_column">$<?= htmlspecialchars($item['price']) ?></td>
                                <td class="action_column">
                                    <span class="delete_item" data-id-order="<?= htmlspecialchars($item['id_order']) ?>" data-id-book="<?= htmlspecialchars($item['id_book']) ?>" data-price="<?= htmlspecialchars($item['price']) ?>" data-quantity="<?= htmlspecialchars($item['quantity']) ?>">Delete</span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">Order №<?= htmlspecialchars($orderId) ?></td>
                        <td>Date: <?= htmlspecialchars($order['created_at'] ?? '') ?></td>
                        <td colspan="2"> <strong>Total:</strong>$<span class="total_price"><?= htmlspecialchars($order['total_price']) ?></span> </td>
                    </tr>
                </tfoot>
            </table>
        <?php endif; ?>
    </main>
    <?php include 'footer.php'; ?>
    <script src="<?= BASE_URL ?>public/assets/js/orders.js"></script>
</body>

</html>