<!DOCTYPE html>
<html>
<head>
    <title>Users List</title>
</head>
<body>
    <h2>Registered Users</h2>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Username</th>
            </tr>
        </thead>
        <tbody>
           <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['id']; ?></td>
        <td><?php echo $user['firstname']; ?></td>
        <td><?php echo $user['lastname']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td><?php echo $user['username']; ?></td>
    </tr>
<?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
