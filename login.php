<?php
$page_title = 'Login | Kesong Puti';
require 'connection.php';

if (isset($_SESSION['toast_message'])) {
    $toast_message = $_SESSION['toast_message'];
    unset($_SESSION['toast_message']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = $_POST['password'];

    // Check in super_admin table
    $super_admin_check_query = "SELECT * FROM super_admin WHERE username='$username'";
    $super_admin_result = mysqli_query($connection, $super_admin_check_query);

    if (mysqli_num_rows($super_admin_result) == 1) {
        $super_admin = mysqli_fetch_assoc($super_admin_result);

        if (password_verify($password, $super_admin['password'])) {
            $_SESSION['s.id'] = $super_admin['s.id'];
            $_SESSION['username'] = $super_admin['username'];
            $_SESSION['email'] = $super_admin['email'];
            $_SESSION['role'] = 'superadmin';
            header('Location: interfaces/superadmin.php');
            exit();
        } else {
            $toast_message = "Incorrect password for super admin.";
        }
    } else {
        // Check in admins table
        $admin_check_query = "SELECT * FROM admins WHERE username='$username'";
        $admin_result = mysqli_query($connection, $admin_check_query);

        if (mysqli_num_rows($admin_result) == 1) {
            $admin = mysqli_fetch_assoc($admin_result);

            if (password_verify($password, $admin['password'])) {
                $_SESSION['a.id'] = $admin['a.id'];
                $_SESSION['username'] = $admin['username'];
                $_SESSION['email'] = $admin['email'];
                $_SESSION['role'] = 'admin';
                header('Location: interfaces/admin.php');
                exit();
            } else {
                $toast_message = "Incorrect password for admin.";
            }
        } else {
            $toast_message = "Username not found. Please try again.";
        }
    }
    mysqli_close($connection);
}

include('templates/admin-login.html');
?>

<script>
var toastMessage = "<?php echo isset($toast_message) ? $toast_message : ''; ?>";
if (toastMessage) {
    alert(toastMessage);
}
</script>
