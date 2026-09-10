<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
$current = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? html_escape($title) . ' — Product Management' : 'Product Management' ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
<div class="app-shell">
    <aside class="sidebar">
        <div class="brand">◆ ProductHub</div>
        <div class="brand-sub">Inventory Management</div>
        <nav>
            <a href="<?= site_url('products') ?>" class="<?= strpos($current, 'products') !== false && strpos($current, 'create') === false && strpos($current, 'edit') === false ? 'active' : '' ?>">
                All Products
            </a>
            <a href="<?= site_url('products/create') ?>" class="<?= strpos($current, 'create') !== false ? 'active' : '' ?>">
                Add Product
            </a>
        </nav>
        <div class="logout">
            <a href="<?= site_url('logout') ?>">&larr; Logout</a>
        </div>
    </aside>
    <main class="main">