<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In — Product Management</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>
<body>
<div class="login-shell">
    <div class="login-hero">
        <div class="mark">◆ PRODUCTHUB</div>
        <h1>Keep every product, price, and quantity in one place.</h1>
        <p>Sign in to manage your catalog — add new items, update stock, and remove what's discontinued.</p>
    </div>
    <div class="login-panel">
        <div class="login-form-wrap">
            <h2>Sign in</h2>
            <p class="sub">Enter your credentials to continue.</p>

            <?php if (isset($error)): ?>
                <div class="alert alert-error"><?php echo $error; ?></div>
            <?php endif; ?>

            <form method="post" action="<?php echo site_url('login'); ?>">
                <div class="field">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required autofocus>
                </div>
                <div class="field">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>