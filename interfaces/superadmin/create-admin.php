<?php
$page_title = 'Add Admin';
require '../../connection.php'; // Include database connection


$toast_message = ''; // Initialize variable for toast message

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate input
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $loggedInAdminId = $_SESSION["a.id"];


    // Check if passwords match
    if ($password !== $confirm_password) {
        $toast_message = "Passwords do not match.";
    } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{6,}$/', $password)) {
        $toast_message = "Password must be at least 6 characters and contain a lowercase letter, uppercase letter, number, and special character.";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if email already exists
        $email_check_query = "SELECT * FROM admins WHERE email='$email'";
        $result = mysqli_query($connection, $email_check_query);
        if (mysqli_num_rows($result) > 0) {
            $toast_message = "Email is already registered.";
        } else {
            // Insert the new admin into the database
            $sql = "INSERT INTO admins (username, email, password)
                    VALUES ('$username', '$email', '$hashed_password')";

            if (mysqli_query($connection, $sql)) {
                $toast_message = "Admin added successfully!";
            } else {
                $toast_message = "Error: " . mysqli_error($connection);
            }
        }
    }
}

// Fetch all admins
$admins_query = "SELECT a.id, username, email FROM admins";
$admins_result = mysqli_query($connection, $admins_query);

// Close the connection
mysqli_close($connection);


?>



<script>
// Display the toast message if set
var toastMessage = "<?php echo isset($toast_message) ? $toast_message : ''; ?>";
if (toastMessage) {
    alert(toastMessage); // Display the message in a simple alert (you can replace it with a toast)
}
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>


