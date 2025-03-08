<?php
session_start();

$error = isset($_SESSION['error']) ? $_SESSION['error'] : "";
unset($_SESSION['error']);

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Format email tidak valid!";
        header("Location: login.php");
        exit();
    }

    $domain = substr(strrchr($username, "@"), 1);
    if ($password === $domain) {
        $_SESSION['username'] = $username;
        header("Location: datadiri.php");
        exit();
    } else {
        $_SESSION['error'] = "Password salah!";
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen white-900">
    <div class="bg-gray-500 w-90 p-10 rounded-lg shadow-lg text-white">
        <h2 class="text-3xl font-bold text-center">Login</h2>

        <?php if ($error): ?>
            <p class="bg-red-500 text-white p-2 mt-3 text-center rounded"> <?php echo $error; ?> </p>
        <?php endif; ?>
        
        <form action="login.php" method="post" class="mt-4">
            <label for="username" class="block text-sm font-semibold">Email</label>
            <input type="text" id="username" name="username" class="w-full p-2 mt-1 text-gray-900 rounded border focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="example@gmail.com" required>
            
            <label for="password" class="block mt-3 text-sm font-semibold">Password</label>
            <input type="password" id="password" name="password" class="w-full p-2 mt-1 text-gray-900 rounded border focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="******" required>
            
            <button type="submit" name="login" class="w-full bg-blue-500 text-white font-bold py-2 px-4 mt-5 rounded hover:bg-blue-600">Login</button>
        </form>
    </div>
</body>
</html>