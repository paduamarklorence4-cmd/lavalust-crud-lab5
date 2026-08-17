<!DOCTYPE html>
<html>
<head>
    <title>Student Home - Padua</title>
    <style>
        body { font-family: Arial, sans-serif; background: #1e1e2f; color: #fff; text-align: center; padding: 60px; }
        h1 { color: #ff6b35; }
        a { color: #7ea6ff; text-decoration: none; margin: 0 10px; }
    </style>
</head>
<body>
    <h1>Welcome to My Student Page</h1>
    <p>This is the home page for Mark Lorence Padua's Student Information System.</p>
    <nav>
        <a href="<?= site_url('student') ?>">Home</a> |
        <a href="<?= site_url('student/profile') ?>">Student Profile</a>
    </nav>
</body>
</html>
 