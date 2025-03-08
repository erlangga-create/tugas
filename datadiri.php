<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Biodata</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen p-4">
    <div class="bg-gray-800 w-full max-w-md p-6 rounded-lg shadow-lg text-white">
        <h1 class="text-2xl font-bold text-center">Biodata</h1>
        <form action="cv.php" method="post" class="mt-4 space-y-3">
            <input class="w-full bg-gray-700 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400" type="text" name="nama" placeholder="Nama" required>
            <input class="w-full bg-gray-700 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400" type="text" name="ttl" placeholder="Tempat & Tanggal Lahir" required>
            <input class="w-full bg-gray-700 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400" type="text" name="SMA" placeholder="Pendidikan SMA" required>
            <input class="w-full bg-gray-700 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400" type="text" name="pendidikan" placeholder="Pendidikan Sekarang" required>
            <textarea class="w-full bg-gray-700 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400" name="deskripsi" placeholder="Deskripsi Saya" required></textarea>
            <input class="w-full bg-gray-700 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400" type="text" name="kontak" placeholder="Kontak" required>
            <input class="w-full bg-gray-700 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400" type="text" name="sosmed" placeholder="Instagram" required>
            <button class="w-full bg-blue-500 py-2 rounded-lg hover:bg-blue-600 font-bold">Submit</button>
        </form>
        <form method="post" class="mt-3">
            <button type="submit" name="logout" class="w-full bg-red-500 py-2 rounded-lg hover:bg-red-600 font-bold">Logout</button>
        </form>
    </div>
</body>
</html>