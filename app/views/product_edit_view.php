<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
$title = 'Edit Product';
include __DIR__ . '/header.php';
?>

<div class="page-header">
    <div>
        <div class="eyebrow">Editing</div>
        <h1>Edit Product</h1>
    </div>
    <a href="<?php echo site_url('products'); ?>" class="btn btn-ghost">&larr; Back to list</a>
</div>

<div class="panel">
    <div class="panel-header">
        <h2>Product Details</h2>
    </div>
    <form method="post" action="<?php echo site_url('products/edit/'.$product['id']); ?>">
        <div class="form-grid">
            <div class="field full">
                <label for="product_name">Product Name</label>
                <input type="text" id="product_name" name="product_name" value="<?php echo $product['product_name']; ?>" required>
            </div>
            <div class="field full">
                <label for="description">Description</label>
                <textarea id="description" name="description"><?php echo $product['description']; ?></textarea>
            </div>
            <div class="field">
                <label for="price">Price (₱)</label>
                <input type="number" step="0.01" id="price" name="price" value="<?php echo $product['price']; ?>" required>
            </div>
            <div class="field">
                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" name="quantity" value="<?php echo $product['quantity']; ?>" required>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?php echo site_url('products'); ?>" class="btn btn-ghost">Cancel</a>
        </div>
    </form>
</div>

<?php include __DIR__ . '/footer.php'; ?>
