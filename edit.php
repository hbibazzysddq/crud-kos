<?php
include 'config.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM kosan WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $harga = $_POST['harga'];

    $sql = "UPDATE kosan SET nama='$nama', alamat='$alamat', harga='$harga' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kosan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full text-gray-300">
    <div class="min-h-full">
        <header class="bg-gray-800 shadow-lg">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-white">Edit Kosan</h1>
            </div>
        </header>
        <main class="py-10">
            <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
                <div class="px-4 py-8 sm:px-0">
                    <div class="rounded-lg bg-gray-800 shadow-xl">
                        <form method="post" class="space-y-8 px-6 py-8">
                            <div>
                                <label for="nama" class="block text-lg font-medium text-gray-300">Nama</label>
                                <input type="text" name="nama" id="nama" required value="<?php echo htmlspecialchars($row['nama']); ?>" class="mt-2 block w-full rounded-md border-gray-600 bg-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg">
                            </div>
                            <div>
                                <label for="alamat" class="block text-lg font-medium text-gray-300">Alamat</label>
                                <input type="text" name="alamat" id="alamat" required value="<?php echo htmlspecialchars($row['alamat']); ?>" class="mt-2 block w-full rounded-md border-gray-600 bg-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg">
                            </div>
                            <div>
                                <label for="harga" class="block text-lg font-medium text-gray-300">Harga</label>
                                <div class="relative mt-2 rounded-md shadow-sm">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <span class="text-gray-400 text-lg">Rp</span>
                                    </div>
                                    <input type="number" name="harga" id="harga" required value="<?php echo htmlspecialchars($row['harga']); ?>" class="block w-full rounded-md border-gray-600 bg-gray-700 pl-10 pr-12 focus:border-indigo-500 focus:ring-indigo-500 text-lg" placeholder="0">
                                </div>
                            </div>
                            <div class="flex justify-between">
                                <a href="index.php" class="inline-flex justify-center rounded-md border border-transparent bg-gray-600 py-2 px-4 text-lg font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 focus:ring-offset-gray-800 transition duration-150 ease-in-out">Kembali</a>
                                <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-lg font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-800 transition duration-150 ease-in-out">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>

<?php $conn->close(); ?>