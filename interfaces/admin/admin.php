<?php
require '../connection.php'; 

// Check if the user is logged in as admin
if (!isset($_SESSION['username']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../../login.php');
    exit();
    
    
}
// else{
//         header('Location: admin.html');
//     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Interface</title>
</head>
<body>
    <h1>Welcome to the Admin Interface</h1>
    <p>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
    <p>This is the admin dashboard where you can manage various aspects of the system.</p>
    <a href="../../login.php">Logout</a>
</body>
</html>


