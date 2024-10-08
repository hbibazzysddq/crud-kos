<?php
include 'config.php';

$result = $conn->query("SELECT * FROM kosan");
?>

<!DOCTYPE html>
<html lang="id" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kosan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full text-gray-300">
    <div class="min-h-full">
        <header class="bg-gray-800 shadow-lg">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex justify-between items-center">
                <h1 class="text-3xl font-bold tracking-tight text-white">Daftar Kosan</h1>
                <nav>
                    <a href="create.php" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out">
                        Tambah Kosan
                    </a>
                </nav>
            </div>
        </header>
        <main class="py-10">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="px-4 py-8 sm:px-0">
                    <div class="overflow-x-auto rounded-lg shadow">
                        <table class="min-w-full divide-y divide-gray-700">
                            <thead class="bg-gray-800">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">ID</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Nama</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Alamat</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Harga</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-700 divide-y divide-gray-600">
                                <?php 
                                if ($result->num_rows > 0) {
                                    $nomor = 1;
                                    while($row = $result->fetch_assoc()): 
                                ?>
                                    <tr class="hover:bg-gray-600">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm"><?php echo $nomor; ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium"><?php echo htmlspecialchars($row['nama']); ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm"><?php echo htmlspecialchars($row['alamat']); ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="text-indigo-400 hover:text-indigo-300 mr-3">Edit</a>
                                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="text-red-400 hover:text-red-300" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                        </td>
                                    </tr>
                                <?php 
                                    $nomor++;
                                    endwhile; 
                                } else {
                                    echo '<tr><td colspan="5" class="px-6 py-4 text-center text-sm">Tidak ada data kosan</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>

<?php $conn->close(); ?>