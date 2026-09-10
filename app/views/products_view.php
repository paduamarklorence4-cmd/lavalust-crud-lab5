<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
$title = 'Products';
include __DIR__ . '/header.php';

$total = count($products);
$low_stock = 0;
foreach ($products as $p) {
    if ($p['quantity'] <= 5) $low_stock++;
}
?>

<div class="page-header">
    <div>
        <div class="eyebrow">Inventory</div>
        <h1>Products</h1>
    </div>
    <a href="<?php echo site_url('products/create'); ?>" class="btn btn-primary">+ Add Product</a>
</div>

<?php if (isset($_SESSION['flash_message'])): ?>
    <div class="alert alert-success"><?php echo $_SESSION['flash_message']; ?></div>
    <?php unset($_SESSION['flash_message']); ?>
<?php endif; ?>

<div class="stat-strip">
    <div class="stat">
        <div class="value"><?php echo $total; ?></div>
        <div class="label">Total Products</div>
    </div>
    <div class="stat">
        <div class="value"><?php echo $low_stock; ?></div>
        <div class="label">Low Stock (≤5)</div>
    </div>
</div>

<div class="panel">
    <div class="panel-header">
        <h2>All Products</h2>
    </div>
    <div class="panel-body">
        <?php if (empty($products)): ?>
            <div class="empty-state">
                <h3>No products yet</h3>
                <p>Add your first product to start tracking inventory.</p>
                <a href="<?php echo site_url('products/create'); ?>" class="btn btn-primary">+ Add Product</a>
            </div>
        <?php else: ?>
            <table class="data">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td><strong><?php echo $product['product_name']; ?></strong></td>
                        <td><?php echo $product['description']; ?></td>
                        <td>₱<?php echo number_format($product['price'], 2); ?></td>
                        <td>
                            <?php if ($product['quantity'] == 0): ?>
                                <span class="qty-badge out-stock">Out of stock</span>
                            <?php elseif ($product['quantity'] <= 5): ?>
                                <span class="qty-badge low-stock"><?php echo $product['quantity']; ?> left</span>
                            <?php else: ?>
                                <span class="qty-badge in-stock"><?php echo $product['quantity']; ?> in stock</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="actions-cell">
                                <a href="<?php echo site_url('products/edit/'.$product['id']); ?>" class="btn btn-ghost btn-sm">Edit</a>
                                <a href="<?php echo site_url('products/delete/'.$product['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this product?')">Delete</a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>

<?php include __DIR__ . '/footer.php'; ?>