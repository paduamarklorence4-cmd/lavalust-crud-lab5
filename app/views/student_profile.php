<!DOCTYPE html>
<html>
<head>
    <title>Student Profile - Padua</title>
    <style>
        body { font-family: Arial, sans-serif; background: #1e1e2f; color: #fff; text-align: center; padding: 60px; }
        h1 { color: #ff6b35; }
        .card { background: #2a2a3d; display: inline-block; padding: 30px 50px; border-radius: 12px; text-align: left; }
        a { color: #7ea6ff; text-decoration: none; }
    </style>
</head>
<body>
    <h1>Student Information</h1>
    <div class="card">
        <p>Student ID: <?= $student_id ?></p>
        <p>Name: <?= $name ?></p>
        <p>Course: <?= $course ?></p>
        <p>Year Level: <?= $year ?></p>
        <p>Section: <?= $section ?></p>
        <p>Email: <?= $email ?></p>
    </div>
    <br><br>
    <nav>
        <a href="<?= site_url('student') ?>">Home</a> |
        <a href="<?= site_url('student/profile') ?>">Student Profile</a>
    </nav>
</body>
</html>