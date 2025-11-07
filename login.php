<?php
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare("SELECT id, password_hash FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: dashboard.php');
        exit;
    } else {
        $err = "Invalid credentials";
    }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <form method="post">
    <h2>Login</h2>
    <?php if(!empty($err)) echo "<p style='color:red'>".htmlspecialchars($err)."</p>"; ?>
    <input name="username" type="text" placeholder="Username">
    <input name="password" type="password" placeholder="Password">
    <button>Login</button>
    <p><a href="register.php">Register</a></p>
  </form>
</body>
</html>
